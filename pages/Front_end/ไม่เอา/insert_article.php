<?php
          include ('connect.php'); 
		mysqli_set_charset($conn,"utf8");

          function Convert_name_file($file_name){
               $re_name=time()."_".rand(1,9999);	
               $info = pathinfo( $file_name , PATHINFO_EXTENSION ) ;
               $new_type = $re_name.".".$info ;
               return $new_type;
          }
		   
          $type_article_id = $_POST['type_article_id'];
          $article_name_th = $_POST['article_name_th'];
		$article_name_en = $_POST['article_name_en'];
          $abstract_th = $_POST['abstract_th'];
          $abstract_en = $_POST['abstract_en'];
          $keyword_th = $_POST['keyword_th'];	
          $keyword_en = $_POST['keyword_en'];

          $attach_article = Convert_name_file($_FILES['attach_article']["name"]);

       echo  $sql = "INSERT INTO `article`(`type_article_id`,`article_name_th`, `article_name_en`, `abstract_th`, `abstract_en`, `keyword_th`, `keyword_en`, `attach_article`) VALUES ( '$type_article_id','$article_name_th','$article_name_en','$abstract_th' ,'$abstract_en' ,'$keyword_th' ,'$keyword_en','$attach_article' )";
          
          
          $result = $conn->query($sql);
          if($result){
               if(isset($_FILES['attach_article']["name"])&&($_FILES['attach_article']["name"]!="")){

                    move_uploaded_file($_FILES["attach_article"]["tmp_name"],"../files_work/".$attach_article);
               }
          }
          // $conn->close();
?>
 
