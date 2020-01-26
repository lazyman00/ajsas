<?php  include('../../../connect/connect.php'); ?>
<?php 

if(isset($_POST['link']) && $_POST['link']=="edit"){
	$sql = sprintf("SELECT article_id FROM `tb_collect_list` WHERE `id_collect` = %s",GetSQLValueString($_POST['id_collect'], 'text'));
	$query = $conn->query($sql);
	while ($row = $query->fetch_assoc()) {
		array_push($_SESSION["add"],$row['article_id']);
	}
}



if(isset($_POST['d']) && $_POST['d']!=""){
	$key = array_search($_POST['d'], $_SESSION["add"]);
	unset($_SESSION["add"][$key]);
}

if(isset($_POST['a']) && $_POST['a']!=""){
	array_push($_SESSION["add"],$_POST['a']);
}

$num = count($_SESSION["add"]);
array_splice($_SESSION["add"], $num, 1);
?>
<?php // print_r($_SESSION["add"]); ?>
<?php 
$text = "(";
if(empty($_SESSION["add"])){
	$text.= '0';
}else{
	$text.= implode(",",$_SESSION["add"]);
	
}
$text.= ")";
// print_r($_SESSION['add']);
?>
<?php 
$sql = sprintf("SELECT * FROM `article` left join  type_article on article.type_article_id = type_article.type_article_id WHERE article.`article_id` IN $text and article.sta_work >= '4'");
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$numrow = $query->num_rows;
?>
<b>บทความที่ต้องการรวมเล่ม : </b>
<style type="text/css">
	.card-header{
		padding-top: 3px;
		padding-bottom: 3px;
	}
</style>
<div class="card text-white border-primary">
	<div class="card-header bg-primary"></div>
	
	<table class="table table-sm">
		<thead>
			<tr>
				<th scope="col" width="20">#</th>
				<th scope="col">ชื่อบทความ</th>
				<th scope="col">สาขา</th>
				<th scope="col">ปี</th>
				<th scope="col" width="20">Download</th>
				<th scope="col" width="200"><center>หน้าที่</center></th>
				<th scope="col" width="20">สถานะ</th>
			</tr>
		</thead>
		<tbody>
			<?php if($numrow>0){ ?>
				<?php $i=1; do{ ?> 
					<tr>
						<td scope="row"><?php echo $i; ?></td>
						<td><?php  echo $row['article_name_th']; ?></td>
						<td><?php  echo $row['type_article_name']; ?></td>
						<td><?php  echo $row['year']; ?></td>
						<td><?php  echo $row['year']; ?></td>
						<td align="center">
							<input type="text" class="form-control" name="page[]" value="">
							<input type="hidden" name="article_id[]" value="<?php echo $row['article_id']; ?>">
						</td>
						<td align="center">

							<button type="button" data-d="<?php echo $row['article_id']; ?>" class="badge badge-danger delete"><i class="fas fa-minus"></i></button>
						</td>
					</tr>
					<?php $i++; }while($row = $query->fetch_assoc()); ?>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		$('.delete').click(function(event) {
			var type_article_id = '<?php echo $_REQUEST['type_article_id']; ?>';
			var d = $(this).attr('data-d');
			$.post('collect/view_aricle_sec.php', {d: d, type_article_id : type_article_id}, function(data) {
				$('#tableAdd').html(data);
			});
		});

	</script>