<?php require("../../../phpmailer/PHPMailerAutoload.php");?>
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


$gmail_username = "darktolightll@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "sunandmoon007"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "Article Review Request [AJSAS]"; // ชื่อผู้ส่ง
$email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
$email_receiver = $_GET["email"]; // เมล์ผู้รับ ***

$subject = "จดหมายเทียบเชิญผู้ทรงคุณวุฒิ"; // หัวข้อเมล์


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
	<p><b>Dear the authors</b></p>
	<p>I believe that you would serve as an excellent reviewer of the manuscript, ".$_GET["name_title"]." </p>
	<p>which has been submitted to Academic Journal of Science and Applied Science.  The submission's </p>
	<p>abstract is inserted below, and I hope that you will consider undertaking this important task for us.</p>
	<p></p>
	<p>Please log into the journal web site by ".$_GET["date"]." to indicate whether you will</p>
	<p>undertake the review or not, as well as to access the submission and to record your review and </p>
	<p>recommendation. After this job is done, you will receive a THB 1,000 cash prize.</p>
	<p></p>
	<p>The review itself is due ".$_GET["date"].".</p>
	<p>Submission URL: <a href='".$_GET["url"]."'>".$_GET["link"]."</a></p>
	<p></p>
	<p>Assoc. Prof. Dr. Issara Inchan </p>
	<p>Faculty of Science and Technology, Uttaradit Rajabhat University.</p>
	<p>ajsas@uru.ac.th </p>
	<p></p>
	<p>'title' ".$_GET["name_title"]." </p>
	<p>Abstract</p>
	<p>".$_GET["name_title"]."</p>
	<p>................. </p>
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