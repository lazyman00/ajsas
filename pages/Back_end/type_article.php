<?php 
    // include '../../connect/connect.php';  
    $sql_type_ac = "SELECT * FROM type_article ";
    $result_type_ac = $conn->query($sql_type_ac);
    $fetch_type_ac = $result_type_ac->fetch_assoc();
    $nom_row_type_ac = $result_type_ac->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#mo_type_article">
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
                <th width="65%">ชื่อสถานศึกษา</th>
                <th width="15%">สถานะ</th>
                <th width="15%">แก้ไข</th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_type_ac > 0){
            do{
?>
            <tr id="<?php echo $fetch_type_ac['type_article_id']; ?>">
                <td align="center"><?php echo $i;?></td>
                <td data-target="t_type_article_name"><?php echo $fetch_type_ac['type_article_name'];?></td> 
                <td align="center">
<?php
                    if($fetch_type_ac['status_type_article'] == 1){
?>
                    <button class="btn btn-success btn-sm" data-role="change_status" data-id="<?php echo $fetch_type_ac['type_article_id']; ?>" type="button" >เปิด</button>
<?php
                    }else{
?>
                    <button class="btn btn-danger btn-sm" data-role="change_status" data-id="<?php echo $fetch_type_ac['type_article_id']; ?>" type="button" >ปิด</button>
<?php
                    }
?>
                </td>
                <td align="center">
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_type_article" data-id="<?php echo $fetch_type_ac['type_article_id'] ;?>" >แก้ไข</a>
                </td>
                <td data-target="t_status_type_article" style ="display:none"><?php echo $fetch_type_ac['status_type_article'];?></td>
            </tr>
<?php
            $i++;
            }while($fetch_type_ac = $result_type_ac->fetch_assoc());
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
<div class="modal fade" id="mo_type_article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สาขา</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_type_ac" name="colse_type_ac">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="fr_type_article" name="fr_type_article">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-4 col-lg-4" align="right">ชื่อสาขา : </div>
                    <div class="col-xl-8 col-lg-8"><input class="form-control" type="text" size="30" name="name_type" id="name_type" ></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" id="sa_type_ac" name="sa_type_ac">เพิ่ม</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Modal type_article -->
<div class="modal fade" id="e_type_article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล สาขา</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_type_ac" name="colse_type_ac">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="e_fr_type_article" name="e_fr_type_article">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-xl-4 col-lg-4" align="right">ชื่อสาขา : </div>
                    <div class="col-xl-8 col-lg-8"><input class="form-control" type="text" size="30" name="e_name_type" id="e_name_type" ></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" id="e_sa_type_ac" name="e_sa_type_ac">แก้ไข</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <input type="hidden" size="30" name="id_type_ac" id="id_type_ac" >
        </div>
      </div>
    </div>
  </div>
<!-- Modal type_article -->

  <script>
    $(document).ready(function() {

		$('#fr_type_article').validate({
			errorClass: "errors",
			rules: {
                name_type: {
                        required: true
                }
			},
			messages: {
                name_type: {
                        required: "กรุณากรอกชื่อสาขาของท่าน"
                }
			}
		});

        $('#e_fr_type_article').validate({
			errorClass: "errors",
			rules: {
                e_name_type: {
                        required: true
                }
			},
			messages: {
                e_name_type: {
                        required: "กรุณากรอกชื่อสาขาของท่าน"
                }
			}
		});

	});

    $("#colse_type_ac").click(function(){
        window.location.href = 'home_backend.php?type=type_article'; 
    });

    $(document).on('click','a[data-role=id_type_article]',function(){ 

        var id  = $(this).data('id');
        var t_type_article_name  = $('#'+id).children('td[data-target=t_type_article_name]').text();

        $("#e_name_type").val(t_type_article_name); 
        $("#id_type_ac").val(id);

        $('#e_type_article').modal();

    });
    
    $("#sa_type_ac").click(function(){
        var form     = "";
        var form     = $("#fr_type_article");
        var name_type  = $("#name_type").val();

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_type_ac", 
                data: {
                    name_type : name_type
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

    $("#e_sa_type_ac").click(function(){
        var form     = "";
        var form     = $("#e_fr_type_article");
        var e_name_type  = $("#e_name_type").val();
        var id_edit  = $("#id_type_ac").val();

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_type_ac",  
                data: {
                    e_name_type : e_name_type,
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
            var form = "";
        }
    });

    $(document).on('click','button[data-role=change_status]',function(){ 

        var id  = $(this).data('id');
        var t_status_type_article  = $('#'+id).children('td[data-target=t_status_type_article]').text();

        if(t_status_type_article == 1)
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
                    url: "u_update.php?action=edit_change_status_type_article", 
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