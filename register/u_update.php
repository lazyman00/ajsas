<?php
include './config/connect.php'; 

$type = $_GET["action"];  
if($type=="insert_register"){ 

    $position= $_POST['position'];
    $e_eail = $_POST['e_eail'];
    $p_pass = $_POST['p_pass'];              
    // $conf_pass = $_POST['conf_pass'];           

    $department= $_POST['department'];
    $e_education= $_POST['e_education'];         
    $title_name= $_POST['title_name'];  

    $name_th= $_POST['name_th'];            
    $last_th= $_POST['last_th'];

    $name_eng= $_POST['name_eng'];           
    $last_eng= $_POST['last_eng']; 

    $position_thai= $_POST['position_thai'];      
    $a_add= $_POST['a_add'];         
    $zip_code = $_POST['zip_code'];        
    $p_phone= $_POST['p_phone'];     
    
    $sql = "INSERT INTO user (type_user_id, email, password, academe_id, type_article, pre_id, name_th, surname_th, name_en, surname_en, address, zipcode, phonenumber)
    VALUES ('$position', '$e_eail', '$p_pass', '1', '$title_name', '$position_thai', '$name_th', '$last_th', '$name_eng', '$last_eng', '$a_add', '$zip_code', '$p_phone')";
    
    $result = $conn->query($sql);

    echo "true";
}
else
{
    echo "no";
}
?>