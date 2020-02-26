<?php  include('../../../connect/connect.php'); ?>
<?php 
$sql = sprintf("SELECT * FROM `article` left join type_article on article.type_article_id = type_article.type_article_id WHERE `article_id` = %s",GetSQLValueString($_POST['article_id'], 'int'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="article_name_th">ชื่อบทความภาษาไทย :</label>
        <input type="text" readonly="" name="article_name_th" class="form-control" id="article_name_th" value="<?php echo $row['article_name_th']; ?>">
    </div>
    <div class="form-group col-md-12">
        <label for="abstract_th">บทคัดย่อภาษาไทย :</label>
        <textarea readonly="" name="abstract_th" class="form-control" id="abstract_th" rows="5"><?php echo $row['abstract_th']; ?></textarea>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="article_name_en">ชื่อบทความภาษาอังกฤษ :</label>
        <input type="text" readonly="" name="article_name_en" class="form-control" id="article_name_en" value="<?php echo $row['article_name_en']; ?>">
    </div>
    <div class="form-group col-md-12">
        <label for="abstract_en">บทคัดย่อภาษาอังกฤษ :</label>
        <textarea readonly="" name="abstract_en" class="form-control" id="abstract_en" rows="5"><?php echo $row['abstract_en']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="type_article_name">ประเภทบทความ :</label>
    <input type="text" readonly="" class="form-control" id="type_article_name" value="<?php echo $row['type_article_name']; ?>">
    <input type="hidden" name="type_article_name" value="">
</div>
<div class="form-group">
    <label for="keyword_th">คำสำคัญภาษาไทย :</label>
    <input type="text" readonly="" name="keyword_th" class="form-control" id="keyword_th" value="<?php echo $row['keyword_th']; ?>">
</div>
<div class="form-group">
    <label for="keyword_en">คำสำคัญภาษาอังกฤษ :</label>
    <input type="text" readonly="keyword_en" name="" class="form-control" id="keyword_en" value="<?php echo $row['keyword_en']; ?>">
</div>
<p>ไฟล์บทความต้นฉบับ : <a target="_blank" href="../../files_work/<?php echo $row['attach_article']; ?>"><?php echo $row['attach_article']; ?></a> วันที่ส่งบทความ : <?php echo $row['date_article']; ?></p> 