<?php  include('../../../connect/connect.php'); ?>
<?php 
if(isset($_POST['mm']) && $_POST['mm']=='sent_files'){
	$files_comback = Convert_name_file($_FILES['files_comback']["name"]);
	$sql = sprintf("INSERT INTO `tb_sentcomment_back`(`files_comback`, `article_id`) VALUES (%s,%s)",
		GetSQLValueString($files_comback, 'text'),
		GetSQLValueString($_POST['article_id'], 'text'));
	$query = $conn->query($sql);
	if($query){
		if(isset($_FILES['files_comback']["name"])&&($_FILES['files_comback']["name"]!="")){			
			move_uploaded_file($_FILES["files_comback"]["tmp_name"],"../../../files_comment/".$files_comback);
		}
		$sql = sprintf('UPDATE `article` SET `sta_work`=%s WHERE `article_id`=%s',
			GetSQLValueString(3,'text'),
			GetSQLValueString($_POST['article_id'],'text'));
		$query = $conn->query($sql);
	}
}
?>
<?php 
$userid = $_SESSION['user_id'];

 $sql = sprintf("SELECT * FROM `article` left join tb_allcomment on article.article_id = tb_allcomment.article_id where user_id = %s and year = %s and `time` = %s",
	GetSQLValueString($userid, 'text'),
	GetSQLValueString($_POST['year'], 'text'),
	GetSQLValueString($_POST['time'], 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$numRow = $query->num_rows;
?>
<input type="hidden" name="sta_work" value="<?php echo $row['sta_work']; ?>">
<style type="text/css">
	.form-wizard {
		padding: 25px; 
		background: #fff;
		-moz-border-radius: 4px; 
		-webkit-border-radius: 4px; 
		border-radius: 4px; 
		box-shadow: 2px 3px 20px 0px #ffffff;
		
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
		background:#8a20204f;
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

<input type="hidden" name="numRow" value="<?php echo $numRow; ?>">
<div class="row">                      
	<div class="col-md-12 mb-3">                        
		<div class="table-responsive">
			<!-- <h4>ข้อมูลบทความ</h4> -->
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
							<td><a href="../../files_work/<?php echo $row["attach_article"]; ?>">ไฟล์เอกสาร</a></td>
							<td align="center">                                
								<?php
								$date=date_create($row["date_article"]);
								echo date_format($date,"Y/m/d");
								?>
							</td>
							<td align="center">

								<?php echo $row['article_id']; ?>
								<a href="update_article.php?article_id=<?php echo urlencode($row['article_id']); ?>"><button class="btn btn-danger btn-sm">แก้ไข</button></a>
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
		<div class="container">
			<div class="row">
				<h4>สถานะบทความ</h4>
			</div>
		</div>
		<div class="col-md-12 col-md-offset-2 form-wizard" style="center;height: 124px;width: 1030px;padding-left: 0px;padding-right: 0px;">
			<div class="form-wizard-steps form-wizard-tolal-steps-7" style="left: 34px;bottom: 43px;" >
				<!-- style="left: 34px;bottom: 43px;" -->
				<div class="form-wizard-step active" style="height: 110px;width: 140px;">
					<div class="form-wizard-step-icon" ><i class="fa fa-retweet" aria-hidden="true"></i></div>
					<p style="font-size:14px">ส่งบทความ</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
					<p style="font-size:14px">คัดเลือกผู้ทรงคุณ</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
					<p style="font-size:14px">กำลังประเมินบทความ</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
					<p style="font-size:14px">รอการแก้ไขบทความ</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-filter" aria-hidden="true"></i></div>
					<p style="font-size:14px">ตรวจสอบ</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
					<p style="font-size:14px">รอการตีพิมพ์</p>
				</div>
				<div class="form-wizard-step" style="width: 140px;">
					<div class="form-wizard-step-icon"><i class="fa fa-file" aria-hidden="true"></i></div>
					<p style="font-size:14px">ตีพิมพ์เรียบร้อย</p>
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
			<textarea class="form-control" name="abstract_en" style="width: 746px;height: 114px;"><?php if(isset($row['detal_comment']) && $row['detal_comment']!=""){ echo $row['detal_comment'];  } ?>
				</textarea>
		</div>
		<div class="col-md-3">
			<?php if(isset($row['files_comment']) && $row['files_comment']!=""){ ?>
				<a href="../../files_comment/<?php echo $row['files_comment']; ?>"><button type="button" class="btn btn-outline-success" style="float: center;">ดาวน์โหลดผลการประเมิน</button></a>
			<?php }else{ ?> 
				<button type="button" class="btn btn-outline-success" style="float: center;">ดาวน์โหลดผลการประเมิน</button>
			<?php } ?>
			
		</div>
	</div><br>
</div>

<?php 
$article_id = "-1";
if(isset($row['article_id']) && $row['article_id']!=""){
	$article_id = $row['article_id'];
}
echo $sql_a = sprintf("SELECT * FROM `tb_sentcomment_back` WHERE `article_id` = %s",GetSQLValueString($article_id,'text'));
$query_a = $conn->query($sql_a);
$row_a =$query_a->fetch_assoc();
$num_rows = $query_a->num_rows;
?>
<?php if($num_rows>0){ ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 md-3">

				<span>ส่งบทความแก้ไข : </span>
				<?php if($row['sta_work']>=2){ ?>
					<button type="button" class="btn btn-primary" id="upfilecomment">อัพโหลด</button> 
				<?php }else{ ?> 
					<button disabled="" type="button" class="btn btn-primary" >อัพโหลด</button> 
				<?php } ?>
				<span>วันที่อัพโหลด : </span><span><?php echo $row_a['date_comback']; ?></span>
				<span>ดาวน์โหลดบทความ : </span><?php if($row_a['files_comback']!=""){ ?><a href="../../files_comment/<?php echo $row_a['files_comback']; ?>"><?php echo $row_a['files_comback']; ?></a><?php }else{ ?> <a>เอกสาร</a><?php } ?>
			</div> 
		</div>
	</div>
<?php }else { ?> 
	<div class="container">
		<div class="row">
			<div class="col-md-12 md-3">

				<span>ส่งบทความแก้ไข : </span>
				<button disabled="" type="button" class="btn btn-primary" >อัพโหลด</button> 
				
				<span>วันที่อัพโหลด : </span><span></span>
				<span>ดาวน์โหลดบทความ : </span>เอกสาร</a>
			</div> 
		</div>
	</div>
<?php } ?>

<!-- Modal -->
<div class="modal fade" id="mymodel_upfilecomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">อัพโหลดไฟล์</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="sent_commentfiles" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleFormControlFile1">แบบไฟล์แก้ไขวารสาร : </label>
						<input type="file" class="form-control-file" name="files_comback" id="exampleFormControlFile1">
					</div>

				</div>
				<div class="modal-footer">   
					<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
				</div>
				<input type="hidden" name="article_id" value="<?php echo $row['article_id'];  ?>">
				<input type="hidden" name="userid" value="<?php echo $userid; ?>">
				<input type="hidden" name="year" value="<?php echo $_POST['year']; ?>">
				<input type="hidden" name="time" value="<?php echo $_POST['time']; ?>">	

				<input type="hidden" name="mm" value="sent_files">

			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	var sta_work = $('[name=sta_work]').val();

	if(sta_work>3){
		$('#upfilecomment').html('อัพไฟล์แล้ว');
		$('#upfilecomment').prop('disabled', true);
	}


	$('#upfilecomment').click(function(event) {
		$('#mymodel_upfilecomment').modal({ show : true});
	});

	$( "#sent_commentfiles" ).validate( {

		rules: {
			files_comback: "required"
		},
		messages: {
			files_comback: "*กรุณาเลือกแนบไฟล์"
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		},
		submitHandler: function(e) {

			var formData = new FormData($("#sent_commentfiles")[0]);
			$('#mymodel_upfilecomment').modal('hide');
			setTimeout(function(){ 
				$.ajax({
					url: 'article_data/view_table.php',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					processData: false,
					success: function(result) {
						$('#view_table').html(result);
					}
				});
			}, 300);
			return false;
		}
	} );	
	


	var sent = $('[name=numRow]').val();
	if(sent==1){
		$('#sent').prop('disabled', true );
	}else {
		$('#sent').prop('disabled', false );
	}

	
	var i;
	for(i=0; i<=sta_work; i++){
		$('.form-wizard-step').eq(i).addClass('active');
	}

	
</script>