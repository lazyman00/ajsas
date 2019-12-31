<?php
    include '../connect/connect.php'; 
    $type = $_GET["action"]; 

    if($type == "check_email")
    {
        $e_eail = trim($_POST['e_eail']);

        $sql = "SELECT email FROM user WHERE email = '$e_eail'";
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
   

?>