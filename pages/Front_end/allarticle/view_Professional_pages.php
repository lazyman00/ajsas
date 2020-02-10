<?php  include('../../../connect/connect.php'); ?>
<?php 
$sql = sprintf("SELECT pre.pre_th, user.name_th, user.surname_th, user.email, tb_sendmail.sta_sendMail  FROM `tb_sendmail` left join user on tb_sendmail.user_id = user.user_id left join pre on user.pre_id = pre.pre_id WHERE `tb_sendmail`.`article_id` = %s ORDER BY `tb_sendmail`.`sta_sendMail` ASC",GetSQLValueString($_GET['article_id'],'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$n = $query->num_rows;


$sql_1 = sprintf("SELECT attach_article_checked FROM `article` WHERE `article_id` = %s",GetSQLValueString($_GET['article_id'],'text'));
$query_1 = $conn->query($sql_1);
$row_1 = $query_1->fetch_assoc();
?>
<div class="card-body">
    <p style="background-color: #0062c4; color: #ffffff; height: 30px; padding-top: 3px;"><span style="padding: 7px;">ข้อมูลผู้ทรงคุณวุฒิ : </span></p>
    <div class="row" style="padding-top: 15px;padding-bottom: 10px;margin-right: 0px;">
        <div class="col">
            <span id="a" style="display: none;">
                <button style="float: right;" type="button" id="add_Professional" data-type_article_id="<?php echo $_GET['type_article_id']; ?>" data-article_id="<?php echo $_GET['article_id']; ?>" class="btn btn-primary">เพิ่มผู้ทรงคุณวุฒิ</button>
            </span>
            <span id="b" style="display: none;">
                <button  data-toggle="tooltip" data-placement="top" title="*กรุณาไฟล์บทความที่ตรวจแล้วจึงจะเชิญผู้ทรงได้ (ขั้นตอนที่ 1.)" style="float: right;" type="button" class="btn btn-primary">เพิ่มผู้ทรงคุณวุฒิ</button>
            </span>



        </div>
    </div>

    <input type="hidden" name="attach_article_checked" value="<?php echo $row_1['attach_article_checked']; ?>">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col"><center>#</center></th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">อีเมล์</th>
                <th scope="col"><center>สถานะ</center></th>
            </tr>
        </thead>
        <tbody>
            <?php $id=1; if($n>0){ do{ ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $row['pre_th']; ?> <?php echo $row['name_th']; ?> <?php echo $row['surname_th']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td align="center">
                        <?php if($row['sta_sendMail']==0){ ?> 
                            <button type="button" class="btn btn-warning">รอการตอบกลับ</button> 
                        <?php }else if($row['sta_sendMail']==1){ ?> 
                            <button type="button" class="btn btn-success">รับเป็นผู้ทรงคุณวุฒิ</button> 
                        <?php }else{ ?> 
                            <button type="button" class="btn btn-dark">หมดเวลา</button> 
                        <?php } ?>
                    </td>
                </tr>
                <?php $id++; }while($row = $query->fetch_assoc()); } ?>
            </tbody>
        </table>
    </div>


    <script type="text/javascript">
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
      })

        var ck =$('[name=attach_article_checked]').val();
        if(ck!=""){
            $('#a').css('display', '');
            $('#b').css('display', 'none');
        }else{
         $('#a').css('display', 'none');
         $('#b').css('display', '');
     }

     $('#add_Professional').click(function(event) {
        var type_article_id = $(this).attr('data-type_article_id');
        var article_id = $(this).attr('data-article_id');

        $('#modal_Professional').modal({
            show : true,
            backdrop : 'static' 
        });
        $('#modal_Professional').css('padding-left', '0px');
        $('.modal-backdrop').eq(1).css("z-index", "1059");
        $.get('allarticle/view_Professional.php',{ type_article_id: type_article_id, article_id : article_id }, function(data) {
            $('#view_Professional').html(data);
        });


    });
</script>