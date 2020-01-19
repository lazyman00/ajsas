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
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_title_t">
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
            <tr id="<?php echo $fetch_title['type_title_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td data-target="t_title_name"><?php echo $fetch_title['type_title_name'];?></td>
                <td align="center">
                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="small"> -->
<?php
                    if($fetch_title['status_type_title'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['type_title_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['type_title_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td align="center">
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_mo_title_t" data-id="<?php echo $fetch_title['type_title_id']; ?>" >แก้ไข</a>
                </td>
                <td data-target="t_status_type_title" style ="display:none"><?php echo $fetch_title['status_type_title'];?></td>
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
<div class="modal fade" id="mo_title_t" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล คำนำหน้า</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title_t" name="colse_title_t">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="fr_title_t" name="fr_title_t">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-2 col-lg-2" ></div>
                    <div class="col-xl-2 col-lg-2" align="right"><font size="3">คำนำหน้า : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" id="name_type_title" name="name_type_title" ></div>
                    <div class="col-xl-2 col-lg-2"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" id="sa_title_t" name="sa_title_t">บันทึก</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Edit Modal title -->
<div class="modal fade" id="op_mo_title_t" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล คำนำหน้า</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title_t" name="colse_title_t">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="e_fr_title_t" name="e_fr_title_t">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-2 col-lg-2" ></div>
                    <div class="col-xl-2 col-lg-2" align="right"><font size="3">คำนำหน้า : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" id="e_name_type_title" name="e_name_type_title" ></div>
                    <div class="col-xl-2 col-lg-2"></div>
                </div>
                <input type="hidden" size="30" id="hid_ac_id_type" name="hid_ac_id_type">
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

		$('#fr_title_t').validate({
			errorClass: "errors",
			rules: {
                name_type_title: {
                        required: true
                }
			},
			messages: {
                name_type_title: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                }
			}
		});

        $('#e_fr_title_t').validate({
			errorClass: "errors",
			rules: {
                e_name_type_title: {
                        required: true
                }
			},
			messages: {
                e_name_type_title: {
                        required: "กรุณากรอกชื่อคำนำหน้าของท่าน"
                }
			}
		});

	});

    $("#colse_title_t").click(function(){
        window.location.href = 'home_backend.php?type=title_t'; 
    });

    $(document).on('click','a[data-role=id_mo_title_t]',function(){ 

        var id  = $(this).data('id');
        var t_title_name  = $('#'+id).children('td[data-target=t_title_name]').text();

        $("#e_name_type_title").val(t_title_name);
        $("#hid_ac_id_type").val(id);

        $('#op_mo_title_t').modal();

    });
    
    $("#sa_title_t").click(function(){
        var form            = "";
        var form            = $("#fr_title_t");
        var name_type_title = $("#name_type_title").val();

        if(form.valid())
        {

            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_title_t", 
                data: {
                    name_type_title : name_type_title
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
        var form     = $("#e_fr_title_t");
        var id_edit  = $("#hid_ac_id_type").val();
        var e_name_type_title = $("#e_name_type_title").val();


        if(form.valid())
        {
    
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_title_t", 
                data: {
                    e_name_type_title : e_name_type_title,
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
        var t_status_type_title  = $('#'+id).children('td[data-target=t_status_type_title]').text();

        if(t_status_type_title == 1)
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
                    url: "u_update.php?action=edit_change_status_title_t", 
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