<?php
    include '../../connect/connect.php'; 
    $type = $_GET["action"]; 
    

    if($type == "check_reset_old"){

        $valid = "false"; 

        $post_reset_old = trim($_POST['reset_old']);
        $post_id_user = trim($_POST['id_reset_password_manage_user_editor']);

        $i_ID_reset_old = md5($post_reset_old); 
        $id = $post_id_user;

        $sql = "SELECT user_id, password FROM user WHERE user_id = '$id' AND password = '$i_ID_reset_old'";
        $result = $conn->query($sql);
        $nom_row = $result->num_rows;

        if($nom_row > 0)
        {

            $valid = "true";
        }
        else
        {
            
            $valid = "false";

        }

        echo $valid; 
    }
    else
    {
        $valid = "false";
    }
?>