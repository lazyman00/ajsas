<?php  include('../../../connect/connect.php'); ?>
<?php 
$sql = sprintf("SELECT pre.pre_th, user.name_th, user.surname_th, user.email, tb_sendmail.sta_sendMail  FROM `tb_sendmail` left join user on tb_sendmail.user_id = user.user_id left join pre on user.pre_id = pre.pre_id WHERE `tb_sendmail`.`article_id` = %s ORDER BY `tb_sendmail`.`sta_sendMail` ASC",GetSQLValueString($_GET['article_id'],'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$n = $query->num_rows;
?>
<div class="card-body">
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
                            รอการตอบกลับ
                        <?php }else if($row['sta_sendMail']==1){ ?> 
                            รับเป็นผู้ทรงคุณวุฒิ
                        <?php }else{ ?> 
                            หมดเวลา
                        <?php } ?>
                    </td>
                </tr>
                <?php $id++; }while($row = $query->fetch_assoc()); } ?>
            </tbody>
        </table>
    </div>


    <script type="text/javascript">
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