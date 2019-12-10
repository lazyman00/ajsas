<?php  include('../../../connect/connect.php'); ?>
<?php require("../../../phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');

$sql_article = sprintf("SELECT * FROM `article` left join type_article on article.type_article_id = type_article.type_article_id WHERE `article_id` = %s",GetSQLValueString($_POST['article_id'], 'int'));
$query_article = $conn->query($sql_article);
$row_article = $query_article->fetch_assoc();

for($i=0; $i<count($_POST['user_id']); $i++){
	if($_POST['user_id'][$i]!=""){

		$sql = sprintf("SELECT  user.name_en, user.surname_en, pre.pre_en_short FROM `user` left join pre on user.pre_id = pre.pre_id  WHERE `user`.`user_id` = %s ",GetSQLValueString($_POST['user_id'][$i], 'text'));
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
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


$sender = "Article Review Request [AJSAS]"; // ชื่อผู้ส่ง
$email_sender = "noreply@ibsone.com"; // เมล์ผู้ส่ง 
$email_receiver = $_POST["email"][$i]; // เมล์ผู้รับ ***
// $email_receiver = "darktolightll@gmail.com";

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
<p><b>Dear ".$row['pre_en_short']." ".$row['name_en']." ".$row['surname_en']."</b></p>
<p style='text-indent: 50px;' >I believe that you would serve as an excellent reviewer of the manuscript, ".$row_article['article_name_en']." </p>
<p>which has been submitted to Academic Journal of Science and Applied Science.  The submission's abstract is</p>
<p>inserted below, and I hope that you will consider undertaking this important task for us.</p>

<p style='text-indent: 50px;'>Please log into the journal web site by ".$row_article['date_article']." to indicate whether you will undertake the</p>
<p>review or not, as well as to access the submission and to record your review and recommendation. After this job</p>
<p>is done, you will receive a THB 1,000 cash prize.</p>

<p style='text-indent: 50px;'>The review itself is due ".$row_article['date_article'].".</p>
<p style='text-indent: 50px;'>Submission URL: <a href='http://localhost/ajsas/rechack_email.php?u=".$_POST['user_id'][$i]."&e=".$row_article['article_name_en']."&t=".$row_article['article_name_th']."&i=".$row_article['article_id']."'>>> ระบบวารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์ <<</a></p>
<br/>
<p>Assoc. Prof. Dr. Issara Inchan </p>
<p>Faculty of Science and Technology, Uttaradit Rajabhat University.</p>
<p>ajsas@uru.ac.th </p>
<br/>
<p>".$row_article['article_name_en']." </p>
<p>".$row_article['abstract_en']."</p>
<p>................. </p>
</body>
</html>";

//  ถ้ามี email ผู้รับ
if($email_receiver){
	$mail->msgHTML($email_content);

	if ($mail->send()) {  
		$sql = sprintf("INSERT INTO `tb_sendmail`(`user_id`, `article_id`) VALUES (%s,%s)",
			GetSQLValueString($_POST['user_id'][$i],'text'),
			GetSQLValueString($row_article['article_id'],'text'));
		$query = $conn->query($sql);
	}
	
}

$mail->smtpClose();

}
}
// echo "ระบบได้ส่งข้อความไปเรียบร้อย";
?>