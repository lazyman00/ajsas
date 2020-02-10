<?php  include('../../connect/connect.php'); 
unset($_SESSION['session_addUserArticle']);
?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>
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
        <!-- <h5 class="card-header">บทความ</h5> -->
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
                        <label for="name" class="a" >ฉบับที่<span style="color: red">*</span></label>                                                
                    </div>
                    <div class="col-md-2 mb-3">
                       <?php 
                        $m = number_format(date('m'));
                        if($m<=6){ $mm=1; }else{ $mm=2; } ?>
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
                    <textarea class="form-control" name="abstract_th" style="padding-top: 9px;height: 154px;"></textarea>
                </div>
            </div><br><br><br><br><br>
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
                    <textarea class="form-control" name="abstract_en" style="padding-top: 9px;height: 154px;"></textarea>
                </div>
            </div><br><br><br><br><br>
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

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ข้อมูลไฟล์บทความต้นฉบับ</h7></li>
                </ol>
            </nav>

    <div class="row">
            <div class="col-md-3" align="center">
            </div>
            <div class="col-md-3" align="center">
                <input id="credit2" type="radio" name="credit" style="width: 18px;height: 18px;" checked>  
                <label >ไม่มีผู้แต่งบทความร่วม</label>   
            </div>
            <div class="col-md-3" align="center">
                <input id="credit1" type="radio" name="credit" style="width: 18px;height: 18px;">     
                <label >มีผู้แต่งบทความร่วม</label>
            </div>
            <div class="col-md-3" align="center">
            </div>
        </div>
  

        <div id="show_addUserSend" style="display:none;">
            <hr>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <p id="addUserSend"></p>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12 " align="center">
                    <font> รายชื่อผู้แต่งบทความร่วม </font>&nbsp;<input class="sech" type="text" id="input_addUserSend" name="input_addUserSend" >&nbsp;<button class="btn btn-primary btn-sm" onclick="fun_addUserSend()" type="button">เพิ่ม</button>
                </div>
            </div>
        </div>
        <hr>

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
            </div>
        </div>  
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> 
        <input type="hidden" name="chk_checked" id="chk_checked" value="0"> 
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
<script>
$(document).ready(function() {
    $("#chk_checked").val(0);
});
    $('#credit1').click(function() {
        if($('#credit1').is(':checked')) 
        { 
            $("#show_addUserSend").show();
            $("#chk_checked").val(1);
        }
    });
    $('#credit2').click(function() {
        if($('#credit2').is(':checked')) 
        { 
            $("#show_addUserSend").hide();
            $("#chk_checked").val(0);
        }
    });

    function fun_addUserSend()
    {
        var input_addUserSend = $("#input_addUserSend").val();
        
        if(input_addUserSend !="")
        {
            $.ajax({
                url:"send_articleData.php?action=Add_send_article",
                method:"POST",
                data: {
                    input_addUserSend: input_addUserSend
                },
                success:function(data)
                {
                    response = data.trim(); 
                    $("#input_addUserSend").val("");
                    $("#addUserSend").html(response);
                }	
            });
        }
        else
        {
            Swal.fire(
                '<font color=#facea8>คำเตือน!</font>',
                '<font>กรุณากรอกชื่อผู้แต่งร่วม</font>',
                'warning'
            );
        }
    }
    
    function delete_rowNameActicle(id_del)
    {
        $.ajax({
            url:"send_articleData.php?action=del_send_article",
            method:"POST",
            data: {
                id_del: id_del
            },
            success:function(data)
            {
                response = data.trim(); 
                $("#input_addUserSend").val("");
                $("#addUserSend").html(response);
            }	
        });
    }

</script>
</body>
</html>