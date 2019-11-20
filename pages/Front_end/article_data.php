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
							<div class="col-lg-1" style="padding-left: 0px;">
								<select name="semester" class="form-control" style="width: 100px;" required>
									<option value="" <?php if(@$_GET['semester']==''){ ?> selected <?php  } ?>>
										ปี
									</option>
									<option value="1" <?php if(@$_GET['semester']=='1'){ ?> selected <?php  } ?>>
										55
									</option>
									<option value="2" <?php if(@$_GET['semester']=='2'){ ?> selected <?php  } ?>>
										2
									</option>
								</select>
							</div>

							<div class="col-lg-1">
								<select name="semester" class="form-control" style="width: 100px;" required>
									<option value="" <?php if(@$_GET['semester']==''){ ?> selected <?php  } ?>>
										ครั้งที่
									</option>
									<option value="1" <?php if(@$_GET['semester']=='1'){ ?> selected <?php  } ?>>
										1
									</option>
									<option value="2" <?php if(@$_GET['semester']=='2'){ ?> selected <?php  } ?>>
										2
									</option>
								</select>
							</div>
							<div class="col-lg-8"><a href="send_article.php?user_id=<?php echo $_SESSION["user_id"]; ?>"><button type="button" class="btn btn-outline-success" style="float: right;">ส่งบทความ</button></a></div>

						</div>
						<br>
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
											<?php $selectdata=1; while($row = $query->fetch_assoc()){ ?>
												<tr>
													<th scope="row" ><?php echo $selectdata; ?></th>
													<td><?php echo $row["article_name_th"] ?></td>
													<td><a href="../files_work/<?php echo $row["attach_article"] ?>">ไฟล์เอกสาร</a></td>
													<td align="center">                                
														<?php
														$date=date_create($row["date_article"]);
														echo date_format($date,"Y/m/d");
														?>
													</td>
													<td align="center"><a href="update_article.php?article_id=<?php echo $row['article_id']; ?>"<button class="btn btn-danger btn-sm">แก้ไข</button></a></td>
												</tr>
												<?php $selectdata++; } ?>
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
        </div>


    </div>



</div>
</div> 

<?php include('js.php'); ?>	



</body>
</html>