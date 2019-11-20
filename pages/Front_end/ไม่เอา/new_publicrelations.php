<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="\node_modules\bootstrap\dist\css\bootstrap.min.css"> -->
    <title>new_publicrelations</title>
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
                    <label>ข่าว</label>
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item active" aria-current="page">ข่าวประชาสัมพันธ์</li>
                            </ol>
                          </nav>
                <form class="form-signin role="form" action="insert_assessment.php" method="post" enctype="multipart/form-data">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style=" width:5%;text-align:center">#</th>
                                <th scope="col" style=" width:60%;text-align:center">กิจกรรม</th>
                                <th scope="col" style=" width:30%;text-align:center">ช่วงระยะเวลา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><input value="ประชาสัมพันธ์" type="text" name="article_id" class="form-control form-control-sm"></td>
                                <td><input type="text" name="article_id" class="form-control form-control-sm"></td>
                            </tr>    
                            <tr>
                                <td>2</td>
                                <td><input value="รับข้อเสนอบทความ" type="text" name="article_id" class="form-control form-control-sm"></td>
                                <td><input type="text" name="article_id" class="form-control form-control-sm"></td>
                            </tr>  
                            <tr>
                                <td>3</td>
                                <td><input value="ส่งผู้ทรงคุณวุฒิตรวจสอบวิชาการ" type="text" name="article_id" class="form-control form-control-sm"></td>
                                <td><input type="text" name="article_id" class="form-control form-control-sm"></td>
                            </tr>  
                            <tr>
                                <td>4</td>
                                <td><input value="ส่งคืนเพื่อปรับแก้ไขตามข้อเสนอแนะ" type="text" name="article_id" class="form-control form-control-sm"></td>
                                <td><input type="text" name="article_id" class="form-control form-control-sm"></td>
                            </tr>  
                            <tr>
                                <td>5</td>
                                <td><input value="ตรวจสอบและพิมพ์วารสาร" type="text" name="article_id" class="form-control form-control-sm"></td>
                                <td><input type="text" name="article_id" class="form-control form-control-sm"></td>
                            </tr>              
                        </tbody>
                    </table>
                       

                    
                    <div class="row">
                            <div class="col-md-12 order-md-1" style="align-items: center">
                                    <div class="row" style="height: 38px;">
                                        <div class="col-md-9 mb-3"></div>
                                        <div class="col-md-3 mb-3">
                                            <button type="submit" class="btn btn-primary btn-sm">บันทึก</button>
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
     <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>