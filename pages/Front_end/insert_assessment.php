<?php
include ('../../connect/connect.php'); 
$user_id = $_POST['user_id'];
$article_id = $_POST['article_id'];
$assessment_id = $_POST['assessment_id'];
$comment_type = $_POST['comment_type'];
$sta_rate = '1';

$comment_eva = Convert_name_file($_FILES['comment_eva']["name"]);

$sql = "INSERT INTO `evaluation`( `article_id`,`user_id`, `assessment_id`,`comment_type`,`comment_eva`, `sta_rate`) VALUES ( '$article_id','$user_id','$assessment_id','$comment_type','$comment_eva','$sta_rate' )";

     //     exit();
$result = $conn->query($sql);
if($result){
     if(isset($_FILES['comment_eva']["name"])&&($_FILES['comment_eva']["name"]!="")){

          move_uploaded_file($_FILES["comment_eva"]["tmp_name"],"../../files_comment/".$comment_eva);
     }
}
        //   $conn->close();
header( "location: readarticle.php" );
?>

