<?php  include('../../connect/connect.php'); ?>
<?php
$sql = "SELECT * FROM article a
left join type_article ta on ta.type_article_id = a.type_article_id";
$result = $conn->query($sql); 
?>  
<!DOCTYPE html>
<html lang="en">
<?php  include('header.php'); ?>
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
    <?php  include('menu.php'); ?>
    <?php  include('menu_index.php'); ?>
    <div class="container">
        <div class="card" >
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">รายการบทความวิชาการ</li>
                    </ol> -->
                </nav>     
                <div class="table-responsive">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><b>ค้นหา</b></li>
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
                            <select class="form-control" id="search_name2" name="search_name2" >
                                <option value="0">กรุณาเลือก สาขา</option>
<?php
                                $sql_type_article = "SELECT type_article_id, type_article_name FROM type_article ";
                                $result_type_article = $conn->query($sql_type_article);
                                $fetch_type_article = $result_type_article->fetch_assoc();
                                do{
?>
                                <option value="<?php echo $fetch_type_article['type_article_id'];?>"><?php echo $fetch_type_article['type_article_name'];?></option>
<?php
                                }while($fetch_type_article = $result_type_article->fetch_assoc());
?>
                            </select>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <lable for="firstName">ปี</lable>
                            <select class="form-control" id="search_name3" name="search_name3" >
                            <option value="0"><?php echo "กรุณาเลือก ปี"; ?></option>
<?php 
                            for ($i = date("Y"); $i >= date("Y")-9; $i--) { 
                                $name_Y = $i+543;
?>
                                <option value="<?php echo $i; ?>"><?php echo "พ.ศ. ".$name_Y; ?></option>
<?php 
                            }
?>
                            </select>
                        </div> 
                        <div class="col-md-3 mb-3">
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
                        <li class="breadcrumb-item active" aria-current="page"><b>รายการบทความวิชาการ</b></li>
                    </ol>
                </nav>     
                <div id="show_allarticle" name="show_allarticle"></div>
            </div>         
        </div>
    </div>
    <?php  include('js.php'); ?>	
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    $(document).ready(function() {
        show_date_table(1);
    });

    function show_date_table(page) {

        $.ajax({
            url: "allarticle/allarticle_data.php?action=showdata_table&page=" +page,
            type: "POST",
            data: {
                search_name : $("#search_name").val(),
                search_name2 : $("#search_name2").val(),
                search_name3 : $("#search_name3").val()
            },
            success: function (data, status) {
                $("#show_allarticle").html(data);
            },
            error: function(data, status, error) {
                $('#show_allarticle').html('<p>An error has occurred</p>');
            }
        });
    }
</script>   
 
</body>
</html>



