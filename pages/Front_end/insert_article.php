<?php
    include('../../connect/connect.php'); 
    
    if(isset($_POST))
    {
        $chk_checked = $_POST['chk_checked'];
        $type_article_id = $_POST['type_article_id'];
        $article_name_th = $_POST['article_name_th'];
        $article_name_en = $_POST['article_name_en'];
        $abstract_th = $_POST['abstract_th'];
        $abstract_en = $_POST['abstract_en'];
        $keyword_th = $_POST['keyword_th'];	
        $keyword_en = $_POST['keyword_en'];

        $year = $_POST['year'];
        $time = $_POST['time'];
        $user_id = $_POST['user_id'];

        $attach_article = Convert_name_file($_FILES['attach_article']["name"]);

        $sql = "INSERT INTO `article`(`type_article_id`,`article_name_th`, `article_name_en`, `abstract_th`, `abstract_en`, `keyword_th`, `keyword_en`, `attach_article`, `year`, `time`, `user_id`) VALUES ( '$type_article_id','$article_name_th','$article_name_en','$abstract_th' ,'$abstract_en' ,'$keyword_th' ,'$keyword_en','$attach_article','$year','$time','$user_id' )";
        
        $result = $conn->query($sql);
        if($result){
            if(isset($_FILES['attach_article']["name"])&&($_FILES['attach_article']["name"]!="")){

                move_uploaded_file($_FILES["attach_article"]["tmp_name"],"../files_work/".$attach_article);
            }
        }

        if($chk_checked !=0)
        {
            if(isset($_SESSION["session_addUserArticle"]) && count($_SESSION["session_addUserArticle"]) > 0)
            {
                $sql_top_article ="SELECT MAX(article_id) AS t_IDtop FROM article"; // ตรวจสอบ ค่าแรก
                $result_top_article = $conn->query($sql_top_article);
                $fetch_top_article = $result_top_article->fetch_assoc(); 

                $t_top_id = $fetch_top_article['t_IDtop'];

                foreach ($_SESSION['session_addUserArticle'] as $index => $value) {
                    $sql = "INSERT INTO author (article_id, author_name) VALUES ('$t_top_id','$value')";
                    $result = $conn->query($sql);
                }
                unset($_SESSION['session_addUserArticle']);
            }
        }
        else
        {
            if(isset($_SESSION["session_addUserArticle"]))
            {
                unset($_SESSION['session_addUserArticle']);
            }
        }
 
        $conn->close();
        header('Location:article_data.php');
    }
    else
    {
        header('Location:article_data.php');
    }
?>
 
