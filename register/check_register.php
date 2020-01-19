<?php

    $hostname_connect = "localhost";
    $username_connect = "root";
    $password_connect = "1150"; //1150
    $database_connect = "ajsas"; // ajsas
    $conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
    if ($conn->connect_errno) {
        echo $conn->connect_error;
        exit;
    } else
    {
    //echo "Database Connected.";
    }

    $conn->set_charset("utf8");	
    mysqli_query($conn, "SET NAMES UTF8");
    date_default_timezone_set('Asia/Bangkok');

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