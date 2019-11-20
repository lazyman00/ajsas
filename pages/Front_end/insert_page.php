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
        $sql = "SELECT * FROM `home`";  
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);
        $conn->close(); 
    ?>
	<div class="container">
		
		<div class="card" >
                        <h5 class="card-header">HOME</h5>
                        <div class="card-body">
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">หน้า Home</h7></li>
                                        </ol>
                                      </nav>
                          
                          <form role="form" action="sql_editHome.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                       
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-5 mb-3"style="text-align:right">
                                                <label for="name">ฉบับที่ 1 </label> 
                                            </div>
                                            <div class="col-md-3 mb-3" >
                                            <input type="text" name="mmonth" class="form-control form-control-sm" value="<?php echo $data['mmonth']; ?>">                                             
                                            </div>
                                            <div class="col-md-4 mb-3"></div>
                                        </div>

                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3"></div>
                                            <div class="col-md-2 mb-3"style="text-align:right">
                                                <label for="name">เริ่มวันที่ </label> 
                                            </div>
                                            <div class="col-md-2 mb-3" >
                                            <input type="date" name="start_time" class="form-control form-control-sm" value="<?php echo $data['start_time']; ?>">                                             
                                            </div>
                                            <div class="col-md-2 mb-3"style="text-align:right">
                                                <label for="name">สิ้นสุดวันที่ </label> 
                                            </div>
                                            <div class="col-md-2 mb-3">
                                            <input type="date" name="end_time" class="form-control form-control-sm" value="<?php echo $data['end_time']; ?>"> 
                                            </div>
                                        </div>
                                      
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic1" class="form-control form-control-sm" value="<?php echo $data['topic1']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration1" class="form-control form-control-sm" value="<?php echo $data['duration1']; ?>" >                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic2" class="form-control form-control-sm" value="<?php echo $data['topic2']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration2" class="form-control form-control-sm" value="<?php echo $data['duration2']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic3" class="form-control form-control-sm" value="<?php echo $data['topic3']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration3" class="form-control form-control-sm" value="<?php echo $data['duration3']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic4" class="form-control form-control-sm" value="<?php echo $data['topic4']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration4" class="form-control form-control-sm" value="<?php echo $data['duration4']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic5" class="form-control form-control-sm" value="<?php echo $data['topic5']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration5" class="form-control form-control-sm" value="<?php echo $data['duration5']; ?>">                                               
                                            </div>
                                        </div>
                                  
                                        
<!-- <hr class="mb-4">
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-5 mb-3"style="text-align:right">
                                                <label for="name">ฉบับที่ 1 </label> 
                                            </div>
                                            <div class="col-md-3 mb-3" >
                                            <input type="text" name="mmonth" class="form-control form-control-sm" value="<?php echo $data['mmonth']; ?>">                                             
                                            </div>
                                            <div class="col-md-4 mb-3"></div>
                                        </div>
                                      
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic1" class="form-control form-control-sm" value="<?php echo $data['topic1']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration1" class="form-control form-control-sm" value="<?php echo $data['duration1']; ?>" >                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic2" class="form-control form-control-sm" value="<?php echo $data['topic2']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration2" class="form-control form-control-sm" value="<?php echo $data['duration2']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic3" class="form-control form-control-sm" value="<?php echo $data['topic3']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration3" class="form-control form-control-sm" value="<?php echo $data['duration3']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic4" class="form-control form-control-sm" value="<?php echo $data['topic4']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration4" class="form-control form-control-sm" value="<?php echo $data['duration4']; ?>">                                               
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-2 mb-3" style="text-align:right"></div>
                                            <div class="col-md-6 mb-3" >
                                                <input type="text" name="topic5" class="form-control form-control-sm" value="<?php echo $data['topic5']; ?>" >
                                            </div>
                                            <div class="col-md-2 mb-3" style="text-align:right">
                                                <input type="text" name="duration5" class="form-control form-control-sm" value="<?php echo $data['duration5']; ?>">                                               
                                            </div>
                                        </div> -->

<hr class="mb-4">

                                    <!-- </form> -->
                                </div>
                            </div> 


                            <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-9 mb-3"></div>
                                            <div class="col-md-3 mb-3">
                                            <input type="hidden" name="home_id" value="<?php echo $data['home_id']; ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                                                <button type="button" class="btn btn-danger btn-sm">ยกเลิก</button>
                                            </div>                                          
                                        </div>  
                                </div>
                            </div>   
                            </form>                         
                        </div>
                      </div>
		
	</div> 

	<?php include('js.php'); ?>	
</body>
</html>