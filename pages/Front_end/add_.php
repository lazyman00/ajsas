
<buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#add_mange_user_user">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>เพิ่มข้อมูล
</buttom>
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

<!-- Logout Modal logoutModal-->
<div class="modal fade" id="add_mange_user_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล ผู้ใช้</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_add_user" name="colse_mo_add_user">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_add_mange_user_user" name="form_add_mange_user_user">
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">รหัสเข้าสู่ระบบ</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="add_email" name="add_email" value="" placeholder="">
                    </div>
                    <div class="col-md-4" id="hid_show_add_pass" name="hid_show_add_pass">
                        <label for="">รหัสผ่าน <span style="color: red;"> * </span></label>
                        <input type="password" class="form-control" id="add_pass" name="add_pass" value="" placeholder="">
                    </div>
                    <div class="col-md-4" id="hid_show_add_conf_pass" name="hid_show_add_conf_pass">
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
                        <label for="">ประเภทผู้ใช้ <span style="color: red;">* </span></label>
                        <select class="form-control" id="add_type_user" name="add_type_user">
                            <option value="0">กรุณาเลือก</option>
<?php
                            $sql_sel_type_user = "SELECT type_user_id, type_user_name FROM type_user ";
                            $result_sel_type_user = $conn->query($sql_sel_type_user);
                            $fetch_sel_type_user = $result_sel_type_user->fetch_assoc();
                            do{
?>
                            <option value="<?php echo $fetch_sel_type_user['type_user_id'];?>"><?php echo $fetch_sel_type_user['type_user_name'];?></option>
<?php
                            }while($fetch_sel_type_user = $result_sel_type_user->fetch_assoc());
?>
                        </select>
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
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                        <input type="text" class="form-control" id="add_phone" name="add_phone" value="" placeholder="">
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
                        <textarea rows="4" cols="50" id="add_address" name="add_address" class="form-control"></textarea>
                    </div>
                    <div class="col-md-9"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="container text-center">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                <button class="btn btn-primary" type="button" id="save_form_add_mange_user_user" name="save_form_add_mange_user_user">บันทึก</button>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->