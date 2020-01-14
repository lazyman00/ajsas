<?php  include('../../../connect/connect.php'); ?>
<?php if(isset($_POST['mm']) && $_POST['mm']=='insert'){ 
	$sql = sprintf("UPDATE `article` SET `sta_work`=%s WHERE `article_id`=%s",
		GetSQLValueString($_POST['sta_work'],'text'),
		GetSQLValueString($_POST['article_id'],'text'));
	$query = $conn->query($sql);
} ?>

<?php 
$sql = sprintf("SELECT tb_sentcomment_back.files_comback, tb_sentcomment_back.date_comback, article.sta_work FROM `tb_sentcomment_back` left join article on tb_sentcomment_back.article_id = article.article_id WHERE tb_sentcomment_back.`article_id` =  %s",GetSQLValueString($_REQUEST['article_id'],'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$num = $query->num_rows;
?>
<div class="card-body">
	<p>
		<b>ไฟล์บทความที่แก่ไขแล้ว : </b> <a href="../../files_comment/<?php echo $row['files_comback']; ?>"><?php echo $row['files_comback']; ?></a> <span>วันที่อัพโหลด : </span><?php echo $row['date_comback']; ?>
	</p>

	<p><b>สถานะการตรวจสอบ :</b> <?php if($row['sta_work']==4){ echo "ตรวจสอบแล้ว"; } ?></p>

</div>
