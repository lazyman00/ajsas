
<?php 
        include ('connect.php'); 
        mysqli_set_charset($conn,"utf8");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../datetimepicker-master/jquery.datetimepicker.css"/>
    <title>send_article</title>
    <style type="text/css">
        .a{
            font-size: 14px;
        }
    </style>
</head>

<body class="bg-light">
       
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">วารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
                <a class="p-2 text-dark" href="#">บรรณาธิการ</a>
                <a class="p-2 text-dark" href="#">การส่ง</a>
                <a class="p-2 text-dark" href="#">ประกาศ</a>
                <a class="p-2 text-dark" href="#">ติดต่อ</a>
            </nav>
            <a class="btn btn-outline-primary" href="#">เข้าสู่ระบบ</a>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">ส่งบทความ</li>
            </ol>
          </nav>
<div class="container">



                <div class="card" >
                        <h5 class="card-header">ปฏิทินวารสาร</h5>
                        <div class="card-body">
                                <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          <li class="breadcrumb-item active" aria-current="page"><h7 class="card-title">ปฏิทินวารสาร</h7></li>
                                        </ol>
                                      </nav>
                          
                          <form role="form" action="insert_article.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                                <div class="col-md-12 order-md-1" style="align-items: center">
                                        
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">กำหนดวันที่เริ่มต้น<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-3 mb-3" >
                                                <input type="date" class="form-control form-control-sm" name="article_name_th" >
                                            </div>
                                        </div>
                                        <div class="row" style="height: 38px;">
                                            <div class="col-md-4 mb-3" style="text-align:right">
                                                <label for="name">กำหนดวันที่สิ้นสุด<span style="color: red">*</span></label>                                                
                                            </div>
                                            <div class="col-md-3 mb-3" >
                                                <input type="date" class="form-control form-control-sm" name="article_name_en">
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                    <!-- </form> -->
                                </div>
                            </div> 



                              
                            </form>                         
                        </div>
                      </div>
</div> 

      

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>    
    <!-- <script type="text/javascript" src="../ckeditor/ckeditor.js"></script> -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <script type="text/javascript">

$.datetimepicker.setLocale('th');
$('#datetimepicker1').datetimepicker({

onGenerate:function( ct ){
    $(this).find('.xdsoft_date')
        .toggleClass('xdsoft_disabled');
},

minDate:'-1970/01/2',
maxDate:'+1970/01/2',
timepicker:false,

 format:'Y-m-d'


});


jQuery(function(){
jQuery('#date_timepicker_start').datetimepicker({
format:'Y/m/d',
onShow:function( ct ){
this.setOptions({
maxDate:jQuery('#date_timepicker_end').val()?jQuery('#date_timepicker_end').val():false
})
},
timepicker:false
});
jQuery('#date_timepicker_end').datetimepicker({
format:'Y/m/d',
onShow:function( ct ){
this.setOptions({
minDate:jQuery('#date_timepicker_start').val()?jQuery('#date_timepicker_start').val():false
})
},
timepicker:false
});
});



</script>
</body>
</html>