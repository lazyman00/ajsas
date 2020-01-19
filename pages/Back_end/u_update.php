<?php
include '../../connect/connect.php'; 

$type = $_GET["action"]; 
if($type=="edit_data_user") 
{
    $id = $_POST['id'];

    $editor_edit_email = $_POST['editor_edit_email'];
    $editor_edit_pre_name = $_POST['editor_edit_pre_name'];
    $editor_edit_title_name = $_POST['editor_edit_title_name'];
    $editor_edit_name_thai = $_POST['editor_edit_name_thai']; 
    $editor_edit_last_names_thai = $_POST['editor_edit_last_names_thai'];
    $editor_edit_name_eng = $_POST['editor_edit_name_eng'];
    $editor_edit_last_names_eng = $_POST['editor_edit_last_names_eng'];
    $editor_edit_type_user = $_POST['editor_edit_type_user'];
    $editor_edit_academe = $_POST['editor_edit_academe'];
    $editor_edit_phone = $_POST['editor_edit_phone'];
    $editor_edit_address = $_POST['editor_edit_address'];

        $sql = "UPDATE user SET 
        type_user_id= '$editor_edit_type_user',
        email = '$editor_edit_email',
        academe_id = '$editor_edit_academe',
        type_title_id = '$editor_edit_title_name',
        pre_id = '$editor_edit_pre_name',
        name_th = '$editor_edit_name_thai',
        surname_th = '$editor_edit_last_names_thai',
        name_en = '$editor_edit_name_eng',
        surname_en = '$editor_edit_last_names_eng',
        address_user = '$editor_edit_address',
        phonenumber_user = '$editor_edit_phone'
        WHERE user_id = '$id'";
    
        $result = $conn->query($sql);

    echo "true";
}
else if($type=="reset_password_user_editor")
{
    $id_reset_password_manage_user_editor = $_POST['id_reset_password_manage_user_editor'];
    $new_reset_password_editor = md5($_POST['new_reset_password_editor']);

    $sql = "UPDATE user SET password = '$new_reset_password_editor' WHERE user_id = '$id_reset_password_manage_user_editor'";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="insert_ac"){ 

    $id_depart = $_POST['id_depart'];
    $ac_name = $_POST['ac_name'];
    $ac_add = $_POST['ac_add'];
    $ac_phone = $_POST['ac_phone'];

    $sql = "INSERT INTO academe (academe_name, address, phonenumber, status_academe, department_id) VALUES ('$ac_name', '$ac_add', '$ac_phone', 1, '$id_depart')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="insert_title")
{
    $title_thai_full = $_POST['title_thai_full'];
    $title_en_full   = $_POST['title_en_full'];
    $title_thai      = $_POST['title_thai'];
    $title_en        = $_POST['title_en'];

    $sql = "INSERT INTO pre (pre_th, pre_en, pre_th_short, pre_en_short) VALUES ('$title_thai_full', '$title_en_full', '$title_thai', '$title_en')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="insert_type_ac")
{

    $name_type = $_POST['name_type'];

    $sql = "INSERT INTO type_article (type_article_name) VALUES ('$name_type')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="insert_expertise")
{
    $n_name_ex = $_POST['n_name_ex'];
    $n_type_ac = $_POST['n_type_ac'];

    $sql = "INSERT INTO spacialization (user_id, type_article_group_id) VALUES ('$n_name_ex', '$n_type_ac')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="edit_ac")
{
    $edit_id_depart = $_POST['edit_id_depart'];
    $edit_ac_name = $_POST['edit_ac_name'];
    $edit_ac_add = $_POST['edit_ac_add'];
    $edit_ac_phone = $_POST['edit_ac_phone'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE academe SET academe_name = '$edit_ac_name', address = '$edit_ac_add', phonenumber = '$edit_ac_phone', department_id = '$edit_id_depart' WHERE academe_id = '$id_edit'";
    $result = $conn->query($sql);
    
    echo "true";
}
else if($type == "edit_change_status_academy")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE academe SET status_academe = '$status_num' WHERE academe_id = '$id'";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="edit_title")
{

    $e_title_thai_full = $_POST['e_title_thai_full'];
    $e_title_en_full = $_POST['e_title_en_full'];
    $e_title_thai = $_POST['e_title_thai'];
    $e_title_en = $_POST['e_title_en'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE pre SET 

        pre_th = '$e_title_thai_full', 
        pre_en = '$e_title_en_full', 
        pre_th_short = '$e_title_thai',
        pre_en_short = '$e_title_en'

    WHERE pre_id = '$id_edit'";

    $result = $conn->query($sql);
    
    echo "true";
}
else if($type=="edit_change_status_title")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE pre SET status_pre = '$status_num' WHERE pre_id = '$id'";
    $result = $conn->query($sql);

    echo "true";
}
else if($type =="edit_change_status_title_t")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE type_title SET status_type_title = '$status_num' WHERE type_title_id = '$id'";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="edit_type_ac")
{
    $e_name_type = $_POST['e_name_type'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE type_article SET type_article_name = '$e_name_type' WHERE type_article_id = '$id_edit'";
    $result = $conn->query($sql);
    
    echo "true";
}
else if($type=="edit_change_status_type_article")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE type_article SET status_type_article = '$status_num' WHERE type_article_id = '$id'";
    $result = $conn->query($sql);
    echo "true";
}
else if($type=="edit_exp")
{
    $e_n_name_ex = $_POST['e_n_name_ex'];
    $e_n_type_ac = $_POST['e_n_type_ac'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE spacialization SET user_id = '$e_n_name_ex', type_article_group_id = '$e_n_type_ac' WHERE spacialization_id = '$id_edit'";
    $result = $conn->query($sql);
    
    echo "true";
}
else if($type=="edit_change_status_spacialization")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE spacialization SET status_spacialization = '$status_num' WHERE spacialization_id = '$id'";
    $result = $conn->query($sql);
    echo "true";
}
else if($type=="insert_title_t") 
{
    $name_type_title = $_POST['name_type_title'];

    $sql = "INSERT INTO type_title (type_title_name) VALUES ('$name_type_title')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="edit_title_t")
{
    $e_name_type_title = $_POST['e_name_type_title'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE type_title SET type_title_name = '$e_name_type_title' WHERE type_title_id = '$id_edit'";
    $result = $conn->query($sql);
    echo "true";
}
else if($type=="insert_department")
{
    $name_department = $_POST['name_department'];
    $sql = "INSERT INTO department (department_name) VALUES ('$name_department')";
    $result = $conn->query($sql);
    echo "true";
}
else if($type=="edit_department")
{
    $e_name_department = $_POST['e_name_department'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE department SET department_name = '$e_name_department' WHERE department_id = '$id_edit'";
    $result = $conn->query($sql);
    
    echo "true";
}
else if($type =="edit_change_department")
{
    $id = $_POST['id'];
    $status_num = $_POST['status_num'];

    $sql 	= "UPDATE department SET status_department = '$status_num' WHERE department_id = '$id'";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="insert_manage_user_user")
{
    if($_POST['add_pass'] !="")
    {
        $add_email = $_POST['add_email'];
        $add_pass = md5($_POST['add_pass']);
        $add_pre_name = $_POST['add_pre_name'];
        $add_title_name = $_POST['add_title_name'];
        $add_name_thai = $_POST['add_name_thai'];
        $add_last_names_thai = $_POST['add_last_names_thai'];
        $add_name_eng = $_POST['add_name_eng'];
        $add_last_names_eng = $_POST['add_last_names_eng'];
        $add_type_user = $_POST['add_type_user'];
        $add_academe = $_POST['add_academe'];
        $add_phone = $_POST['add_phone'];
        $add_address = $_POST['add_address'];

        $sql = "INSERT INTO user (type_user_id, email, password, academe_id, type_title_id, pre_id, name_th, surname_th, name_en, surname_en, address_user, phonenumber_user) VALUES 
        ('$add_type_user', '$add_email', '$add_pass', '$add_academe', '$add_title_name', '$add_pre_name', '$add_name_thai', '$add_last_names_thai', '$add_name_eng', '$add_last_names_eng', '$add_address', '$add_phone')";
        $result = $conn->query($sql);

        echo "true";
    }
    else
    {
        $add_email = $_POST['add_email'];
        $add_pre_name = $_POST['add_pre_name'];
        $add_title_name = $_POST['add_title_name'];
        $add_name_thai = $_POST['add_name_thai'];
        $add_last_names_thai = $_POST['add_last_names_thai'];
        $add_name_eng = $_POST['add_name_eng'];
        $add_last_names_eng = $_POST['add_last_names_eng'];
        $add_type_user = $_POST['add_type_user'];
        $add_academe = $_POST['add_academe'];
        $add_phone = $_POST['add_phone'];
        $add_address = $_POST['add_address'];

        $sql = "INSERT INTO user (type_user_id, email, academe_id, type_title_id, pre_id, name_th, surname_th, name_en, surname_en, address_user, phonenumber_user) VALUES 
        ('$add_type_user', '$add_email', '$add_academe', '$add_title_name', '$add_pre_name', '$add_name_thai', '$add_last_names_thai', '$add_name_eng', '$add_last_names_eng', '$add_address', '$add_phone')";
        $result = $conn->query($sql);

        if(isset($_SESSION["session_Add_Row"])) // ตรวจสอบ 
        {
            if(count($_SESSION["session_Add_Row"]) > 0) // ถ้ามีค่า 
            {
                $sql_top_user ="SELECT MAX(user_id) AS t_top FROM user"; // ตรวจสอบ ค่าแรก
                $result_top_user = $conn->query($sql_top_user);
                $fetch_top_user = $result_top_user->fetch_assoc(); 

                $t_top_id = $fetch_top_user['t_top'];

                foreach ($_SESSION['session_Add_Row'] as $key_se => $value_se) {  

                    $inser_name_ex = $value_se['Id_Add_Row'];
                    $sql_int = "INSERT INTO spacialization (user_id, type_article_id) VALUES ('$t_top_id', '$inser_name_ex')";
                    $result_int = $conn->query($sql_int);
                    
                }
            }
        }
        unset($_SESSION['session_Add_Row']);

        echo "true";
    }
}
else if($type=="edit_manage_user_user")
{
    $id_edit_manage_user = $_POST['id_edit_manage_user'];

    $edit_email = $_POST['edit_email'];
    $edit_pre_name = $_POST['edit_pre_name'];
    $edit_title_name = $_POST['edit_title_name'];
    $edit_name_thai = $_POST['edit_name_thai']; 
    $edit_last_names_thai = $_POST['edit_last_names_thai'];
    $edit_name_eng = $_POST['edit_name_eng'];
    $edit_last_names_eng = $_POST['edit_last_names_eng']; 
    $edit_academe = $_POST['edit_academe'];
    $edit_phone = $_POST['edit_phone'];
    $edit_address = $_POST['edit_address'];
    $edit_type_user = $_POST['edit_type_user'];

    $sql = "UPDATE user SET 
    type_user_id= '$edit_type_user',
    email = '$edit_email',
    academe_id = '$edit_academe',
    type_title_id = '$edit_title_name',
    pre_id = '$edit_pre_name',
    name_th = '$edit_name_thai',
    surname_th = '$edit_last_names_thai',
    name_en = '$edit_name_eng',
    surname_en = '$edit_last_names_eng',
    address_user = '$edit_address',
    phonenumber_user = '$edit_phone'
    WHERE user_id = '$id_edit_manage_user'";

    $result = $conn->query($sql);
        
    $sql_arr = "SELECT * FROM spacialization where user_id = '$id_edit_manage_user'";
    $result_arr = $conn->query($sql_arr);
    $fetch_arr = $result_arr->fetch_assoc();    

    $array_add = array();
    $array_del = array();

    do{ $array_del[] = $fetch_arr['type_article_id']; }while($fetch_arr = $result_arr->fetch_assoc());

    foreach ($_SESSION['edit_session_Add_Row'] as $key => $value) { $array_add[] = $value['Id_Add_Row']; }
       
    $sum_data_add = array_diff($array_add, $array_del); // add
    $sum_data_del = array_diff($array_del, $array_add); // del

    foreach ($sum_data_add as $key_add) // active add
    { 
        $sql_add_spa = "INSERT INTO spacialization (user_id, type_article_id) VALUES ('$id_edit_manage_user', '$key_add')";
        $result_add_spa = $conn->query($sql_add_spa);
    }
    foreach ($sum_data_del as $key_del) // active del
    { 
        $sql_del_spa ="DELETE FROM spacialization WHERE user_id = '$id_edit_manage_user' and type_article_id = '$key_del' ";
        $result_del_spa = $conn->query($sql_del_spa);
    }
    echo "true";
}
else if($type == "edit_status_manage_user_user")
{
    $id_edit_status_manage_user = $_POST['id_edit_status_manage_user'];
    $hidden_id_status_user = $_POST['hidden_id_status_user'];

    $sql = "UPDATE user SET status_user = '$id_edit_status_manage_user' WHERE user_id = '$hidden_id_status_user'";
    $result = $conn->query($sql);
        
    echo "true";
}
else if($type == "reset_password_user")
{
    $id_reset_password_manage_user = $_POST['id_reset_password_manage_user'];
    $new_reset_password = md5($_POST['new_reset_password']);

    $sql = "UPDATE user SET password = '$new_reset_password' WHERE user_id = '$id_reset_password_manage_user'";
    $result = $conn->query($sql);

    echo "true";
}
else
{
    echo "no";
}
?>