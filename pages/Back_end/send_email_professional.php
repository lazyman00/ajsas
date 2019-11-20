
<?php
date_default_timezone_set('Asia/Bangkok');
require '../../phpmailer/PHPMailerAutoload.php';

if(isset($_POST['e_email'])){

$e_email = $_POST['e_email'];
$title_mail_name = $_POST['title_mail_name'];
$story_mail_name = $_POST['story_mail_name'];
$detail_mail_name = $_POST['detail_mail_name'];

$u_name_email     = "testwittawat@gmail.com";
$n_Pass_email     = "testwittawat2019";

$n_name_email_add = $e_email; //test2wittawat@gmail.com
$name_mail        = $e_email; // testwittawat@gmail.com
$title_main       = $title_mail_name; // ทดสอบส่งเมย์จ้าาา
$title_mail       = $story_mail_name; // เป้เองน่ะ 

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
// $mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = gethostbyname('smtp.gmail.com');
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $u_name_email;
$mail->Password = $n_Pass_email;
$mail->setFrom($name_mail, $title_mail);
//$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addAddress($n_name_email_add, 'สวัสดีน้องนิก');  //Nsupasek178
$mail->Subject = $title_main;
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = $detail_mail_name;
// $mail->addAttachment('images/phpmailer_mini.png');

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message success!";
    echo "true";
}

$mail->smtpClose();
}
else
{
    echo '<script>window.location="Error"</script>';
}
?>