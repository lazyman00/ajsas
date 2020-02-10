<?php  include('../../connect/connect.php'); ?>
<?php 
if(isset($_POST['mm']) && $_POST['mm']=="add_journal"){
    $sql = "SELECT `id_collect` FROM `tb_collect` ORDER BY id_collect DESC";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    
    $cl1 = $row['id_collect']+1;

    $cl2 = "";
    if(isset($_POST['name_collect']) && $_POST['name_collect']!=""){
        $cl2 = $_POST['name_collect'];
    }
    $cl3 = "";
    if(isset($_POST['y_collect']) && $_POST['y_collect']!=""){
        $cl3 = $_POST['y_collect'];
    }
    $cl4 = "";
    if(isset($_POST['time_collect']) && $_POST['time_collect']!=""){
        $cl4 = $_POST['time_collect'];
    }


    $sql = sprintf("INSERT INTO `tb_collect`(`id_collect`, `name_collect`, `y_collect`, `time_collect`) VALUES (%s,%s,%s,%s)",
        GetSQLValueString($cl1, 'text'),
        GetSQLValueString($cl2, 'text'),
        GetSQLValueString($cl3, 'text'),
        GetSQLValueString($cl4, 'text'),
        GetSQLValueString($cl6, 'text'));

    $query = $conn->query($sql);
    if($query){

        for($i=0; $i<count($_POST['page']); $i++){
            $cl5 = "";
            if(isset($_POST['page'][$i]) && $_POST['page'][$i]!=""){
                $cl5 = $_POST['page'][$i];
            }
            $cl7 = "";
            if(isset($_POST['article_id'][$i]) && $_POST['article_id'][$i]!=""){
                $cl7 = $_POST['article_id'][$i];
            }
            $sql = sprintf("INSERT INTO `tb_collect_list`(`page`,`article_id`, `id_collect`) VALUES (%s,%s,%s)",
                GetSQLValueString($cl5, 'text'),
                GetSQLValueString($cl7, 'text'),
                GetSQLValueString($cl1, 'text'));
            $query = $conn->query($sql); 
            if($query){    
                $sql = sprintf("UPDATE `article` SET `sta_add_collect`='1', `sta_work`='5' WHERE `article_id`=%s",
                    GetSQLValueString($cl7, 'text'));
                $query = $conn->query($sql); 
            }
        }
    }



}
?>
<?php 
$_SESSION["add"] = array(); 
?>
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
    .badge-light{
        background-color: #007bff;
        color: #fff;
    }
    .badge {
        display: inline-block;
        padding: 0.4em 0.9em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 50rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    @media (min-width: 992px){
       .modal-lg, .modal-xl 
       {
        max-width: 850px;
    }
}
.error{
    color: red;
}

</style>
<body class="bg-light">
    <?php // include('menu.php'); ?>
    <?php // include('menu_index.php'); ?>
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
                        <li class="breadcrumb-item active" aria-current="page"><b>วารสาร</b></li>
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
                url: "collect/collect_data.php?action=showdata_table&page=" +page,
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



