<?php 
    // include '../../connect/connect.php'; 
    $sql_ac = "SELECT * FROM academe 
    JOIN department ON academe.department_id = department.department_id
    ";
    $result_ac = $conn->query($sql_ac);
    $fetch_ac = $result_ac->fetch_assoc();
    $nom_row_ac = $result_ac->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_academy">
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
                <th width="15%">หน่วยงาน</th>
                <th width="25%">ชื่อสถานศึกษา</th>
                <th width="30%">ที่อยู่สถานศึกษา</th>
                <th width="15%">เบอร์โทรศัพท์</th>
                <th width="5%">สถานะ</th>
                <th width="5%">แก้ไข</th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_ac > 0){
            do{
?>
            <tr id="<?php echo $fetch_ac['academe_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td ><?php echo $fetch_ac['department_name'];?></td> 
                <td data-target="t_academe_name"><?php echo $fetch_ac['academe_name'];?></td>
                <td data-target="t_address"><?php echo $fetch_ac['address'];?></td>                
                <td data-target="t_phonenumber"><?php echo $fetch_ac['phonenumber'];?></td>
                <td align="center">
                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="small"> -->
<?php
                    if($fetch_ac['status_academe'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_ac['academe_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_ac['academe_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="#" data-role="edit_ac" data-id="<?php echo $fetch_ac['academe_id'] ;?>" >แก้ไข</a>
                </td>
                <td style ="display:none" data-target="t_department_id"><?php echo $fetch_ac['department_id'];?></td> 
                <td data-target="t_status_academe" style ="display:none"><?php echo $fetch_ac['status_academe'];?></td>
            </tr>
<?php
            $i++;
            }while($fetch_ac = $result_ac->fetch_assoc());
        }
        else
        {

        }
?>
            </tbody>
        </table>
    </div>
</div>

<!--  Modal mo_academy -->
<div class="modal fade" id="mo_academy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สถานศึกษา</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_academy" name="colse_academy">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="fr_academy" name="fr_academy">
        <div class="modal-body">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ชื่อหน่วยงาน : </div>
                <div class="col-xl-7 col-lg-7">
                    <select id="id_depart" name="id_depart" class="form-control">
                        <option value="0">กรุณาเลือกหน่วยงาน</option>
<?php
                            $sql_depart = "SELECT department_id, department_name FROM department ";
                            $result_depart = $conn->query($sql_depart);
                            $fetch_depart = $result_depart->fetch_assoc();
                            $nom_row_depart = $result_depart->num_rows;
                            do{
?>
                            <option value="<?php echo $fetch_depart['department_id'];?>"><?php echo $fetch_depart['department_name'];?></option>
<?php
                            }while($fetch_depart = $result_depart->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ชื่อสถานศึกษา : </div>
                <div class="col-xl-7 col-lg-7"><input class="form-control" type="text" name="ac_name" id="ac_name" ></div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ที่อยู่สถานศึกษา : </div>
                <div class="col-xl-7 col-lg-7"><textarea class="form-control" rows="8" name="ac_add" id="ac_add"> </textarea></div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">เบอร์โทรศัพท์ : </div>
                <div class="col-xl-7 col-lg-7"><input class="form-control" type="text" size="30" name="ac_phone" id="ac_phone"></div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" href="#" id="sa_academy" name="sa_academy" >บันทึก</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!--  Modal mo_academy -->

 <!--  Modal mo_academy -->
 <div class="modal fade" id="modal_edit_ac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล สถานศึกษา</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_academy" name="colse_academy">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form id="fr_edit_academy" name="fr_edit_academy">
        <div class="modal-body">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ชื่อหน่วยงาน : </div>
                <div class="col-xl-7 col-lg-7">
                    <select class="form-control" id="edit_id_depart" name="edit_id_depart">
                        <option value="0">กรุณาเลือกหน่วยงาน</option>
<?php
                            $sql_depart = "SELECT department_id, department_name FROM department ";
                            $result_depart = $conn->query($sql_depart);
                            $fetch_depart = $result_depart->fetch_assoc();
                            $nom_row_depart = $result_depart->num_rows;
                            do{
?>
                            <option value="<?php echo $fetch_depart['department_id'];?>"><?php echo $fetch_depart['department_name'];?></option>
<?php
                            }while($fetch_depart = $result_depart->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ชื่อสถานศึกษา : </div>
                <div class="col-xl-7 col-lg-7"><input class="form-control" type="text" size="30" name="edit_ac_name" id="edit_ac_name" value=""></div>
                <div class="col-xl-1 col-lg-1"></div>
                <input type="hidden" name="id_edit" id="id_edit" value="">
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ที่อยู่สถานศึกษา : </div>
                <div class="col-xl-7 col-lg-7"><textarea class="form-control" rows="8" name="edit_ac_add" id="edit_ac_add"> </textarea> </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">เบอร์โทรศัพท์ : </div>
                <div class="col-xl-7 col-lg-7"><input class="form-control" type="text" size="30" name="edit_ac_phone" id="edit_ac_phone" value=""></div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" href="#" id="sa_edit_academy" name="sa_edit_academy" >แก้ไข</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
        </form>
    </div>
    </div>
</div>
<!--  Modal mo_academy -->

<script>
    $(document).ready(function() {

        $.validator.addMethod("chk_depart", function(value, element, arg){
            return arg !== value;
        }, "Value must not equal arg.");

		$('#fr_academy').validate({
			errorClass: "errors",
			rules: {
                id_depart:{
                    chk_depart: "0"
                },
                ac_name: {
                        required: true
                },
                ac_add: {
                        required: true
                },
                ac_phone: {
                        required: true
                }
			},
			messages: {
                id_depart:{
                    chk_depart: "กรุณาเลือกชื่อหน่วยงานของท่าน"
                },
                ac_name: {
                        required: "กรุณากรอกชื่อสถานศึกษาของท่าน"
                },
                ac_add: {
                        required: "กรุณากรอกที่อยู่สถานศึกษาของท่าน"
                },
                ac_phone: {
                        required: "กรุณากรอกเบอร์โทรศัพท์ของท่าน"
                }
			}
		});

        $('#fr_edit_academy').validate({
			errorClass: "errors",
			rules: {
                edit_id_depart:{
                        chk_depart: "0"
                },
                edit_ac_name: {
                        required: true
                },
                edit_ac_add: {
                        required: true
                },
                edit_ac_phone: {
                        required: true
                }
			},
			messages: {
                edit_id_depart:{
                        chk_depart: "กรุณาเลือกชื่อหน่วยงานของท่าน"
                },
                edit_ac_name: {
                        required: "กรุณากรอกชื่อสถานศึกษาของท่าน"
                },
                edit_ac_add: {
                        required: "กรุณากรอกที่อยู่สถานศึกษาของท่าน"
                },
                edit_ac_phone: {
                        required: "กรุณากรอกเบอร์โทรศัพท์ของท่าน"
                }
			}
		});

	});

    $("#colse_academy").click(function(){
        window.location.href = 'home_backend.php?type=academy'; 
    });

    $(document).on('click','a[data-role=edit_ac]',function(){ 

        var id  = $(this).data('id');
        var t_academe_name  = $('#'+id).children('td[data-target=t_academe_name]').text();
        var t_address  = $('#'+id).children('td[data-target=t_address]').text();
        var t_phonenumber  = $('#'+id).children('td[data-target=t_phonenumber]').text();
        var t_department_id = $('#'+id).children('td[data-target=t_department_id]').text(); 

        $("#edit_id_depart").val(t_department_id);
        $("#edit_ac_name").val(t_academe_name);
        $("#edit_ac_add").val(t_address);
        $("#edit_ac_phone").val(t_phonenumber);
        $("#id_edit").val(id);
        // var sel_id_2  = $('#'+id).children('td[data-target=sel_id_new]').text(); // sel_id_new sel_id_2
        // var id_sel = $('#'+id).children('td[data-target=id_sel]').text();
        // var id_r_radio = $('#'+id).children('td[data-target=id_r_radio]').text();

        // $('#firstName3').val(firstName3);
        // $('#sel_id_2').val(id_sel);     // ตัวเลือก select
        // $('#id_sele').val(id_sel);      // ตัวเลือก ค่า select ที่จะส่งไป
        // $('#id_ra').val(id_r_radio);    // ตัวเลือก ค่า radio เวลาเปิด Modal 
        // $('#userId').val(id);
        $('#modal_edit_ac').modal();

    });
    
    $("#sa_academy").click(function(){
        var form     = "";
        var form     = $("#fr_academy");
        var id_depart= $("#id_depart").val();
        var ac_name  = $("#ac_name").val();
        var ac_add   = $("#ac_add").val();
        var ac_phone = $("#ac_phone").val();
        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_ac", //save_file save_csv
                // cache: false,
				// async: false,
                data: {
                    id_depart: id_depart,
                    ac_name : ac_name,
                    ac_add : ac_add,
                    ac_phone : ac_phone
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

    $("#sa_edit_academy").click(function(){
        var form     = "";
        var form     = $("#fr_edit_academy");
        var id_edit  = $("#id_edit").val();
        var edit_id_depart= $("#edit_id_depart").val();
        var edit_ac_name  = $("#edit_ac_name").val();
        var edit_ac_add   = $("#edit_ac_add").val();
        var edit_ac_phone = $("#edit_ac_phone").val();
        if(form.valid())
        {   
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_ac", 
                data: {
                    edit_id_depart: edit_id_depart,
                    edit_ac_name : edit_ac_name,
                    edit_ac_add : edit_ac_add,
                    edit_ac_phone : edit_ac_phone,
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
    var t_status_academe  = $('#'+id).children('td[data-target=t_status_academe]').text();

    if(t_status_academe == 1)
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
                    url: "u_update.php?action=edit_change_status_academy", 
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