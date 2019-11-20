<?php include '../../connect/connect.php';  ?>
<!DOCTYPE html>
<html lang="en">
<?php  include('head.php'); ?>
<body id="page-top">
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
