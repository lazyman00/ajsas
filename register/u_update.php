<?php
$hostname_connect = "localhost";
$username_connect = "root";
$password_connect = "1150"; //1150
$database_connect = "ajsas"; // ajsas
$conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
if ($conn->connect_errno) {
    echo $conn->connect_error;
    exit;
}

$conn->set_charset("utf8");	
mysqli_query($conn, "SET NAMES UTF8");
date_default_timezone_set('Asia/Bangkok');

$type = $_GET["action"];  
if($type=="insert_register"){ 

    $position= $_POST['position'];                      // ประเภทผู้สมัคร
    $e_eail = $_POST['e_eail'];                         // E-mail
    $p_pass = md5($_POST['p_pass']);                    // Pass          

    $department= $_POST['department'];                  // หน่วยงาน
    $e_education= $_POST['e_education'];                // สถานศึกษา  
    $title_name= $_POST['title_name'];                  // คำนำนห้า

    $name_th= $_POST['name_th'];                        // ชื่อ    
    $last_th= $_POST['last_th'];                        // นาม-สกุล

    $name_eng= $_POST['name_eng'];                      // ชื่อ Eng    
    $last_eng= $_POST['last_eng'];                      // นาม-สกุล Eng 

    $position_thai= $_POST['position_thai'];            // ตำแหน่งทางวิชาการภาษาไทย
    $a_add= $_POST['a_add'];                            // ที่อยู่
    $zip_code = $_POST['zip_code'];                     // รหัสไปรษณีย์  
    $p_phone= $_POST['p_phone'];                        // เบอร์

    $sum_address = $a_add." ".$zip_code;                // รวม ที่อยู่ กับ รหัสไปรษณีย์
    
    $sql = "INSERT INTO user (type_user_id, email, password, academe_id, type_title_id, pre_id, name_th, surname_th, name_en, surname_en, address_user, phonenumber_user)
    VALUES ('$position', '$e_eail', '$p_pass', '$e_education', '$title_name', '$position_thai', '$name_th', '$last_th', '$name_eng', '$last_eng', '$sum_address', '$p_phone')";
    $result = $conn->query($sql);

    $sql_top_user ="SELECT MAX(user_id) AS t_top FROM user"; // ตรวจสอบ ค่าแรก
    $result_top_user = $conn->query($sql_top_user);
    $fetch_top_user = $result_top_user->fetch_assoc(); 

    $t_top_id = $fetch_top_user['t_top'];
    $t_type_article_id = $_POST['t_type_article_id'];   // สาขาวิชา 


    $sql_spa = "INSERT INTO spacialization (user_id, type_article_id)
    VALUES ('$t_top_id', '$t_type_article_id')";
    $result_spa = $conn->query($sql_spa);

    echo "true";
}
else
{
    echo "no";
}
?>