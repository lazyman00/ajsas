<?php
    include ('connect.php');  
    mysqli_set_charset($conn,"utf8");
    
    $sql = "SELECT * FROM `article`";
    $result = $conn->query($sql);
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                <div class="card border-light mb-3" style="max-width: 100rem;">
                    <div class="card-body">
                    <div class="row">
                    <div class="col-lg-8"></div>
                        <div class="col-lg-2" style="padding-left: 82px;">
                        <select name="semester" class="form-control" style="width: 100px;" required>
                            <option value="" <?php if(@$_GET['semester']==''){ ?> selected <?php  } ?>>
                                ครั้งที่
                            </option>
                            <option value="1" <?php if(@$_GET['semester']=='1'){ ?> selected <?php  } ?>>
                               1
                            </option>
                            <option value="2" <?php if(@$_GET['semester']=='2'){ ?> selected <?php  } ?>>
                                2
                            </option>
                        </select>
                        </div>
                        
                        <div class="col-lg-1">
                        <select name="semester" class="form-control" style="width: 100px;" required>
                            <option value="" <?php if(@$_GET['semester']==''){ ?> selected <?php  } ?>>
                                ปี
                            </option>
                            <option value="1" <?php if(@$_GET['semester']=='1'){ ?> selected <?php  } ?>>
                               1
                            </option>
                            <option value="2" <?php if(@$_GET['semester']=='2'){ ?> selected <?php  } ?>>
                                2
                            </option>
                        </select>
                            </div>
                        </div>

                    <div class="row">
                        

                        <div class="col-md-9 mb-3">                        
                        <div class="table-responsive">
                            <h4>ข้อมูลบทความ <a href="send_article.php"><button style="padding-left: 8px;margin-left: 529px;" class="btn btn-danger btn-sm">ส่งบทความ</button></a></h4>
                            
                            <table class="table table-striped" >
                            <thead>
                              <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col">ชื่อบทความ</th>
                                <!-- <th scope="col" style="width: 15%">ไฟล์</th> -->
                                <th scope="col" style="width: 30%;text-align:center">วันที่ดำเนินการ</th>
                                <!-- <th scope="col" style="width: 15%"></th> -->
                              </tr>
                            </thead>
                            <tbody>
                            <?php $selectdata=1; while($row = $result->fetch_assoc()){ ?>
                              <tr>
                                <th scope="row" ><?php echo $selectdata; ?></th>
                                <td><?php echo $row["article_name_th"] ?></td>
                                <!-- <td><a href="../files_work/<?php echo $row["attach_article"] ?>">ดาวน์โหลด</a></td> -->
                                <td align="center">                                
                                <?php
                                    $date=date_create($row["date_article"]);
                                    echo date_format($date,"Y/m/d");
                                ?>
                                </td>
                                <!-- <td align="center"><a href="update_article.php?article_id=<?php echo $row['article_id']; ?>"<button class="btn btn-danger btn-sm">แก้ไข</button></a></td> -->
                              </tr>
                              <?php $selectdata++; } ?>
                            </tbody>
                          </table>     
                        </div>

                        </div>
                        <div class="col-md-3 mb-3">
                        <br><br><button class="btn btn-danger btn-sm" stype="align="center">แก้ไขบทความ</button>
                        <br><br><button class="btn btn-danger btn-sm" stype="align="center">ดาวน์โหลดบทความ</button>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-9 mb-3">

                        <div class="table-responsive">
                            <h4>ผลการประเมิน</h4>
                            <div class="col-md-6 mb-3" >
                                <textarea class="form-control" name="abstract_en" style="width: 746px;height: 114px;"></textarea>
                            </div>
                            <div class="col-md-12 md-3">
                            <a>ส่งบทความแก้ไข</a><button class="btn btn-danger btn-sm" stype="align="center">อัพโหลด</button>
                            <a style="border-left-width: -;padding-left: 52px;">วันที่อัพโหลด</a><button class="btn btn-danger btn-sm" stype="align="center">5/5/55</button>
                            <a style="border-left-width: -;padding-left: 72px;">ดาวน์โหลดบทความ</a><button class="btn btn-danger btn-sm" stype="align="center">ดาวน์โหลด</button>
                            </div>
                              
                        </div>

                        </div>
                        <div class="col-md-3 mb-3">
                        <br><br><button class="btn btn-danger btn-sm" stype="align="center">ดาวน์โหลดผลการประเมิน</button>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-9 mb-3">

                        <div class="table-responsive">
                            <h4>สถานะ </h4>
                        </div>

                        </div>
                    </div>

                    </div>
                </div>
                
                                                     
            </div>


            
        </div>
</div> 

      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>    
    <!-- <script type="text/javascript" src="/ckeditor/ckeditor.js"></script> -->
    
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "แสดง _MENU_ รายการ",
            "zeroRecords": "Nothing found - sorry",
            "info": "แสดง _PAGE_ ถึง _PAGES_",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} ); -->
</script>
</body>
</html>