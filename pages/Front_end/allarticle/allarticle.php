<?php  include('../../connect/connect.php'); ?>
<?php
$sql = "SELECT * FROM article a
left join type_article ta on ta.type_article_id = a.type_article_id";
$result = $conn->query($sql); 
?>  
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
                            <input type="text" class="form-control">
                        </div> 
                        <div class="col-md-3 mb-3">
                            <lable for="firstName">ปี</lable>
                            <input type="text" class="form-control">
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
                <!-- <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 5%">#</th>
                            <th scope="col">ชื่อบทความ</th>
                            <th scope="col" style="width: 20%">สาขา</th>
                            <th scope="col" style="width: 15%">Download</th>  
                            <th scope="col" style="width: 15%"></th>                               
                        </tr>
                        </thead>
                        <tbody>
                        <?php $selectall=1; while($row = $result->fetch_assoc()){ ?>
                          <tr>
                            <th scope="row" style="padding-bottom: 6px; padding-top: 6px;"><?php echo $selectall; ?></th>
                            <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $row["article_name_th"] ?></td>
                            <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $row["type_article_name"] ?></td>
                            <td style="padding-bottom: 6px; padding-top: 6px;"><a href="../files_work/<?php echo $row["attach_article"] ?>">ดาวน์โหลด</a></td>
                            <td style="padding-bottom: 6px; padding-top: 6px;"><button class="btn btn-outline-secondary btn-sm">send</button></td>
                        </tr>
                        <?php $selectall++; } ?>
                        </tbody>
                    </table>   
                </div>   -->
                <div id="show_allarticle" name="show_allarticle"></div>
                <?php  include('js.php'); ?>    
                    <script type="text/javascript">
                        $(document).ready(function() {
                            show_date_table(1);
                        });

                        function show_date_table(page) {

                            $.ajax({
                                url: "allarticle_data.php?action=showdata_table&page=" +page,
                                type: "POST",
                                data: {
                                    search_name : $("#search_name").val()
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


            </div>         
        </div>

    </div>



<?php  include('js.php'); ?>	

</body>
</html>



