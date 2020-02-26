<?php  include('../../../connect/connect.php'); ?>
<?php if(isset($_POST['mm']) && $_POST['mm']=="update"){
	$files_comment = "";
	if(isset($_FILES['files_comment']["name"])&&($_FILES['files_comment']["name"]!="")){	
		$files_comment = Convert_name_file($_FILES['files_comment']["name"]);
	}else{
		$files_comment = $_POST['files_comment_old'];
	}
	$sql = sprintf('UPDATE `article` SET `attach_article_checked`=%s WHERE `article_id`=%s',
		GetSQLValueString($files_comment,'text'),
		GetSQLValueString($_POST['article_id'],'text'));
	$query = $conn->query($sql);

	if($query){
		if(isset($_FILES['files_comment']["name"])&&($_FILES['files_comment']["name"]!="")){			
			move_uploaded_file($_FILES["files_comment"]["tmp_name"],"../../../files_comment/".$files_comment);
			@unlink("../../files_comment/".$_POST['files_comment_old']);

		}
		$sql = sprintf('UPDATE `article` SET `sta_work`=%s WHERE `article_id`=%s',
			GetSQLValueString(1,'text'),
			GetSQLValueString($_POST['article_id'],'text'));
		$query = $conn->query($sql);
	}

}
?>
<?php 
$sql =  sprintf("SELECT * FROM `article` WHERE `article_id` = %s",GetSQLValueString($_REQUEST['article_id'],'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$num_row = $query->num_rows;
?>

<style type="text/css">
	.error{
		color: red;
	}
</style>
<input type="hidden" name="num_row_view" value="<?php echo $row['attach_article_checked']; ?>">
<div class="card-body">
	<form id="send_commentall" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<p style="background-color: #0062c4; color: #ffffff; height: 30px; padding-top: 3px;"><span style="padding: 7px;">ไฟล์บทความที่ตรวจสอบแล้ว : </span></p>
			<p>ไฟล์บทความสำหรับผู้ทรงคุณวุฒิ : <a href="../../files_comment/<?php echo $row['attach_article_checked']; ?>"><?php if(isset($row['attach_article_checked'])){  echo $row['attach_article_checked']; } ?></a></p>
			<span id="fiie_view">
				<input type="file" name="files_comment" class="form-control-file">
				<em style="color: red;">*กรุณาเพิ่มไฟล์บทความสำหรับผู้ทรงคุณวุฒิ</em>
			</span>

		</div>
		<center>
			<span id="a1">
				<button type="button" class="btn btn-primary" id="editComment">แก้ไขข้อมูล</button>
			</span>
			<span id="a2">
				<button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
			</span>

			
		</center>
		<input type="hidden" name="mm" value="update">
		<input type="hidden" name="id_allComment" value="<?php echo $row['id_allComment']; ?>">
		<input type="hidden" name="files_comment_old" value="<?php echo $row['attach_article_checked']; ?>">
		<input type="hidden" name="article_id" value="<?php echo $_REQUEST['article_id']; ?>">


	</form>
</div>

<script type="text/javascript">
	var num_row_view = $('[name=num_row_view]').val();
	if(num_row_view!=''){
		$('#fiie_view').css('display', 'none');
		$('#a1').css('display', '');
		$('#a2').css('display', 'none');
	}else{
		$('#fiie_view').css('display', '');
		$('#a1').css('display', 'none');
		$('#a2').css('display', '');
	}
	
	$('#editComment').click(function(event) {
		$('#fiie_view').css('display', '');
		$('#a1').css('display', 'none');
		$('#a2').css('display', '');
	});

	$( "#send_commentall" ).validate( {
		rules: {
			files_comment: "required"

		},
		messages: {
			files_comment: "*กรุณาเลือกแนบไฟล์บทความ"

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
		},submitHandler: function(e) {

			var formData = new FormData($("#send_commentall")[0]);

			$.ajax({ 
				url: 'allarticle/page_1_upfile.php',
				type: 'POST',
				data: formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				success: function(result) {
					$('#view_del_all').html(result);
				}
			}); 

			return false;
		}
	});
</script>