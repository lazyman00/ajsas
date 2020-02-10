<?php  include('../../connect/connect.php'); ?>

<?php

$type          = $_GET["action"]; 
$page          = $_GET["page"];
$search_name   = $_POST['search_name'];
$search_name2  = $_POST['search_name2'];
$search_name3  = $_POST['search_name3'];

$user_id =  $_SESSION['user_id'];

$total_record  ="";
$total_page    ="";

$perpage       = 10;
$data_last     = $page * $perpage;
$data_first    = $data_last - $perpage;

if($data_last <= 10)
{
    $i = 1;
}
else 
{
    $i = $data_last-9;
}

if($type=="showdata_table"){

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;

    if(!empty($search_name))
    {
        $search_name = " AND m.article_name_th Like '%".$search_name."%' ";         
        
    }else{
        $search_name ="";
    }
    if(!empty($search_name2))
    { 
        $search_name2 = " AND m.type_article_id Like '%".$search_name2."%' ";         
    }else{
        $search_name2 ="";
    }
    if(!empty($search_name3))
    { 
        $search_name3 = " AND YEAR(m.date_article) = $search_name3  ";                 
    }else{
        $search_name3 ="";
    }

        // ORDER BY ma.id_sendMail DESC

    $sql = "SELECT * FROM (SELECT @row_number := 0) as t,
    (SELECT (@row_number:=@row_number + 1) AS row,
    m.article_id, tb.sta_rate, m.article_name_th, m.date_article, ta.type_article_name,tb.evaluation_id, m.attach_article_checked,m.time
    FROM tb_sendmail AS ma 
    left join article as m on ma.article_id = m.article_id
    left join type_article as ta on ta.type_article_id = m.type_article_id
    left join evaluation as tb on ma.user_id = tb.user_id 
    WHERE m.article_id is not null AND ma.user_id = ".$user_id." ".$search_name." ".$search_name2." ".$search_name3."
    ) AS tb 
    WHERE tb.row > ".$data_first." AND tb.row <= ".$data_last." ORDER BY row DESC"; 

    $result = $conn->query($sql); //or die($conn->error);
    $fetch = $result->fetch_assoc();
    $nom_row = $result->num_rows;

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;

    ?>
    <div class="container">    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%">#</th>
                        <th scope="col">ชื่อบทความ</th>
                        <th scope="col">สาขา</th>
                        <th scope="col" style="width: 20%">Download</th>
                        <th scope="col" style="width: 15%"><center>ประเมิน</center></th>  
                        <th scope="col" style="width: 15%" >วันที่</th>                                 
                    </tr>
                </thead>
                <tbody>
                    <?php             $i=1; 
                    if($nom_row >0)
                    {
                        do{ 
                            $select_yesr = $fetch['date_article']; 
                            $yesr_show = date("Y",strtotime($select_yesr))+543;
                            ?>                   
                            <tr>
                                <th scope="row" style="padding-bottom: 6px; padding-top: 6px;"><?php echo $i; ?></th>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["article_name_th"];  ?></td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["type_article_name"];  ?></td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><a href="../../files_work/<?php echo $fetch["attach_article_checked"]; ?>">ไฟล์บทความ</a></td>
                                <!-- href="../../files_comment/<?php// echo $data_mo['comment_eva']; ?>" -->
                                <td style="padding-bottom: 6px; padding-top: 6px;">
                                    <?php if($fetch['sta_rate']==0){ ?>
                                        <a href="assessment.php?evaluation_id=<?php echo $fetch['evaluation_id']; ?>" ><center><button class="btn btn-outline-secondary btn-sm" style="width : 100px;" >ประเมิน</button></center></a>
                                    <?php }else{ ?> 
                                        <center><button data-evaluation_id="<?php echo $fetch["evaluation_id"]; ?>" class="btn btn-outline-secondary btn-sm btnView" style="width : 100px;">การประเมิน</button></center>
                                    <?php } ?>
                                </td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo "พ.ศ. ".$yesr_show; ?></td>
                            </tr>
                            

                            <?php
                            $i++; 
                        }while($fetch = $result->fetch_assoc()); 
                    }   
                    else
                    {
                        ?>
                        <tr>
                            <td align="center" colspan="6">
                                ไม่พบข้อมูลที่ท่านค้นหา
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>   
        </div>      

        <?php


        $sql_page = "SELECT count(*) AS COUNT FROM ( 
        SELECT @row_number:=@row_number + 1 as row,
        m.article_id, m.article_name_th, m.date_article, ta.type_article_name
        FROM article AS m
        left join type_article as ta on ta.type_article_id = m.type_article_id
        WHERE m.article_id is not null ".$search_name." ".$search_name2." ".$search_name3." 
    ) AS tb ";


    $result_page = $conn->query($sql_page);
    $fetch_page = $result_page->fetch_assoc();

    $nom_row_page = $result_page->num_rows;

    if($nom_row_page > 0){
        $total_record = $fetch_page["COUNT"];
    }else{
        $total_record = 0;
    }

    if ($total_record > 0) {
        $total_page = ceil($total_record / $perpage);
        ?>
        <nav aria-label="Page navigation example" >
            <ul class="pagination">
                <?php
                if ($page == "1") {
                    ?>
                    <li class="page-item" style="display: none;"><a class="page-link" >«</a></li> 
                    <!-- style="cursor: no-drop;" -->
                    <?php
                } else {
                    ?>
                    <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page-1;?>)">«</a></li>
                    <!-- pointer -->
                    <?php
                }
                if ($total_page <= 6) {
                    for ($i=1;$i<=$total_page;$i++) {
                        if ($i == $page) {
                            ?>
                            <li class="page-item active" ><a class="page-link"><?=$i;?></a></li>
                            <!-- active -->
                            <?php
                        } else {
                            ?>
                            <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?=$i;?>)"><?=$i;?></a></li>
                            <!-- pointer -->
                            <?php
                        }
                    }
                } else if (($page+4) > $total_page) {
                    ?>
                    <li class="page-item"><a class="page-link" onclick="show_date_table(1)">1</a></li>     
                    <li class="page-item"><a class="page-link">...</a></li> 
                    <!-- disabled -->
                    <?php
                    for ($i=$total_page-4;$i<=$total_page;$i++) {
                        if ($i == $page) {
                            ?>
                            <li class="page-item active"><a class="page-link"><?php echo $i;?></a></li>
                            <!-- active -->
                            <?php
                        } else {
                            ?>
                            <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $i;?>)"><?php echo $i;?></a></li>
                            <!-- pointer -->
                            <?php
                        }
                    }
                } else {
                    if ($page < 5) {
                        for ($i=1;$i<=5;$i++) {
                            if ($i == $page) {
                                ?>
                                <li class="page-item active"><a class="page-link"><?php echo $i;?></a></li>
                                <!-- active -->
                                <?php
                            } else {
                                ?>
                                <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $i;?>)"><?php echo $i;?></a></li>
                                <!-- pointer -->
                                <?php
                            }
                        }
                        ?>
                        <li class="page-item"><a class="page-link">...</a></li> 
                        <!-- disabled -->
                        <li class="page-item"><a class="page-link" onclick="show_date_table(<?php echo $total_page;?>)"><?php echo $total_page;?></a></li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(1)">1</a></li>
                        <!-- pointer -->
                        <li class="page-item"><a class="page-link">...</a></li> 
                        <!-- disabled -->
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page-1;?>)"><?php echo $page-1?></a></li>
                        <!-- pointer -->
                        <li class="page-item active"><a class="page-link"><?php echo $page;?></a></li>
                        <!-- active -->
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page+1;?>)"><?php echo $page+1?></a></li>
                        <!-- pointer -->
                        <li class="page-item"><a class="page-link">...</a></li> 
                        <!-- disabled -->
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $total_page;?>)"><?php echo $total_page;?></a></li>
                        <!-- pointer -->
                        <?php
                    }
                }
                if ($page == $total_page) {
                    ?>
                    <li style="display: none;"><a>»</a></li>
                    <!-- disabled -->
                    <?php
                } else {
                    ?>
                    <li class="page-item"><a class="page-link" onclick="show_date_table(<?php echo $page+1;?>)">»</a></li>
                    <!-- pointer -->
                    <?php
                }
                ?>
            </ul>
        </nav>
        <?php
    } 
    ?>




</div>

<?php
}
?>


<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">การประเมิน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <span id="viewbtn"></span>


    
</div>
</div>
</div>
</div>
<script>
    $('.btnView').click(function(){
        var evaluation_id = $(this).attr('data-evaluation_id');
        $.get('editBtn.php',{ evaluation_id : evaluation_id }, function(data) {
            $('#viewbtn').html(data);
        });
        $('#exampleModal').modal('show');
    });
</script>