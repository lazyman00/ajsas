<?php 
        include ('connect.php'); 
        mysqli_set_charset($conn,"utf8");

        $article_id=$_GET['article_id'];

        $sql = "SELECT `assessment_id`, `assessment_type` FROM `assessment` WHERE assessment_id in( '1','2','3')";  
        $sql2 = "SELECT * FROM `article` WHERE article_id=$article_id";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $data = mysqli_fetch_assoc($result2);
        $conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="\node_modules\bootstrap\dist\css\bootstrap.min.css"> -->
    <title>send_article</title>
</head>

<body class="bg-light">
       
        <div  class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">วารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
                <a class="p-2 text-dark" href="#">บรรณาธิการ</a>
                <a class="p-2 text-dark" href="#">การส่ง</a>
                <a class="p-2 text-dark" href="#">ประกาศ</a>
                <a class="p-2 text-dark" href="#">ติดต่อ</a>
            </nav>
            <a class="btn btn-outline-primary" href="#">เข้าสู่ระบบ</a>
        </div>
       
<div class="container">
<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm"></div>


        <div class="card" >
            <div class="card-body">
                    <label>หลังจากที่ผู้ทรงอ่านบทความแล้วว ---> ประเมินบทความ</label>
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">ประเมินบทความ</li>
                            </ol>
                          </nav>
                <form class="form-signin role="form" action="insert_assessment.php" method="post" enctype="multipart/form-data">
                    <div class="row" style="height: 38px;">
                        <div class="col-md-4 mb-3" style="text-align:right">
                            <label for="name">ชื่อบทความ<span style="color: red">*</span></label>                                                
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text"  class="form-control form-control-sm" value="<?php echo $data['article_name_th']; ?>" readonly>
                        </div>                                         
                    </div>
                       
                    <div class="row" style="height: 46px;">
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
                            <label for="name">Comment<span style="color: red">*</span></label>                                                
                        </div>
                        <div class="col-md-4 mb-3" >
                            <textarea class="form-control" name="comment_type"></textarea>
                        </div>
                    </div><br><br>
                    <div class="row" style="height: 38px;">
                        <div class="col-md-4 mb-3" style="text-align:right">
                            <label for="name">แนบไฟล์ Comment<span style="color: red">*</span></label>                                                
                        </div>
                        <div class="col-md-4 mb-3">
                            <input name="comment_eva" type="file" class="btn btn-outline-success btn-sm" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>                                         
                    </div>
                    <div class="row" style="height: 30px;">
                        <div class="col-md-4 mb-3"></div>
                        <div class="col-md-8 mb-3">
                            <span style="color:red">	หมายเหตุ : ไฟล์บทความควรเป็นชนิด .doc, .docx และชื่อไฟล์ไม่เกิน 30 ตัวอักษร เช่น jst-uru.docx</span>
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

      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>    
    <!-- <script type="text/javascript" src="/ckeditor/ckeditor.js"></script> -->
    <!-- <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('detail_th');
        function CKupdate() {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
        }
    </script>
    <script>
        CKEDITOR.replace('detail_en');
        function CKupdate() {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
        }
    </script> -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>