<?php
          include ('connect.php'); 
          mysqli_set_charset($conn,"utf8");
          
          $article_id = $_POST['article_id'];
          $assessment_id = $_POST['assessment_id'];
          $comment_type = $_POST['comment_type'];

          function Convert_name_file($file_name){
               $re_name=time()."_".rand(1,9999);	
               $info = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
               $new_type = $re_name.".".$info ;
               return $new_type;
          }
          $comment_eva = Convert_name_file($_FILES['comment_eva']["name"]);

         echo $sql = "INSERT INTO `evaluation`( `article_id`, `assessment_id`,`comment_type`,`comment_eva`) VALUES ( '$article_id','$assessment_id','$comment_type','$comment_eva' )";
          
     //     exit();
          $result = $conn->query($sql);
          if($result){
               if(isset($_FILES['comment_eva']["name"])&&($_FILES['comment_eva']["name"]!="")){

                    move_uploaded_file($_FILES["comment_eva"]["tmp_name"],"../files_comment/".$comment_eva);
               }
          }
        //   $conn->close();
?>
 
