<?php 
    // include '../../connect/connect.php';  
    $sql_title = "SELECT * FROM department ";
    $result_title = $conn->query($sql_title);
    $fetch_title = $result_title->fetch_assoc();
    $nom_row_title = $result_title->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_department">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        เพิ่มข้อมูล
    </buttom>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="65%">ชื่อ</th>
                <th width="15%">สถานะ</th>
                <th width="15%">แก้ไข</th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_title > 0){
            do{
?>
            <tr id="<?php echo $fetch_title['department_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td data-target="department_name"><?php echo $fetch_title['department_name'];?></td>
                <td align="center">
                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="small"> -->
<?php
                    if($fetch_title['status_department'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['department_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['department_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td align="center">
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_mo_department" data-id="<?php echo $fetch_title['department_id']; ?>" >แก้ไข</a>
                </td>
                <td data-target="t_department_status" style ="display:none"><?php echo $fetch_title['status_department'];?></td>
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
<div class="modal fade" id="mo_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล หน่วยงาน</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_department" name="colse_department">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="fr_department" name="fr_department">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-2 col-lg-2" ></div>
                    <div class="col-xl-2 col-lg-2" align="right"><font size="3">ชื่อหน่วยงาน : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" id="name_department" name="name_department" ></div>
                    <div class="col-xl-2 col-lg-2"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" id="sa_department" name="sa_department">บันทึก</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Edit Modal title -->
<div class="modal fade" id="op_mo_department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล หน่วยงาน</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_department" name="colse_department">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="e_department" name="e_department">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-2 col-lg-2" ></div>
                    <div class="col-xl-2 col-lg-2" align="right"><font size="3">ชื่อหน่วยงาน : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" id="e_name_department" name="e_name_department" ></div>
                    <div class="col-xl-2 col-lg-2"></div>
                </div>
                <input type="hidden" size="30" id="hid_ac_id_department" name="hid_ac_id_department">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" id="e_sa_title_t" name="e_sa_title_t">บันทึก</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Edit Modal title -->

<script>
    $(document).ready(function() {

		$('#fr_department').validate({
			errorClass: "errors",
			rules: {
                name_department: {
                        required: true
                }
			},
			messages: {
                name_department: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                }
			}
		});

        $('#e_department').validate({
			errorClass: "errors",
			rules: {
                e_name_department: {
                        required: true
                }
			},
			messages: {
                e_name_department: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                }
			}
		});

	});

    $("#colse_department").click(function(){
        window.location.href = 'home_backend.php?type=department'; 
    });

    $(document).on('click','a[data-role=id_mo_department]',function(){ 

        var id  = $(this).data('id');
        var department_name  = $('#'+id).children('td[data-target=department_name]').text();

        $("#e_name_department").val(department_name);
        $("#hid_ac_id_department").val(id);

        $('#op_mo_department').modal();

    });
    
    $("#sa_department").click(function(){
        var form            = "";
        var form            = $("#fr_department");
        var name_department = $("#name_department").val();

        if(form.valid())
        {

            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_department", 
                data: {
                    name_department : name_department
                },
                success: function(data, status) {
                    response = data.trim(); 

                    if(response == "true") // Success
                    {
                        Swal.fire({
                            title: "<font color=#009900>สำเร็จ!</font>", 
                            text: "บันทึกข้อมูลสำเร็จ!",
                            type: "success"
                        }).then(function(){ 
                            location.reload();
                        });
                    }
                    else // Err
                    {
                        Swal.fire(
                            '<font color=red>ไม่สำเร็จ!</font>',
                            'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                            'error'
                        ).then(function(){ 
                            location.reload(true);
                        });
                    }

                },
                error: function(data, status, error) {

                    Swal.fire(
                        '<font color=red>ไม่สำเร็จ!</font>',
                        'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                        'error'
                    ).then(function(){ 
                        location.reload(true);
                    });
                }
            });
        }
        else
        {
            var form = "";
        }
    });

    $("#e_sa_title_t").click(function(){
        var form     = "";
        var form     = $("#e_department");
        var id_edit  = $("#hid_ac_id_department").val();
        var e_name_department = $("#e_name_department").val();

        if(form.valid())
        {
    
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_department", 
                data: {
                    e_name_department : e_name_department,
                    id_edit: id_edit
                },
                success: function(data, status) {
                    response = data.trim(); 
                    
                    if(response == "true") // Success
                    {
                        Swal.fire({
                            title: "<font color=#009900>สำเร็จ!</font>", 
                            text: "แก้ไขข้อมูลสำเร็จ!",
                            type: "success"
                        }).then(function(){ 
                            location.reload();
                        });
                    }
                    else // Err
                    {
                        Swal.fire(
                            '<font color=red>ไม่สำเร็จ!</font>',
                            'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                            'error'
                        ).then(function(){ 
                            location.reload(true);
                        });
                    }

                },
                error: function(data, status, error) {

                    Swal.fire(
                        '<font color=red>ไม่สำเร็จ!</font>',
                        'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                        'error'
                    ).then(function(){ 
                        location.reload(true);
                    });
                }
            });
        }
        else
        {
            // alert("no");
            var form = "";
        }
    });

    $(document).on('click','button[data-role=change_status]',function(){ 

        var id  = $(this).data('id');
        var t_department_status  = $('#'+id).children('td[data-target=t_department_status]').text();

        // $("#e_name_department").val(department_name);
        // $("#hid_ac_id_department").val(id);

        if(t_department_status == 1)
        {
            status_num = 0;
        }
        else
        {
            status_num = 1;
        }

        Swal.fire({
            title: '<h4><font color=#facea8>คุณต้องการเปลี่ยนสถานะ ใช่ หรือ ไม่?</font><h4>',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่!',
            cancelButtonText: 'ไม่ใช่!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "u_update.php?action=edit_change_department", 
                    data: {
                        id : id,
                        status_num: status_num
                    },
                    success: function(data, status) {
                        response = data.trim(); 
                        
                        if(response == "true") // Success
                        {
                            Swal.fire({
                                title: "<font color=#009900>สำเร็จ!</font>", 
                                text: "เปลี่ยนสถานะสำเร็จ!",
                                type: "success"
                            }).then(function(){ 
                                location.reload();
                            });
                        }
                        else // Err
                        {
                            Swal.fire(
                                '<font color=red>ไม่สำเร็จ!</font>',
                                'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                                'error'
                            ).then(function(){ 
                                location.reload(true);
                            });
                        }

                    },
                    error: function(data, status, error) {

                        Swal.fire(
                            '<font color=red>ไม่สำเร็จ!</font>',
                            'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!',
                            'error'
                        ).then(function(){ 
                            location.reload(true);
                        });
                    }
                });
            }
        });

        

    });

</script>