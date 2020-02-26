<?php 
    // include '../../connect/connect.php'; 
    $sql_user = "SELECT * FROM user 
    LEFT JOIN type_user ON user.type_user_id = type_user.type_user_id 
    LEFT JOIN academe ON user.academe_id = academe.academe_id 
    LEFT JOIN pre ON user.pre_id = pre.pre_id 
    LEFT JOIN type_title ON user.type_title_id = type_title.type_title_id 
    WHERE user.type_user_id = 1
    ORDER BY type_user.type_user_id desc ";
    
    $result_user = $conn->query($sql_user);
    $fetch_user = $result_user->fetch_assoc();
    $nom_row_user = $result_user->num_rows;
    $i = 1;
    unset($_SESSION['edit_session_Add_Row']);
?>
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $name_type; ?></h6>
    <div class="dropdown no-arrow">
    <buttom class="btn btn-primary btn-primary-split btn-sm add_pointer" data-toggle="modal" data-target="#add_mange_user_user" id="click_add_mange_user_user">
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
                    <th style="padding-right: 12px;" width="5%">ลำดับ</th>
                    <th style="padding-right: 12px;" width="12%">คำนำหน้า/วิชาการ</th>
                    <th style="padding-right: 12px;" width="18%">ชื่อ-นามสกุล</th>
                    <th style="padding-right: 12px;" width="24%">ชื่อสถานศึกษา</th>
                    <th style="padding-right: 12px;" width="23%">อีเมล</th>
                    <th style="padding-right: 12px;" width="5%">สถานะ</th>
                    <th style="padding-right: 12px;" width="12%">แก้ไข/รีเซ็ตรหัสผ่าน</th>
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
                    <th style ="display:none"></th>
                </tr>
            </thead>
            <tbody>
<?php
        if($nom_row_user > 0){
            do{
?>
                <tr id="<?php echo $fetch_user['user_id']; ?>">
                    <td align="center"><?php echo $i;?></td>
                    <td><?php echo $fetch_user['pre_th'];?></td>
                    <td><?php echo $fetch_user['type_title_name']." ".$fetch_user['name_th']." ".$fetch_user['surname_th'];?></td>
                    <td><?php echo $fetch_user['academe_name'];?></td>
                    <td><?php echo "<b>Email: </b>".$fetch_user['email'];?></td>
                    <td align="center">
<?php 
                    $chk_show_status = $fetch_user['status_user'];
                    if($chk_show_status == 1)
                    {
?>
                        <a class="btn btn-success btn-sm" href="#" data-role="id_mo_edit_status_user" data-id="<?php echo $fetch_user['user_id']; ?>" >เปิด</a>
<?php
                    }
                    else
                    {
?>
                        <a class="btn btn-danger btn-sm" href="#" data-role="id_mo_edit_status_user" data-id="<?php echo $fetch_user['user_id']; ?>" >ปิด</a>
<?php                  
                    }                    
?>
                    </td>
                    <td align="center">
                        <a class="btn btn-primary btn-sm" href="#" data-role="id_mo_edit_data_user" data-id="<?php echo $fetch_user['user_id']; ?>" ><i class="fa fa-search-plus"></i></a>
                        <a class="btn btn-info btn-sm" href="#" data-role="id_mo_reset_password_user" data-id="<?php echo $fetch_user['user_id']; ?>" ><i class="fa fa-history"></i></a> 
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
                    <td data-target="t_edit_type_user_id" style ="display:none" ><?php echo $fetch_user['type_user_id']; ?></td>
                </tr>
<?php
            $i++;
            }while($fetch_user = $result_user->fetch_assoc());
                
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
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_add_user" name="colse_mo_add_user">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_add_mange_user_user" name="form_add_mange_user_user">
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">ข้อมูลพื้นฐาน</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">คำนำหน้าทางวิชาการ <span style="color: red;">* </span></label>
                        <select class="form-control" id="add_pre_name" name="add_pre_name">
                            <option value="">กรุณาเลือก</option>
<?php
                            $sql_sel_pre = "SELECT pre_id, pre_th, status_pre FROM pre WHERE status_pre = 1";
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
                            $sql_sel_type_title = "SELECT type_title_id, type_title_name, status_type_title FROM type_title where status_type_title = 1";
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
                        <label for="">สถานศึกษา<span style="color: red;"> * </span></label><br>
                        <select class="form-control select2_mange" id="add_academe" name="add_academe">
                            <option value="0">กรุณาเลือก</option>
<?php
                            $sql_sel_academe = "SELECT academe_id, academe_name, status_academe FROM academe where status_academe = 1";
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
                    <div class="col-md-5">
                        <label for="">ที่อยู่ปัจจุบัน <span style="color: red;">* </span></label>
                        <textarea rows="3" cols="50" id="add_address" name="add_address" class="form-control"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                        <input type="text" class="form-control" id="add_phone" name="add_phone" value="" placeholder="" maxlength="10">
                    </div>
                    <div class="col-md-4" id="show_name_add_row" style="display:none">
                        <label for="">ความเชี่ยวชาญ <span style="color: red;">* ( กรุณาเลือกอย่างน้อย 1 รายการ ) </span></label><br>
                        <div id="show_add_row"></div>
                        <select class="sele_c" id="name_add_row" name="name_add_row" style="width: 260px;" onchange="show_table_add_row()"></select>&nbsp;&nbsp;
                        <button class="btn btn-primary" type="button" style="margin-bottom: 7px;"><i class="fa fa-plus-circle"></i></button> <!-- onclick="show_table_add_row()" -->
                    </div>
                </div>
                <hr>
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
            </form>
        </div>
        <div class="modal-footer">
            <div class="container text-center">
                <button class="btn btn-primary" type="button" id="save_form_add_mange_user_user" name="save_form_add_mange_user_user">บันทึก</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- Logout Modal logoutModal-->

<!-- Edit Modal op_mo_edit_manage_user -->
<div class="modal fade" id="op_mo_edit_manage_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_edit_user" name="colse_mo_edit_user">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form_edit_mange_user_user" name="form_edit_mange_user_user">
            <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">ข้อมูลพื้นฐาน</h4></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">คำนำหน้าทางวิชาการ <span style="color: red;">* </span></label>
                        <select class="form-control" id="edit_pre_name" name="edit_pre_name" disabled>
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
                        <select class="form-control" id="edit_title_name" name="edit_title_name" disabled>
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
                        <input type="text" class="form-control" id="edit_name_thai" name="edit_name_thai" value="" placeholder="" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">นามสกุล (ภาษาไทย)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="edit_last_names_thai" name="edit_last_names_thai" value="" placeholder="" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">ชื่อ (ภาษาอังกฤษ) <span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="edit_name_eng" name="edit_name_eng" value="" placeholder="" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">นามสกุล (ภาษาอังกฤษ)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="edit_last_names_eng" name="edit_last_names_eng" value="" placeholder="" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="">ประเภทผู้ใช้ <span style="color: red;">* </span></label>
                        <select class="form-control" id="edit_type_user" name="edit_type_user" disabled>
                            <option value="0">กรุณาเลือก</option>
    <?php
                            $sql_sel_type_user_edit = "SELECT type_user_id, type_user_name FROM type_user ";
                            $result_sel_type_user_edit = $conn->query($sql_sel_type_user_edit);
                            $fetch_sel_type_user_edit = $result_sel_type_user_edit->fetch_assoc();
                            do{
    ?>
                            <option value="<?php echo $fetch_sel_type_user_edit['type_user_id'];?>"><?php echo $fetch_sel_type_user_edit['type_user_name'];?></option>
    <?php
                            }while($fetch_sel_type_user_edit = $result_sel_type_user_edit->fetch_assoc());
    ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">สถานศึกษา<span style="color: red;"> * </span></label>
                        <select class="form-control select2_mange" id="edit_academe" name="edit_academe" disabled>
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
                </div>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <label for="">ที่อยู่ปัจจุบัน <span style="color: red;">* </span></label>
                        <textarea rows="4" cols="50" id="edit_address" name="edit_address" class="form-control" readonly></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="">หมายเลขโทรศัพท์ <span style="color: red;">* </span></label>
                        <input type="text" class="form-control" id="edit_phone" name="edit_phone" value="" placeholder="" readonly maxlength="10">
                    </div>
                    <div class="col-md-4" id="e_show_name_add_row" style="display:none">
                        <label for="">ความเชี่ยวชาญ <span style="color: red;">* ( กรุณาเลือกอย่างน้อย 1 รายการ ) </span></label><br>
                        <div id="e_show_add_row"></div>
                        <select class="sele_c" id="e_name_add_row" name="e_name_add_row" style="width: 260px;" onchange="edit_show_table_add_row()"></select>&nbsp;&nbsp; 
                        <button class="btn btn-primary" type="button" style="margin-bottom: 7px;"><i class="fa fa-plus-circle"></i></button> <!--  onclick="edit_show_table_add_row()" -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for=""><h4 style="font-weight: 600;">รหัสเข้าสู่ระบบ</h4></label>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-md-4">
                        <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                        <input type="text" class="form-control" id="edit_email" name="edit_email" value="" readonly>
                    </div>
                </div>
                <input type="hidden" id="id_edit_manage_user" name="id_edit_manage_user" value="">
                <input type="hidden" id="hidden_edit_pre_name" name="hidden_edit_pre_name" value="">
                <input type="hidden" id="hidden_edit_title_name" name="hidden_edit_title_name" value=""> 
                <input type="hidden" id="hidden_edit_academe" name="hidden_edit_academe" value=""> 
                <input type="hidden" id="hidden_edit_type_user_id" name="hidden_edit_type_user_id" value="">
            </form>
        </div>
        <div class="modal-footer">
            <div class="container text-center">
                <button class="btn btn-success" type="button" id="button_edit" name="button_edit">แก้ไข</button> 
                <button class="btn btn-secondary" id="button_close" name="button_close" type="button" data-dismiss="modal">ปิด</button>

                <button class="btn btn-primary" type="button" id="save_form_edit_mange_user" name="save_form_edit_mange_user" style ="display:none">บันทึก</button> 
                <button class="btn btn-secondary" type="button" id="button_close_edit" name="button_close_edit" style ="display:none">ยกเลิกการแก้ไข</button><br><br>
                <font color="red">** ( การแก้ไขข้อมูลผู้ใช้จะต้องทำการเลือกปุ่ม <u>"แก้ไข"</u> ถึงจะสามารถแก้ไขข้อมูลได้ )</font>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- Edit Modal op_mo_edit_manage_user -->

<!-- Edit Modal op_mo_edit_status_user -->
<div class="modal fade" id="op_mo_edit_status_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600;">เปลี่ยน สถานะการใช้งาน </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_status_user" name="colse_mo_status_user">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_status_user" name="form_edit_status_user">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="radio" name="radio_status" id="radio_status_on" value="1"> <font color=green>ใช้งานปกติ </font>&nbsp;
                            <input type="radio" name="radio_status" id="radio_status_off" value="0"><font color=red> ปิดการใช้งาน </font>
                        </div>
                    </div>
                    <input type="hidden" id="id_edit_status_manage_user" name="id_edit_status_manage_user" value="">
                    <input type="hidden" id="hidden_id_status_user" name="hidden_id_status_user" value=""> 
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="save_form_edit_status_user" name="save_form_edit_status_user">บันทึก</button> 
                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal op_mo_edit_status_user -->

<!-- Edit Modal op_mo_reset_password_user -->
<div class="modal fade" id="op_mo_edit_reset_password_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">รีเซ็ตรหัสผ่าน </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="colse_mo_reset_password_user" name="colse_mo_reset_password_user"> 
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_reset_password_user" name="form_edit_reset_password_user">
                    <div class="row">
                        <div class="col-md-12">
                            <label for=""><h4 style="font-weight: 600;">รีเซ็ตรหัสผ่าน</h4></label><br>
                            <input class="form-control" type="password" name="new_reset_password" id="new_reset_password" value="<?php echo uniqid(); ?>">
                        </div>
                    </div>
                    <input type="hidden" id="id_reset_password_manage_user" name="id_reset_password_manage_user" value="">
                </form>
            </div>
            <div class="modal-footer">
                <div class="container text-center">
                    <button class="btn btn-primary" type="button" id="save_form_reset_password_user" name="save_form_reset_password_user">บันทึก</button> 
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal op_mo_edit_status_user -->

    <div id='DivIdToPrint' style ="display:none">
        <font size="5">
            <center><b>รหัสผ่านของท่านคือ : </b><span id ="print_paa_new" name="print_paa_new"></span><center>
        </font>
    </div>
    <input type='button' id='submit_print' value='Print' onclick='printDiv();' style ="display:none">

<script>

    $(document).ready(function() {

        $('.select2_mange').select2();

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
                    required: true,
                    minlength: 4
                },
                add_conf_pass:{
                    required: true,
                    equalTo: "#add_pass"
                },
                add_pre_name: {
                    required: true
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
                add_type_user: {
                    valueNotEquals: "0"
                },
                add_academe:{
                    valueNotEquals: "0"
                },
                add_phone: {
                    number: true,
                    minlength: 10
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
                    required: "กรุณากรอก password ของท่าน",
                    minlength: "* กรุณากรอกรหัสผ่านอย่างน้อย 4 หลัก"
                },
                add_conf_pass:{
                    required: "กรุณากรอกยืนยัน password ของท่าน",
                    equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
                },
                add_pre_name: {
                    required: "กรุณาเลือกคำนำหน้าทางวิชาการของท่าน"
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
                add_type_user: {
                    valueNotEquals: "กรุณาเลือกประเภทผู้ใช้ของท่าน"
                },
                add_academe:{
                    valueNotEquals: "กรุณาเลือกสถานศึกษาของท่าน"
                },
                add_phone: {
                    number: "* กรุณากรอกเฉพาะตัวเลข",
                    minlength: "* กรุณากรอกให้ครบ 10 หลัก"
                },
                add_address: {
                    valueNotEquals: "กรุณากรอกที่อยู่ของท่าน"
                }
			}
		});

        $('#form_edit_mange_user_user').validate({ 
			errorClass: "errors",
			rules: {
                edit_email:{
                    required: true,
                    email: true
                },
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
                name_add_row: {
					required: true
				},
                edit_phone: {
                    number: true,
                    minlength: 10
                },
                edit_address: {
                    valueNotEquals: ""
                }
			},
			messages: {
                edit_email:{
                    required: "กรุณากรอกอีเมล (E-mail) ของท่าน",
                    email: "รูปแบของ Email ของท่านไม่ถูกต้อง!"
                },
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
                name_add_row: {
					required: "<font color=red size=2>*เลือกก่อนสิวะ!</font>"
				},
                edit_phone: {
                    number: "* กรุณากรอกเฉพาะตัวเลข",
                    minlength: "* กรุณากรอกให้ครบ 10 หลัก"
                },
                edit_address: {
                    valueNotEquals: "กรุณากรอกที่อยู่ของท่าน"
                }
			}
		});

        show_selection();
        show_table_add_row();

	});

    $("#click_add_mange_user_user").click(function(){

        var myform_1 = $("#form_add_mange_user_user").validate();
        var myform_2 = $("#form_edit_mange_user_user").validate();
        myform_1.resetForm();
        myform_2.resetForm(); 
    });

    function show_add_row_all()
    {
        $.ajax({
            type: 'POST',
            url: "Manage_Add_Row.php?action=show_add_row_all", 
            data: {
                name_add_row : $("#name_add_row").val()
            },
            success: function(data) {
                $("#show_add_row").html(data);
            }
        });
    }

    function show_selection()
    {
        $.ajax({
            type: 'POST',
            url: "Manage_Add_Row.php?action=show_sel", 
            data: {
                name_add_row : $("#name_add_row").val()
            },
            success: function(data) {
                $("#name_add_row").html(data);
            }
        });
    }

    function show_table_add_row()
    {
        $.ajax({  
            url:"Manage_Add_Row.php?action=d_add_row",  
            method:"POST",  
            data: {
                name_add_row : $("#name_add_row").val()
            }, 
            success:function(data){   
                var res_data = data.trim();		

				if(res_data == "R_repeat")
                {
                    alert("ซ้ำกัน!");
                }
                else
                {
                    show_add_row_all();
                    show_selection();
                }
                $("#name_add_row").val("0");
            }
        });  
    }

    function delete_row(n_num_row)
    {
        $.ajax({  
            url:"Manage_Add_Row.php?action=d_del_row",  
            method:"POST",  
            data: {
                Id_Row_delete : n_num_row
            }, 
            success:function(data){  
                show_add_row_all();
                show_selection();
                $("#name_add_row").val("0");
            }
        });  
    }

    ///////////////////////////// Edit //////////////////////////////
    
    function Add_Session()
    {
        $.ajax({
            type: 'POST',
            url: "Edit_Manage_Add_Row.php?action=add_session", 
            data: {
                ID_User_edit : $("#id_edit_manage_user").val()
            },
            success: function(data) {
                $("#e_show_add_row").html(data);
            }
        });
    }

    function edit_show_selection()
    {
        $.ajax({
            type: 'POST',
            url: "Edit_Manage_Add_Row.php?action=show_sel", 
            data: {
                name_add_row : $("#e_name_add_row").val()
            },
            success: function(data) {
                $("#e_name_add_row").html(data);
            }
        });
    }

    function edit_show_add_row_all()
    {
        $.ajax({
            type: 'POST',
            url: "Edit_Manage_Add_Row.php?action=show_add_row_all", 
            data: {
                ID_User_edit : $("#id_edit_manage_user").val()
            },
            success: function(data) {
                $("#e_show_add_row").html(data);
            }
        });
    }

    function edit_show_table_add_row()
    {
        $.ajax({  
            url:"Edit_Manage_Add_Row.php?action=d_add_row",  
            method:"POST",  
            data: {
                name_add_row : $("#e_name_add_row").val()
            }, 
            success:function(data){   
                var res_data = data.trim();		
				if(res_data == "R_repeat")
                {
                    alert("ซ้ำกัน!");
                }
                else
                {
                    edit_show_selection();
                    edit_show_add_row_all();
                }
                $("#e_name_add_row").val("0");
            }
        });  
    }

    function edit_delete_row(n_num_row)
    {
        $.ajax({  
            url:"Edit_Manage_Add_Row.php?action=d_del_row",  
            method:"POST",  
            data: {
                Id_Row_delete : n_num_row
            }, 
            success:function(data){  
                edit_show_selection();
                edit_show_add_row_all();
                $("#e_name_add_row").val("0");
            }
        });  
    }

    $("#name_add_row").change(function(){
        var form_add_mange_user_user = $( "#form_add_mange_user_user" ).validate();
        form_add_mange_user_user.resetForm();
    });

    $("#show_table_add_row").click(function(){
        var form = $( "#form_add_mange_user_user" );
    });


    $("#colse_mo_add_user").click(function(){
        window.location.href = 'home_backend.php?type=manage_user_user'; 
    });

    $("#colse_mo_edit_user").click(function(){
        window.location.href = 'home_backend.php?type=manage_user_user'; 
    });

    $("#colse_mo_status_user").click(function(){
        window.location.href = 'home_backend.php?type=manage_user_user'; 
    });

    $("#colse_mo_reset_password_user").click(function(){
        window.location.href = 'home_backend.php?type=manage_user_user'; 
    });

    function printDiv() 
    {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('','Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

        newWin.document.close();

        setTimeout(function()// set close
        { 
            Swal.fire({
                title: "<font color=#009900>สำเร็จ!</font>", 
                text: "รีเซ็ตรหัสผ่านสำเร็จ!",
                type: "success"
            }).then(function(){ 
                location.reload();
            });
            newWin.close();
        },1); 
 
    }

    $(document).on('click','a[data-role=id_mo_edit_data_user]',function(){ 

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
        var t_edit_type_user_id = $('#'+id).children('td[data-target=t_edit_type_user_id]').text();

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
        $("#edit_type_user").val(t_edit_type_user_id);

        /// ส่งค่า คำนำหน้าทางวิชาการ ///
        $("#hidden_edit_pre_name").val(t_edit_pre_id); 
        /// ส่งค่า คำนำหน้า ///
        $("#hidden_edit_title_name").val(t_edit_type_title_id); 
        /// ส่งค่า สถานศึกษา ///
        $("#hidden_edit_academe").val(t_edit_academe_id);
        $('#edit_academe').val(t_edit_academe_id).trigger('change.select2');
        /// ส่งค่า ประเภทผู้ใช้ ///
        $("#hidden_edit_type_user_id").val(t_edit_type_user_id);

        $('#edit_pre_name').attr('disabled', true);
        $('#edit_title_name').attr('disabled', true);
        $('#edit_name_thai').attr('readonly', true);
        $('#edit_last_names_thai').attr('readonly', true);
        $('#edit_name_eng').attr('readonly', true);
        $('#edit_last_names_eng').attr('readonly', true);
        $('#edit_type_user').attr('disabled', true);
        $('#edit_academe').attr('disabled', true);
        $('#edit_phone').attr('readonly', true);
        $('#edit_address').attr('readonly', true);

        $("#button_edit").show();
        $("#button_close").show();
        $("#button_close_edit").hide();
        $("#save_form_edit_mange_user").hide();
        $("#e_show_name_add_row").hide();

        // click edit
        $("#button_edit").click(function(){

            $('#edit_pre_name').attr('disabled', false);
            $('#edit_title_name').attr('disabled', false);
            $('#edit_name_thai').attr('readonly', false);
            $('#edit_last_names_thai').attr('readonly', false);
            $('#edit_name_eng').attr('readonly', false);
            $('#edit_last_names_eng').attr('readonly', false);
            $('#edit_type_user').attr('disabled', false);
            $('#edit_academe').attr('disabled', false);
            $('#edit_phone').attr('readonly', false);
            $('#edit_address').attr('readonly', false);

            $("#save_form_edit_mange_user").show();
            $("#button_close_edit").show();
            $("#button_edit").hide();
            $("#button_close").hide();

            // ตรวจสอบ ประเภทผู้ใช้ ////////
            if(t_edit_type_user_id != 3)
            {
                $("#e_show_name_add_row").hide();
            }
            else
            {
                $("#e_show_name_add_row").show();
            }

            Add_Session();
            edit_show_table_add_row();

        });

        // click not edit
        $("#button_close_edit").click(function(){

            $('#edit_email').attr('readonly', true);
            $('#edit_pre_name').attr('disabled', true);
            $('#edit_title_name').attr('disabled', true);
            $('#edit_name_thai').attr('readonly', true);
            $('#edit_last_names_thai').attr('readonly', true);
            $('#edit_name_eng').attr('readonly', true);
            $('#edit_last_names_eng').attr('readonly', true);
            $('#edit_type_user').attr('disabled', true);
            $('#edit_academe').attr('disabled', true);
            $('#edit_phone').attr('readonly', true);
            $('#edit_address').attr('readonly', true);

            $("#button_edit").show();
            $("#button_close").show();
            $("#button_close_edit").hide();
            $("#save_form_edit_mange_user").hide();
        });

        $.ajax({
            type: 'POST',
            url:"Edit_Manage_Add_Row.php?action=Unset_Session", 
            data: {
                U_session : "Unset_Session"
            },
            success: function(data) {
                $('#op_mo_edit_manage_user').modal();
            }
        });

    });

    $(document).on('click','a[data-role=id_mo_edit_status_user]',function(){  

        var id  = $(this).data('id');
        var t_edit_status_user  = $('#'+id).children('td[data-target=t_edit_status_user]').text();

        $("#id_edit_status_manage_user").val(t_edit_status_user);
        $("#hidden_id_status_user").val(id);
        // ตรวจสอบเพื่อ chacke status
        if(t_edit_status_user == 1)
		{
			$("#radio_status_on").prop("checked", true);
		}
		else if(t_edit_status_user == 0)
		{
			$("#radio_status_off").prop("checked", true);
		}

        $('#op_mo_edit_status_user').modal();

    });

    $(document).on('click','a[data-role=id_mo_reset_password_user]',function(){  

        var id  = $(this).data('id');
        $("#id_reset_password_manage_user").val(id);

        $('#op_mo_edit_reset_password_user').modal();

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
    $('#form_edit_status_user').on('change', function() {
		$("#id_edit_status_manage_user").val($('input[name=radio_status]:checked', '#form_edit_status_user').val());
	});
    
    ///  ถ้ามีการเปลี่ยนค่า ประเภทผู้ใช้ ///
    $("#edit_type_user").change(function(){
        $("#hidden_edit_type_user_id").val($("#edit_type_user").val());
    });
    ///  ถ้าเปลี่ยนเป็นผู้ทรง ให้ซ้อนการกรอก password ///
    $("#add_type_user").change(function(){
        var chk_add_type_user = $("#add_type_user").val();
        if(chk_add_type_user != 3)
        {
            $("#hid_show_add_pass").show();
            $("#hid_show_add_conf_pass").show();
            $("#show_name_add_row").hide();
        }
        else
        {
            $("#hid_show_add_pass").hide();
            $("#hid_show_add_conf_pass").hide();
            $("#show_name_add_row").show();
        }
    });
    ///  แกไข ถ้าเปลี่ยนเป็นผู้ทรง ให้ซ้อนการกรอก password ///
    $("#edit_type_user").change(function(){
        var chk_add_type_user = $("#edit_type_user").val();

        if(chk_add_type_user != 3)
        {
            $("#e_show_name_add_row").hide();
        }
        else
        {

            $("#e_show_name_add_row").show();
            Add_Session();
            edit_show_add_row_all();
        }
    });


    function add_insert_user(){ /// function เพิ่มข้อมูล user

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
                    add_type_user : $("#add_type_user").val(),
                    add_academe : $("#add_academe").val(),
                    add_phone: $("#add_phone").val(),
                    add_address: $("#add_address").val()
                },
                success: function(data, status) {
                    response = data.trim();
                    // alert(response);
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
    }

    $("#save_form_add_mange_user_user").click(function(){ /// click add data users.

        chk_type_user = $("#add_type_user").val();
        
        if(chk_type_user == 3)
        {
            $.ajax({
                type: "POST",
                url: "Manage_Add_Row.php?action=chk_add_row",  
                data: {
                    add_email : $("#add_email").val()
                },
                success: function(data, status) {
                    response = data.trim();
                    if(response == "true") 
                    {
                        add_insert_user();
                    }
                    else 
                    {
                        Swal.fire(
                            '<font color=#facea8>คำเตือน!</font>',
                            'กรุณาเลือก <font color=red><u>ความเชี่ยวชาญ</u></font> อย่างน้อย 1 รายการ!',
                            'warning'
                        );
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
            add_insert_user();
        }
    });


    function fnc_save_form_edit_mange_user()
    {
        var form = $("#form_edit_mange_user_user");
        if(form.valid()){

            $.ajax({
                type: "POST",
                url: "u_update.php?action=edit_manage_user_user", 
                data: {
                    id_edit_manage_user : $("#id_edit_manage_user").val(), 
                    edit_email : $("#edit_email").val(), 
                    edit_pre_name : $("#hidden_edit_pre_name").val(),
                    edit_title_name : $("#hidden_edit_title_name").val(),
                    edit_name_thai : $("#edit_name_thai").val(),
                    edit_last_names_thai : $("#edit_last_names_thai").val(),  
                    edit_name_eng : $("#edit_name_eng").val(),
                    edit_last_names_eng : $("#edit_last_names_eng").val(),
                    edit_academe : $("#hidden_edit_academe").val(),
                    edit_phone : $("#edit_phone").val(),
                    edit_address : $("#edit_address").val(),
                    edit_type_user: $("#hidden_edit_type_user_id").val()
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
        } 
        else
        {
            var form = "";
        }
    }

   
    $("#save_form_edit_mange_user").click(function(){
        chk_edit_type_user = $("#edit_type_user").val();

        if(chk_edit_type_user == 3)
        {
            $.ajax({
                type: 'POST',
                url: "Edit_Manage_Add_Row.php?action=e_chk_add_row", 
                data: {
                    e_chk_add_row : "e_chk_add_row"
                },
                success: function(data) {
                    response = data.trim(); 
                    if(response == "true")
                    {
                        fnc_save_form_edit_mange_user();
                    }
                    else
                    {
                        Swal.fire(
                            '<font color=#facea8>คำเตือน!</font>',
                            'กรุณาเลือก <font color=red><u>ความเชี่ยวชาญ</u></font> อย่างน้อย 1 รายการ!',
                            'warning'
                        );
                    }
                }
            });
        }
        else
        {
            fnc_save_form_edit_mange_user();
        }
    });

    $("#save_form_edit_status_user").click(function(){
        $.ajax({
            type: "POST",
            url: "u_update.php?action=edit_status_manage_user_user", 
            data: {
                id_edit_status_manage_user : $("#id_edit_status_manage_user").val(),
                hidden_id_status_user : $("#hidden_id_status_user").val()
            },
            success: function(data, status) {
                response = data.trim(); 

                // alert(response);
                if(response == "true") // Success
                {
                    Swal.fire({
                        title: "<font color=#009900>สำเร็จ!</font>", 
                        text: "บันทึกข้อมูลสถานะสำเร็จ!",
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

    $("#save_form_reset_password_user").click(function(){

        var new_reset_password = $("#new_reset_password").val();
        $("#print_paa_new").text(new_reset_password);

        $.ajax({
            type: "POST",
            url: "u_update.php?action=reset_password_user", 
            data: {
                id_reset_password_manage_user: $("#id_reset_password_manage_user").val(),
                new_reset_password: $("#new_reset_password").val()
            },
            success: function(data, status) {
                response = data.trim();

                if(response == "true") // Success
                {
                    $("#submit_print").click();
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

</script>