<?php  include('../../../connect/connect.php'); ?>
<?php 
$_SESSION['arr'] = array();

$type_article_id = "";
if(isset($_REQUEST["type_article_id"]) && $_REQUEST["type_article_id"] !=""){
 $type_article_id = $_REQUEST["type_article_id"];
}
$arr_all = array();
$sql = "SELECT user.user_id, user.pre_id, user.name_th, user.surname_th FROM `user`";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
 array_push($arr_all,$row);
}
?>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="date_article">ผู้ทรงคุณวุฒิ คนที่ 1 :</label>
        <select class="form-control a1">
            <option value="">กรุณาเลือก</option>
            <span class="a1"></span>
            <?php for($i=0; $i<count($arr_all); $i++){ ?>
                <option value="<?php echo $arr_all[$i]['user_id']; ?>"><?php echo $arr_all[$i]['pre_id']; ?> <?php echo $arr_all[$i]['name_th']; ?> <?php echo $arr_all[$i]['surname_th']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-4">
        <label for="date_article">ผู้ทรงคุณวุฒิ คนที่ 2 :</label>

        <select class="form-control a2">
            <option value="">กรุณาเลือก</option>
            <?php  for($i=0; $i<count($arr_all); $i++){ ?>
                <option value="<?php echo $arr_all[$i]['user_id']; ?>"><?php echo $arr_all[$i]['pre_id']; ?> <?php echo $arr_all[$i]['name_th']; ?> <?php echo $arr_all[$i]['surname_th']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="date_article">ผู้ทรงคุณวุฒิ คนที่ 3 :</label>
        <select class="form-control a3">
            <option value="">กรุณาเลือก</option>
            <?php for($i=0; $i<count($arr_all); $i++){ ?>
                <option value="<?php echo $arr_all[$i]['user_id']; ?>"><?php echo $arr_all[$i]['pre_id']; ?> <?php echo $arr_all[$i]['name_th']; ?> <?php echo $arr_all[$i]['surname_th']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<span class="a4"></span>
<script type="text/javascript">
    $('.a1').focusin(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";

        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();

        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1,user_id2: a2,user_id3: a3 }, function(data) {
            $('.a1').html(data);
        });

        return true;
    });
    $('.a2').focusin(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";

        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();
    
        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1,user_id2: a2,user_id3: a3 }, function(data) {
            $('.a2').html(data);  
        });

        return true;
    });
    $('.a3').focusin(function(){
        var type_article_id = "<?php echo $_REQUEST["type_article_id"]; ?>";
        
        var a1 =  $('.a1').val();
        var a2 =  $('.a2').val();
        var a3 =  $('.a3').val();
        
        $.get('allarticle/view_value.php',{ type_article_id: type_article_id ,user_id1: a1,user_id2: a2,user_id3: a3 }, function(data) {
            $('.a3').html(data); 
        });
        return true;
    });
</script>
