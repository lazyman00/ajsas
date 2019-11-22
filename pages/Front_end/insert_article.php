<?php
          include('../../connect/connect.php'); 
		   
          $type_article_id = $_POST['type_article_id'];
          $article_name_th = $_POST['article_name_th'];
		$article_name_en = $_POST['article_name_en'];
          $abstract_th = $_POST['abstract_th'];
          $abstract_en = $_POST['abstract_en'];
          $keyword_th = $_POST['keyword_th'];	
          $keyword_en = $_POST['keyword_en'];

          $attach_article = Convert_name_file($_FILES['attach_article']["name"]);

          $sql = "INSERT INTO `article`(`type_article_id`,`article_name_th`, `article_name_en`, `abstract_th`, `abstract_en`, `keyword_th`, `keyword_en`, `attach_article`) VALUES ( '$type_article_id','$article_name_th','$article_name_en','$abstract_th' ,'$abstract_en' ,'$keyword_th' ,'$keyword_en','$attach_article' )";
          
          
          $result = $conn->query($sql);
          if($result){
               if(isset($_FILES['attach_article']["name"])&&($_FILES['attach_article']["name"]!="")){

                    move_uploaded_file($_FILES["attach_article"]["tmp_name"],"../files_work/".$attach_article);
               }
          }
          header('Location:article_data.php');
          $conn->close();
?>
 
