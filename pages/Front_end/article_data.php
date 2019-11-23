<?php  include('../../connect/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style type="text/css">
	.a{
		font-size: 14px;
	}
	.bg-white{
		background-color:rgb(21, 144, 124)!important;
	}
	.border-bottom{
		border-bottom:1px solid #e4ff00!important;
	}
	.text-dark{
		color:#ffffff!important;
	}
</style>

<body>
	<?php include('menu.php'); ?>
	<?php include('menu_index.php'); ?>

	<?php 
	$userid = $_SESSION['user_id'];
	$sql = "SELECT * FROM `article` where user_id =  $userid";
	$query = $conn->query($sql);
	?>

	<div class="container">
		<div class="card" >
			<div class="card-body">
				<div class="card border-light mb-3" style="max-width: 100rem;">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-1"></div>
							<div class="col-lg-2" style="padding-left: 0px; max-width: 13.666667%;">
								<select name="year" class="form-control" required>
									<option value="">กรุณาเลือกปี</option>
									<?php for($i=date('Y'); $i>=date('Y')-20; $i--){ ?> 
										<option <?php if($i==date('Y')){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
									<?php } ?>
									
								</select>
							</div>

							<div class="col-lg-1" style="padding-left: 0px;">
								<select name="semester" class="form-control" style="width: 100px;" required>
									<option value="" <?php if(@$_GET['semester']==''){ ?> selected <?php  } ?>>
										ครั้งที่
									</option>
									<?php for($i=1; $i<=2; $i++){ ?> 
										<option <?php if($i==1){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-8"><a href="send_article.php?user_id=<?php echo $_SESSION["user_id"]; ?>"><button type="button" class="btn btn-outline-success" style="float: right;">ส่งบทความ</button></a></div>

						</div>
						<br>
						<span id="view_table"></span>
					</div>
				</div>
			</div>
		</div> 

		<?php include('js.php'); ?>	


	<script type="text/javascript">
		var year = $('[name=year]').val();
		var semester = $('[name=semester]').val();
		$.post('/article_data/view_table.php', {year: year, semester:semester }, function(data) {
			$('#view_table').html(data);
		});
	</script>
	</body>
	</html>