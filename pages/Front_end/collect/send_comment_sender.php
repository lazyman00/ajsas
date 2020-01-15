<?php  include('../../../connect/connect.php'); ?>
<?php 
if(isset($_POST['mm']) && $_POST['mm']=="insert"){
	$files_comment = "";
	$files_comment = Convert_name_file($_FILES['files_comment']["name"]);
	$sql = sprintf('INSERT INTO `tb_allcomment`(`detal_comment`, `files_comment`, `article_id`) VALUES (%s,%s,%s)',
		GetSQLValueString($_POST['detal_comment'],'text'),
		GetSQLValueString($files_comment,'text'),
		GetSQLValueString($_POST['article_id'],'text'));
	$query = $conn->query($sql);
	if($query){
		if(isset($_FILES['files_comment']["name"])&&($_FILES['files_comment']["name"]!="")){			
			move_uploaded_file($_FILES["files_comment"]["tmp_name"],"../../../files_comment/".$files_comment);
		}

		$sql = sprintf('UPDATE `article` SET `sta_work`=%s WHERE `article_id`=%s',
			GetSQLValueString(2,'text'),
			GetSQLValueString($_POST['article_id'],'text'));
		$query = $conn->query($sql);
	}
}else if(isset($_POST['mm']) && $_POST['mm']=="update"){
	$files_comment = "";
	if(isset($_FILES['files_comment']["name"])&&($_FILES['files_comment']["name"]!="")){	
		$files_comment = Convert_name_file($_FILES['files_comment']["name"]);
	}else{
		$files_comment = $_POST['files_comment_old'];
	}
	$sql = sprintf('UPDATE `tb_allcomment` SET `detal_comment`=%s,`files_comment`=%s,`article_id`=%s WHERE `id_allComment`=%s',
		GetSQLValueString($_POST['detal_comment'],'text'),
		GetSQLValueString($files_comment,'text'),
		GetSQLValueString($_POST['article_id'],'text'),
		GetSQLValueString($_POST['id_allComment'],'text'));
	$query = $conn->query($sql);
	if($query){
		if(isset($_FILES['files_comment']["name"])&&($_FILES['files_comment']["name"]!="")){			
			move_uploaded_file($_FILES["files_comment"]["tmp_name"],"../../../files_comment/".$files_comment);
			@unlink("../../files_comment/".$_POST['files_comment_old']);

		}
		$sql = sprintf('UPDATE `article` SET `sta_work`=%s WHERE `article_id`=%s',
			GetSQLValueString(2,'text'),
			GetSQLValueString($_POST['article_id'],'text'));
		$query = $conn->query($sql);
	}

}
?>
<?php 
$sql =  sprintf("SELECT * FROM `tb_allcomment` WHERE `article_id` = %s",GetSQLValueString($_REQUEST['article_id'],'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$num_row = $query->num_rows;
?>

<style type="text/css">
	.error{
		color: red;
	}
</style>
<div class="card-body">
	<form id="send_commentall" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleFormControlTextarea1">ความคิดเห็น : </label>
			<textarea name="detal_comment" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['detal_comment']; ?></textarea>
		</div>
		<div class="form-group">
			<p><b>ไฟลฺ์แนบ : </b><a href="../../files_comment/<?php echo $row['files_comment']; ?>"><?php echo $row['files_comment']; ?></a></p>
		</div>
	</form>
</div>
