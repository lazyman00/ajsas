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
<body class="bg-light">
    <?php include('menu.php'); ?>
    <?php include('menu_index.php'); ?>
    <?php  
        $userid = $_SESSION['user_id'];
        $sql = "SELECT * FROM `article` where user_id =  $userid";
        $result = $conn->query($sql);
    ?>  
    <div class="container">

    <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                </nav>     
                <div class="table-responsive">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><b>วารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</b></li>
                    </ol>
                </nav> 
                    <div class="col-md-12" style="align-items: center">
                        <div class="row" >
                        <div class="col-md-3 mb-3">
                            <lable for="firstName">ชื่อบทความ</lable>
                            <input id="search_name" name="search_name" type="text" class="form-control">
                        </div>   
                        <div class="col-md-3 mb-3">
                            <lable for="firstName">สาขา</lable>
                            <input id="search_name2" name="search_name2"  type="text" class="form-control">
                        </div> 
                        <div class="col-md-2 mb-3">
                            <lable for="firstName">วารสารวิชาการปีที่</lable>
                            <input id="search_name3" name="search_name3"  type="text" class="form-control">
                        </div> 
                        <div class="col-md-2 mb-3">
                            <lable for="firstName">ฉบับที่</lable>
                            <input id="search_name4" name="search_name4"  type="text" class="form-control">
                        </div> 
                        <div class="col-md-2 mb-3">
                            <button onclick="show_date_table(1)" class="btn btn-outline-success btn-sm" style="border-top-width: 3.99;margin-top: 26px;">ค้นหา</button>
                        </div>          
                        </div>               
                    </div> 
                </div>  
            </div>         
        </div></br>


        <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><b>รายการบทความเผยแพร่</b></li>
                    </ol>
                </nav>     


                <div id="show_readarticle" name="show_readarticle"></div>
                <?php  include('js.php'); ?>    
                    <script type="text/javascript">
                        $(document).ready(function() {
                            show_date_table(1);
                        });
                        
                        
                        function show_date_table(page) {

                            $.ajax({
                                url: "" +page,
                                type: "POST",
                                data: {
                                    search_name : $("#search_name").val(),
                                    search_name2 : $("#search_name2").val(),
                                    search_name3 : $("#search_name3").val()
                                },
                                success: function (data, status) {
                                    $("#show_readarticle").html(data);
                                },
                                error: function(data, status, error) {
                                    $('#show_readarticle').html('<p>An error has occurred</p>');
                                }
                            });
                        }
                    </script>  


        </div>
    </div>
</div> 




<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>