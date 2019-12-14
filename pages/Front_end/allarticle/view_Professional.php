<?php  include('../../../connect/connect.php'); ?>
<?php 
$type_article_id = "";
if(isset($_REQUEST["type_article_id"]) && $_REQUEST["type_article_id"] !=""){
 $type_article_id = $_REQUEST["type_article_id"];
}

$sql1 = sprintf("SELECT user_id FROM `tb_sendmail` WHERE `tb_sendmail`.`article_id` = %s and sta_sendMail != 2",GetSQLValueString($_GET['article_id'],'text'));
$query1 = $conn->query($sql1);
$row1 = $query1->fetch_all(MYSQLI_ASSOC);
$num = $query1->num_rows;

$txt_user_id = "";
for($i=0; $i<count($row1); $i++){

    $txt_user_id .= "'".$row1[$i]['user_id']."'";
    if(count($row1)-1!=$i){
        $txt_user_id .= ",";
    }  
}
if($num>0){
    $sql = "SELECT user.user_id, user.pre_id, user.name_th, user.surname_th FROM `spacialization` left join user on spacialization.user_id = user.user_id WHERE spacialization.type_article_id = $type_article_id and user.type_user_id = 3 and user.user_id NOT IN($txt_user_id)  ORDER BY `spacialization`.`type_article_id` DESC";
}else{
    $sql = "SELECT user.user_id, user.pre_id, user.name_th, user.surname_th FROM `spacialization` left join user on spacialization.user_id = user.user_id WHERE spacialization.type_article_id = $type_article_id and user.type_user_id = 3 ORDER BY `spacialization`.`type_article_id` DESC"; 
}
$query = $conn->query($sql);
$row = $query->fetch_all(MYSQLI_ASSOC);

?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="date_article">ผู้ทรงคุณวุฒิ :</label>
        <select class="form-control a1" name="user_id[]">
            <option value="">กรุณาเลือก</option>
            <span class="a1"></span>
            <?php for($i=0; $i<count($row); $i++){ ?>
                <option value="<?php echo $row[$i]['user_id']; ?>"><?php echo $row[$i]['pre_id']; ?> <?php echo $row[$i]['name_th']; ?> <?php echo $row[$i]['surname_th']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="date_article">อีเมล :</label>
        <input type="email" name="email[]" class="form-control b1" readonly="">
    </div>
    <input type="hidden" name="name_title" value="วารสารวิชาการ">
    <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
    <input type="hidden" name="link" value="https:www.google.com">
    <input type="hidden" name="abstract" value="หนังสือ Made To Stick คนเขียนมีแนวทางให้เราลอง เป็นหลักการ 6 อย่าง เป็นคุณสมบัติของไอเดียที่จะทำให้มันปัง">

    <input type="hidden" name="type_article_id" value="<?php echo $type_article_id; ?>">
    <input type="hidden" name="article_id" value="<?php echo $_GET['article_id']; ?>">
</div>


<script type="text/javascript">
    $('.a1').change(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";
        var a1 =  $('.a1').val();

        if(a1==""){
            $('.b1').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a1 }, function(data) {
                $('.b1').val(data);
            });
        }

    });
    $('.a2').change(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";
        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id , user_id2: a2, user_id3: a3}, function(data) {
            $('.a1').html(data);
            $('.a1').val(a1);
        });


        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1 ,user_id2: a2}, function(data) {
            $('.a3').html(data);
            $('.a3').val(a3);
        });

        if(a2==""){
            $('.b2').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a2 }, function(data) {
                $('.b2').val(data);
            });
        }

    });

    $('.a3').change(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";
        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id , user_id2: a2 , user_id3: a3}, function(data) {
            $('.a1').html(data);
            $('.a1').val(a1);
        });

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id , user_id1: a1 , user_id3: a3}, function(data) {
            $('.a2').html(data);
            $('.a2').val(a2);
        });

        if(a3==""){
            $('.b3').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a3 }, function(data) {
                $('.b3').val(data);
            });
        }

    });
</script>


<!-- <script type="text/javascript">
    $('.a1').focusin(function(){
        var type_article_id = "<?php // echo $_REQUEST["type_article_id"]; ?>";
        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id2: a2,user_id3: a3 }, function(data) {
            $('.a1').html(data);
        });

        return true;
    });

    $('.a1').focusout(function(){
        var a1 =  $(this).val();

        if(a1==""){
            $('.b1').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a1 }, function(data) {
                $('.b1').val(data);
            });
        }
    });

    $('.a1').change(function(event) {
        var a1 =  $(this).val();

        if(a1==""){
            $('.b1').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a1 }, function(data) {
                $('.b1').val(data);
            });
        }
        
    });

    $('.a2').focusin(function(){
        var type_article_id = "<?php // echo $_REQUEST["type_article_id"]; ?>";

        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1,user_id3: a3 }, function(data) {
            $('.a2').html(data);  
        });

        return true;
    });

    $('.a2').focusout(function(){
        var a2 =  $(this).val();

        if(a2==""){
            $('.b2').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a2 }, function(data) {
                $('.b2').val(data);
            });
        }
    });

    $('.a2').change(function(event) {
        var a2 =  $(this).val();

        if(a2==""){
            $('.b2').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a2 }, function(data) {
                $('.b2').val(data);
            });
        }
        
    });

    $('.a3').focusin(function(){
        var type_article_id = "<?php // echo $_REQUEST["type_article_id"]; ?>";
        
        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();
        
        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1,user_id2: a2 }, function(data) {
            $('.a3').html(data); 
        });
        return true;
    });

    $('.a3').focusout(function(){
        var a3 =  $(this).val();

        if(a3==""){
            $('.b3').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a3 }, function(data) {
                $('.b3').val(data);
            });
        }
    });


    $('.a3').change(function(event) {
        var a3 =  $(this).val();

        if(a3==""){
            $('.b3').val('');
        }else{
            $.get('allarticle/sc_email.php',{ user_id: a3 }, function(data) {
                $('.b3').val(data);
            });
        }

        
    });
</script> -->
