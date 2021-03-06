<?php 
        include ('connect.php'); 
        mysqli_set_charset($conn,"utf8");

        $article_id=$_GET['article_id'];

        $sql2 = "SELECT * FROM type_article";
        $sql3 = "SELECT * FROM article WHERE article_id=$article_id";            

        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        $data = mysqli_fetch_assoc($result3);
        $conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>send_article</title>
    <style type="text/css">
        .a{
            font-size: 14px;
        }
    </style>
</head>

<body class="bg-light">
       
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">ส่งบทความ</li>
            </ol>
          </nav>
<div class="container">



                <div class="card" >
                        <h5 class="card-header">บทความ</h5>
                        <div class="card-body">
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลเกี่ยวกับบทความ</h7></li>
                                        </ol>
                                      </nav>
                          <!-- <h5 class="card-title">ข้อมูลเกี่ยวกับบทความ</h5> -->
                          
                          <form role="form" action="sqlupdate_article.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                    <!-- <form class="needs-validation" novalidate> -->
                                        <div class="row" style="height: 46px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name" class="a" >สาขา<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <!-- <input type="text" class="form-control form-control-sm"> -->
                                                <select  name="type_article_id" class="form-control" required>
                                                    <option value="">กรุณาเลือก</option>
                                                    <?php  while($row2 = $result2->fetch_assoc())  { ?>
                                                    <option <?php if ($data['type_article_id']==$row2['type_article_id']){ ?> selected<?php } ?> value="<?php echo $row2['type_article_id']; ?>"><?php echo $row2['type_article_name']; ?>  </option>
                                                    <?php } ?>
                                                </select> 
                                            </div>                                         
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">ชื่อบทความ(ภาษาไทย)<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" class="form-control form-control-sm" name="article_name_th" value="<?php echo $data['article_name_th']; ?>" >
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">ชื่อบทความ(ภาษาอังกฤษ)<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" class="form-control form-control-sm" name="article_name_en" value="<?php echo $data['article_name_en']; ?>" >
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">บทคัดย่อ(ภาษาไทย)</label>                                                
                                            </div>
                                            <div class="col-md-6 mb-3" >
                                                <textarea class="form-control" name="abstract_th" ><?php echo $data['abstract_th']; ?></textarea>
                                            </div>
                                        </div><br><br>
                                        <div class="row">
                                            <div class="col-md-4 mb-3"></div>
                                            <div class="col-md-6 mb-3">
                                                <span style="color:#778899">(กรุณาพิมพ์บทคัดย่อลงในช่องข้อมูล)</span>
                                            </div>                                            
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">บทคัดย่อ(ภาษาอังกฤษ)<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-6 mb-3" >
                                                <textarea class="form-control" name="abstract_en"><?php echo $data['abstract_en']; ?></textarea>
                                            </div>
                                        </div><br><br>
                                        <div class="row">
                                            <div class="col-md-4 mb-3"></div>
                                            <div class="col-md-6 mb-3">
                                                <span style="color:#778899">(กรุณาพิมพ์บทคัดย่อลงในช่องข้อมูล)</span>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row" style="height: 33px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">คำสำคัญ(ภาษาไทย)<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-4 mb-3" >
                                                <input type="text" class="form-control form-control-sm" name="keyword_th" value="<?php echo $data['keyword_th']; ?>" >
                                            </div>
                                        </div>
                                        <div class="row" style="height: 30px;">
                                            <div class="col-md-4 mb-3"></div>
                                            <div class="col-md-6 mb-3">
                                                <span style="color:#778899">ตัวอย่างข้อมูล : คำสำคัญ1, คำสำคัญ 2</span>
                                            </div>                                            
                                        </div>
                                        <div class="row" style="height: 33px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">คำสำคัญ(ภาษาอังกฤษ)<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-4 mb-3" >
                                                <input type="text" class="form-control form-control-sm" name="keyword_en" value="<?php echo $data['keyword_en']; ?>" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3"></div>
                                            <div class="col-md-6 mb-3">
                                                <span style="color:#778899">Example : keyword1, keyword2</span>
                                            </div>                                            
                                        </div>
                                        <hr class="mb-4">
                                    <!-- </form> -->
                                </div>
                            </div> 

                            
                            <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลผู้แต่งบทความร่วม</h7></li>
                                    </ol>
                                  </nav>
                            <!-- <h5 class="card-title">ข้อมูลผู้แต่งบทความร่วม</h5> -->
                          <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                    <!-- <form class="needs-validation" novalidate> -->
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3">                                               
                                            </div>
                                            <div class="col-md-6 custom-control custom-radio mb-3">
                                                <input id="credit" type="radio" class="custom-control-input" checked required>
                                                <label class="custom-control-label">ไม่มีผู้แต่งบทความร่วม</label>
                                            </div>                                         
                                        </div>
                                        <div class="row " style="height: 38px;">
                                            <div class="col-md-4 mb-3">                                               
                                            </div>
                                            <div class="col-md-6 custom-control custom-radio mb-3">
                                                <input id="debit" type="radio" class="custom-control-input" required>
                                                <label class="custom-control-label">มีผู้แต่งบทความร่วม</label>
                                            </div>                                         
                                        </div>
                                        <hr class="mb-4">
                                    <!-- </form> -->
                                </div>
                            </div>

                            <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลไฟล์บทความต้นฉบับ</h7></li>
                                    </ol>
                                  </nav>
                            <!-- <h5 class="card-title">ข้อมูลไฟล์บทความต้นฉบับ</h5> -->
                          <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                    <!-- <form class="needs-validation" novalidate> -->
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">ไฟล์บทความ<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <input name="attach_article" type="file" class="btn btn-outline-success btn-sm" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                            </div>                                         
                                        </div>
                                        <div class="row" style="height: 30px;">
                                            <div class="col-md-4 mb-3"></div>
                                            <div class="col-md-8 mb-3">
                                                <span style="color:red">	หมายเหตุ : ไฟล์บทความควรเป็นชนิด .docx, .tex , .pdf และชื่อไฟล์ไม่เกิน 30 ตัวอักษร เช่น jst-uru.docx</span>
                                            </div>                 	                           
                                        </div>
                                        <hr class="mb-4">
                                    <!-- </form> -->
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-9 mb-3"></div>
                                            <div class="col-md-3 mb-3">
                                            <input type="hidden" name="article_id" value="<?php echo $data['article_id']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">ส่งบทความ</button>
                                                <button type="button" class="btn btn-danger btn-sm">ยกเลิก</button>
                                            </div>                                          
                                        </div>  
                                </div>
                            </div>   
                            </form>                         
                        </div>
                      </div>
</div> 

      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>    
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</body>
</html>