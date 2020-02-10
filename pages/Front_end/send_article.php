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

<body>
	<?php include('menu.php'); ?>
    <?php include('menu_index.php'); ?>
    <?php 
    $sql = "SELECT * FROM `type_article`";  
    $query = $conn->query($sql);
    $conn->close();
    ?>
    <div class="container">

      <div class="card" >
        <h5 class="card-header">บทความ</h5>
        <div class="card-body">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลเกี่ยวกับบทความ</h7></li>
              </ol>
          </nav>

          <form role="form" action="insert_article.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 order-md-1" style="align-items: center">
                    <div class="row" style="height: 46px;">
                        <div class="col-md-4 mb-3" style="text-align:right">
                            <label for="name" class="a" >ปี<span style="color: red">*</span></label>                                                
                        </div>
                        <div class="col-md-2 mb-3">
                            <select name="year" class="form-control" style="width: 100px;" required>
<<<<<<< HEAD
                             <option value="">ปี</option>
                             <?php 
                             $y = date('Y')+543;
                             $u = date('Y')+553;
                             for($i=$y; $i<$u; $i++){ ?> 
                                 <option <?php if($i==$y){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
=======
<<<<<<< HEAD
                             <option value="date">ปี</option>
                             <?php 
                             $y = date('Y')+543;
                             $u = date('Y')+533;
                             for($i=$y; $i>$u; $i--){ ?> 
                                 <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
>>>>>>> 6d27220197682554a40bdec5c3c64dff42401f7c
                             <?php } ?>
                         </select>                                                                                    
                     </div> 

                     <div class="col-md-1 mb-3" style="text-align:right">
<<<<<<< HEAD
=======
=======
                               <option value="">ปี</option>
                               <?php 
                               $y = date('Y')+543;
                               $u = date('Y')+553;
                               for($i=$y; $i<$u; $i++){ ?> 
                                   <option <?php if($i==$y){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                               <?php } ?>
                           </select>                                                                                    
                       </div> 

                       <div class="col-md-1 mb-3" style="text-align:right">
>>>>>>> 4b7770e5d8335dcb59b135ee11bf3d2ad0095eef
>>>>>>> 6d27220197682554a40bdec5c3c64dff42401f7c
                        <label for="name" class="a" >ฉบับที่<span style="color: red">*</span></label>                                                
                    </div>
                    <div class="col-md-2 mb-3">
                       <?php 
                       $m = number_format(date('m'));
                       if($m<=6){ $mm=1; }else{ $mm=2; } 
                       ?>
                       <select name="time" class="form-control" style="width: 100px;" required>
                        <?php for($i=1; $i<=2; $i++){ ?>

                            <option <?php if($mm==$i){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>                                                                                    
                </div>                                      
            </div>
            <div class="row" style="height: 46px;">
                <div class="col-md-4 mb-3" style="text-align:right">
                    <label for="name" class="a" >สาขา<span style="color: red">*</span></label>                                                
                </div>
                <div class="col-md-3 mb-3">
                    <select  name="type_article_id" class="form-control" required>
                        <option value="">กรุณาเลือก</option>
                        <?php  while($row = $query->fetch_assoc())  { ?>
                            <option  value="<?php echo $row['type_article_id']; ?>"><?php echo $row['type_article_name']; ?>   </option>
                        <?php } ?>
                    </select>                                          
                </div>                                         
            </div>
            <div class="row" style="height: 38px;">
                <div class="col-md-4 mb-3" style="text-align:right">
                    <label for="name">ชื่อบทความ(ภาษาไทย)<span style="color: red">*</span></label>                                                
                </div>
                <div class="col-md-6 mb-3" >
                    <input type="text" class="form-control form-control-sm" name="article_name_th">
                </div>
            </div>
            <div class="row" style="height: 38px;">
                <div class="col-md-4 mb-3" style="text-align:right">
                    <label for="name">ชื่อบทความ(ภาษาอังกฤษ)<span style="color: red">*</span></label>                                                
                </div>
                <div class="col-md-6 mb-3" >
                    <input type="text" class="form-control form-control-sm" name="article_name_en">
                </div>
            </div>
            <div class="row" style="height: 38px;">
                <div class="col-md-4 mb-3" style="text-align:right">
                    <label for="name">บทคัดย่อ(ภาษาไทย)</label>                                                
                </div>
                <div class="col-md-6 mb-3" >
                    <textarea class="form-control" name="abstract_th"></textarea>
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
                    <textarea class="form-control" name="abstract_en"></textarea>
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
                    <input type="text" class="form-control form-control-sm" name="keyword_th">
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
                    <input type="text" class="form-control form-control-sm" name="keyword_en">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-6 mb-3">
                    <span style="color:#778899">Example : keyword1, keyword2</span>
                </div>                                            
            </div>
            <hr class="mb-4">
        </div>
    </div> 


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลผู้แต่งบทความร่วม</h7></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 order-md-1" style="align-items: center">
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
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลไฟล์บทความต้นฉบับ</h7></li>
        </ol>
    </nav>

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


            </div>
        </div>

        <div class="row">
            <div class="col-md-12 order-md-1" style="align-items: center">
                <div class="row" style="height: 38px;">
                    <div class="col-md-9 mb-3"></div>
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">ส่งบทความ</button>
                        <button type="button" class="btn btn-danger btn-sm">ยกเลิก</button>
                    </div>                                          
                </div>  
            </div>
        </div>  
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> 
    </form>                         
</div>
</div>

</div> <br>
<footer class="page-footer font-small blue" style="clear: both;">
    <div class="footer-copyright text-center py-3" style="background-color:#008000;  height: 100px;">
        <p style="color:#ffffff;margin-bottom: 0px;font-size: 14px;">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ โทรศัพท์ 0-5541-1096 ต่อ 1300</p>
        <p style="color:#ffffff;font-size: 14px;">Academic Journal Of Science And Applied Science. All Rights Reserved.</p>
    </div>
</footer>
<?php include('js.php'); ?>	
</body>
</html>