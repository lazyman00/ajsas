<?php
    $hostname_connect = "localhost";
    $username_connect = "root";
    $password_connect = "1150"; //1150
    $database_connect = "ajsas"; // ajsas
    $conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
    if ($conn->connect_errno) {
        echo $conn->connect_error;
        exit;
    }

    $conn->set_charset("utf8");	
    mysqli_query($conn, "SET NAMES UTF8");
    date_default_timezone_set('Asia/Bangkok');
    
$type = $_GET["action"];  

if($type=="da_depar"){ 

    $id_d = $_POST['id_d'];

    $id_d = ($id_d != "" ) ? $_POST['id_d'] : 0 ;

    ?>

    
    <select class="form-control form-control-sm select2_re" id="e_education" name="e_education">
        <?php
        $sql_ac = "SELECT * FROM academe where department_id = '$id_d' AND status_academe = 1";
        $result_ac = $conn->query($sql_ac);
        $fetch_ac = $result_ac->fetch_assoc();
        $nom_row_ac = $result_ac->num_rows;

        if($nom_row_ac > 0)
        {
            do{
                ?>
                <option value="<?php echo $fetch_ac['academe_id'];?>"><?php echo "<font size=1>".$fetch_ac['academe_name']."</font>";?></option>
                <?php
            }while($fetch_ac = $result_ac->fetch_assoc());
        }
        else
        {
?>
            <option value="">กรุณาเลือก</option>
<?php
        }
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
<script>

$(document).ready(function(){
    $('.select2_re').select2();
});
