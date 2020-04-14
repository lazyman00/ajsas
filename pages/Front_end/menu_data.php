<?php
    //include '../connect/connect.php'; 
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
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php


$type = $_GET["action"];  

if($type=="position_eng")
{
    $ID_position_thai = $_POST['ID_position_thai'];
    $sql = "SELECT * FROM pre where pre_id = '$ID_position_thai'";
    $result = $conn->query($sql);
    $fetch = $result->fetch_assoc(); 
    ?>
    <input type="text" class="form-control form-control-sm" id="position_eng" name="position_eng" readonly value="<?php echo $fetch['pre_en_short']; ?>">
    <?php
}
else if($type=="check_resetPass_old")
{
    $valid = "false"; 

    $post_reset_old = trim($_POST['reset_passOld']);
    $post_id_user = trim($_POST['user_id']);

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
    echo "no";
}
?>
