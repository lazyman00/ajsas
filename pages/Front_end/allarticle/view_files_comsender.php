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
	<p style="background-color: #0062c4; color: #ffffff; height: 30px; padding-top: 3px;"><span style="padding: 7px;">ตรวจสอบบทความก่อนเผยแพร่ : </span></p>
	<p>
		<b>ไฟล์บทความที่แก่ไขแล้ว : </b> <a href="../../files_comment/<?php echo $row['files_comback']; ?>"><?php echo $row['files_comback']; ?></a> <span>วันที่อัพโหลด : </span><?php echo $row['date_comback']; ?>
	</p>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-3 col-form-label">สถานะการตรวจสอบ : </label>
		<div class="col-sm-4">
			<select class="form-control" id="sta_work" name="sta_work">
				<option value="">กรุณาเลือกสถานะ</option>	
				<option <?php if($row['sta_work']==4){ ?> selected="" <?php } ?> value="4">ตรวจสอบแล้ว</option>
			</select>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#sta_work').change(function(event) {
		var sta_work = $(this).val();
		var article_id = '<?php echo $_REQUEST['article_id']; ?>';
		$.post('allarticle/view_files_comsender.php', { sta_work: sta_work, mm : 'insert', article_id: article_id}, function(data) {
			$('#view_del_all').html(data);
		});
	});
</script>