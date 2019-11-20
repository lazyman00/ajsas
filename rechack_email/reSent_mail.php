<?php  include('../connect/connect.php'); ?>
<?php require("../phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');




$sql = sprintf("SELECT  user.name_en, user.surname_en, user.email, pre.pre_en_short FROM `user` left join pre on user.pre_id = pre.pre_id  WHERE `user`.`user_id` = %s ",GetSQLValueString($_POST['u'], 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
		// $mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "darktolightll@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "SunandMoon00"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "Article Review Acknowledgement"; // ชื่อผู้ส่ง
$email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
$email_receiver = $row["email"]; // เมล์ผู้รับ ***
// $email_receiver = "darktolightll@gmail.com";

$subject = "รับทราบบทความ"; // หัวข้อเมล์


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
<p><b>Dear ".$row['pre_en_short']." ".$row['name_en']." ".$row['surname_en']."</b></p>
<p style='text-indent: 50px;' >Thank you for completing the review of the submission, ".$_POST['e']." for Academic Journal</p>
<p>of Science and Applied Science. We appreciate your contribution to the quality of the work that we</p>
<p>publish.</p>

<p style='text-indent: 50px;'>Assoc. Prof. Dr. Issara Inchan </p>
<p>Faculty of Science and Technology, Uttaradit Rajabhat University, Uttaradit Thailand 53000.</p>
<p>ajsas@uru.ac.th </p>
<p>...................................................................................................... </p>
</body>
</html>";

//  ถ้ามี email ผู้รับ
if($email_receiver){
	$mail->msgHTML($email_content);
	$mail->send();	
}

$mail->smtpClose();


// echo "ระบบได้ส่งข้อความไปเรียบร้อย";
?>