
						<div class="row">                      
							<div class="col-md-12 mb-3">                        
								<div class="table-responsive">
									<h4>ข้อมูลบทความ</h4>

									<table class="table table-striped" >
										<thead>
											<tr>
												<th scope="col" style="width: 5%">#</th>
												<th scope="col">ชื่อบทความ</th>
												<th scope="col" style="width: 10%">ดาวน์โหลด</th>
												<th scope="col" style="width: 15%;text-align:center">วันที่ดำเนินการ</th>
												<th scope="col" style="width: 5%"></th>
											</tr>
										</thead>
										<tbody>
											<?php $selectdata=1; while($row = $query->fetch_assoc()){ ?>
												<tr>
													<th scope="row" ><?php echo $selectdata; ?></th>
													<td><?php echo $row["article_name_th"] ?></td>
													<td><a href="../files_work/<?php echo $row["attach_article"] ?>">ไฟล์เอกสาร</a></td>
													<td align="center">                                
														<?php
														$date=date_create($row["date_article"]);
														echo date_format($date,"Y/m/d");
														?>
													</td>
													<td align="center">
														<a href="update_article.php?article_id=<?php echo $row['article_id']; ?>"><button class="btn btn-danger btn-sm">แก้ไข</button></a>
													</td>
												</tr>
												<?php $selectdata++; 
											} ?>
										</tbody>
									</table>     
								</div>
							</div>                   


							<div class="container">
								<hr class="mb-4">
							</div>

							<div class="container">
								<div class="row">
									<h4>ผลการประเมิน</h4>
								</div>
							</div>


							<div class="container">
								<div class="row">
									<div class="col-md-9">
										<textarea class="form-control" name="abstract_en" style="width: 746px;height: 114px;"></textarea>
									</div>
									<div class="col-md-3">
										<button type="button" class="btn btn-outline-success" style="float: center;">ดาวน์โหลดผลการประเมิน</button>
									</div>
								</div><br>
							</div>


							<div class="container">
								<div class="row">
									<div class="col-md-12 md-3">
										<a>ส่งบทความแก้ไข</a>&nbsp;อัพโหลด
										<a style="border-left-width: -;padding-left: 52px;">วันที่อัพโหลด</a>&nbsp;5/5/55
										<a style="border-left-width: -;padding-left: 72px;">ดาวน์โหลดบทความ</a>&nbsp;ไฟล์เอกสาร
									</div> 
								</div>
							</div>
							<div class="container">
								<hr class="mb-4">
							</div>
						</div>