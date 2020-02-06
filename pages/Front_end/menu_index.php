<?php 
// echo "\$_SERVER[\"REQUEST_URI\"] = ".$_SERVER["REQUEST_URI"]."<br>";
// echo "\$_SERVER[\"SCRIPT_NAME\"] = ".$_SERVER["SCRIPT_NAME"]."<br>";
// echo "\$_SERVER[\"PHP_SELF\"] = ".$_SERVER["PHP_SELF"]."<br>";
//  echo $_SERVER["SCRIPT_NAME"];	
?>
<?php
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM user u 
    left join type_title t on t.type_title_id = u.type_title_id
    left join pre p on p.pre_id = u.pre_id
    where user_id =  $userid ";  
    $query = $conn->query($sql);
	$row_data = $query->fetch_assoc(); 
	   
?>
				<div class="form-row" style="margin-left: 1155px;">  
                        
                    </div>  
                </div>
<nav aria-label="breadcrumb" >
	<p style="text-align: right;padding-right: 24px;">สวัสดี ! <?php echo $row_data['name_th']; ?>  <?php echo $row_data['surname_th']; ?></p>
</nav>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb" style="margin-left: 15px;margin-right: 15px;">
	
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/article_data.php"){ ?>
			<li class="breadcrumb-item"><b>ข้อมูลบทความ</b></li>
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/searching_article.php"){ ?>
			<li class="breadcrumb-item"><a href="/ajsas/pages/Front_end/article_data.php">ข้อมูลบทความ</a></li>
			<li class="breadcrumb-item active" aria-current="page">ค้นหาสารสารวิชาการ</li>
			<!-- <li class="breadcrumb-item active" aria-current="page">วารสาร</li> -->
		<?php } ?>
		<?php if($_SERVER["SCRIPT_NAME"]=="/ajsas/pages/Front_end/send_article.php"){ ?>
			<li class="breadcrumb-item"><a href="/ajsas/pages/Front_end/article_data.php">ข้อมูลบทความ</a></li>
			<li class="breadcrumb-item active" aria-current="page">ส่งบทความ</li>
			<!-- <li class="breadcrumb-item active" aria-current="page">วารสาร</li> -->
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
</nav>