<?php 
          include ('connect.php'); 
              mysqli_set_charset($conn,"utf8");
              
            $article_id = $_POST['article_id']; 
            $type_article_id = $_POST['type_article_id']; 
            $article_name_th = $_POST['article_name_th'];
            $article_name_en = $_POST['article_name_en'];
            $abstract_th = $_POST['abstract_th'];
            $abstract_en = $_POST['abstract_en'];
            $keyword_th = $_POST['keyword_th'];	
            $keyword_en = $_POST['keyword_en'];
      
            
      
           echo $sql = "UPDATE `article` set `type_article_id`='$type_article_id',`article_name_th`='$article_name_th', `article_name_en`='$article_name_en', `abstract_th`='$abstract_th', `abstract_en`='$abstract_en', `keyword_th`='$keyword_th', `keyword_en`='$keyword_en' where `article_id` = '$article_id' ";


          $result = $conn->query($sql);
          //header('Location:data_teacher.php');
          $conn->close();
          
?>