<?php
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM user u 
    left join type_title t on t.type_title_id = u.type_title_id
    left join pre p on p.pre_id = u.pre_id
    where user_id =  $userid ";  
    $query = $conn->query($sql);
    $row_data = $query->fetch_assoc();    
?>
<style>
       .modal-header {
        background-color: #e9ecef;
        color: #585f65;
    }
    .modal-footer{
        display: block;
        text-align: -webkit-center;
    }
    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef00;
        opacity: 1;
        color: #495057;
        background-color: #fff;
        border-color: #bccbda;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0); 
        cursor: default;
    }
</style>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 111px;">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../../img/banner3-01.png"></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <?php if($_SESSION['type_user_id']==1){ // admin ?>
            <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
        <?php }else if($_SESSION['type_user_id']==2){ //บรรณาธิการ ?>
            <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
            <a class="p-2 text-dark" href="#">บรรณาธิการ</a>
            <a class="p-2 text-dark" href="#">การส่ง</a>
            <a class="p-2 text-dark" href="#">ประกาศ</a>
            <a class="p-2 text-dark" href="#">ติดต่อ</a>
        <?php }else if($_SESSION['type_user_id']==3){ //ผู้ทรง ?>
            <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
            <a class="p-2 text-dark" href="#">การส่ง</a>
            <a class="p-2 text-dark" href="#">ติดต่อ</a>
            
        <?php }else if($_SESSION['type_user_id']==4){ //สมาชิก ?>
            <a class="p-2 text-dark" href="searching_article.php">ค้นหาวารสารวิชาการ</a>
            <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
            <a class="p-2 text-dark" href="#">การส่ง</a>
            <a class="p-2 text-dark" href="#">ติดต่อ</a>
        <?php } ?>     
    </nav>
    <li class="nav-item dropdown my-lg-0" style="padding-bottom: 22px;list-style-type: none;top: 10px;">
        <a class="btn btn-outline-warning nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          Logout
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="position: absolute;will-change: transform;margin-top: 5px;top: 0px;left: 0px;transform: translate3d(-270px, 65px, 0px);height: 197.979166px;">
          <div class="navbar-login">
            <div class="row" style="width: 400px;">            
                <div class="col-md-4">
                    <p class="text-center">
                        <span class="glyphicon glyphicon-user icon-size"></span>
                    </p>
                </div>
                <div class="col-lg-8">
                    <p class="text-left" style="padding-right:  5px; padding-left: 5px;"><b><?php echo $row_data["name_th"]  ?> <?php echo $row_data["surname_th"]  ?></b></p>
                    <p class="text-left small" style="padding-right:  5px; padding-left: 5px;"><?php echo $row_data["email"]  ?></p>
                    <p class="text-left" style="padding-right:  5px; padding-left: 5px;">
                        <a href="#" class="btn btn-outline-primary btn-sm btnUp" style=" width: 207.979166px;"  data-row='<?php  echo json_encode($row_data); ?>'>แก้ไขข้อมูลส่วนตัว</a>
                    </p>                                      
                </div>           
            </div>
            <hr class="mb-4" style="border-bottom-width: 0px; margin-top: 0px; margin-bottom: 0px;">
            <div class="row" style="width: 400px;">            
                <div class="col-md-12">
                    <p class="text-left" >
                        <a href="unset.php" class="btn btn-outline-danger btn-sm" style="margin-left: 26px;width: 317.979166px;">ออกจากระบบ</a>
                    </p>
                </div>         
            </div>
            
        </div>
    </div>
</li>
    
</div>              

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="sql_editUser.php" method="post">

        <div class="form-row">        
            <div class="form-group col-md-2">
                <label for="inputEmail4"><b>คำนำหน้า</b></label>
                <?php
                    $sql_d = "SELECT type_title_id, type_title_name FROM type_title ";  
                    $query_title = $conn->query($sql_d);   
                ?>
                <select  name="type_title_id" class="form-control" required>
                    <option value="">กรุณาเลือก</option>
                    <?php  while($row_query_title = $query_title->fetch_assoc()) { ?>
                    <option <?php if ($row_data['type_title_id']==$row_query_title['type_title_id']){ ?> selected<?php } ?> value="<?php echo $row_query_title['type_title_id']; ?>"><?php echo $row_query_title['type_title_name']; ?>  </option>
                    <?php  }?>
                </select> 
            </div>
            <div class="form-group col-md-5">
                <label for="inputEmail4"><b>คำนำหน้าทางวิชาการภาษาไทย</b></label>
                <?php
                    $sql_pre = "SELECT * FROM pre ";  
                    $query_pre = $conn->query($sql_pre);  
                ?>
                    <select  name="pre_id" class="form-control" required>
                        <option value="">กรุณาเลือก</option>
                        <?php  while($row_query_pre = $query_pre->fetch_assoc()) { ?>
                        <option <?php if ($row_data['pre_id']==$row_query_pre['pre_id']){ ?> selected<?php } ?> value="<?php echo $row_query_pre['pre_id']; ?>"><?php echo $row_query_pre['pre_th']; ?>  </option>
                        <?php  }?>
                    </select> 
            </div>
            <div class="form-group col-md-5">
                <label for="inputEmail4"><b>คำนำหน้าทางวิชาการภาษาอังฤษ</b></label>
                <input type="text" class="form-control form-control-sm" id="pre_en" readonly="">
            </div>
        </div>

        <div class="form-row">    
            <div class="form-group col-md-5">
                <label for="inputEmail4"><b>คำนำหน้าทางวิชาการภาษาไทย(ย่อ)</b></label>
                <input type="text" class="form-control form-control-sm" id="pre_th_short" readonly="">
            </div>
            <div class="form-group col-md-5">
                <label for="inputEmail4"><b>คำนำหน้าทางวิชาการภาษาอังกฤษ(ย่อ)</b></label>
                <input type="text" class="form-control form-control-sm" id="pre_en_short" readonly="">
            </div>
        </div>

        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputEmail4"><b>ชื่อภาษาไทย</b></label>
                <input type="text" class="form-control form-control-sm" id="name_th" name="name_th">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"><b>นามสกุลภาษาไทย</b></label>
                <input type="text" class="form-control form-control-sm" id="surname_th" name ="surname_th">
            </div>
        </div>

        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputEmail4"><b>ชื่อภาษาอังกฤษ</b></label>
                <input type="text" class="form-control form-control-sm" id="name_en" name ="name_en">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4"><b>นามสกุลภาษาอังกฤษ</b></label>
                <input type="text" class="form-control form-control-sm" id="surname_en" name="surname_en">
            </div>
        </div>

        <div class="form-row">    
            <div class="form-group col-md-4">
                <label for="inputEmail4"><b>เบอร์โทรศัพท์</b></label>
                <input type="text" class="form-control form-control-sm" id="phonenumber_user" name="phonenumber_user">
            </div>
            <div class="form-group col-md-8">
                <label for="inputEmail4"><b>ที่อยู่</b></label>
                <textarea class="form-control" name="address_user" id="address_user" style="height: 110px;"></textarea>
            </div>            
        </div>  

        <div class="modal-footer">
            <input type="hidden" name="user_id" value="<?php echo $row_data['user_id']; ?>">
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>        
        </div>
        </form>
      </div>      
    </div>
  </div>
</div>
