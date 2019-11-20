<?php
    include '../../connect/connect.php'; 
    $type          = $_GET["action"]; 
    $page          = $_GET["page"];
    $search_name   = $_POST['search_name'];
	

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

        if($search_name != "")
        { 

            $search_name = " AND concat(m.academe_id, ' ', m.academe_name) Like '%".$search_name."%' ";         
            
        }else{
            //echo "ไม่มีมีค่า";
            $search_name ="";
        }
    
?>
        <table width="100%" border="1" >
            <thead>
                <tr style="font-size: 12px;">
                    <th width="20">ลำดับ</th>
                    <th width="40">รหัสพนักงาน</th>
                    <th width="40">ชื่อ - นามสกุล</th>
                </tr>
            </thead>
            <tbody>
<?php
            if($search_name != ""){
                $sql = "SELECT * FROM ( 
                            SELECT ROW_NUMBER() OVER (ORDER BY m.academe_id DESC) as row, 
                            m.academe_id, m.academe_name
                            FROM academe AS m
                            WHERE m.academe_id is not null ".$search_name."
                                    ) AS tb 
                        WHERE tb.row > ".$data_first." AND tb.row <= ".$data_last;

            }else{
                $sql="SELECT academe_id FROM academe WHERE academe_id = 0 ";
                // $sql="SELECT * FROM taxs_50tavi ";
            }

            $result = $conn->query($sql); //or die($conn->error);
            $fetch = $result->fetch_assoc();
            $nom_row = $result->num_rows;

            if($nom_row > 0){

                do{ 
?>
                    <tr id="<?php echo $fetch['academe_id']; ?>" style="font-size: 12px;">
                        <td align="center"><?php echo $i; ?></td>
                        <td align="center" data-target="t_ID_personnel"><?php echo $fetch['academe_name']; ?></td>
                        <td ><?php echo $fetch['academe_name']."".$fetch['academe_name']." ".$fetch['academe_name']; ?></td> 
                    </tr>
				
<?php
                 $i++;
                }while($fetch = $result->fetch_assoc());

            }else{
?>
            <tr>
                <td align="center" colspan="10">
                    ไม่พบข้อมูลที่ท่านค้นหา
                </td>
            </tr>
<?php
                $id_card_pdf = "";

            }    
?>
            </tbody>
        </table>
<?php

        $sql_page = "SELECT count(*) AS COUNT FROM academe AS m 
        WHERE m.academe_id is not null ".$search_name."";
        
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
    <div class="col-md-12" style="<?php echo $display_n2; ?>">
        <nav aria-label="Page navigation example" >
            <ul class="pagination">
<?php
                if ($page == "1") {
?>
                    <li class="page-item " style="display: none;" ><a class="page-link" >«</a></li> 
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
                    <li class="page-item "><a class="page-link" onclick="show_date_table(1)">1</a></li>     
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
    </div>

<?php
        } 

    }
?>