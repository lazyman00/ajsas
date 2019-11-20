<?php

include '../../connect/connect.php'; 

$type = $_GET["action"];  
if($type=="insert_ac"){ 

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
else if($type=="edit_type_ac")
{
    $e_name_type = $_POST['e_name_type'];
    $id_edit = $_POST['id_edit'];

    $sql 	= "UPDATE type_article SET type_article_name = '$e_name_type' WHERE type_article_id = '$id_edit'";
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
else if($type=="insert_manage_user_user")
{
    $add_email = $_POST['add_email'];
    $add_pass = md5($_POST['add_pass']);
    $add_pre_name = $_POST['add_pre_name'];
    $add_title_name = $_POST['add_title_name'];
    $add_name_thai = $_POST['add_name_thai'];
    $add_last_names_thai = $_POST['add_last_names_thai'];
    $add_name_eng = $_POST['add_name_eng'];
    $add_last_names_eng = $_POST['add_last_names_eng'];
    $add_academe = $_POST['add_academe'];
    $add_phone = $_POST['add_phone'];
    $add_address = $_POST['add_address'];

    $sql = "INSERT INTO user (type_user_id, email, password, academe_id, type_title_id, pre_id, name_th, surname_th, name_en, surname_en, address_user, phonenumber) VALUES 
    ('1', '$add_email', '$add_pass', '$add_academe', '$add_title_name', '$add_pre_name', '$add_name_thai', '$add_last_names_thai', '$add_name_eng', '$add_last_names_eng', '$add_address', '$add_phone')";
    $result = $conn->query($sql);

    echo "true";
}
else if($type=="edit_manage_user_user")
{
    $type_post_reset_pass = $_POST['type_post_reset_pass'];
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
    $edit_radio_status = $_POST['edit_radio_status'];

    if($type_post_reset_pass == "normal")
    {
        $sql = "UPDATE user SET 
        email = '$edit_email',
        academe_id = '$edit_academe',
        type_title_id = '$edit_title_name',
        pre_id = '$edit_pre_name',
        name_th = '$edit_name_thai',
        surname_th = '$edit_last_names_thai',
        name_en = '$edit_name_eng',
        surname_en = '$edit_last_names_eng',
        address_user = '$edit_address',
        phonenumber_user = '$edit_phone',
        status_user = '$edit_radio_status'
        WHERE user_id = '$id_edit_manage_user'";
    }
    else if($type_post_reset_pass == "auto_reset_pass") // MD5 
    {
        $set_pass = "1234";
        $reset_pass_auto = md5($set_pass);

        $sql = "UPDATE user SET 
        email = '$edit_email',
        password = '$reset_pass_auto',
        academe_id = '$edit_academe',
        type_title_id = '$edit_title_name',
        pre_id = '$edit_pre_name',
        name_th = '$edit_name_thai',
        surname_th = '$edit_last_names_thai',
        name_en = '$edit_name_eng',
        surname_en = '$edit_last_names_eng',
        address_user = '$edit_address',
        phonenumber_user = '$edit_phone',
        status_user = '$edit_radio_status'
        WHERE user_id = '$id_edit_manage_user'";
        
    }
    else if($type_post_reset_pass == "determine") // MD5
    {
        $edit_pass = $_POST['edit_pass'];
        $code_pass_md5 = md5($edit_pass);

        $sql = "UPDATE user SET 
        email = '$edit_email',
        password = '$code_pass_md5',
        academe_id = '$edit_academe',
        type_title_id = '$edit_title_name',
        pre_id = '$edit_pre_name',
        name_th = '$edit_name_thai',
        surname_th = '$edit_last_names_thai',
        name_en = '$edit_name_eng',
        surname_en = '$edit_last_names_eng',
        address_user = '$edit_address',
        phonenumber_user = '$edit_phone',
        status_user = '$edit_radio_status'
        WHERE user_id = '$id_edit_manage_user'";
    }

    $result = $conn->query($sql);

    echo "true";
}
else
{
    echo "no";
}
?>