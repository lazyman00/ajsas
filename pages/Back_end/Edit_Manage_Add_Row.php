<?php
    include '../../connect/connect.php'; 
    $type=$_GET['action'];
    //echo '<pre>' .print_r(@$_SESSION["session_Add_Row"], TRUE). '</pre>';

    if($type=="show_sel") /// แสดง sel
    {
        $array_insert_sql ="";
        if(isset($_SESSION["edit_session_Add_Row"]))
        {
            $_SESSION["edit_session_Add_Row"] = array_merge($_SESSION["edit_session_Add_Row"]);
            foreach ($_SESSION['edit_session_Add_Row'] as $key12 => $value1) {  
                $n_name = $value1['Id_Add_Row'];
                $array_insert_sql .= " AND type_article_id != '$n_name' ";
            }
        }

        $sql = "SELECT type_article_id, type_article_name FROM type_article WHERE type_article_id !=0 $array_insert_sql ";
        $result = $conn->query($sql);
        $nom_row = $result->num_rows;

        if ($nom_row > 0) {
            echo "<option value=''>กรุณาเลือก</option>";
            
            while($fetch = $result->fetch_assoc()){
                echo "<option value=\"".$fetch['type_article_id']."\">".$fetch['type_article_name']."</option>";
            }
        }else{
            echo "<option value=\"\">ไม่พบข้อมูลที่ท่านเลือก</option>";
        }
        
    }
    else if($type=="d_add_row") /// จัดการตอนเพิ่ม
    {

        $name_add_row = $_POST['name_add_row'];
        
        if($name_add_row != "")
        {
            if(isset($_SESSION["edit_session_Add_Row"]))
            {
                $item_array_id = array_column($_SESSION["edit_session_Add_Row"], "Id_Add_Row");
                if(!in_array($_POST["name_add_row"], $item_array_id))
                {
                        $count = count($_SESSION["edit_session_Add_Row"]);
                        $item_array = array(
                            'Id_Add_Row'               =>     $_POST["name_add_row"]
                        );
                        $_SESSION["edit_session_Add_Row"][$count] = $item_array;
                }
                else
                {
                        echo "R_repeat";
                }
            }
            else
            { 
                $item_array = array(
                        'Id_Add_Row'               =>     $_POST["name_add_row"]
                );
                $_SESSION["edit_session_Add_Row"][0] = $item_array;
            }
        }
    }
    else if($type=="d_del_row")
    {
        $Id_Row_delete = $_POST['Id_Row_delete'];

        foreach ($_SESSION['edit_session_Add_Row'] as $key => $value) {
            if($value['Id_Add_Row']==$Id_Row_delete){
                unset($_SESSION['edit_session_Add_Row'][$key]);
            }
        }
    }
    else if($type=="add_session") // เพิ่ม session เริ่มต้น
    {
        $_SESSION["edit_session_Add_Row"]=[];
        $ID_User_edit = $_POST['ID_User_edit'];
        $sql_sel_IdUser = "SELECT * FROM spacialization where user_id = '$ID_User_edit'";
        $result_sel_IdUser = $conn->query($sql_sel_IdUser);
        $fetch_sel_IdUser = $result_sel_IdUser->fetch_assoc();
        $nom_row_sel_IdUser = $result_sel_IdUser->num_rows;
        
        if($nom_row_sel_IdUser > 0)
        {
            do{
                //echo $fetch_sel_IdUser['type_article_id']."<br>";
    
                $item_array_id = array_column($_SESSION["edit_session_Add_Row"], "Id_Add_Row");
                if(!in_array($fetch_sel_IdUser['type_article_id'], $item_array_id))
                {
                    $count = count($_SESSION["edit_session_Add_Row"]);
                    $item_array = array(
                        'Id_Add_Row'               =>     $fetch_sel_IdUser['type_article_id']
                    );
                    $_SESSION["edit_session_Add_Row"][$count] = $item_array;
                }
            }while($fetch_sel_IdUser = $result_sel_IdUser->fetch_assoc());
        }       
    }
    else if($type=="show_add_row_all") /// แสดงอย่างเดียว
    {
        if(isset($_SESSION["edit_session_Add_Row"]))
        {
            $_SESSION["edit_session_Add_Row"] = array_merge($_SESSION["edit_session_Add_Row"]);
            foreach ($_SESSION['edit_session_Add_Row'] as $key12 => $value12) {  

                $n_name = $value12['Id_Add_Row'];
                $sql_name = "SELECT type_article_id, type_article_name FROM type_article where type_article_id = '$n_name'";
                $result_name = $conn->query($sql_name);
                $fetch_name = $result_name->fetch_assoc();
                $nom_row_name = $result_name->num_rows;         
                
                echo "  <input class='sech' type='text' style='width: 260px;' readonly value=\"".$fetch_name['type_article_name']."\">&nbsp;&nbsp; <button style='margin-bottom: 5px' class='btn btn-danger' onclick='edit_delete_row(".$fetch_name['type_article_id'].")' type='button' ><i class='fa fa-times-circle'></i></button>"; 
            }
        }       
    }
    else if($type=="Unset_Session")
    {
        unset($_SESSION['edit_session_Add_Row']);
    }
    else if($type=="e_chk_add_row") // การบังคับให้เลือก add row
    {
        if(isset($_SESSION["edit_session_Add_Row"])) // ตรวจสอบ 
        {
            if(count($_SESSION["edit_session_Add_Row"]) > 0) // ถ้ามีค่า 
            {
                echo "true";
            }
            else
            {
                echo "no";
            }
        }
        else
        {
            echo "no";
        }
    }
    else
    {
        echo "N";
    }
?>