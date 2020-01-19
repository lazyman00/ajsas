<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<style>
       .icon-color {
        color: #112314;
    }.blackiconcolor {color:ffffff;}
</style>

<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  <!-- <a class="icon-color"><i class="fa fa-edit"></i></a> -->
  <i class="fa fa-edit"></i>
    <span>จัดการข้อมูลหลัก</span>
  </a>
<?php 
    if(!empty($_GET['type']))
    {
        if($_GET['type'] == "department"){
          $show_one = "show";
        }
        else if($_GET['type'] == "academy")
        {
          $show_one = "show";
        }
        else if($_GET['type'] == "title_t")
        {
          $show_one = "show";
        }
        else if($_GET['type'] == "title")
        {
          $show_one = "show";
        }
        else if($_GET['type'] == "type_article")
        {
          $show_one = "show";
        }
        else if($_GET['type'] == "expertise")
        {
          $show_one = "show";
        }
        else{
          $show_one = "";
        }
      }
    else
    {
      $show_one = "show";
    }
?>
  <div id="collapseOne" class="collapse <?php echo $show_one; ?>" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
<?php
      $ac_t = "";
      (!empty($_GET['type'])) ? $ac_t = "" : $ac_t = "active";
?>
      <a class="collapse-item <?php echo ($_GET['type'] == "department") ?  "active" :  $ac_t; ?>" href="home_backend.php?type=department">หน่วยงาน</a>
      <a class="collapse-item <?php echo ($_GET['type'] == "academy") ?  "active" :  ""; ?>" href="home_backend.php?type=academy">สถานศึกษา</a>
      <a class="collapse-item <?php echo ($_GET['type'] == "title_t") ?  "active" :  ""; ?>" href="home_backend.php?type=title_t">คำนำหน้า</a>
      <a class="collapse-item <?php echo ($_GET['type'] == "title") ?  "active" :  ""; ?>" href="home_backend.php?type=title">คำนำหน้าทางวิชาการ</a>
      <a class="collapse-item <?php echo ($_GET['type'] == "type_article") ?  "active" :  ""; ?>" href="home_backend.php?type=type_article">ประเภทบทความ</a>
      <!-- <a class="collapse-item <?php echo ($_GET['type'] == "expertise") ?  "active" :  ""; ?>" href="home_backend.php?type=expertise">ความชำนาญ</a> -->
    </div>
  </div>

  <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
  <i class="fa fa-address-book blackiconcolo"></i>
    <span>จัดการข้อมูลผู้ใช้</span>
  </a>
<?php 
    if(!empty($_GET['type']))
    {
        if($_GET['type'] == "manage_user_user")
        {
          $show_Two = "show";
        }
        else
        {
          $show_Two = "";
        }
      }
    else
    {
      $show_Two = "";
    }
?>
  <div id="collapseTwo" class="collapse <?php echo $show_Two; ?>" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item <?php echo ($_GET['type'] == "manage_user_user") ?  "active" :  ""; ?>" href="home_backend.php?type=manage_user_user">ผู้ใช้</a>
    </div>
  </div>

  <!-- <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
    <i class="fa fa-file-archive"></i>
    <span>ส่งเมล</span>
  </a> -->
<?php 
    if(!empty($_GET['type']))
    {
      $show_Three = ($_GET['type'] == "manage_send_email_professional") ? "show" : "";
    }
    else
    {
      $show_Three = "";
    }
?>
  <div id="collapseThree" class="collapse <?php echo $show_Three; ?>" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item <?php echo ($_GET['type'] == "manage_send_email_professional") ?  "active" :  ""; ?>" href="home_backend.php?type=manage_send_email_professional">ส่งเมลเทียบเชิญผู้ทรงฯ</a>
    </div>
  </div>
</li>

</ul>
<!-- End of Sidebar -->