<?php
    include '../../connect/connect.php'; 
    $type = $_GET["action"]; 

    if($type == "Id_name_ex_and_Id_type_ac"){

        $valid = "false"; 
        $n_name_ex = trim($_POST['n_name_ex']); 
        $n_type_ac = trim($_POST['n_type_ac']); 

        $sql = "SELECT user_id, type_article_group_id FROM spacialization WHERE user_id = '$n_name_ex' and type_article_group_id = '$n_type_ac'";
        $result = $conn->query($sql);
        $nom_row = $result->num_rows;

        if($nom_row > 0)
        {

            $valid = "false";
        }
        else
        {
            
            $valid = "true";

        }

        echo $valid;

    }
    else if($type=="Edit_Id_name_ex_and_Id_type_ac")
    {
        $valid = "false"; 

        $On_Change_user_id_old         = trim($_POST['On_Change_user_id_old']); 
        $On_Change_type_article_id_old = trim($_POST['On_Change_type_article_id_old']); 

        $e_n_name_ex = trim($_POST['e_n_name_ex']); 
        $e_n_type_ac = trim($_POST['e_n_type_ac']); 

        if($On_Change_user_id_old == $e_n_name_ex && $On_Change_type_article_id_old == $e_n_type_ac)
        {
            $valid = "true"; 
        }
        else
        {
            $sql = "SELECT user_id, type_article_group_id FROM spacialization WHERE user_id = '$e_n_name_ex' and type_article_group_id = '$e_n_type_ac'";
            $result = $conn->query($sql);
            $nom_row = $result->num_rows;
    
            if($nom_row > 0)
            {
                $valid = "false";
            }
            else
            {
                $valid = "true"; 
    
            }
        }

        echo $valid;
    }
    else
    {   
        echo "no"; 
    }
    
?>