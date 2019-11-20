<?php
    include '../../connect/connect.php'; 
    $type = $_GET["action"];
    
    if($type == "show_all")
    {
        // $region_id = isset($_POST['region_id']) ? $_POST['region_id'] : "";
        // $sqlArea = "SELECT 	area_id,area,region_id FROM int_area WHERE region_id='$region_id' order by area_id ASC"; 
        // $mysqlArea = $conn->query($sqlArea);
        // $Rows = $mysqlArea->num_rows;

        $sql = "SELECT * FROM type_user ";
        $result = $conn->query($sql);
        $nom_row = $result->num_rows;

        if ($nom_row > 0) {
            echo "<option value='0'>กรุณาเลือก</option>";
            
            while($fetch = $result->fetch_assoc()){
                echo "<option value=\"".$fetch['type_user_id']."\">".$fetch['type_user_name']."</option>";
            }
        }else{
            echo "<option value=\"\">ไม่พบข้อมูลที่ท่านเลือก</option>";
        }

    }
    else if($type=="show_selection") 
    {
        if(!empty($_POST['change_id1'] != 0 ))
        { 
            $change_id1 = " AND type_user_id != ".$_POST['change_id1']." ";         
        }else{
            $change_id1 ="";
        }
        if(!empty($_POST['change_id2'] != 0 ))
        { 
            $change_id2 = " AND type_user_id != ".$_POST['change_id2']." ";          
        }else{
            $change_id2 ="";
        }
        if(!empty($_POST['change_id3'] != 0 ))
        {       
            $change_id3 = " AND type_user_id != ".$_POST['change_id3']." ";   
        }else{
            $change_id3 ="";
        }

        $post_sel = $_POST['post_sel'];
        
        if($post_sel == "post_sel_1")
        {
            $sql = "SELECT * FROM type_user WHERE type_user_id !='0' $change_id1 $change_id2 $change_id3 ";
            $result = $conn->query($sql);
            $nom_row = $result->num_rows;

            if ($nom_row > 0) {
                echo "<option value='0'>กรุณาเลือก</option>";
                
                while($fetch = $result->fetch_assoc()){
                    echo "<option value=\"".$fetch['type_user_id']."\">".$fetch['type_user_name']."</option>";
                }
            }else{
                echo "<option value=\"\">ไม่พบข้อมูลที่ท่านเลือก</option>";
            }
        }
        else if($post_sel == "post_sel_2")
        {
            
            $sql = "SELECT * FROM type_user WHERE type_user_id !='0' $change_id1 $change_id2 $change_id3 ";
            $result = $conn->query($sql);
            $nom_row = $result->num_rows;

            if ($nom_row > 0) {
                echo "<option value='0'>กรุณาเลือก</option>";
                
                while($fetch = $result->fetch_assoc()){
                    echo "<option value=\"".$fetch['type_user_id']."\">".$fetch['type_user_name']."</option>";
                }
            }else{
                echo "<option value=\"\">ไม่พบข้อมูลที่ท่านเลือก</option>";
            }
        }
    }
    else
    {
        echo "<option value=\"\">ไม่พบข้อมูลที่ท่านเลือก</option>";
    }
?>