<?php include '../../connect/connect.php';  ?>
<!DOCTYPE html>
<html lang="en">
<?php  include('head.php'); ?>
<body id="page-top">

<?php
    $userid = $_SESSION['user_id'];
    $sql_user_data = "SELECT * FROM user 
    LEFT JOIN type_user ON user.type_user_id = type_user.type_user_id 
    LEFT JOIN academe ON user.academe_id = academe.academe_id 
    LEFT JOIN pre ON user.pre_id = pre.pre_id 
    LEFT JOIN type_title ON user.type_title_id = type_title.type_title_id 
    where user.user_id =  $userid ";
    
    $result_user_data = $conn->query($sql_user_data);
    $fetch_user_data = $result_user_data->fetch_assoc();
    $nom_row_user_data = $result_user_data->num_rows;
   // $row_data = $query->fetch_assoc();   
?>
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="margin-top: -;top: 0px;height: 96px;" >

 <img src="../../img/banner0-01.png">
 
<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>


 


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>
  <li class="nav-item dropdown no-arrow">    
      
      <a style="float: right;margin-top: 16px;" class="p-2 text-dark" href="../Front_end/allarticle.php">หน้าหลัก</a>
    </a>
  </li>
  <div class="topbar-divider d-none d-sm-block"></div>
  
  <!-- Nav Item - User Information -->
  

  <!-- <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><font size="3"><?php //echo $fetch_user_data["pre_th"]." ".$fetch_user_data["name_th"]." ".$fetch_user_data["surname_th"]." : (บรรณาธิการ) ";  ?></font></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_data_user">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        แก้ไขข้อมูล
      </a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_pass_user">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        รีเซ็ตรหัสผ่าน
      </a>
      <div class="dropdown-divider"></div>
      <a  class="dropdown-item" href="unset.php" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        ออกจากระบบ
      </a>
    </div>
  </li> -->

  <!-- <a class="btn btn-outline-warning nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          ออกจากระบบ
        </a> -->

      <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><font size="3"><?php echo $fetch_user_data["pre_th"]." ".$fetch_user_data["name_th"]." ".$fetch_user_data["surname_th"]." : (บรรณาธิการ) ";  ?></font></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="position: absolute;will-change: transform;margin-top: 5px;top: 0px;left: 0px;transform: translate3d(-270px, 65px, 0px);height: 197.979166px;width: 400px;margin-left:220px;">
          <div class="navbar-login">

            <div class="row" style="width: 400px;">            
                <div class="col-md-4">
                    <p class="text-center">
                        <span><img src="../../img/rr-01.png" style="height: 108px;width: 110px;margin-left: 11px;"></span>
                    </p>
                </div>
                <div class="col-lg-8">
                    <p class="text-left" style="padding-right:  5px; padding-left: 5px;"><b><?php echo $fetch_user_data["pre_th"]." ".$fetch_user_data["name_th"]." ".$fetch_user_data["surname_th"];  ?></b></p>
                    <p class="text-left" style="padding-right:  5px; padding-left: 5px;">
                        <a href="#" class="btn btn-outline-primary btn-sm btnUpProfile" style=" width: 207.979166px;"  data-toggle="modal" data-target="#change_data_user">แก้ไขข้อมูลส่วนตัว</a>
                    </p>   
                    <p class="text-left small" style="padding-right:  5px; padding-left: 5px;"><a href="#" class="btn btn-outline-warning btn-sm btnUpProfile" style=" width: 207.979166px;"  data-toggle="modal" data-target="#change_pass_user">เปลี่ยนรหัสผ่าน</a></p>                                   
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


















</ul>
</nav>
  <div id="wrapper">
    <?php include_once "menu.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once "header.php"; ?>
        <div class="container-fluid">  
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-12">       
                <?php include_once "content.php"; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php // include_once "footer.php"; ?>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div id="wait" style="z-index: 2048;position:absolute;top:30%;left:45%;display:none"> 
		<center>
			<img src='../../img/img_icon/3ball.gif' /><br>
			<font color="#000000"><b>กรุณารอสักครู่..</b></font>
		</center>
	</div>
  
  <script>
    $(document).ready(function(){

      $(document).ajaxStart(function(){
      	$("#wait").css("display", "block");
      });

      $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
      });

    });    

  </script>
</body>
</html>
