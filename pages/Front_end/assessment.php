<?php  include('../../connect/connect.php'); ?>


<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style type="text/css">
    .a{
        font-size: 14px;
    }
    .bg-white{
        background-color:rgb(21, 144, 124)!important;
    }
    .border-bottom{
        border-bottom:1px solid #e4ff00!important;
    }
    .text-dark{
        color:#ffffff!important;
    }
</style>
<body class="bg-light">
    <?php include('menu.php'); ?>
    <?php include('menu_index.php'); ?>
    <?php 
        $sql = "SELECT `assessment_id`, `assessment_type` FROM `assessment` WHERE assessment_id in( '1','2','3')";  
        $result = $conn->query($sql);

        $cl1 = "";
        if(isset($_REQUEST['article_id']) && $_REQUEST['article_id']!= ""){
            $cl1 = $_REQUEST['article_id'];
        }
        $sql2 = sprintf("SELECT * FROM `article` WHERE article_id = %s",GetSQLValueString($cl1, 'text'));
        $result2 = $conn->query($sql2);
        $data = mysqli_fetch_assoc($result2);
        $conn->close(); 
?>
    <div class="container">
        <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">ประเมินบทความ</li>
                  </ol>
              </nav>
              <form class="form-signin role="form" action="insert_assessment.php" method="post" enctype="multipart/form-data">
                <div class="row" style="height: 38px;">
                    <div class="col-md-4 mb-3" style="text-align:right">
                        <label for="name">ชื่อบทความ</label>                                                
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text"  class="form-control form-control-sm" value="<?php echo $data['article_name_th']; ?>" readonly>
                    </div>                                         
                </div>

                <div class="row" style="height: 38px;">
                    <div class="col-md-4 mb-3" style="text-align:right">
                        <label for="name">บทคัดย่อ</label>                                                
                    </div>
                    <div class="col-md-6 mb-3" >
                        <textarea rows="8" cols="50" class="form-control" name="comment_type" readonly><?php echo $data['abstract_th']; ?></textarea>
                    </div>
                </div><br><br>

                <div class="row" style="height: 46px;margin-top: 125px;">
                    <div class="col-md-4 mb-3" style="text-align:right">
                        <label for="name">คะแนนการประเมิน<span style="color: red">*</span></label>                                                
                    </div>
                    <div class="col-md-4 mb-3">
                        <select  name="assessment_id" class="form-control" required>
                            <option value="">กรุณาเลือก</option>
                            <?php  while($row = $result->fetch_assoc())  { ?>
                                <option  value="<?php echo $row['assessment_id']; ?>"><?php echo $row['assessment_type']; ?>   </option>
                            <?php } ?>
                        </select>
                    </div>                                         
                </div>

                <div class="row" style="height: 38px;">
                    <div class="col-md-4 mb-3" style="text-align:right">
                        <label for="name">Comment</label>                                                
                    </div>
                    <div class="col-md-4 mb-3" >
                        <textarea class="form-control" name="comment_type"></textarea>
                    </div>
                </div><br><br>
                <div class="row" style="height: 38px;">
                    <div class="col-md-4 mb-3" style="text-align:right">
                        <label for="name">แนบไฟล์ Comment</label>                                                
                    </div>
                    <div class="col-md-4 mb-3">
                        <input name="comment_eva" type="file" class="btn btn-outline-success btn-sm" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    </div>                                         
                </div>
                <div class="row" style="height: 30px;">
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-8 mb-3">
                        <span style="color:red">หมายเหตุ : ไฟล์บทความควรเป็นชนิด .doc, .docx และชื่อไฟล์ไม่เกิน 30 ตัวอักษร เช่น jst-uru.docx</span>
                    </div>                                            
                </div><br>
                <div class="row">
                    <div class="col-md-12 order-md-1" style="align-items: center">
                        <div class="row" style="height: 38px;">
                            <div class="col-md-9 mb-3"></div>
                            <div class="col-md-3 mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">ส่งแบบประเมิน</button>
                                <button type="button" class="btn btn-danger btn-sm">ยกเลิก</button>
                            </div>                                          
                        </div>    
                    </div>
                </div>  
                <input type="hidden" name="article_id" value="<?php echo $article_id; ?>"  >
            </form>

        </div>
    </div>
</div> 



<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>