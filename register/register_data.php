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

if($type=="da_depar"){ 

    $id_d = $_POST['id_d'];

    $id_d = ($id_d != "" ) ? $_POST['id_d'] : 0 ;

    ?>
    <select class="form-control form-control-sm" id="e_education" name="e_education">
        <option value="">กรุณาเลือก</option>
        <?php
        $sql_ac = "SELECT * FROM academe where department_id = '$id_d'";
        $result_ac = $conn->query($sql_ac);
        $fetch_ac = $result_ac->fetch_assoc();

        do{
            ?>
            <option value="<?php echo $fetch_ac['academe_id'];?>"><?php echo $fetch_ac['academe_name'];?></option>
            <?php
        }while($fetch_ac = $result_ac->fetch_assoc());
        ?>
    </select>
    <?php 
}
else if($type=="position_eng")
{
    $id_d = $_POST['id_d'];
    $sql = "SELECT * FROM pre where pre_id = '$id_d'";
    $result = $conn->query($sql);
    $fetch = $result->fetch_assoc();
    ?>
    <input type="text" class="form-control form-control-sm" id="position_eng" name="position_eng" readonly value="<?php echo $fetch['pre_en']; ?>">
    <?php
}
else{
    echo "no";
}
?>
