<?php
    include '../connect/connect.php';

    $type = $_GET["action"];  

    if($type=="da_depar"){ 

        $id_d = $_POST['id_d'];

        $id_d = ($id_d != "" ) ? $_POST['id_d'] : 0 ;

?>
        <select class="form-control form-control-sm" id="e_education" name="e_education">
            <option value="0">กรุณาเลือก</option>
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
