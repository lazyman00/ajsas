<?php  include('../../../connect/connect.php'); ?>
<?php
$cl1 = 0; 
if(isset($_GET['user_id']) && $_GET['user_id']!=""){
	$cl1 = $_GET['user_id'];
}
$sql = sprintf("SELECT email FROM `user`  WHERE `user`.`user_id`= %s ",GetSQLValueString($cl1, 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
echo $row['email'];
?>