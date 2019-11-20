<?php 
    // include '../../connect/connect.php'; 
    $sql_user = "SELECT * FROM user 
    LEFT JOIN academe ON user.academe_id = academe.academe_id 
    LEFT JOIN pre ON user.pre_id = pre.pre_id 
    LEFT JOIN type_title ON user.type_title_id = type_title.type_title_id 
    
    ";
    
    $result_user = $conn->query($sql_user);
    $fetch_user = $result_user->fetch_assoc();
    $nom_row_user = $result_user->num_rows;
    $i = 1;
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom type="submit" class="btn btn-primary btn-primary-split btn-sm" data-toggle="modal" data-target="#add_mange_user_user">
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
                <th width="15%">คำนำหน้าทางวิชาการ</th>
                <th width="13%">ชื่อ-นามสกุล</th>
                <th width="16%">ชื่อสถานศึกษา</th>
                <th width="14%">อีเมล</th>
                <th width="12%">หมายเลขโทรศัพท์</th>
                <th width="10%">สถานะ</th>
                <th width="6%">Edit</th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
                <th style ="display:none"></th>
            </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_user > 0){
            do{
?>
            <tr id="<?php echo $fetch_user['user_id']; ?>">
                <td><?php echo $i;?></td>
                <td><?php echo $fetch_user['pre_th'];?></td>
                <td><?php echo $fetch_user['type_title_name']." ".$fetch_user['name_th']." ".$fetch_user['surname_th'];?></td>
                <td><?php echo $fetch_user['academe_name'];?></td>
                <td><?php echo $fetch_user['email'];?></td>
                <td><?php echo $fetch_user['phonenumber_user'];?></td>
                <td align="center">
<?php 
                $chk_show_status = $fetch_user['status_user'];
                echo ($chk_show_status == 1) ? "<font color=green>ใช้งานปกติ</font>" : "<font color=red>ปิดการใช้งาน</font>";
                    
?>
                </td>
                <td align="center">
                    <a class="btn btn-primary btn-sm" href="#" data-role="id_mo_title_t" data-id="<?php echo $fetch_user['user_id']; ?>" >Edit</a>
                </td>
                <td data-target="t_edit_email" style ="display:none" ><?php echo $fetch_user['email']; ?></td>
                <td data-target="t_edit_academe_id" style ="display:none" ><?php echo $fetch_user['academe_id']; ?></td>
                <td data-target="t_edit_type_title_id" style ="display:none" ><?php echo $fetch_user['type_title_id']; ?></td>
                <td data-target="t_edit_pre_id" style ="display:none" ><?php echo $fetch_user['pre_id']; ?></td>
                <td data-target="t_edit_name_th" style ="display:none" ><?php echo $fetch_user['name_th']; ?></td>
                <td data-target="t_edit_surname_th" style ="display:none" ><?php echo $fetch_user['surname_th']; ?></td>
                <td data-target="t_edit_name_en" style ="display:none" ><?php echo $fetch_user['name_en']; ?></td>
                <td data-target="t_edit_surname_en" style ="display:none" ><?php echo $fetch_user['surname_en']; ?></td>
                <td data-target="t_edit_address" style ="display:none" ><?php echo $fetch_user['address_user']; ?></td>
                <td data-target="t_edit_phonenumber" style ="display:none" ><?php echo $fetch_user['phonenumber_user']; ?></td>
                <td data-target="t_edit_status_user" style ="display:none" ><?php echo $fetch_user['status_user']; ?></td>
            </tr>
<?php
            $i++;
            }while($fetch_user = $result_user->fetch_assoc());
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
<div class="modal fade" id="add_mange_user_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล ผู้ใช้</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title_t" name="colse_title_t">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_add_mange_user_user" name="form_add_mange_user_user">
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">หรัสเข้าสู่ระบบ</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_email" name="add_email" value="" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="">รหัสผ่าน <span style="color: red;"> * </span></label>
                        <input type="password" class="form-control" id="add_pass" name="add_pass" value="" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label for="">รหัสผ่าน (ยืนยันรหัสผ่าน)<span style="color: red;"> * </span></label>
                        <input type="password" class="form-control" id="add_conf_pass" name="add_conf_pass" value="" placeholder="">
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
                        <select class="form-control" id="add_pre_name" name="add_pre_name">
                            <option value="0">กรุณาเลือก</option>
<?php
                            $sql_sel_pre = "SELECT pre_id, pre_th FROM pre ";
                            $result_sel_pre = $conn->query($sql_sel_pre);
                            $fetch_sel_pre = $result_sel_pre->fetch_assoc();
                            do{
?>
                            <option value="<?php echo $fetch_sel_pre['pre_id'];?>"><?php echo $fetch_sel_pre['pre_th'];?></option>
<?php
                            }while($fetch_sel_pre = $result_sel_pre->fetch_assoc());
?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">คำนำหน้า <span style="color: red;">* </span></label>
                        <select class="form-control" id="add_title_name" name="add_title_name">
                            <option value="0">กรุณาเลือก</option>
<?php
                            $sql_sel_type_title = "SELECT type_title_id, type_title_name FROM type_title ";
                            $result_sel_type_title = $conn->query($sql_sel_type_title);
                            $fetch_sel_type_title = $result_sel_type_title->fetch_assoc();
                            do{
?>
                            <option value="<?php echo $fetch_sel_type_title['type_title_id'];?>"><?php echo $fetch_sel_type_title['type_title_name'];?></option>
<?php
                            }while($fetch_sel_type_title = $result_sel_type_title->fetch_assoc());
?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">ชื่อ (ภาษาไทย) <span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_name_thai" name="add_name_thai" value="" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="">นามสกุล (ภาษาไทย)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_last_names_thai" name="add_last_names_thai" value="" placeholder="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">ชื่อ (ภาษาอังกฤษ) <span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_name_eng" name="add_name_eng" value="" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="">นามสกุล (ภาษาอังกฤษ)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_last_names_eng" name="add_last_names_eng" value="" placeholder="">
                    </div>
                    <div class="col-md-3">
                        <label for="">สถานศึกษา<span style="color: red;"> * </span></label>
                        <select class="form-control" id="add_academe" name="add_academe">
                            <option value="0">กรุณาเลือก</option>
<?php
                            $sql_sel_academe = "SELECT academe_id, academe_name FROM academe ";
                            $result_sel_academe = $conn->query($sql_sel_academe);
                            $fetch_sel_academe = $result_sel_academe->fetch_assoc();
                            do{
?>
                            <option value="<?php echo $fetch_sel_academe['academe_id'];?>"><?php echo $fetch_sel_academe['academe_name'];?></option>
<?php
                            }while($fetch_sel_academe = $result_sel_academe->fetch_assoc());
?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                        <input type="text" class="form-control" id="add_phone" name="add_phone" value="" placeholder="">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">ที่อยู่ปัจจุบัน</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9"> 
                        <textarea rows="4" cols="50" id="add_address" name="add_address" class="form-control"></textarea>
                    </div>
                    <div class="col-md-9"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="save_form_add_mange_user" name="save_form_add_mange_user">บันทึก</button>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Edit Modal title -->
<div class="modal fade" id="op_mo_edit_manage_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_title_t" name="colse_title_t">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">หรัสเข้าสู่ระบบ</h4></label>
                </div>
            </div>
            <div class="row">   
                <div class="col-md-4">
                    <form id="form_edit_mange_user_user_no1" name="form_edit_mange_user_user_no1">
                        <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="edit_email" name="edit_email" value=""  >
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="form_edit_mange_user_user_no2" name="form_edit_mange_user_user_no2">
                        <label for="">รหัสผ่าน <span style="color: red;"> * </span></label>
                        <input type="password" class="form-control" id="edit_pass" name="edit_pass" value="" readonly>
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="form_edit_mange_user_user_no3" name="form_edit_mange_user_user_no3">
                        <label for="">รหัสผ่าน (ยืนยันรหัสผ่าน)<span style="color: red;"> * </span></label>
                        <input type="password" class="form-control" id="edit_conf_pass" name="edit_conf_pass" value="" readonly>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">ข้อมูลพื้นฐาน</h4></label>
                </div>
            </div>
            <form id="form_edit_mange_user_user_no4" name="form_edit_mange_user_user_no4">
            <div class="row">
                <div class="col-md-3">
                    <label for="">คำนำหน้าทางวิชาการ <span style="color: red;">* </span></label>
                    <select class="form-control" id="edit_pre_name" name="edit_pre_name">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_pre_edit = "SELECT pre_id, pre_th FROM pre ";
                        $result_sel_pre_edit = $conn->query($sql_sel_pre_edit);
                        $fetch_sel_pre_edit = $result_sel_pre_edit->fetch_assoc();
                        do{
?>
                        <option value="<?php echo $fetch_sel_pre_edit['pre_id'];?>"><?php echo $fetch_sel_pre_edit['pre_th'];?></option>
<?php
                        }while($fetch_sel_pre_edit = $result_sel_pre_edit->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">คำนำหน้า <span style="color: red;">* </span></label>
                    <select class="form-control" id="edit_title_name" name="edit_title_name">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_type_title_edit = "SELECT type_title_id, type_title_name FROM type_title ";
                        $result_sel_type_title_edit = $conn->query($sql_sel_type_title_edit);
                        $fetch_sel_type_title_edit = $result_sel_type_title_edit->fetch_assoc();
                        do{
?>
                        <option value="<?php echo $fetch_sel_type_title_edit['type_title_id'];?>"><?php echo $fetch_sel_type_title_edit['type_title_name'];?></option>
<?php
                        }while($fetch_sel_type_title_edit = $result_sel_type_title_edit->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">ชื่อ (ภาษาไทย) <span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="edit_name_thai" name="edit_name_thai" value="" placeholder="">
                </div>
                <div class="col-md-3">
                    <label for="">นามสกุล (ภาษาไทย)<span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="edit_last_names_thai" name="edit_last_names_thai" value="" placeholder="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="">ชื่อ (ภาษาอังกฤษ) <span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="edit_name_eng" name="edit_name_eng" value="" placeholder="">
                </div>
                <div class="col-md-3">
                    <label for="">นามสกุล (ภาษาอังกฤษ)<span style="color: red;"> * </span></label>
                    <input type="text" class="form-control" id="edit_last_names_eng" name="edit_last_names_eng" value="" placeholder="">
                </div>
                <div class="col-md-3">
                    <label for="">สถานศึกษา<span style="color: red;"> * </span></label>
                    <select class="form-control" id="edit_academe" name="edit_academe">
                        <option value="0">กรุณาเลือก</option>
<?php
                        $sql_sel_academe_edit = "SELECT academe_id, academe_name FROM academe ";
                        $result_sel_academe_edit = $conn->query($sql_sel_academe_edit);
                        $fetch_sel_academe_edit = $result_sel_academe_edit->fetch_assoc();
                        do{
?>
                        <option value="<?php echo $fetch_sel_academe_edit['academe_id'];?>"><?php echo $fetch_sel_academe_edit['academe_name'];?></option>
<?php
                        }while($fetch_sel_academe_edit = $result_sel_academe_edit->fetch_assoc());
?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                    <input type="text" class="form-control" id="edit_phone" name="edit_phone" value="" placeholder="">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">ที่อยู่ปัจจุบัน</h4></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9"> 
                    <textarea rows="4" cols="50" id="edit_address" name="edit_address" class="form-control"></textarea>
                </div>
                <div class="col-md-9"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                
                    <label for=""><h4 style="font-weight: 600;">เปลี่ยน สถานะการใช้งาน</h4></label><br>
                    <input type="radio" name="radio_status" id="radio_status_on" value="1"> <font color=green>ใช้งานปกติ </font>&nbsp;
                    <input type="radio" name="radio_status" id="radio_status_off" value="0"><font color=red> ปิดการใช้งาน </font>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for=""><h4 style="font-weight: 600;">รีเซ็ต รหัสผ่าน</h4></label><br>
                    <input type="radio" name="radio_reset_password" id="radio_reset_password_no" value="0" checked > ปกติ &nbsp;
                    <input type="radio" name="radio_reset_password" id="radio_reset_password_auto" value="1"> รีเซ็ต รหัสผ่านแบบอัตโนมัติ &nbsp;
                    <input type="radio" name="radio_reset_password" id="radio_reset_password_determine" value="2"> รีเซ็ต รหัสผ่านแบบกำหนดเอง
                </div>
            </div>
            <input type="hidden" id="id_edit_manage_user" name="id_edit_manage_user" value="">
            <input type="hidden" id="hidden_edit_pre_name" name="hidden_edit_pre_name" value="">
            <input type="hidden" id="hidden_edit_title_name" name="hidden_edit_title_name" value=""> 
            <input type="hidden" id="hidden_edit_academe" name="hidden_edit_academe" value=""> 
            <input type="hidden" id="hidden_radio_status" name="hidden_radio_status" value=""> 
            <input type="hidden" id="hidden_radio_reset_password" name="hidden_radio_reset_password" value="0">
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <button class="btn btn-primary" type="button" id="save_form_edit_mange_user" name="save_form_edit_mange_user">บันทึก</button> 
        </div>
      </div>
    </div>
  </div>
<!-- Edit Modal title -->
<!-- display:none -->
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

        
		$('#form_add_mange_user_user').validate({
			errorClass: "errors",
			rules: {
                add_email:{
                    required: true,
                    email: true
                },
                add_pass:{
                    required: true
                },
                add_conf_pass:{
                    required: true,
                    equalTo: "#add_pass"
                },
                add_pre_name: {
                    valueNotEquals: "0"
                },
                add_title_name: {
                    valueNotEquals: "0"
                },
                add_name_thai: {
                        required: true
                },
                add_last_names_thai: {
                        required: true
                },
                add_name_eng: {
                        required: true
                },
                add_last_names_eng: {
                        required: true
                },
                add_academe:{
                        valueNotEquals: "0"
                },
                add_phone: {
                        required: true
                },
                add_address: {
                        valueNotEquals: ""
                }
			},
			messages: {
                add_email:{
                    required: "กรุณากรอกอีเมล (E-mail) ของท่าน",
                    email: "รูปแบของ Email ของท่านไม่ถูกต้อง!"
                },
                add_pass:{
                    required: "กรุณากรอก password ของท่าน"
                },
                add_conf_pass:{
                    required: "กรุณากรอกยืนยัน password ของท่าน",
                    equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
                },
                add_pre_name: {
                    valueNotEquals: "กรุณาเลือกคำนำหน้าทางวิชาการของท่าน"
                },
                add_title_name: {
                    valueNotEquals: "กรุณาเลือกคำนำหน้าของท่าน"
                },
                add_name_thai: {
                        required: "กรุณากรอกชื่อ (ภาษาไทย) ของท่าน"
                },
                add_last_names_thai: {
                        required: "กรุณากรอกนามสกุล (ภาษาไทย) ของท่าน"
                },
                add_name_eng: {
                        required: "กรุณากรอกชื่อ (ภาษาอังกฤษ) ของท่าน"
                },
                add_last_names_eng: {
                        required: "กรุณากรอกนามสกุล (ภาษาอังกฤษ) ของท่าน"
                },
                add_academe:{
                        valueNotEquals: "กรุณาเลือกสถานศึกษาของท่าน"
                },
                add_phone: {
                        required: "กรุณากรอกหมายเลขโทรศัพท์ของท่าน"
                },
                add_address: {
                        valueNotEquals: "กรุณากรอกที่อยู่ของท่าน"
                }
			}
		});

        $('#form_edit_mange_user_user_no1').validate({
			errorClass: "errors",
			rules: {
                edit_email:{
                    required: true,
                    email: true
                }
			},
			messages: {
                edit_email:{
                    required: "กรุณากรอกอีเมล (E-mail) ของท่าน",
                    email: "รูปแบของ Email ของท่านไม่ถูกต้อง!"
                }
			}
		});

        $('#form_edit_mange_user_user_no2').validate({
			errorClass: "errors",
			rules: {
                edit_pass:{
                    required: true
                }
			},
			messages: {
                edit_pass:{
                    required: "กรุณากรอก password ของท่าน"
                }
			}
		});

        $('#form_edit_mange_user_user_no3').validate({
			errorClass: "errors",
			rules: {
                edit_conf_pass:{
                    required: true,
                    equalTo: "#edit_pass"
                }
			},
			messages: {
                edit_conf_pass:{
                    required: "กรุณากรอกยืนยัน password ของท่าน",
                    equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
                }
			}
		});

        $('#form_edit_mange_user_user_no4').validate({
			errorClass: "errors",
			rules: {
                edit_pre_name: {
                    valueNotEquals: "0"
                },
                edit_title_name: {
                    valueNotEquals: "0"
                },
                edit_name_thai: {
                        required: true
                },
                edit_last_names_thai: {
                        required: true
                },
                edit_name_eng: {
                        required: true
                },
                edit_last_names_eng: {
                        required: true
                },
                edit_academe:{
                        valueNotEquals: "0"
                },
                edit_phone: {
                        required: true
                },
                edit_address: {
                        valueNotEquals: ""
                }
			},
			messages: {
                edit_pre_name: {
                    valueNotEquals: "กรุณาเลือกคำนำหน้าทางวิชาการของท่าน"
                },
                edit_title_name: {
                    valueNotEquals: "กรุณาเลือกคำนำหน้าของท่าน"
                },
                edit_name_thai: {
                        required: "กรุณากรอกชื่อ (ภาษาไทย) ของท่าน"
                },
                edit_last_names_thai: {
                        required: "กรุณากรอกนามสกุล (ภาษาไทย) ของท่าน"
                },
                edit_name_eng: {
                        required: "กรุณากรอกชื่อ (ภาษาอังกฤษ) ของท่าน"
                },
                edit_last_names_eng: {
                        required: "กรุณากรอกนามสกุล (ภาษาอังกฤษ) ของท่าน"
                },
                edit_academe:{
                        valueNotEquals: "กรุณาเลือกสถานศึกษาของท่าน"
                },
                edit_phone: {
                        required: "กรุณากรอกหมายเลขโทรศัพท์ของท่าน"
                },
                edit_address: {
                        valueNotEquals: "กรุณากรอกที่อยู่ของท่าน"
                }
			}
		});


        // $('#form_edit_mange_user_user_no1').validate({
		// 	errorClass: "errors",
		// 	rules: {
        //         edit_email:{
        //             required: true,
        //             email: true
        //         },
        //         edit_pass:{
        //             required: true
        //         },
        //         edit_conf_pass:{
        //             required: true,
        //             equalTo: "#add_pass"
        //         },
        //         edit_pre_name: {
        //             valueNotEquals: "0"
        //         },
        //         edit_title_name: {
        //             valueNotEquals: "0"
        //         },
        //         edit_name_thai: {
        //                 required: true
        //         },
        //         edit_last_names_thai: {
        //                 required: true
        //         },
        //         edit_name_eng: {
        //                 required: true
        //         },
        //         edit_last_names_eng: {
        //                 required: true
        //         },
        //         edit_academe:{
        //                 valueNotEquals: "0"
        //         },
        //         edit_phone: {
        //                 required: true
        //         },
        //         edit_address: {
        //                 valueNotEquals: ""
        //         }
		// 	},
		// 	messages: {
        //         edit_email:{
        //             required: "กรุณากรอกอีเมล (E-mail) ของท่าน",
        //             email: "รูปแบของ Email ของท่านไม่ถูกต้อง!"
        //         },
        //         edit_pass:{
        //             required: "กรุณากรอก password ของท่าน"
        //         },
        //         edit_conf_pass:{
        //             required: "กรุณากรอกยืนยัน password ของท่าน",
        //             equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
        //         },
        //         edit_pre_name: {
        //             valueNotEquals: "กรุณาเลือกคำนำหน้าทางวิชาการของท่าน"
        //         },
        //         edit_title_name: {
        //             valueNotEquals: "กรุณาเลือกคำนำหน้าของท่าน"
        //         },
        //         edit_name_thai: {
        //                 required: "กรุณากรอกชื่อ (ภาษาไทย) ของท่าน"
        //         },
        //         edit_last_names_thai: {
        //                 required: "กรุณากรอกนามสกุล (ภาษาไทย) ของท่าน"
        //         },
        //         edit_name_eng: {
        //                 required: "กรุณากรอกชื่อ (ภาษาอังกฤษ) ของท่าน"
        //         },
        //         edit_last_names_eng: {
        //                 required: "กรุณากรอกนามสกุล (ภาษาอังกฤษ) ของท่าน"
        //         },
        //         edit_academe:{
        //                 valueNotEquals: "กรุณาเลือกสถานศึกษาของท่าน"
        //         },
        //         edit_phone: {
        //                 required: "กรุณากรอกหมายเลขโทรศัพท์ของท่าน"
        //         },
        //         edit_address: {
        //                 valueNotEquals: "กรุณากรอกที่อยู่ของท่าน"
        //         }
		// 	}
		// });

	});

    $("#colse_title_t").click(function(){
        window.location.href = 'home_backend.php?type=manage_user_user'; 
    });

    $(document).on('click','a[data-role=id_mo_title_t]',function(){ 

        var id  = $(this).data('id');
        var t_edit_email  = $('#'+id).children('td[data-target=t_edit_email]').text();
        var t_edit_academe_id  = $('#'+id).children('td[data-target=t_edit_academe_id]').text();
        var t_edit_type_title_id  = $('#'+id).children('td[data-target=t_edit_type_title_id]').text();
        var t_edit_pre_id  = $('#'+id).children('td[data-target=t_edit_pre_id]').text();
        var t_edit_name_th  = $('#'+id).children('td[data-target=t_edit_name_th]').text();
        var t_edit_surname_th  = $('#'+id).children('td[data-target=t_edit_surname_th]').text();
        var t_edit_name_en  = $('#'+id).children('td[data-target=t_edit_name_en]').text();
        var t_edit_surname_en  = $('#'+id).children('td[data-target=t_edit_surname_en]').text();
        var t_edit_address  = $('#'+id).children('td[data-target=t_edit_address]').text();
        var t_edit_phonenumber  = $('#'+id).children('td[data-target=t_edit_phonenumber]').text();
        var t_edit_status_user  = $('#'+id).children('td[data-target=t_edit_status_user]').text();
        
        // ตรวจสอบเพื่อ chacke status
        if(t_edit_status_user == 1)
		{
			$("#radio_status_on").prop("checked", true);
		}
		else if(t_edit_status_user == 0)
		{
			$("#radio_status_off").prop("checked", true);
		}

        $("#id_edit_manage_user").val(id);
        $("#edit_email").val(t_edit_email);
        $("#edit_pre_name").val(t_edit_pre_id);
        $("#edit_title_name").val(t_edit_type_title_id);
        $("#edit_name_thai").val(t_edit_name_th);
        $("#edit_last_names_thai").val(t_edit_surname_th);
        $("#edit_name_eng").val(t_edit_name_en);
        $("#edit_last_names_eng").val(t_edit_surname_en);
        $("#edit_academe").val(t_edit_academe_id);
        $("#edit_phone").val(t_edit_phonenumber); 
        $("#edit_address").val(t_edit_address);
        $("#hidden_radio_status").val(t_edit_status_user);

        /// ส่งค่า คำนำหน้าทางวิชาการ ///
        $("#hidden_edit_pre_name").val(t_edit_academe_id); 
        /// ส่งค่า คำนำหน้า ///
        $("#hidden_edit_title_name").val(t_edit_type_title_id); 
        /// ส่งค่า สถานศึกษา ///
        $("#hidden_edit_academe").val(t_edit_academe_id);

        $('#op_mo_edit_manage_user').modal();

    });

    ///  ถ้ามีการเปลี่ยนค่า คำนำหน้าทางวิชาการ ///
    $("#edit_pre_name").change(function(){
        $("#hidden_edit_pre_name").val($("#edit_pre_name").val());
    });

    ///  ถ้ามีการเปลี่ยนค่า คำนำหน้า ///
    $("#edit_title_name").change(function(){
        $("#hidden_edit_title_name").val($("#edit_title_name").val());
    });

    ///  ถ้ามีการเปลี่ยนค่า สถานศึกษา ///
    $("#edit_academe").change(function(){
        $("#hidden_edit_academe").val($("#edit_academe").val());
    });

    ///  ถ้ามีการเปลี่ยนค่า status ///
    $('#form_edit_mange_user_user_no4').on('change', function() {
		$("#hidden_radio_status").val($('input[name=radio_status]:checked', '#form_edit_mange_user_user_no4').val());
	});

    ///  ถ้ามีการเปลี่ยนค่า ปุ่ม radio รีเซ็ต รหัสผ่าน ///
    $('#form_edit_mange_user_user_no4').on('change', function() {
		$("#hidden_radio_reset_password").val($('input[name=radio_reset_password]:checked', '#form_edit_mange_user_user_no4').val());
        chk_reset_password = $("#hidden_radio_reset_password").val();

        var validator_01 = $("#form_edit_mange_user_user_no1").validate();
        var validator_02 = $("#form_edit_mange_user_user_no2").validate();
        var validator_03 = $("#form_edit_mange_user_user_no3").validate();
        var validator_04 = $("#form_edit_mange_user_user_no4").validate();
    
        if(chk_reset_password == 2)
        {
            validator_01.resetForm();
            validator_02.resetForm();
            validator_03.resetForm();
            validator_04.resetForm();

            $('#edit_pass').attr('readonly', false);
            $("#edit_conf_pass").prop("readonly", false);
            $('#edit_pass').focus();

        }
        else
        {
            // $("#edit_pass").val("");
            // $("#edit_conf_pass").val("");  

            validator_01.resetForm();
            validator_02.resetForm();
            validator_03.resetForm();
            validator_04.resetForm();

            $('#edit_pass').attr('readonly', true);
            $("#edit_conf_pass").prop("readonly", true);
        }
	});
    
    $("#save_form_add_mange_user").click(function(){

        var form            = "";
        var form            = $("#form_add_mange_user_user");

        if(form.valid())
        {
            $.ajax({
                type: "POST",
                url: "u_update.php?action=insert_manage_user_user", 
                data: {
                    add_email : $("#add_email").val(),
                    add_pass : $("#add_pass").val(),
                    add_pre_name : $("#add_pre_name").val(),
                    add_title_name : $("#add_title_name").val(),
                    add_name_thai : $("#add_name_thai").val(),
                    add_last_names_thai : $("#add_last_names_thai").val(),
                    add_name_eng : $("#add_name_eng").val(),
                    add_last_names_eng : $("#add_last_names_eng").val(),
                    add_academe : $("#add_academe").val(),
                    add_phone: $("#add_phone").val(),
                    add_address: $("#add_address").val()
                },
                success: function(data, status) {
                    response = data.trim(); 

                    if(response == "true") // Success
                    {
                        alert("บันทึกข้อมูลสำเร็จ");
                        window.location.href = 'home_backend.php?type=manage_user_user'; 
                    }
                    else // Err
                    {
                        alert("บันทึกข้อมูลไม่สำเร็จ");
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

    $("#save_form_edit_mange_user").click(function(){

        var ch_k_reset_password = $("#hidden_radio_reset_password").val();         
        var form_01     = "";
        var form_02     = "";
        var form_03     = "";
        var form_04     = "";
        var type_post_reset_pass = "";
        var form_01 = $("#form_edit_mange_user_user_no1");
        var form_02 = $("#form_edit_mange_user_user_no2");
        var form_03 = $("#form_edit_mange_user_user_no3");
        var form_04 = $("#form_edit_mange_user_user_no4");

        if(ch_k_reset_password == 0)
        {
            type_post_reset_pass = "normal";
        }
        else if(ch_k_reset_password == 1)
        {
            type_post_reset_pass = "auto_reset_pass";
        }
        else if(ch_k_reset_password == 2)
        {
            type_post_reset_pass = "determine";
        }

        if(ch_k_reset_password != 2){

            if(form_01.valid() || form_04.valid()) 
            {
                if(form_01.valid() && form_04.valid()){

                    $.ajax({
                        type: "POST",
                        url: "u_update.php?action=edit_manage_user_user", 
                        data: {
                            type_post_reset_pass : type_post_reset_pass,
                            id_edit_manage_user : $("#id_edit_manage_user").val(), 
                            edit_email : $("#edit_email").val(), 
                            edit_pass : $("#edit_pass").val(),
                            edit_pre_name : $("#hidden_edit_pre_name").val(),
                            edit_title_name : $("#hidden_edit_title_name").val(),
                            edit_name_thai : $("#edit_name_thai").val(),
                            edit_last_names_thai : $("#edit_last_names_thai").val(),  
                            edit_name_eng : $("#edit_name_eng").val(),
                            edit_last_names_eng : $("#edit_last_names_eng").val(),
                            edit_academe : $("#hidden_edit_academe").val(),
                            edit_phone : $("#edit_phone").val(),
                            edit_address : $("#edit_address").val(), 
                            edit_radio_status : $("#hidden_radio_status").val()
                        },
                        success: function(data, status) {
                            response = data.trim(); 
                            // alert(response);

                            if(response == "true") // Success
                            {
                                alert("บันทึกข้อมูลสำเร็จ");
                                window.location.href = 'home_backend.php?type=manage_user_user'; 
                            }
                            else // Err
                            {
                                alert("บันทึกข้อมูลไม่สำเร็จ");
                            }

                        },
                        error: function(data, status, error) {
                            alert("Error");
                        }
                    });
                } 
            }
            else
            {
                // alert("no");
                var form_01 = "";
            }
        }
        else if(ch_k_reset_password == 2)
        {
            if(form_03.valid() || form_02.valid() || form_01.valid() || form_04.valid())
            {
                if(form_03.valid() && form_02.valid() && form_01.valid() && form_04.valid())
                {

                    $.ajax({
                        type: "POST",
                        url: "u_update.php?action=edit_manage_user_user", 
                        data: {
                            type_post_reset_pass : type_post_reset_pass,
                            id_edit_manage_user : $("#id_edit_manage_user").val(), 
                            edit_email : $("#edit_email").val(), 
                            edit_pass : $("#edit_pass").val(),
                            edit_pre_name : $("#hidden_edit_pre_name").val(),
                            edit_title_name : $("#hidden_edit_title_name").val(),
                            edit_name_thai : $("#edit_name_thai").val(),
                            edit_last_names_thai : $("#edit_last_names_thai").val(),  
                            edit_name_eng : $("#edit_name_eng").val(),
                            edit_last_names_eng : $("#edit_last_names_eng").val(),
                            edit_academe : $("#hidden_edit_academe").val(),
                            edit_phone : $("#edit_phone").val(),
                            edit_address : $("#edit_address").val(), 
                            edit_radio_status : $("#hidden_radio_status").val()
                        },
                        success: function(data, status) {
                            response = data.trim(); 

                            // alert(response);
                            if(response == "true") // Success
                            {
                                alert("บันทึกข้อมูลสำเร็จ");
                                window.location.href = 'home_backend.php?type=manage_user_user'; 
                            }
                            else // Err
                            {
                                alert("บันทึกข้อมูลไม่สำเร็จ");
                            }

                        },
                        error: function(data, status, error) {
                            alert("Error");
                        }
                    });
                }
            }
            else
            {
                // alert("no");
                var form_01 = "";
            }
        }

    });

</script>