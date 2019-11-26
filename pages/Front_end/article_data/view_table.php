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

	<style type="text/css">
	.form-wizard {
		padding: 25px; 
		background: #fff;
		-moz-border-radius: 4px; 
		-webkit-border-radius: 4px; 
		border-radius: 4px; 
		box-shadow: 2px 3px 20px 0px #ececec;
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		font-weight: 300;
		color: #888;
		line-height: 30px;
		text-align: center;
	}
	
	.form-wizard strong { font-weight: 500; }


	.form-wizard-steps{  /*ซ่อน*/
		margin:auto; 
		/* overflow: hidden;  */
		position: relative; 
		margin-top: 20px;
	}

	.form-wizard-step{ /*เอียง*/
		padding-top:10px !important;
		border:5px solid #fff;
		background:#f5a0a0;
		-ms-transform: skewX(-30deg); /* IE 9 */
		-webkit-transform: skewX(-30deg); /* Safari */
		transform: skewX(-30deg); /* Standard syntax */
	}
	.form-wizard-step.active{
		background:#15907c;
	}

	.form-wizard-tolal-steps-7 .form-wizard-step { 
		position: relative;
		float: left;
		width: 13%;
		padding: 0 5px;
	}

	.form-wizard-step-icon {
		display: inline-block;
		width: 40px; 
		height: 40px; 
		margin-top: 4px; 
		background: #ddd;
		font-size: 16px; 
		color: #777; 
		line-height: 40px;
		-moz-border-radius: 50%; 
		-webkit-border-radius: 50%; 
		border-radius: 50%;
		-ms-transform: skewX(30deg); /* IE 9 */
		-webkit-transform: skewX(30deg); /* Safari */
		transform: skewX(30deg); /* Standard syntax */
	}
	.form-wizard-step.activated .form-wizard-step-icon {
		background: #ea2803; 
		border: 1px solid #fff; 
		color: #fff; 
		line-height: 38px;
	}
	.form-wizard-step.active .form-wizard-step-icon {
		background: #eefb27; 
		border: 1px solid #fff; 
		color: #ea2803; 
		line-height: 38px;
	}

	.form-wizard-step p { 
		color: #fff;
		-ms-transform: skewX(30deg); /* IE 9 */
		-webkit-transform: skewX(30deg); /* Safari */
		transform: skewX(30deg); /* Standard syntax */
	}
</style>
	<div class="container">
	<div class="container">
		<div class="row">
			<h4>สถานะบทความ</h4>
		</div>
	</div>
	<div class="col-md-12 col-md-offset-2 form-wizard" style="center;height: 124px;">
		<div class="form-wizard-steps form-wizard-tolal-steps-7" style="left: 34px;bottom: 43px;" >
		 <!-- style="left: 34px;bottom: 43px;" -->
			<div class="form-wizard-step active">
				<div class="form-wizard-step-icon" ><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></div>
				<p>ส่งบทความ</p>
			</div>
			<div class="form-wizard-step active">
				<div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
				<p>Contact</p>
			</div>
			<div class="form-wizard-step">
				<div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
				<p>Official</p>
			</div>
			<div class="form-wizard-step">
				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
				<p>Payment</p>
			</div>
			<div class="form-wizard-step">
				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
				<p>Payment</p>
			</div>
			<div class="form-wizard-step">
				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
				<p>Payment</p>
			</div>
			<div class="form-wizard-step">
				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
				<p>Payment</p>
			</div>
		</div>
	</div>
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


<script type="text/javascript">
	var sent = $('[name=numRow]').val();
	if(sent==1){
		$('#sent').prop('disabled', true );
	}else {
		$('#sent').prop('disabled', false );
	}
</script>