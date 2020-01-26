<?php 
include('../../connect/connect.php'); 
mysqli_set_charset($conn,"utf8");

$type = $_GET["action"];
if($type == "save_editDataUser") 
{
    // $type_title_id = $_POST['type_title_id'];
    $user_id = $_POST['user_id']; 
    $position_thai = $_POST['position_thai'];

    $name_th = $_POST['name_th'];
    $surname_th = $_POST['surname_th'];

    $name_en = $_POST['name_en'];
    $surname_en = $_POST['surname_en'];	

    $address_user = $_POST['address_user'];
    $phonenumber_user = $_POST['phonenumber_user'];
    
    $sql = "UPDATE `user` 
    set `pre_id`='$position_thai', 
    `name_th`='$name_th', 
    `surname_th`='$surname_th', 
    `name_en`='$name_en',  
    `surname_en`='$surname_en',
    `address_user`='$address_user', 
    `phonenumber_user`='$phonenumber_user' 
    where `user_id` = '$user_id' ";
    $result = $conn->query($sql);

    if($result==true)
    {
      echo "true";
    }
    else
    {
      echo "No_UPDATE";
    }
  
  $conn->close();
} 
else
{
  echo "No_Post_action";
}
?>