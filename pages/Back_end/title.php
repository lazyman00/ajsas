<?php 
    // include '../../connect/connect.php'; 
    $sql_title = "SELECT * FROM pre ";
    $result_title = $conn->query($sql_title);
    $fetch_title = $result_title->fetch_assoc();
    $nom_row_title = $result_title->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_title">
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
                <th width="21%">คำนำหน้าทางวิชาภาษาไทย</th>
                <th width="21%">คำนำหน้าทางวิชาภาษาอังกฤษ</th>
                <th width="21%">คำนำหน้าภาษาไทยตัวย่อ</th>
                <th width="21%">คำนำหน้าภาษาอังกฤษตัวย่อ</th>
                <th width="5%">สถานะ</th>
                <th width="5%">Edit</th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_title > 0){
            do{
?>
            <tr id="<?php echo $fetch_title['pre_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td data-target="t_pre_th"><?php echo $fetch_title['pre_th'];?></td>
                <td data-target="t_pre_en"><?php echo $fetch_title['pre_en'];?></td>                
                <td data-target="t_pre_th_short"><?php echo $fetch_title['pre_th_short'];?></td>
                <td data-target="t_pre_en_short"><?php echo $fetch_title['pre_en_short'];?></td>
                <td align="center">
                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="small"> -->
<?php
                    if($fetch_title['status_pre'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['pre_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_title['pre_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_mo_title" data-id="<?php echo $fetch_title['pre_id']; ?>" >Edit</a>
                </td>
                <td data-target="t_status_pre" style ="display:none"><?php echo $fetch_title['status_pre'];?></td>
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
<div class="modal fade" id="mo_title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล คำนำหน้า</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title" name="colse_title">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="fr_title" name="fr_title">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาภาษาไทย : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="title_thai_full" name="title_thai_full" ></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาภาษาอังกฤษ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="title_en_full" name="title_en_full"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาการภาษาไทยตัวย่อ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="title_thai" name="title_thai"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาการภาษาอังกฤษตัวย่อ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="title_en" name="title_en"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="sa_title" name="sa_title">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Edit Modal title -->
<div class="modal fade" id="op_mo_title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล คำนำหน้า</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title" name="colse_title">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="e_fr_title" name="e_fr_title">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาภาษาไทย : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="e_title_thai_full" name="e_title_thai_full" ></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาภาษาอังกฤษ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="e_title_en_full" name="e_title_en_full"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาการภาษาไทยตัวย่อ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="e_title_thai" name="e_title_thai"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-5 col-lg-5" align="right"><font size="3">คำนำหน้าทางวิชาการภาษาอังกฤษตัวย่อ : </font></div>
                    <div class="col-xl-6 col-lg-6"><input class="form-control" type="text" size="30" id="e_title_en" name="e_title_en"></div>
                    <div class="col-xl-1 col-lg-1"></div>
                </div>
                <input type="hidden" size="30" id="hid_ac_id" name="hid_ac_id">
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="e_sa_title" name="e_sa_title">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Edit Modal title -->

<script>
    $(document).ready(function() {

		$('#fr_title').validate({
			errorClass: "errors",
			rules: {
                title_thai_full: {
                        required: true
                },
                title_en_full: {
                        required: true
                },
                title_thai: {
                        required: true
                },
                title_en: {
                        required: true
                }
			},
			messages: {
                title_thai_full: {
                        required: "กรุณากรอกชื่อคำนำหน้าทางวิชาภาษาไทยของท่าน"
                },
                title_en_full: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาภาษาอังกฤษของท่าน"
                },
                title_thai: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาการภาษาไทยตัวย่อของท่าน"
                }
                ,
                title_en: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาการภาษาอังกฤษตัวย่อของท่าน"
                }
			}
		});

        $('#e_fr_title').validate({
			errorClass: "errors",
			rules: {
                e_title_thai_full: {
                        required: true
                },
                e_title_en_full: {
                        required: true
                },
                e_title_thai: {
                        required: true
                },
                e_title_en: {
                        required: true
                }
			},
			messages: {
                e_title_thai_full: {
                        required: "กรุณากรอกชื่อคำนำหน้าทางวิชาภาษาไทยของท่าน"
                },
                e_title_en_full: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาภาษาอังกฤษของท่าน"
                },
                e_title_thai: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาการภาษาไทยตัวย่อของท่าน"
                }
                ,
                e_title_en: {
                        required: "กรุณากรอกคำนำหน้าทางวิชาการภาษาอังกฤษตัวย่อของท่าน"
                }
			}
		});

	});

    $("#colse_title").click(function(){
        window.location.href = 'home_backend.php?type=title'; 
    });

    $(document).on('click','a[data-role=id_mo_title]',function(){ 

        var id  = $(this).data('id');
        var t_pre_th  = $('#'+id).children('td[data-target=t_pre_th]').text();
        var t_pre_en  = $('#'+id).children('td[data-target=t_pre_en]').text();
        var t_pre_th_short = $('#'+id).children('td[data-target=t_pre_th_short]').text();
        var t_pre_en_short  = $('#'+id).children('td[data-target=t_pre_en_short]').text();

        $("#e_title_thai_full").val(t_pre_th);
        $("#e_title_en_full").val(t_pre_en);
        $("#e_title_thai").val(t_pre_th_short);
        $("#e_title_en").val(t_pre_en_short);
        $("#hid_ac_id").val(id);

        $('#op_mo_title').modal();

    });
    
    $("#sa_title").click(function(){
        var form            = "";
        var form            = $("#fr_title");
        var title_thai_full = $("#title_thai_full").val();
        var title_en_full   = $("#title_en_full").val();
        var title_thai      = $("#title_thai").val();
        var title_en        = $("#title_en").val();
        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_title", 
                data: {
                    title_thai_full : title_thai_full,
                    title_en_full : title_en_full,
                    title_thai : title_thai,
                    title_en : title_en
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

    $("#e_sa_title").click(function(){
        var form     = "";
        var form     = $("#e_fr_title");
        var id_edit  = $("#hid_ac_id").val();
        var e_title_thai_full = $("#e_title_thai_full").val();
        var e_title_en_full   = $("#e_title_en_full").val();
        var e_title_thai      = $("#e_title_thai").val();
        var e_title_en        = $("#e_title_en").val();

        if(form.valid())
        {
    
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_title", 
                data: {
                    e_title_thai_full : e_title_thai_full,
                    e_title_en_full : e_title_en_full,
                    e_title_thai : e_title_thai,
                    e_title_en: e_title_en,
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
            alert("no");
            var form = "";
        }
    });

    $(document).on('click','button[data-role=change_status]',function(){ 

        var id  = $(this).data('id');
        var t_status_pre  = $('#'+id).children('td[data-target=t_status_pre]').text();

        if(t_status_pre == 1)
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
                    url: "u_update.php?action=edit_change_status_title", 
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