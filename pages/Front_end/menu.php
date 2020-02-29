<?php
$userid = $_SESSION['user_id'];
$sql = "SELECT * FROM user u 
left join type_title t on t.type_title_id = u.type_title_id
left join pre p on p.pre_id = u.pre_id
where user_id =  $userid ";  
$query = $conn->query($sql);
$row_data = $query->fetch_assoc();    
?>
<style>
 .modal-header {
    background-color: #e9ecef;
    color: #585f65;
}
.modal-footer{
    display: block;
    text-align: -webkit-center;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef00;
    opacity: 1;
    color: #495057;
    background-color: #fff;
    border-color: #bccbda;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0); 
    cursor: default;
}
</style>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 111px;">
    <p><img src="../../img/logo00.png" style="width: 125px;margin-top: 43px;"></p>
    <p1 class="my-0 mr-md-auto font-weight-normal" style="color : white"><font style="font-size: 24px;color:#F7FF00">วารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</font> <br>
    <font style="font-size: 20px;">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์</font></p1> <br>
    <!-- <font style="font-size: 20px;">Acedemic Journal Of Science And Applied Science</font> <br> -->
    <!-- Faculty of Science and Technology, Uttaradit Rajabhat University</p> -->
    <!-- <p class="my-0 mr-md-auto font-weight-normal">Acedemic Journal Of Science And Applied Science, Faculty of Science and Technology, Uttaradit Rajabhat University </p> -->
    <!-- <h5 class="my-0 mr-md-auto font-weight-normal"><img src="../../img/banner901-01.png" style="width: 547px; height: 117px;"></h5> -->
   
    <nav class="my-2 my-md-0 mr-md-3">
        <?php if($_SESSION['type_user_id']==1){ // admin บรรณาธิการ?>
            <a class="p-2 text-dark" href="../Front_end/allarticle.php">บทความวิชาการ</a>
            <a class="p-2 text-dark" href="../Front_end/collect.php">รวมเล่มวารสาร</a>
            <a class="p-2 text-dark" href="../Back_end/home_backend.php">จัดการข้อมูลหลัก</a>
        <?php }else if($_SESSION['type_user_id']==2){ //ผู้ส่ง ?>
            <!-- <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
            <a class="p-2 text-dark" href="#">บรรณาธิการ</a>
            <a class="p-2 text-dark" href="#">การส่ง</a>
            <a class="p-2 text-dark" href="#">ประกาศ</a>
            <a class="p-2 text-dark" href="#">ติดต่อ</a> -->
        <?php }else if($_SESSION['type_user_id']==3){ //ผู้ทรง ?>
            <!-- <a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
            <a class="p-2 text-dark" href="#">การส่ง</a>
            <a class="p-2 text-dark" href="#">ติดต่อ</a> -->
        <?php } ?>     
    </nav>
    
    <li class="nav-item dropdown my-lg-0" style="padding-bottom: 22px;list-style-type: none;top: 10px;">
        <a class="btn btn-outline-warning nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          ออกจากระบบ
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="position: absolute;will-change: transform;margin-top: 5px;top: 0px;left: 0px;transform: translate3d(-270px, 65px, 0px);height: 197.979166px;">
          <div class="navbar-login">
            <div class="row" style="width: 400px;">            
                <div class="col-md-4">
                    <p class="text-center">
                        <span><img src="../../img/rr-01.png" style="height: 108px;width: 110px;margin-left: 11px;"></span>
                    </p>
                </div>
                <div class="col-lg-8">
                    <p1 class="text-left" style="padding-right:  5px;padding-left: 5px;margin-bottom: 1px;"><b><?php echo $row_data["name_th"]  ?> <?php echo $row_data["surname_th"]  ?></b></p1>
                    <p class="text-left small" style="padding-right:  5px;padding-left: 5px;margin-bottom: 7px;"><?php echo $row_data["email"]  ?></p>
                    <p1 class="text-left" style="padding-right:  5px; padding-left: 5px;">
                        <a href="#" class="btn btn-outline-primary btn-sm btnUpProfile" style="width: 207px;margin-bottom: 4px;" data-row='<?php  echo json_encode($row_data); ?>'>แก้ไขข้อมูลส่วนตัว</a>
                    </p1>  
                    <p1 class="text-left" style="padding-right:  5px; padding-left: 5px;">
                        <a href="#" class="btn btn-outline-warning btn-sm btnUpProfile_file" style=" width: 207px;"  data-row='<?php  echo json_encode($row_data); ?>'>รีเซ็ตรหัสผ่าน</a>
                    </p1>                                
                </div>           
            </div>
            <hr class="mb-4" style="border-bottom-width: 0px; margin-top: 0px; margin-bottom: 0px;">
            <div class="row" style="width: 400px;">            
                <div class="col-md-12">
                    <p1 class="text-left" >
                        <a href="unset.php" class="btn btn-outline-danger btn-sm" style="margin-left: 26px;width: 317.979166px;">ออกจากระบบ</a>
                    </p1>
                </div>         
            </div>
            
        </div>
    </div>
</li>

</div>              

<div class="modal fade bd-example-modal-xl" id="myModalProfile" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="sql_editUser.php" method="post">

                    
                        <div class="row" >
                            <div class="form-group col-md-3">
                                <label for="inputEmail4"><b>คำนำหน้าทางวิชาการ</b></label>
                                <select class="form-control form-control-sm" id="position_thai" name="position_thai">
                                    <option value="">กรุณาเลือก</option>
                                    <?php
                                    $sql_pre_thai = "SELECT * FROM pre ";
                                    $result_pre_thai = $conn->query($sql_pre_thai);
                                    $fetch_pre_thai = $result_pre_thai->fetch_assoc();

                                // $sql_pre = "SELECT * FROM pre ";  
                            // $query_pre = $conn->query($sql_pre);  

                                    do{
                                        ?>
                                        <option <?php if ($row_data['pre_id']==$fetch_pre_thai['pre_id']){ ?> selected<?php  } ?> value="<?php echo $fetch_pre_thai['pre_id'];?>"><?php echo $fetch_pre_thai['pre_th'];?></option>
                                        <?php
                                    }while($fetch_pre_thai = $result_pre_thai->fetch_assoc());
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="position_eng_hide" id="position_eng_hide" value="">
                        
                            <div class="form-group col-md-4">
                                <label for="inputEmail4"><b>ชื่อภาษา</b></label>
                                <input type="text" class="form-control form-control-sm" id="name_th" name="name_th">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4"><b>นามสกุล</b></label>
                                <input type="text" class="form-control form-control-sm" id="surname_th" name ="surname_th">
                            </div>
                        </div>

                    <div class="form-row">  
                        <div class="form-group col-md-3">
                            <label for="inputEmail4"><b>Academic Position</b></label>
                            <div id="sh_data_register_position_eng" name="sh_data_register_position_eng" readonly=""></div>
                        </div>  
                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><b>Name</b></label>
                            <input type="text" class="form-control form-control-sm" id="name_en" name ="name_en">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><b>Surname</b></label>
                            <input type="text" class="form-control form-control-sm" id="surname_en" name="surname_en">
                        </div>
                    </div>

                    <div class="form-row">    
                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><b>เบอร์โทรศัพท์</b></label>
                            <input type="text" class="form-control form-control-sm" id="phonenumber_user" name="phonenumber_user">
                        </div>          
                    </div>  

                    <div class="form-row">  
                        <div class="form-group col-md-12">
                            <label for="inputEmail4"><b>ที่อยู่</b></label>
                            <textarea class="form-control" name="address_user" id="address_user" style="height: 110px;"></textarea>
                        </div>            
                    </div> 

                    <div class="modal-footer">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $row_data['user_id']; ?>">
                        <button type="button" class="btn btn-primary" id="save_edit">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>        
                    </div>        
                </form>
            </div> 
        </div>
    </div> 
</div>     

<div class="modal fade" id="myModalProfile_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รีเซ็ตรหัสผ่าน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">  
                <div class="form-group col-md-12">
                    <label for="inputEmail4"><b>รหัสผ่านเดิม</b></label>
                    <input type="password" class="form-control form-control-sm" id="name_en" name ="name_en">
                </div>
            </div>
            <div class="form-row">  
                <div class="form-group col-md-12">
                    <label for="inputEmail4"><b>รหัสผ่านใหม่</b></label>
                    <input type="password" class="form-control form-control-sm" id="name_en" name ="name_en">
                </div>
            </div>
            <div class="form-row">  
                <div class="form-group col-md-12">
                    <label for="inputEmail4"><b>ยืนยันรหัสผ่านใหม่</b></label>
                    <input type="password" class="form-control form-control-sm" id="name_en" name ="name_en">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $row_data['user_id']; ?>">
        <button type="button" class="btn btn-primary">บันทึก</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">   
    $('.btnUpProfile').click(function(event) {     
        var row = $(this).data( "row" );
        console.log(row);
        $('#name_th').val(row.name_th);
        $('#surname_th').val(row.surname_th);
        $('#name_en').val(row.name_en);
        $('#surname_en').val(row.surname_en);
        $('#address_user').val(row.address_user);
        $('#phonenumber_user').val(row.phonenumber_user);
        $('#type_title_id').val(row.type_title_id);
        $('#type_title_name').val(row.type_title_name);
        $('#pre_id').val(row.pre_id);
        $('#pre_en').val(row.pre_en); 
        $('#pre_th_short').val(row.pre_th_short); 
        $('#pre_en_short').val(row.pre_en_short);     
        $("#myModalProfile").modal({backdrop: true});
    });
</script>

<script type="text/javascript">
   
    $('.btnUpProfile_file').click(function(event) {
     
        var row = $(this).data( "row" );
        console.log(row);
        $("#myModalProfile_file").modal({backdrop: true});
    });
</script>

<script>
    $(document).ready(function(){
        aaaa();    
    });
    function aaaa(){
        var pos_thai = $("#position_thai").val();
        $.ajax({
            url: "menu_data.php?action=position_eng",
            type: "POST",
            data: {
                ID_position_thai : pos_thai
            },
            success: function (data, status) {
                $("#sh_data_register_position_eng").html(data);
            },
            error: function(data, status, error) {
                $('#sh_data_register_position_eng').html('<p>An error has occurred</p>');
            }
        });
    }
    $("#position_thai").change(function(){
        var pos_thai = $("#position_thai").val();
        $.ajax({
            url: "menu_data.php?action=position_eng",
            type: "POST",
            data: {
                ID_position_thai : pos_thai
            },
            success: function (data, status) {
                $("#sh_data_register_position_eng").html(data);
            },
            error: function(data, status, error) {
                $('#sh_data_register_position_eng').html('<p>An error has occurred</p>');
            }
        });
    });

    $("#save_edit").click(function(){
        $.ajax({
            url: "sql_editUser.php?action=save_editDataUser",
            type: "POST",
            data: {
                user_id : $("#user_id").val(),
                position_thai : $("#position_thai").val(),
                name_th : $("#name_th").val(),
                surname_th : $("#surname_th").val(),
                name_en : $("#name_en").val(),
                surname_en : $("#surname_en").val(),
                address_user : $("#address_user").val(),
                phonenumber_user : $("#phonenumber_user").val()
            },
            success: function (data, status) {
                response = data.trim(); 
            if(response == "true") // Success
            {
                Swal.fire({
                    title: "<font color=#009900>สำเร็จ!</font>", 
                    text: "แก้ไขข้อมูลสำเร็จ!",
                    type: "success"
                }).then(function(){ 
                    location.reload(true);
                });
            }
            else // Err
            {
                Swal.fire({
                    icon: 'error',
                    title: "<font color=red>ไม่สำเร็จ!</font>", 
                    text: "เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        error: function(data, status, error) {
            $('#sh_data_register_position_eng').html('<p>An error has occurred</p>');
        }
    });
    });
</script>