<?php
    session_start();
    $type=$_GET['action'];
    if($type=="Add_send_article")
    {
        $input_addUserSend=$_POST['input_addUserSend'];
        $_SESSION['session_addUserArticle'][]=$input_addUserSend;
        $i_row=1;
        if(isset($_SESSION['session_addUserArticle']))
        {
            $_SESSION["session_addUserArticle"]= array_merge($_SESSION["session_addUserArticle"]);
        }
        foreach ($_SESSION['session_addUserArticle'] as $index => $value) {
            echo "<button style='margin-bottom: 5px;padding-left: 4px;padding-top: 2px;padding-right: 4px;padding-bottom: 2px;' class='btn btn-danger ' onclick='delete_rowNameActicle(".$index.")' type='button' ><i class='fa fa-minus-circle'></i></button>"." ".$i_row.". ".$value."<br>";
            $i_row++;
        }
    }
    else if($type=="del_send_article")
    {
        $i_row=1;
        $id_del = $_POST['id_del'];
        foreach ($_SESSION['session_addUserArticle'] as $index => $value) {
            if($index==$id_del){
                unset($_SESSION['session_addUserArticle'][$index]);
            }
        }

        foreach ($_SESSION['session_addUserArticle'] as $index => $value) {
            echo "<button style='margin-bottom: 5px;padding-left: 4px;padding-top: 2px;padding-right: 4px;padding-bottom: 2px;' class='btn btn-danger ' onclick='delete_rowNameActicle(".$index.")' type='button' ><i class='fa fa-minus-circle'></i></button>"." ".$i_row.". ".$value."<br>";
            $i_row++;
        }
    }
    else
    {
        echo "Errors.";
    }
?>