<?php  include('../../../connect/connect.php'); ?>
<?php 
$userid = $_SESSION['user_id'];

$sql = sprintf("SELECT * FROM `article` where user_id = %s and year = %s and `time` = %s",
	GetSQLValueString($userid, 'text'),
	GetSQLValueString($_POST['year'], 'text'),
	GetSQLValueString($_POST['time'], 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$numRow = $query->num_rows;
?>
<input type="hidden" name="numRow" value="<?php echo $numRow; ?>">
<div class="row">                      
	<div class="col-md-12 mb-3">                        
		<div class="table-responsive">
			<h4>ข้อมูลบทความ</h4>

			<table class="table table-striped" >
				<thead>
					<tr>
						<th scope="col" style="width: 5%">#</th>
						<th scope="col">ชื่อบทความ</th>
						<th scope="col" style="width: 10%">ดาวน์โหลด</th>
						<th scope="col" style="width: 15%;text-align:center">วันที่ดำเนินการ</th>
						<th scope="col" style="width: 5%"></th>
					</tr>
				</thead>
				<tbody>
					
					<?php if($numRow>0){ ?>
						<tr>
							<th scope="row" >1</th>
							<td><?php echo $row["article_name_th"]; ?></td>
							<td><a href="../files_work/<?php echo $row["attach_article"]; ?>">ไฟล์เอกสาร</a></td>
							<td align="center">                                
								<?php
								$date=date_create($row["date_article"]);
								echo date_format($date,"Y/m/d");
								?>
							</td>
							<td align="center">
								<a href="update_article.php?article_id=<?php echo $row['article_id']; ?>"><button class="btn btn-danger btn-sm">แก้ไข</button></a>
							</td>
						</tr>
					<?php }else{ ?> 
						<tr>
							<td colspan="5"><font color="red">*ไม่พบข้อมูล</font></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>     
		</div>
	</div>                   


	<div class="container">
		<hr class="mb-4">
	</div>

	<div class="container">
		<div class="row">
			<h4>ผลการประเมิน</h4>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<textarea class="form-control" name="abstract_en" style="width: 746px;height: 114px;"></textarea>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-outline-success" style="float: center;">ดาวน์โหลดผลการประเมิน</button>
			</div>
		</div><br>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-12 md-3">
				<a>ส่งบทความแก้ไข</a>&nbsp;อัพโหลด
				<a style="border-left-width: -;padding-left: 52px;">วันที่อัพโหลด</a>&nbsp;5/5/55
				<a style="border-left-width: -;padding-left: 72px;">ดาวน์โหลดบทความ</a>&nbsp;ไฟล์เอกสาร
			</div> 
		</div>
	</div>
	<div class="container">
		<hr class="mb-4">
	</div>
</div>
<script type="text/javascript">
	var sent = $('[name=numRow]').val();
	if(sent==1){
		$('#sent').prop('disabled', true );
	}else {
		$('#sent').prop('disabled', false );
	}
</script>