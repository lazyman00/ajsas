<?php  include('../../../connect/connect.php'); ?>
<?php 
if(isset($_POST['a'])){
array_push($_SESSION["add"],$_POST['a']);
}

// $num = count($_SESSION["row_activity_join"]);
// array_splice($_SESSION["row_activity_join"], $num, 1);
?>
<?php 
echo $sql = sprintf("SELECT * FROM `article` left join  type_article on article.type_article_id = type_article.type_article_id WHERE article.`type_article_id` = %s and article.sta_work >= '4'",GetSQLValueString($_POST['type_article_id'], 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
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
				<th scope="col">#</th>
				<th scope="col">ชื่อบทความ</th>
				<th scope="col">สาขา</th>
				<th scope="col">ปี</th>
				<th scope="col">Download</th>
				<th scope="col"><center>สถานะ</center></th>
			</tr>
		</thead>
		<tbody>
			<!-- 
			<tr>
				<td scope="row">1</td>
				<td><?php // echo $row['article_name_th']; ?></td>
				<td><?php // echo $row['type_article_name']; ?></td>
				<td><?php // echo $row['year']; ?></td>
				<td><?php // echo $row['year']; ?></td>
				<td align="center">

					<button type="button" class="badge badge-danger"><i class="fas fa-minus"></i></button>
				</td>
			</tr> -->

		</tbody>
	</table>
</div>
<hr>

<b>ค้นหาบทความที่ผ่านการประเมินแล้ว : </b>
<div class="card text-white border-warning">
	<div class="card-header bg-warning"></div>
	<table class="table table-sm">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">ชื่อบทความ</th>
				<th scope="col">สาขา</th>
				<th scope="col">ปี</th>
				<th scope="col">Download</th>
				   
				<th scope="col"><center>สถานะ</center></th>
			</tr>
		</thead>
		<tbody>
			<?php do{ ?> 
				<tr>
					<td scope="row">1</td>
					<td><?php echo $row['article_name_th']; ?></td>
					<td><?php echo $row['type_article_name']; ?></td>
					<td><?php echo $row['year']; ?></td>
					<td><?php echo $row['year']; ?></td>
					<td align="center">
						<button type="button" data-a="<?php echo $row['article_id']; ?>" class="badge badge-success add"><i class="fas fa-plus"></i></button>
					</td>
				</tr>
			<?php  }while($row = $query->fetch_assoc()); ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$('.add').click(function(event) {
		var type_article_id = '<?php echo $_REQUEST['type_article_id']; ?>';
		var a = $(this).attr('data-a');
		$.post('collect/view_aricle_list.php', {a: a, type_article_id : type_article_id}, function(data) {
			$('#view_aricle_data').html(data);
		});
	});
</script>