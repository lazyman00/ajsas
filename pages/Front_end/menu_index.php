<?php 
// echo "\$_SERVER[\"REQUEST_URI\"] = ".$_SERVER["REQUEST_URI"]."<br>";
// echo "\$_SERVER[\"SCRIPT_NAME\"] = ".$_SERVER["SCRIPT_NAME"]."<br>";
// echo "\$_SERVER[\"PHP_SELF\"] = ".$_SERVER["PHP_SELF"]."<br>";
//  echo $_SERVER["SCRIPT_NAME"];	
?>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb" style="margin-left: 15px;margin-right: 15px;">
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/article_data.php"){ ?>
			<li class="breadcrumb-item"><b>ข้อมูลบทความ</b></li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/send_article.php"){ ?>
			<li class="breadcrumb-item"><a href="/ajsas/pages/Front_end/article_data.php">ข้อมูลบทความ</a></li>
			<li class="breadcrumb-item active" aria-current="page">ส่งบทความ</li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/update_article.php"){ ?>
			<li class="breadcrumb-item"><a href="/ajsas/pages/Front_end/article_data.php">ข้อมูลบทความ</a></li>
			<li class="breadcrumb-item active" aria-current="page">แก้ไขบทความ</li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/assessment.php"){ ?>
			<li class="breadcrumb-item"><a href="/ajsas/pages/Front_end/readarticle.php">รายการบทความวิชาการ</a></li>
			<li class="breadcrumb-item active" aria-current="page">ประเมินบทความ</li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/readarticle.php"){ ?>
			<li class="breadcrumb-item"><b>รายการบทความวิชาการ</b></li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/allarticle.php"){ ?>
			<li class="breadcrumb-item"><b>บทความ</b></li>
		<?php } ?>
		<!-- <li class="breadcrumb-item"><a href="#">ข้อมูลบทความ</a></li> -->
		<!-- <li class="breadcrumb-item active" aria-current="page">ส่งบทความ</li> -->
	</ol>
	

	<?php if($_SERVER["SCRIPT_NAME"]=="/villagefund/pages/homeImportData.php"){ ?>
		<li>นำเข้าข้อมูล</li>
	<?php } ?>

	<?php if($_SERVER["SCRIPT_NAME"]=="/villagefund/pages/homeManageUser.php"){ ?>
		<li>จัดการข้อมูลผู้ใช้</li>
	<?php } ?>

	
	<?php if($_SERVER["SCRIPT_NAME"]=="/villagefund/pages/financial_institution.php"){ ?>
		<li>โครงการพัฒนาเมือง</li>
	<?php } ?>
	<?php if($_SERVER["SCRIPT_NAME"]=="/villagefund/pages/financial_institutionView.php"){ ?>
		<li><a href="/villagefund/pages/financial_institution.php">โครงการพัฒนาเมือง</a></li>
		<li>รายละเอียดโครงการพัฒนาเมือง</li>
	<?php } ?>
</nav>