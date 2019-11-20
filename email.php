<!-- <!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Document</title>
</head>
<body>
	<p><b>Dear the authors</b></p>
	<p>I believe that you would serve as an excellent reviewer of the manuscript, 'Name of title (ชื่อเรื่อง)' </p>
	<p>which has been submitted to Academic Journal of Science and Applied Science.  The submission's </p>
	<p>abstract is inserted below, and I hope that you will consider undertaking this important task for us.</p>
	<p></p>
	<p>Please log into the journal web site by 2019-10-24 (วันสุดท้ายที่เข้าระบบ) to indicate whether you will</p>
	<p>undertake the review or not, as well as to access the submission and to record your review and </p>
	<p>recommendation. After this job is done, you will receive a THB 1,000 cash prize.</p>
	<p></p>
	<p>The review itself is due 2019-10-24 (อ่านได้ถึงวันที่).  </p>
	<p>Submission URL: <a href='www.google.com'>(ลิงค์เว็บไซต์)</a></p>
	<p></p>
	<p>Assoc. Prof. Dr. Issara Inchan </p>
	<p>Faculty of Science and Technology, Uttaradit Rajabhat University.</p>
	<p>ajsas@uru.ac.th </p>
	<p></p>
	<p>'title' (ชื่อเรื่อง) </p>
	<p>Abstract (บทคัดย่อ)  </p>
	<p>................. </p>
</body>
</html> -->
<?php
$_GET["name_title"] = "ทดสอบ";
echo $email_content = "<!DOCTYPE html>
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
	<p>Please log into the journal web site by ".$_GET["name_title"]." to indicate whether you will</p>
	<p>undertake the review or not, as well as to access the submission and to record your review and </p>
	<p>recommendation. After this job is done, you will receive a THB 1,000 cash prize.</p>
	<p></p>
	<p>The review itself is due ".$_GET["name_title"].".</p>
	<p>Submission URL: <a href='".$_GET["name_title"]."'>".$_GET["name_title"]."</a></p>
	<p></p>
	<p>Assoc. Prof. Dr. Issara Inchan </p>
	<p>Faculty of Science and Technology, Uttaradit Rajabhat University.</p>
	<p>ajsas@uru.ac.th </p>
	<p></p>
	<p>'title' ".$_GET["name_title"]." </p>
	<p>Abstract ".$_GET["name_title"]."  </p>
	<p>................. </p>
</body>
</html>";
?>