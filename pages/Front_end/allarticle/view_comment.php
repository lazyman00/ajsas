<?php  include('../../../connect/connect.php'); ?>
<?php 

$sql1 = sprintf("SELECT user.name_th, user.surname_th, pre.pre_th, evaluation.assessment_id, evaluation.comment_eva FROM `evaluation` 
	left join user on evaluation.user_id = user.user_id 
	left join pre on user.pre_id = pre.pre_id
	WHERE `article_id` = %s",GetSQLValueString($_GET['article_id'],'text'));
$query1 = $conn->query($sql1);
$row1 = $query1->fetch_assoc();
$num = $query1->num_rows;

?>
<div class="card-body">
    <p style="background-color: #0062c4; color: #ffffff; height: 30px; padding-top: 3px;"><span style="padding: 7px;">ผลการประเมินจากผู้ทรงคุณวุฒิ : </span></p>
	<div class="table-responsive-sm">
		<table class="table table-sm">
			<thead>
				<tr>
					<th scope="col">ที่</th>
					<th scope="col">ชื่อ - นามสกุล</th>
					<th scope="col">ผลการประเมิน</th>
					<th scope="col">ความคิดเห็น</th>
				</tr>
			</thead>
			<tbody>
				<?php do { ?>
					<tr>
						<th scope="row">1</th>
						<td><?php echo $row1['pre_th']." ".$row1['name_th']." ".$row1['surname_th']; ?></td>
						<td><?php if($row1['assessment_id']==1){ ?> <i class="far fa-check-circle fa-1x"></i> ยอมรับการตีพิมพ์ แบบไม่ต้องแก้ไข</button> 
							<?php }else if($row1['assessment_id']==2){ ?> ! ยอมรับการตีพิมพ์ แบบมีเงื่อนแก้ไข 
							<?php }else if($row1['assessment_id']==3){ ?> x ไม่ยอมรับการตีพิมพ์</button>
							<?php } ?></td>
							<td><a target="_blank" href="../../files_comment/<?php echo $row1['comment_eva']; ?>"><?php echo $row1['comment_eva']; ?></a></td>
						</tr>
					<?php } while($row1 = $query1->fetch_assoc()); ?>
				</tbody>
			</table>
		</div>
	</div>