<?php  include('../../../connect/connect.php'); ?>
<?php
if(isset($_POST['eid']) && $_POST['eid']!=""){
	$old = $_POST['old'];
	$eid = $_POST['eid'];
	$id = $_POST['id'];
	$oldtxt = $_SESSION["add"][$eid];
	$_SESSION["add"][$eid] = $_POST['id'];
	$_SESSION["add"][$old] = $oldtxt;
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
$Ortext = '0';
if(empty($_SESSION["add"])){
	$text.= '0';
}else{
	$text.= implode(",",$_SESSION["add"]);
	$Ortext = implode(",",$_SESSION["add"]);
	
}
$text.= ")";

?>
<?php 
$sql = sprintf("SELECT * FROM `article` left join  type_article on article.type_article_id = type_article.type_article_id WHERE article.`article_id` IN $text and article.sta_work >= '4' ORDER BY FIELD(`article_id`, $Ortext)");
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
				<th scope="col" width="20"><center>สถานะ</center></th>
			</tr>
		</thead>
		<tbody>
			<?php if($numrow>0){ ?>
				<?php $i=1; $old=0; do{ ?> 
					<tr>
						<td scope="row">
							<select onChange="myFunction(<?php echo $old; ?>,this.value, <?php echo $row['article_id']; ?>)">
								<?php for($n=1; $n<=$numrow; $n++){ ?>
									<option <?php if($n==$i){ ?> selected="" <?php } ?> value="<?php echo $n-1; ?>"><?php echo $n; ?></option>
								<?php } ?>
							</select>
						</td>
						<td><?php  echo $row['article_name_th']; ?></td>
						<td><?php  echo $row['type_article_name']; ?></td>
						<td><?php  echo $row['year']; ?></td>
						<td><?php  echo $row['year']; ?></td>
						<td align="center">

							<button type="button" data-d="<?php echo $row['article_id']; ?>" class="badge badge-danger delete"><i class="fas fa-minus"></i></button>
						</td>
					</tr>
					<?php $i++; $old++; }while($row = $query->fetch_assoc()); ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<hr>
	<?php 
	$sql = sprintf("SELECT * FROM `article` left join  type_article on article.type_article_id = type_article.type_article_id WHERE article.`sta_add_collect` = '0'  and article.sta_work >= '4' and article.`article_id` NOT IN $text");
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();
	$numrow = $query->num_rows;
	?>
	<b>ค้นหาบทความที่ผ่านการประเมินแล้ว : </b>
	<div class="card text-white border-warning">
		<div class="card-header bg-warning"></div>
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col" width="20">#</th>
					<th scope="col">ชื่อบทความ</th>
					<th scope="col">สาขา</th>
					<th scope="col">ปี</th>
					<th scope="col" width="20">Download</th>

					<th scope="col" width="20"><center>สถานะ</center></th>
				</tr>
			</thead>
			<tbody>
				<?php if($numrow>0){ ?>
					<?php $i=1; do{ ?> 
						<tr>
							<td scope="row"><?php echo $i; ?></td>
							<td><?php echo $row['article_name_th']; ?></td>
							<td><?php echo $row['type_article_name']; ?></td>
							<td><?php echo $row['year']; ?></td>
							<td><?php echo $row['year']; ?></td>
							<td align="center">
								<button type="button" data-a="<?php echo $row['article_id']; ?>" class="badge badge-success add"><i class="fas fa-plus"></i></button>
							</td>
						</tr>
						<?php $i++;  }while($row = $query->fetch_assoc()); ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" name="type_article_id" value="<?php echo $_REQUEST['type_article_id']; ?>">

		<script type="text/javascript">
			function myFunction(old, eid, id) {

				$.post('collect/view_aricle_list.php', {old: old, eid: eid, id: id}, function(data) {
					$('#view_aricle_data').html(data);
				});


			}

			$('.delete').click(function(event) {
				var d = $(this).attr('data-d');
				$.post('collect/view_aricle_list.php', {d: d}, function(data) {
					$('#view_aricle_data').html(data);
				});
			});


			$('.add').click(function(event) {
				var a = $(this).attr('data-a');
				$.post('collect/view_aricle_list.php', {a: a}, function(data) {
					$('#view_aricle_data').html(data);
				});
			});
		</script>