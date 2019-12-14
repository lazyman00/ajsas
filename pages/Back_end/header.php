<?php
    $userid = $_SESSION['user_id'];
    $sql_user_data = "SELECT * FROM user 
    LEFT JOIN type_user ON user.type_user_id = type_user.type_user_id 
    LEFT JOIN academe ON user.academe_id = academe.academe_id 
    LEFT JOIN pre ON user.pre_id = pre.pre_id 
    LEFT JOIN type_title ON user.type_title_id = type_title.type_title_id 
    where user.user_id =  $userid ";
    
    $result_user_data = $conn->query($sql_user_data);
    $fetch_user_data = $result_user_data->fetch_assoc();
    $nom_row_user_data = $result_user_data->num_rows;
   // $row_data = $query->fetch_assoc();   
?>
 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="margin-top: -;top: 0px;height: 96px;">
 <img src="../../img/banner2-01.png">
<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <div class="topbar-divider d-none d-sm-block"></div>
  
  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $fetch_user_data["name_th"]  ?> <?php echo $fetch_user_data["surname_th"]  ?></span>
      <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_data_user">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        แก้ไขข้อมูล
      </a>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_pass_user">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        รีเซ็ตรหัสผ่าน
      </a>
      <a class="dropdown-item" href="#">
        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
        Change Data User
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        ออกจากระบบ
      </a>
    </div>
  </li>
</ul>
</nav>

<!-- Logout Modal logoutModal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="login.html">ยืนยัน</a>
        </div>
      </div>
    </div>
  </div>

  <!-- change Data User Modal-->
  <div class="modal fade" id="change_data_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ข้อมูล ผู้ใช้</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_editor_edit_user" name="form_editor_edit_user">
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">อีเมลเข้าสู่ระบบ</h4></label>
                </div>
            </div>
            <div class="row">   
                <div class="col-md-4">
                    <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="editor_edit_email" name="editor_edit_email" value="<?php echo $fetch_user_data['email'];?>" readonly>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">ข้อมูลพื้นฐาน</h4></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">คำนำหน้าทางวิชาการ <span style="color: red;">* </span></label>
                    <select class="form-control" id="editor_edit_pre_name" name="editor_edit_pre_name" readonly>
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_pre_edit_editor = "SELECT pre_id, pre_th FROM pre ";
                        $result_sel_pre_edit_editor = $conn->query($sql_sel_pre_edit_editor);
                        $fetch_sel_pre_edit_editor = $result_sel_pre_edit_editor->fetch_assoc();

                        do{
                          $select = "";
                          if ($fetch_user_data['pre_id'] == $fetch_sel_pre_edit_editor['pre_id']) { 
                            $select = "selected"; 
                          } 
?>
                        <option value="<?php echo $fetch_sel_pre_edit_editor['pre_id'];?>" <?php echo $select;?> ><?php echo $fetch_sel_pre_edit_editor['pre_th'];?></option>
<?php
                        }while($fetch_sel_pre_edit_editor = $result_sel_pre_edit_editor->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">คำนำหน้า <span style="color: red;">* </span></label>
                    <select class="form-control" id="editor_edit_title_name" name="editor_edit_title_name" readonly>
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_type_title_edit_editor = "SELECT type_title_id, type_title_name FROM type_title ";
                        $result_sel_type_title_edit_editor = $conn->query($sql_sel_type_title_edit_editor);
                        $fetch_sel_type_title_edit_editor = $result_sel_type_title_edit_editor->fetch_assoc();
                        do{

                        $select = "";
                        if ($fetch_user_data['type_title_id'] == $fetch_sel_type_title_edit_editor['type_title_id']) { 
                          $select = "selected"; 
                        } 
?>
                        <option value="<?php echo $fetch_sel_type_title_edit_editor['type_title_id'];?>" <?php echo $select;?>><?php echo $fetch_sel_type_title_edit_editor['type_title_name'];?></option>
<?php
                        }while($fetch_sel_type_title_edit_editor = $result_sel_type_title_edit_editor->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">ชื่อ (ภาษาไทย) <span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="editor_edit_name_thai" name="editor_edit_name_thai" value="<?php echo $fetch_user_data['name_th']; ?>" placeholder="" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">นามสกุล (ภาษาไทย)<span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="editor_edit_last_names_thai" name="editor_edit_last_names_thai" value="<?php echo $fetch_user_data['surname_th']; ?>" placeholder="" readonly>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">ชื่อ (ภาษาอังกฤษ) <span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="editor_edit_name_eng" name="editor_edit_name_eng" value="<?php echo $fetch_user_data['name_en']; ?>" placeholder="" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">นามสกุล (ภาษาอังกฤษ)<span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="editor_edit_last_names_eng" name="editor_edit_last_names_eng" value="<?php echo $fetch_user_data['surname_en']; ?>" placeholder="" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">ประเภทผู้ใช้ <span style="color: red;">* </span></label>
                    <select class="form-control" id="editor_edit_type_user" name="editor_edit_type_user" readonly>
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_type_user_edit_editor = "SELECT type_user_id, type_user_name FROM type_user ";
                        $result_sel_type_user_edit_editor = $conn->query($sql_sel_type_user_edit_editor);
                        $fetch_sel_type_user_edit_editor = $result_sel_type_user_edit_editor->fetch_assoc();
                        do{

                        $select = "";
                        if ($fetch_user_data['type_user_id'] == $fetch_sel_type_user_edit_editor['type_user_id']) { 
                          $select = "selected"; 
                        } 
?>
                        <option value="<?php echo $fetch_sel_type_user_edit_editor['type_user_id'];?>" <?php echo $select;?>><?php echo $fetch_sel_type_user_edit_editor['type_user_name'];?></option>
<?php
                        }while($fetch_sel_type_user_edit_editor = $result_sel_type_user_edit_editor->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">สถานศึกษา<span style="color: red;"> * </span></label>
                    <select class="form-control" id="editor_edit_academe" name="editor_edit_academe" readonly>
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_academe_edit_editor = "SELECT academe_id, academe_name FROM academe ";
                        $result_sel_academe_edit_editor = $conn->query($sql_sel_academe_edit_editor);
                        $fetch_sel_academe_edit_editor = $result_sel_academe_edit_editor->fetch_assoc();
                        do{

                        $select = "";
                        if ($fetch_user_data['academe_id'] == $fetch_sel_academe_edit_editor['academe_id']) { 
                          $select = "selected"; 
                        } 
?>
                        <option value="<?php echo $fetch_sel_academe_edit_editor['academe_id'];?>" <?php echo $select;?>><?php echo $fetch_sel_academe_edit_editor['academe_name'];?></option>
<?php
                        }while($fetch_sel_academe_edit_editor = $result_sel_academe_edit_editor->fetch_assoc());
?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                    <input type="text" class="form-control" id="editor_edit_phone" name="editor_edit_phone" value="<?php echo $fetch_user_data['phonenumber_user']; ?>" placeholder="" readonly>
                </div>
                <div class="col-md-9"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">ที่อยู่ปัจจุบัน</h4></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9"> 
                    <textarea rows="4" cols="50" id="editor_edit_address" name="editor_edit_address" class="form-control" readonly><?php echo $fetch_user_data['address_user']; ?></textarea>
                </div>
                <div class="col-md-9"></div>
            </div>
            <input type="hidden" id="editor_id_edit_user_data" name="editor_id_edit_user_data" value="<?php echo $fetch_user_data['user_id']; ?>">
            </form>
        </div>
        <div class="modal-footer">
            <div class="container text-center">
                <button class="btn btn-warning" type="button" id="editor_button_edit" name="editor_button_edit">แก้ไข</button> 
                <button class="btn btn-secondary" id="editor_button_close" name="editor_button_close" type="button" data-dismiss="modal">ปิด</button>
                <button class="btn btn-primary" type="button" id="editor_save_form_edit_mange_user" name="editor_save_form_edit_mange_user" style ="display:none">บันทึก</button> 
                <button class="btn btn-secondary" type="button" id="editor_button_close_edit" name="editor_button_close_edit" style ="display:none">ยกเลิกการแก้ไข</button>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- change Data User Modal-->
  <div class="modal fade" id="change_pass_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">รีเซ็ตรหัสผ่าน </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_reset_password_user" name="colse_mo_reset_password_user"> 
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_edit_reset_password_data_user_editor" name="form_edit_reset_password_data_user_editor">
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h5 style="font-weight: 600;">รหัสผ่าน (เดิม)</h5></label><br>
                        <input class="form-control" type="password" name="reset_old" id="reset_old" value="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h5 style="font-weight: 600;">รหัสผ่าน (ใหม่)</h5></label><br>
                        <input class="form-control" type="password" name="new_reset_old" id="new_reset_old" value="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h5 style="font-weight: 600;">ยืนยันรหัสผ่าน (เก่า)</h5></label><br>
                        <input class="form-control" type="password" name="conf_new_reset_old" id="conf_new_reset_old" value="">
                    </div>
                </div>
                <input type="hidden" id="id_reset_password_manage_user_editor" name="id_reset_password_manage_user_editor" value="<?php echo $fetch_user_data['user_id']; ?>">
            </form>
        </div>
        <div class="modal-footer">
            <div class="container text-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-primary" type="button" id="save_form_reset_password_user_editor" name="save_form_reset_password_user_editor">บันทึก</button> 
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>

     $(document).ready(function() {

         $('#form_edit_reset_password_data_user_editor').validate({
			errorClass: "errors",
			rules: {
                reset_old: {
                    required: true,
					remote: { 
						url: "header_data.php?action=check_reset_old",
						type: "post",
						cache: false,
						global: false,
						data: { 
							reset_old: function() {
								return $("#reset_old").val();
							},
                            id_reset_password_manage_user_editor: function() {
								return $("#id_reset_password_manage_user_editor").val();
							}
						}
					}
                },
                new_reset_old: {
                    required: true
                },
                conf_new_reset_old: {
                    required: true,
                    equalTo : "#new_reset_old"
                }
			},
			messages: {
                reset_old: {
                    required: "กรุณากรอก รหัสผ่านเดิม",
                    remote: "รหัสผ่านเดิมไม่ถูกต้อง"
                },
                new_reset_old: {
                    required: "กรุณากรอก รหัสผ่านเดิมใหม่"
                },
                conf_new_reset_old: {
                    required: "กรุณากรอก รหัสผ่านเดิมใหม่ (ยืนยัน)",
                    equalTo: "หรัสผ่านไม่ตรงกัน"
                }

			}
		});

     });
     
    // click edit
    $("#editor_button_edit").click(function(){

      $('#editor_edit_email').attr('readonly', false);
      $('#editor_edit_pre_name').attr('readonly', false);
      $('#editor_edit_title_name').attr('readonly', false);
      $('#editor_edit_name_thai').attr('readonly', false);
      $('#editor_edit_last_names_thai').attr('readonly', false);
      $('#editor_edit_name_eng').attr('readonly', false);
      $('#editor_edit_last_names_eng').attr('readonly', false);
      $('#editor_edit_type_user').attr('readonly', false);
      $('#editor_edit_academe').attr('readonly', false);
      $('#editor_edit_phone').attr('readonly', false);
      $('#editor_edit_address').attr('readonly', false);

      $("#editor_save_form_edit_mange_user").show();
      $("#editor_button_close_edit").show();
      $("#editor_button_edit").hide();
      $("#editor_button_close").hide();
      });

      // click not edit
      $("#editor_button_close_edit").click(function(){

      $('#editor_edit_email').attr('readonly', true);
      $('#editor_edit_pre_name').attr('readonly', true);
      $('#editor_edit_title_name').attr('readonly', true);
      $('#editor_edit_name_thai').attr('readonly', true);
      $('#editor_edit_last_names_thai').attr('readonly', true);
      $('#editor_edit_name_eng').attr('readonly', true);
      $('#editor_edit_last_names_eng').attr('readonly', true);
      $('#editor_edit_type_user').attr('readonly', true);
      $('#editor_edit_academe').attr('readonly', true);
      $('#editor_edit_phone').attr('readonly', true);
      $('#editor_edit_address').attr('readonly', true);

      $("#editor_button_edit").show();
      $("#editor_button_close").show();
      $("#editor_button_close_edit").hide();
      $("#editor_save_form_edit_mange_user").hide();

    });

    $("#editor_save_form_edit_mange_user").click(function(){
      
        $.ajax({
          type: "POST",
          url: "u_update.php?action=edit_data_user", 
          data: {
              id : $("#editor_id_edit_user_data").val(), 
              editor_edit_email : $('#editor_edit_email').val(),
              editor_edit_pre_name : $('#editor_edit_pre_name').val(),
              editor_edit_title_name : $('#editor_edit_title_name').val(),
              editor_edit_name_thai : $('#editor_edit_name_thai').val(),
              editor_edit_last_names_thai : $('#editor_edit_last_names_thai').val(),
              editor_edit_name_eng : $('#editor_edit_name_eng').val(),
              editor_edit_last_names_eng : $('#editor_edit_last_names_eng').val(),
              editor_edit_type_user : $('#editor_edit_type_user').val(),
              editor_edit_academe : $('#editor_edit_academe').val(),
              editor_edit_phone : $('#editor_edit_phone').val(),
              editor_edit_address : $('#editor_edit_address').val()
          },
          success: function(data, status) {
              response = data.trim(); 
              //alert(response);

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
    });

    $("#save_form_reset_password_user_editor").click(function(){
        var form        = "";
        var form        = $("#form_edit_reset_password_data_user_editor");

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=reset_password_user_editor", 
                data: {
                    id_reset_password_manage_user_editor: $("#id_reset_password_manage_user_editor").val(),
                    new_reset_password_editor: $("#new_reset_old").val()
                },
                success: function(data, status) {
                    response = data.trim();

                    if(response == "true") // Success
                    {
                        Swal.fire({
                            title: "<font color=#009900>สำเร็จ!</font>", 
                            text: "แก้ไขรหัสผ่าน สำเร็จ!",
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
  </script>
<!-- End of Topbar -->