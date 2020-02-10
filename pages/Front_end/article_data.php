<?php  include('../../connect/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style type="text/css">
	.a{
		font-size: 14px;
	}
	.bg-white{
		background-color:rgb(14, 130,0,1)!important;
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

	

	<div class="container">
		<div class="card" >
			<div class="card-body">
				<div class="card border-light mb-3" style="max-width: 100rem;">
					<div class="card-body">

						<form>
							<div class="form-row">ปี
								<div class="form-group col-md-2">
									<!-- <label for="inputEmail4">ปีที่ : </label> -->
									<select id="year" name="year" class="form-control" required>
										<?php for($i=date('Y')+543; $i>=date('Y')+543-2; $i--){ ?> 
											<option <?php if($i==date('Y')){ ?> selected="" <?php } ?> 
											value="<?php echo $i; ?>"><?php echo $i; ?>
											</option>
										<?php } ?>

									</select>
								</div>

ครั้ง

								<div class="form-group col-md-3">
									<!-- <label for="inputPassword4">ครั้ง : </label> -->
									<select id="time" name="time" class="form-control" style="width: 100px;" required>
										<?php for($i=1; $i<=2; $i++){ ?> 
											<option <?php if($i==1){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
								<!-- <div class="form-group col-md-4"> -->
									<a href="send_article.php?user_id=<?php echo $_SESSION["user_id"]; ?>"><button id="sent" type="button" class="btn btn-outline-success" 
									style="  margin-left: 458px;" disabled="" >ส่งบทความ</button></a>
								<!-- </div> -->
							</div>
						</form>	
						
						<br>
						<span id="view_table"></span>
					</div>
				</div>
			</div>
		</div> <br>
	</div>
	<footer class="page-footer font-small blue" style="clear: both;">
		<div class="footer-copyright text-center py-3" style="background-color:#008000;  height: 100px;">
			<p style="color:#ffffff;margin-bottom: 0px;font-size: 14px;">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ โทรศัพท์ 0-5541-1096 ต่อ 1300</p>
			<p style="color:#ffffff;font-size: 14px;">Academic Journal Of Science And Applied Science. All Rights Reserved.</p>
		</div>
	</footer>

	<?php include('js.php'); ?>	


	<script type="text/javascript">
		var year = $('[name=year]').val();
		var time = $('[name=time]').val();
		$.post('article_data/view_table.php', {year: year, time:time }, function(data) {
			$('#view_table').html(data);
		});

		$('#year').change(function(event) {
			var year = $('[name=year]').val();
			var time = $('[name=time]').val();
			$.post('article_data/view_table.php', {year: year, time:time }, function(data) {
				$('#view_table').html(data);
			});
		});

		$('#time').change(function(event) {
			var year = $('[name=year]').val();
			var time = $('[name=time]').val();
			$.post('article_data/view_table.php', {year: year, time:time }, function(data) {
				$('#view_table').html(data);
			});
		});
	</script>
</body>
</html>