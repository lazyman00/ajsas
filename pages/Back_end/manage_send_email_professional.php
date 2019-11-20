<?php 
    // include '../../connect/connect.php'; 
    $sql_title = "SELECT * FROM type_title ";
    $result_title = $conn->query($sql_title);
    $fetch_title = $result_title->fetch_assoc();
    $nom_row_title = $result_title->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom type="submit" class="btn btn-primary btn-primary-split btn-sm" data-toggle="modal" data-target="#mo_send_mail">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        ส่งเมลเทียบเชิญผู้ทรงฯ
    </buttom>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="15%">คำนำหน้าทางวิชาการ</th>
                <th width="40%">ชื่อ-นามสกุล</th>
                <th width="25%">อีเมล</th>
                <th width="15%">สถานะ</th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_title > 0){
            do{
?>
            <tr id="<?php echo $fetch_title['type_title_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td data-target="t_title_name"><?php echo $fetch_title['type_title_name'];?></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center">
                    สถานะ
                </td>
            </tr>
<?php
            $i++;
            }while($fetch_title = $result_title->fetch_assoc());
        }
        else
        {

        }
?>
            </tbody>
        </table>
    </div>
</div>

<!-- Logout Modal logoutModal-->
<div class="modal fade" id="mo_send_mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ข้อมูล ส่งเมล</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="close_mo_title_t()">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="fr_send_mail" name="fr_send_mail">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-2" align="right"><font size="3">อีเมล : </font></div>
                    <div class="col-md-6"><input class="form-control" type="text" id="e_email" name="e_email" ></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-2" align="right"><font size="3">หัวเรื่อง : </font></div>
                    <div class="col-md-6"><input class="form-control" type="text" id="title_mail_name" name="title_mail_name" ></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-2" align="right"><font size="3">ชื่อเรื่อง : </font></div>
                    <div class="col-md-6"><input class="form-control" type="text" id="story_mail_name" name="story_mail_name" ></div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-2" align="right"><font size="3">รายละเอียด : </font></div>
                    <div class="col-md-6">
                        <textarea id="detail_mail_name" name="detail_mail_name" rows="4" cols="50" class="form-control"></textarea>
                        
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="close_mo_title_t()">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="save_send_mail" name="save_send_mail">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

    <div id="wait" style="z-index: 2048;position:absolute;top:50%;left:34%;display:none"> 
		<center>
			<img src='../../img/img_icon/3ball.gif' /><br>
			<font color="#000000"><b>กรุณารอสักครู่..</b></font>
		</center>
	</div>

<script>
    $(document).ready(function() {

        $(document).ajaxStart(function(){
      		$("#wait").css("display", "block");
		});

		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});

        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Value must not equal arg.");

		$('#fr_send_mail').validate({
			errorClass: "errors",
			rules: {
                e_email: {
                        required: true
                },
                title_mail_name: {
                        required: true
                },
                story_mail_name: {
                        required: true
                },
                detail_mail_name: {
                    valueNotEquals: ""
                }
			},
			messages: {
                e_email: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                },
                title_mail_name: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                },
                story_mail_name: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                },
                detail_mail_name: {
                    valueNotEquals: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                }
			}
		});

	});

    function close_mo_title_t(){
        location.reload();
    }
    
    $("#save_send_mail").click(function(){
        var form            = "";
        var form            = $("#fr_send_mail");

        if(form.valid())
        {

            $.ajax({
                type: "POST",
                url: "send_email_professional.php", 
                data: {
                    e_email : $("#e_email").val(),
                    title_mail_name: $("#title_mail_name").val(),
                    story_mail_name: $("#story_mail_name").val(),
                    detail_mail_name: $("#detail_mail_name").val()
                },
                success: function(data, status) {
                    response = data.trim(); 
                    if(response == "true") // Success
                    {
                        Swal.fire({
							title: "<font color=#009900>สำเร็จ!</font>", 
							text: "ส่งเมลสำเร็จ!",
							type: "success"
						}).then(function(){ 
							location.reload(true);
						});

                    }
                    else // Err
                    {
                        Swal.fire(
							'<font color=red>ไม่สำเร็จ!</font>',
							'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
							'error'
						).then(function(){ 
							location.reload(true);
						});
                    }

                },
                error: function(data, status, error) {
                    alert("Error");
                }
            });
        }
        else
        {
            var form = "";
        }
    });

    // $("#e_sa_title_t").click(function(){
    //     var form     = "";
    //     var form     = $("#e_fr_title_t");
    //     var id_edit  = $("#hid_ac_id_type").val();
    //     var e_name_type_title = $("#e_name_type_title").val();


    //     if(form.valid())
    //     {
    
    //         $.ajax({
    //             type: "POST",
    //             url: "u_update.php?action=edit_title_t", 
    //             data: {
    //                 e_name_type_title : e_name_type_title,
    //                 id_edit: id_edit
    //             },
    //             success: function(data, status) {
    //                 response = data.trim(); 

    //                 if(response == "true") // Success
    //                 {
    //                     alert("บันทึกข้อมูลสำเร็จ");
    //                     window.location.href = 'home_backend.php?type=title_t'; 
    //                 }
    //                 else // Err
    //                 {
    //                     alert("บันทึกข้อมูลไม่สำเร็จ");
    //                 }

    //             },
    //             error: function(data, status, error) {
    //                 alert("Error");
    //             }
    //         });
    //     }
    //     else
    //     {
    //         // alert("no");
    //         var form = "";
    //     }
    // });

</script>