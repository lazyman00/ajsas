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

						<div class="row" style="height: 38px;">
								<div class="col-md-1 mb-3" style="text-align:right">
									<label for="name">ปี</label>                                                
								</div>
								<div class="col-md-2 mb-3" >
									<select id="year" name="year" class="form-control" required>
										<?php $chk_y=date('Y')+543; $name_chk_y="";
										for($i=date('Y')+547; $i>=date('Y')+543-3; $i--){ ?> 
										<option <?php echo ($i==$chk_y)? "selected" : ""; ?> value="<?php echo $i; ?>"><?php echo $i ?>
											</option>
										<?php } ?>
									</select>
								</div>ฉบับที่
								<!-- <div class="col-md-1 mb-3" style="text-align:right">
									<label for="name">ฉบับที่</label>                                                
								</div> -->
								<div class="col-md-2 mb-3" >
									<select id="time" name="time" class="form-control" style="width: 100px;" required>
										<?php for($i=1; $i<=2; $i++){ ?> 
											<option <?php if($i==1){ ?> selected="" <?php } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-4 mb-3" >
								</div>
								<div class="col-md-2 mb-3" >
								<a href="send_article.php?user_id=<?php echo $_SESSION["user_id"]; ?>"><button id="sent" type="button" class="btn btn-outline-success" disabled="" >ส่งบทความ</button></a>
								</div>
            			</div>
						</form>	
						
						<br>
						<span id="view_table"></span>
					</div>
				</div>
			</div>
		</div> <br>
	</div>
	<!-- <footer class="page-footer font-small blue" style="clear: both;">
	<div class="footer-copyright py-3" style="background-color:#008000;  height: 150px;">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<p><img src="../../img/science-04.png" style="width: 118px;margin-left: 210px;"></p>
				</div>
				<div class="col-md-8"><br>
					<p style="color:#F7FF00;margin-bottom: 0px;font-size: 15px;"><i class="fa fa-copyright" style="color:#F7FF00;" aria-hidden="true"></i> คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ โทรศัพท์ 0-5541-1096 ต่อ 1300</p>
					<p style="color:#F7FF00;font-size: 15px;">Academic Journal Of Science And Applied Science. All Rights Reserved.</p>
					<p style="color:#F7FF00;font-size: 15px;"><i class="fa fa-envelope" style="color:#F7FF00;"  aria-hidden="true"></i> Email : ajsas.sci@gmail.com</p>
				</div>
			</div>
		</div>
	</div>
	</div>
	</footer> -->
	<?php include('footer.php'); ?>	
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