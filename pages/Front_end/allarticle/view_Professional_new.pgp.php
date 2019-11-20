<?php  include('../../../connect/connect.php'); ?>
<?php 
$type_article_id = "";
if(isset($_REQUEST["type_article_id"]) && $_REQUEST["type_article_id"] !=""){
 $type_article_id = $_REQUEST["type_article_id"];
}
$sql = "SELECT user.user_id, user.pre_id, user.name_th, user.surname_th FROM `user` left join spacialization on user.user_id = spacialization.user_id ORDER BY `spacialization`.`type_article_id` DESC";
$query = $conn->query($sql);
$row = $query->fetch_all(MYSQLI_ASSOC);
?>
<?php for($i=0; $i<count($_SESSION['data']); $i++){ ?>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="date_article">ผู้ทรงคุณวุฒิ คนที่ 1 :</label>
            <select class="form-control a1">
                <option value="">กรุณาเลือก</option>
                <span class="a1"></span>
                <?php for($i=0; $i<count($row); $i++){ ?>
                    <option value="<?php echo $row[$i]['user_id']; ?>"><?php echo $row[$i]['pre_id']; ?> <?php echo $row[$i]['name_th']; ?> <?php echo $row[$i]['surname_th']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="date_article">อีเมล :</label>
            <input type="email" name="email" class="form-control" readonly="">
        </div>
        <div class="form-group col-md-1">
            <button type="button" class="btn btn-danger" style="margin-top: 32px;"><b>-</b></button>
        </div>
    </div>
<?php } ?>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="date_article">เพิ่มผู้ทรงคุณวุฒิ     :</label>
        <select class="form-control a1">
            <option value="">กรุณาเลือก</option>
            <span class="a1"></span>
            <?php for($i=0; $i<count($row); $i++){ ?>
                <option value="<?php echo $row[$i]['user_id']; ?>"><?php echo $row[$i]['pre_id']; ?> <?php echo $row[$i]['name_th']; ?> <?php echo $row[$i]['surname_th']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="date_article">อีเมล :</label>
        <input type="email" name="email" class="form-control" readonly="">
    </div>
    <div class="form-group col-md-1">
        <button type="button" class="btn btn-primary" style="margin-top: 32px;"><b>+</b></button>
    </div>
</div>
<script type="text/javascript">

</script>

