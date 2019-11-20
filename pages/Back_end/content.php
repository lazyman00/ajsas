<?php

    if(isset($_GET["type"])){

        $type = $_GET["type"];

        if($type == "academy"){

            $name_type = "สถานศึกษา";
            include_once "academy.php";

        }
        else if($type == "department")
        {
            $name_type = "หน่วยงาน";
            include_once "department.php";
        }
        else if($type == "title_t")
        {
            $name_type = "คำนำหน้า";
            include_once "title_t.php";
        }
        else if($type == "title")
        {   
            $name_type = "คำนำหน้าทางวิชาการ";
            include_once "title.php";
        }
        else if($type == "type_article")
        {
            $name_type = "ประเภทบทความ";
            include_once "type_article.php";
        }
        else if($type == "expertise")
        {
            $name_type = "ความชำนาญ";
            include_once "expertise.php";
        }
        else if($type == "manage_user_user")
        {
            $name_type = "ผู้ใช้";
            include_once "manage_user_user.php";
        }
        else if($type == "manage_send_email_professional")
        {
            $name_type = "ส่งเมล ผู้ทรงฯ";
            include_once "manage_send_email_professional.php";
        }
    }
    else
    {
        $name_type = "หน่วยงาน";
        include_once "department.php";
    }
?>
