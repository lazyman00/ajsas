<?php
require("../phpmailer/PHPMailerAutoload.php");
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

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;

    // $gmail_username = "darktolightll@gmail.com"; // gmail ที่ใช้ส่ง
    // $gmail_password = "sunandmoon007"; // รหัสผ่าน gmail

    $gmail_username = "darktolightll@gmail.com"; // gmail ที่ใช้ส่ง
    $gmail_password = "SunandMoon00"; // รหัสผ่าน gmail

    // $gmail_username = "testwittawat@gmail.com"; // gmail ที่ใช้ส่ง
    // $gmail_password = "testwittawat2019"; // รหัสผ่าน gmail

    // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1

    $sender = "Acedemic Journal Of Science And Applied Science"; // ชื่อผู้ส่ง
    $email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
    $email_receiver = $_POST['e_eail']; // เมล์ผู้รับ *** test2wittawat@gmail.com
 
    $subject = "Register User Acedemic Journal Of Science And Applied Science"; // หัวข้อเมล์ 

    $mail->Username = $gmail_username;
    $mail->Password = $gmail_password;
    $mail->setFrom($email_sender, $sender);
    $mail->addAddress($email_receiver);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Subject = $subject;
    // $mail->SMTPDebug = 1;

    $email_content = "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Document</title>
    </head>
    <body>
        <p><b>Dear ".$name_eng." ".$last_eng."</b></p>
        <p>Your Username and Password for login to system of Acedemic Journal Of Science And Applied Science </p>
        <p>URL : http://ajsas.uru.ac.th/</p>
        <p>User is: ".$email_receiver."</p>
        <p>Pws is: <u>".$_POST['p_pass']."</u> </p> 
    </body>
    </html>";

    //  ถ้ามี email ผู้รับ
    if($email_receiver){
        $mail->msgHTML($email_content);

        if (!$mail->send()) {  // สั่งให้ส่ง email

            // กรณีส่ง email ไม่สำเร็จ
            echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
            echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
        }else{
            // กรณีส่ง email สำเร็จ
            echo "true";
        }	
    }

    $mail->smtpClose();

}
else
{
    echo "no";
}
?>