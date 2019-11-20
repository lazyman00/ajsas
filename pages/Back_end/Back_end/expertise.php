<?php 
    // include '../../connect/connect.php'; 

    $sql_ex_p = "SELECT * FROM spacialization 
    JOIN user ON spacialization.user_id = user.user_id
    JOIN type_article ON spacialization.type_article_group_id = type_article.type_article_id 
    ";
    
    $result_ex_p = $conn->query($sql_ex_p);
    $fetch_ex_p = $result_ex_p->fetch_assoc();
    $nom_row_ex_p = $result_ex_p->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_expertise">
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
                <th>ลำดับ</th>
                <th>ชื่อผู้ทรง</th>
                <th>ความชำนาญด้าน</th>
                <th>สถานะ</th>
                <th>Edit</th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_ex_p > 0){
            do{
?>
            <tr id="<?php echo $fetch_ex_p['spacialization_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td><?php echo $fetch_ex_p['name_th'];?></td>              
                <td><?php echo $fetch_ex_p['type_article_name'];?></td>
                <td align="center">
                    <!-- <input type="checkbox" checked data-toggle="toggle" data-size="small"> -->
<?php
                    if($fetch_ex_p['status_spacialization'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_ex_p['spacialization_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_ex_p['spacialization_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td align="center">
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_ex" data-id="<?php echo $fetch_ex_p['spacialization_id'] ;?>" >Edit</a>
                </td>
                <td data-target="t_ex_user_id" style ="display:none"><?php echo $fetch_ex_p['user_id'];?></td>
                <td data-target="t_ex_type_id" style ="display:none"><?php echo $fetch_ex_p['type_article_group_id'];?></td>
                <td data-target="t_status_status_spacialization" style ="display:none"><?php echo $fetch_ex_p['status_spacialization'];?></td>
            </tr>
<?php
            $i++;
            }while($fetch_ex_p = $result_ex_p->fetch_assoc());
        }
        else
        {

        }
?>
            </tbody>
        </table>
    </div>
</div>

<!-- add Modal -->
<div class="modal fade" id="mo_expertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล คาวมชำนาญ</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_ex" name="colse_ex">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="fr_expertise" name="fr_expertise">
        <div class="modal-body">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ผู้ทรง : </div>
                <div class="col-xl-7 col-lg-7">
                    <select class="form-control" style="width: 250px;" id="n_name_ex" name="n_name_ex">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_user = "SELECT user_id, name_th FROM user ";
                        $result_user = $conn->query($sql_user);
                        $fetch_user = $result_user->fetch_assoc();
                        $nom_row_user = $result_user->num_rows;
                        do{
?>
                        <option value="<?php echo $fetch_user['user_id'];?>"><?php echo $fetch_user['name_th'];?></option>
<?php
                        }while($fetch_user = $result_user->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ความชำนาญประเภทบทความ : </div>
                <div class="col-xl-7 col-lg-7">
                    <select class="form-control" style="width: 250px;" id="n_type_ac" name="n_type_ac">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_type_ac = "SELECT type_article_id, type_article_name FROM type_article ";
                        $result_type_ac = $conn->query($sql_type_ac);
                        $fetch_type_ac = $result_type_ac->fetch_assoc();
                        $nom_row_type_ac = $result_type_ac->num_rows;
                        do{
?>
                        <option value="<?php echo $fetch_type_ac['type_article_id'];?>"><?php echo $fetch_type_ac['type_article_name'];?></option>
<?php
                        }while($fetch_type_ac = $result_type_ac->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="sa_expertise" name="sa_expertise" >บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- add Modal -->

<!-- edit Modal -->
<div class="modal fade" id="e_mo_expertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล คาวมชำนาญ</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_ex" name="colse_ex">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form id="e_fr_expertise" name="e_fr_expertise">
        <div class="modal-body">
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ผู้ทรง : </div>
                <div class="col-xl-7 col-lg-7">
                    <select class="form-control" id="e_n_name_ex" name="e_n_name_ex">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_user_e = "SELECT user_id, name_th FROM user ";
                        $result_user_e = $conn->query($sql_user_e);
                        $fetch_user_e = $result_user_e->fetch_assoc();
                        $nom_row_user_e = $result_user_e->num_rows;
                        do{
?>
                        <option value="<?php echo $fetch_user_e['user_id'];?>"><?php echo $fetch_user_e['name_th'];?></option>
<?php
                        }while($fetch_user_e = $result_user_e->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-xl-4 col-lg-4" align="right">ความชำนาญประเภทบทความ : </div>
                <div class="col-xl-7 col-lg-7">
                    <select class="form-control" id="e_n_type_ac" name="e_n_type_ac">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_type_ac_e = "SELECT type_article_id, type_article_name FROM type_article ";
                        $result_type_ac_e = $conn->query($sql_type_ac_e);
                        $fetch_type_ac_e = $result_type_ac_e->fetch_assoc();
                        $nom_row_type_ac_e = $result_type_ac_e->num_rows;
                        do{
?>
                        <option value="<?php echo $fetch_type_ac_e['type_article_id'];?>"><?php echo $fetch_type_ac_e['type_article_name'];?></option>
<?php
                        }while($fetch_type_ac_e = $result_type_ac_e->fetch_assoc());
?>
                    </select><br>
                    <input type="text" name="On_Change_user_id_old" id="On_Change_user_id_old" value="">
                    <input type="text" name="On_Change_type_article_id_old" id="On_Change_type_article_id_old" value="">
                    <input type="hidden" name="hid_user_id" id="hid_user_id" value="">
                    <input type="hidden" name="hid_type_article_group_id" id="hid_type_article_group_id" value="">
                    <input type="hidden" name="hid_id_ex" id="hid_id_ex" value="">
                </div>
                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
        </form>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="e_sa_expertise" name="e_sa_expertise" >บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- edit Modal -->

<script>
    $(document).ready(function() {

        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Value must not equal arg.");

		$('#fr_expertise').validate({
			errorClass: "errors",
			rules: {
                n_name_ex: {
                    valueNotEquals: '0',
                    remote: { 
                        url: "expertise_data.php?action=Id_name_ex_and_Id_type_ac", 
                        type: "post",
                        cache: false,
                        global: false,
                        data: {
                            n_name_ex: function() {
                                return $("#n_name_ex").val();
                            },
                            n_type_ac: function() {
                                return $("#n_type_ac").val();
                            }
                        }
                    }
                },
                n_type_ac: {
                    valueNotEquals: '0',
                    remote: { 
                        url: "expertise_data.php?action=Id_name_ex_and_Id_type_ac", 
                        type: "post",
                        cache: false,
                        global: false,
                        data: {
                            n_name_ex: function() {
                                return $("#n_name_ex").val();
                            },
                            n_type_ac: function() {
                                return $("#n_type_ac").val();
                            }
                        }
                    }
                }
			},
			messages: {
                n_name_ex: {
                    valueNotEquals: "กรุณาเลือกชื่อผู้ทรง",
                    remote: "<font color=red>มีผู้ทรง และความชำนาญนี้แล้ว</font>"
                },
                n_type_ac: {
                    valueNotEquals: "กรุณาเลือกประเภทบทความ",
                    remote: "<font color=red>มีผู้ทรง และความชำนาญนี้แล้ว</font>"
                }
			}
		});

        $('#e_fr_expertise').validate({
			errorClass: "errors",
			rules: {
                e_n_name_ex: {
                    valueNotEquals: '0',
                    remote: { 
                        url: "expertise_data.php?action=Edit_Id_name_ex_and_Id_type_ac", 
                        type: "post",
                        cache: false,
                        global: false,
                        data: {
                            e_n_name_ex: function() {
                                return $("#e_n_name_ex").val();
                            },
                            e_n_type_ac: function() {
                                return $("#e_n_type_ac").val();
                            },
                            On_Change_user_id_old: function() {
                                return $("#On_Change_user_id_old").val();
                            },
                            On_Change_type_article_id_old: function() {
                                return $("#On_Change_type_article_id_old").val();
                            }
                        }
                    }
                },
                e_n_type_ac: {
                    valueNotEquals: '0',
                    remote: { 
                        url: "expertise_data.php?action=Edit_Id_name_ex_and_Id_type_ac", 
                        type: "post",
                        cache: false,
                        global: false,
                        data: {
                            e_n_name_ex: function() {
                                return $("#e_n_name_ex").val();
                            },
                            e_n_type_ac: function() {
                                return $("#e_n_type_ac").val();
                            },
                            On_Change_user_id_old: function() {
                                return $("#On_Change_user_id_old").val();
                            },
                            On_Change_type_article_id_old: function() {
                                return $("#On_Change_type_article_id_old").val();
                            }
                        }
                    }
                }
			},
			messages: {
                e_n_name_ex: {
                    valueNotEquals: "กรุณาเลือกชื่อผู้ทรง",
                    remote: "<font color=red>มีผู้ทรง และความชำนาญนี้แล้ว</font>"
                },
                e_n_type_ac: {
                    valueNotEquals: "กรุณาเลือกประเภทบทความ",
                    remote: "<font color=red>มีผู้ทรง และความชำนาญนี้แล้ว</font>"
                }
			}
		});

	});

    $(document).on('click','a[data-role=id_ex]',function(){ 

        var id  = $(this).data('id');
        var t_ex_user_id  = $('#'+id).children('td[data-target=t_ex_user_id]').text();
        var t_ex_type_id  = $('#'+id).children('td[data-target=t_ex_type_id]').text();

        $("#e_n_name_ex").val(t_ex_user_id);
        $("#e_n_type_ac").val(t_ex_type_id);

        $("#hid_user_id ").val(t_ex_user_id);               // ค่าเตรียมบันทึก
        $("#hid_type_article_group_id").val(t_ex_type_id);  // ค่าเตรียมบันทึก 
        $("#hid_id_ex").val(id);                               // ค่าเตรียมบันทึก 

        $("#On_Change_user_id_old").val(t_ex_user_id);  
        $("#On_Change_type_article_id_old").val(t_ex_type_id);  

        $('#e_mo_expertise').modal();

    });

    ///////// เอาค่า seslect e_n_name_ex แก้ไขส่งไป //////// 
    $("#e_n_name_ex").change(function(){
        n_new_ch = $("#e_n_name_ex").val();     // sel
        $('#hid_user_id').val(n_new_ch);        // input
    });

    ///////// เอาค่า seslect e_n_type_ac แก้ไขส่งไป //////// 
    $("#e_n_type_ac").change(function(){
        n_new_ch = $("#e_n_type_ac").val();             // sel
        $('#hid_type_article_group_id').val(n_new_ch);  // input
    }); 

    $("#colse_ex").click(function(){
        window.location.href = 'home_backend.php?type=expertise'; 
    });
    
    $("#sa_expertise").click(function(){
        var form        = "";
        var form        = $("#fr_expertise");
        var n_name_ex   = $("#n_name_ex").val();
        var n_type_ac   = $("#n_type_ac").val();

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_expertise",
                data: {
                    n_name_ex : n_name_ex,
                    n_type_ac : n_type_ac
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

    $("#e_sa_expertise").click(function(){
        var form        = "";
        var form        = $("#e_fr_expertise");
        var e_n_name_ex   = $("#hid_user_id").val();
        var e_n_type_ac   = $("#hid_type_article_group_id").val();
        var id_edit     = $("#hid_id_ex").val();

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_exp", 
                data: {
                    e_n_name_ex : e_n_name_ex,
                    e_n_type_ac : e_n_type_ac,
                    id_edit : id_edit
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
            var form = "";
        }
    });

    $(document).on('click','button[data-role=change_status]',function(){ 

        var id  = $(this).data('id');
        var t_status_status_spacialization  = $('#'+id).children('td[data-target=t_status_status_spacialization]').text();

        if(t_status_status_spacialization == 1)
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
                    url: "u_update.php?action=edit_change_status_spacialization", 
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