<?php
include('../connect/connect.php');
?>
<?php 
$cl1 = "";
if($_POST['article_id']){
	$cl1 = $_POST['article_id'];
}
$cl2 = "";
if($_POST['user_id']){
	$cl2 = $_POST['user_id'];
}
$cl3 = "0";
if($_POST['accept_status']){
	$cl3 = $_POST['accept_status'];
}



$sql = sprintf("INSERT INTO `read_article`(`article_id`, `user_id`, `accept_status`) VALUES (%s,%s,%s)",
	GetSQLValueString($cl1,'text'),
	GetSQLValueString($cl2,'text'),
	GetSQLValueString($cl3,'text'));
$query = $conn->query($sql);
if(($query)&&($cl3!="0")){
	$cl4 = "";
	if($_POST['type_user_id']){
		$cl4 = $_POST['type_user_id'];
	}
	$cl5 = "";
	if($_POST['add_email']){
		$cl5 = $_POST['add_email'];
	}
	$cl6 = "";
	if($_POST['add_pass']){
		$cl6 = $_POST['add_pass'];
	}
	$cl7 = "";
	if($_POST['academe_id']){
		$cl7 = $_POST['academe_id'];
	}
	$cl8 = "";
	if($_POST['type_title_id']){
		$cl8 = $_POST['type_title_id'];
	}
	$cl9 = "";
	if($_POST['pre_id']){
		$cl9 = $_POST['pre_id'];
	}
	$cl10 = "";
	if($_POST['name_th']){
		$cl10 = $_POST['name_th'];
	}
	$cl11 = "";
	if($_POST['surname_th']){
		$cl11 = $_POST['surname_th'];
	}
	$cl12 = "";
	if($_POST['name_en']){
		$cl12 = $_POST['name_en'];
	}
	$cl13 = "";
	if($_POST['surname_en']){
		$cl13 = $_POST['surname_en'];
	}
	$cl14 = "";
	if($_POST['address_user']){
		$cl14 = $_POST['address_user'];
	}
	$cl15 = "";
	if($_POST['phonenumber_user']){
		$cl15 = $_POST['phonenumber_user'];
	}


	$sql = sprintf("UPDATE `user` SET `type_user_id`=%s,`email`=%s,`password`=%s,`academe_id`=%s,`type_title_id`=%s,`pre_id`=%s,`name_th`=%s,`surname_th`=%s,`name_en`=%s,`surname_en`=%s,`address_user`=%s,`phonenumber_user`=%s WHERE `user_id`=%s",
		GetSQLValueString($cl4,'text'),
		GetSQLValueString($cl5,'text'),
		GetSQLValueString(md5($cl6),'text'),
		GetSQLValueString($cl7,'text'),
		GetSQLValueString($cl8,'text'),
		GetSQLValueString($cl9,'text'),
		GetSQLValueString($cl10,'text'),
		GetSQLValueString($cl11,'text'),
		GetSQLValueString($cl12,'text'),
		GetSQLValueString($cl13,'text'),
		GetSQLValueString($cl14,'text'),
		GetSQLValueString($cl15,'text'),
		GetSQLValueString($cl2,'text'));
	$query = $conn->query($sql);
	
}

if($cl3==0){
	echo "0";
}else{
	echo "1";
}


?>