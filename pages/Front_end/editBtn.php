<?php  include('../../connect/connect.php'); ?>
      <?php 
        $cl1 = "";
        if(isset($_REQUEST['evaluation_id']) && $_REQUEST['evaluation_id']!= ""){
            $cl1 = $_REQUEST['evaluation_id'];
        }

        $sql_mo = sprintf("SELECT * FROM evaluation
        left join article on article.article_id = evaluation.article_id
        left join assessment on assessment.assessment_id = evaluation.assessment_id
        WHERE evaluation.evaluation_id = %s",GetSQLValueString($cl1, 'text'));
        $result_mo = $conn->query($sql_mo);
        $data_mo = mysqli_fetch_assoc($result_mo);
        //$conn->close();         
?>

                <div class="form-row">  
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"><b>ชื่อบทความ</b></label>
                        <p style="text-indent: 1.5em;"><?php echo $data_mo['article_name_th']; ?></p>
                    </div>  
                </div>
                <div class="form-row">  
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"><b>คะแนนการประเมิน</b></label>
                        <p style="text-indent: 1.5em;"><?php echo $data_mo['assessment_type']; ?></p>
                    </div>
                </div>
                <div class="form-row">  
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"><b>ข้อเสนอแนะ</b></label>
                        <p style="text-indent: 1.5em;"><?php echo $data_mo['comment_type']; ?></p>
                    </div>
                </div>
                <div class="form-row">  
                    <div class="form-group col-md-12">
                        <label for="inputEmail4"><b>ไฟล์แนบ : </b></label>
                        <a style="text-indent: 1.5em;" href="../../files_comment/<?php echo $data_mo['comment_eva']; ?>"><?php  echo $data_mo['comment_eva']; ?></a>
                    </div>
                </div>