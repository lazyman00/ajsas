<?php require("../phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
// $mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

//$Get_Gmai_lUser = $_POST[''];
//$Get_Gmai_lPass = $_POST[''];

$gmail_username = "darktolightll@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "sunandmoon007"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "Article Review Request [AJSAS]"; // ชื่อผู้ส่ง
$email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
$email_receiver = "test2wittawat@gmail.com"; // เมล์ผู้รับ ***

$subject = "จดหมายการสมัครสมาชิกผู้ส่งบทความ"; // หัวข้อเมล์


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
	<p><b>Hello '".$email_receiver."'</b></p>
    <p>Username is: ".$email_receiver."</p>
    <p>Password is: <u>123456</u> </p>
    <p>Can you Username and Password in http://ajsas.uru.ac.th/ system to next times thank you. </p>
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
		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
	}	
}

$mail->smtpClose();


?>