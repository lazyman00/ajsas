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
<input type="hidden" name="num_row_view" value="<?php echo $num_row; ?>">
<div class="card-body">
	<form id="send_commentall" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleFormControlTextarea1">ความคิดเห็น : </label>
			<textarea name="detal_comment" readonly="" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['detal_comment']; ?></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlFile1">ไฟลฺ์แนบ : </label>
			<p><a href="../../files_comment/<?php echo $row['files_comment']; ?>"><?php echo $row['files_comment']; ?></a></p>
			<span id="fiie_view">
				<input type="file" name="files_comment" class="form-control-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
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
		<input type="hidden" name="mm" value="<?php if($num_row>0){ echo 'update'; }else{ echo 'insert'; }?>">
		<input type="hidden" name="id_allComment" value="<?php echo $row['id_allComment']; ?>">
		<input type="hidden" name="files_comment_old" value="<?php echo $row['files_comment']; ?>">
		<input type="hidden" name="article_id" value="<?php echo $_REQUEST['article_id']; ?>">


	</form>
</div>

<script type="text/javascript">
	var num_row_view = $('[name=num_row_view]').val();
	if(num_row_view>0){
		$('[name=detal_comment]').prop('readonly', true);
		$('#fiie_view').css('display', 'none');
		$('#a1').css('display', '');
		$('#a2').css('display', 'none');
	}else{
		$('[name=detal_comment]').prop('readonly', false);
		$('#fiie_view').css('display', '');
		$('#a1').css('display', 'none');
		$('#a2').css('display', '');
	}
	

	$('#editComment').click(function(event) {
		$('[name=detal_comment]').prop('readonly', false);
		$('#fiie_view').css('display', '');
		$('#a1').css('display', 'none');
		$('#a2').css('display', '');
	});


	$( "#send_commentall" ).validate( {
		rules: {
			detal_comment: "required",
			files_comment: "required"

		},
		messages: {
			detal_comment: "*กรุณากรอกข้อมูล",
			files_comment: "*กรุณาเลือกแนบไฟล์"

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
				url: 'allarticle/send_comment_sender.php',
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