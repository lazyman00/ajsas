<?php  include('../../../connect/connect.php'); ?>
<?php 

// $type_article_id = "";
// if(isset($_REQUEST["type_article_id"]) && $_REQUEST["type_article_id"] !=""){
// 	$type_article_id = $_REQUEST["type_article_id"];
// }
// $cl1 = $_GET['user_id'];
// $sql = sprintf("SELECT user.user_id, user.email, user.pre_id, user.name_th, user.surname_th FROM spacialization left join user on spacialization.user_id = user.user_id WHERE spacialization.type_article_id = %s and `user`.`user_id` NOT IN ($cl1)",
// 	GetSQLValueString($type_article_id, 'int'));
// $query = $conn->query($sql);
// $numrow = $query->num_rows;

// while ($row = $query->fetch_assoc()) {
// 	array_push($arr,$row['user_id']);
// 	array_push($arr_all,$row);
// }
if(empty($_GET['user_id'])){
	$_GET['user_id'] = 0;
}
$txt1 = 0;
if(isset($_GET['user_id1']) && $_GET['user_id1'] !=""){
	$txt1 = $_GET['user_id1'];
}
$txt2 = 0;
if(isset($_GET['user_id2']) && $_GET['user_id2'] !=""){
	$txt2 = $_GET['user_id2'];
}
$txt3 = 0;
if(isset($_GET['user_id3']) && $_GET['user_id3'] !=""){
	$txt3 = $_GET['user_id3'];
}

$text_all = $txt1.','.$txt2.','.$txt3;

$sql = "SELECT user.user_id, user.pre_id, user.name_th, user.surname_th FROM `user`  WHERE `user`.`user_id` NOT IN ($text_all) ";
$query = $conn->query($sql);

?>
<select class="form-control" name="user_id[]">
	<option value="">กรุณาเลือก</option>
	<?php  while ($row = $query->fetch_assoc()) { ?>
		<option value="<?php  echo $row['user_id']; ?>"><?php  echo $row['pre_id']; ?> <?php  echo $row['name_th']; ?> <?php  echo $row['surname_th']; ?></option>
	<?php  } ?>
</select> 