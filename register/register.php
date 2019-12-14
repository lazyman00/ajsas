<?php
    include '../connect/connect.php'; 
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<title>register</title>

<!-- Bootstrap core JavaScript-->
<script src="../bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../bootstrap/vendor/jquery/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>   
<script src="../bootstrap/js/bootstrap.min.js"></script>

<style>
    .error{
        color:red;
        margin-bottom: 0px;
    }
</style>

</head>

<body class="bg-light">
<!-- <nav class="navbar navbar-default navbar-static-top no_print_" role="navigation"style="margin-bottom: 0px; height: 80px; background-color: rgb(255, 255, 255); padding-top: 10px;">
<div class="navbar-header" style="background-color: #2980B9; box-shadow: 4px 4px 1px #888888;">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<a href="index.html"><img src="\img\logo.png"  class="logo" /></a>
<a class="navbar-brand" style="color: #ffffff;">ฐานข้อมูลเพื่อสนับสนุนการดำเนินงานเครือข่ายจิตอาสาประชารัฐ จังหวัดอุตรดิตถ์</a> 
</button>
</div>
</nav> -->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
<h5 class="my-0 mr-md-auto font-weight-normal">วารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</h5>
<nav class="my-2 my-md-0 mr-md-3">
<a class="p-2 text-dark" href="#">เกี่ยวกับวารสาร</a>
<a class="p-2 text-dark" href="#">บรรณาธิการ</a>
<a class="p-2 text-dark" href="#">การส่ง</a>
<a class="p-2 text-dark" href="#">ประกาศ</a>
<a class="p-2 text-dark" href="#">ติดต่อ</a>
</nav>
<a class="btn btn-outline-primary" href="#">เข้าสู่ระบบ</a>
</div>
<div class="container">
<div class="card" style="width: 100%">
    <div class="card-body">   
        <div class="card-body">                              
        <h5 class="card-title">สมัครสมาชิกผู้ส่งบทความวารสารวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</h5>
        <hr class="mb-4">
        <div class="row">
            <div class="col-md-12 order-md-1">
                    <div class="card border-secondary mb-3" style="max-width: 100rem;">
                        <div class="card-header">ข้อมูลที่ใช้ในการเข้าสู่ระบบ</div>
                            <div class="card-body text-secondary">
                                <form class="needs-validation" novalidate id="form_1" name="form_1">
                                    <div class="row" >
                                        <div class="col-md-4 mb-3" style="text-align:right">
                                            <label for="name">อีเมล์<span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="text" class="form-control form-control-sm" id="e_eail" name="e_eail">
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4 mb-3" style="text-align:right">
                                            <label for="name">รหัสผ่าน<span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="password" class="form-control form-control-sm" id="p_pass" name="p_pass">
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4 mb-3" style="text-align:right">
                                            <label for="name">รหัสผ่านยืนยัน<span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="password" class="form-control form-control-sm" id="conf_pass" name="conf_pass">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <hr class="mb-4">
                    <div class="card bg-light mb-3" style="max-width: 100rem;">
                            <div class="card-header">ข้อมูลเกี่ยวกับผู้ส่งบทความ</div>
                            <div class="card-body">
                                    <form class="needs-validation" novalidate id="form_2" name="form_2">
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">สมัครตำแหน่ง<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <select class="form-control form-control-sm" id="position" name="position">
                                                        <option value="0">กรุณาเลือก</option>
                                                        <option value="1">ผู้ส่งบทความ</option>
                                                        <option value="2">ผู้ทรงวุฒิฯ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">ชื่อภาษาไทย<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="name_th" name="name_th">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">นามสกุลภาษาไทย<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="last_th" name="last_th">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">First name<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="name_eng" name="name_eng">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">Last name<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="last_eng" name="last_eng">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">หน่วยงาน<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select class="form-control form-control-sm" id="department" name="department">
                                                        <option value="0">กรุณาเลือก</option>
<?php
                                                        $sql_depar = "SELECT * FROM department ";
                                                        $result_depar = $conn->query($sql_depar);
                                                        $fetch_depar = $result_depar->fetch_assoc();

                                                        do{
?>
                                                        <option value="<?php echo $fetch_depar['department_id'];?>"><?php echo $fetch_depar['department_name'];?></option>
<?php
                                                        }while($fetch_depar = $result_depar->fetch_assoc());
?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="hide_id_department" id="hide_id_department" value="">
                                            <div class="row">
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">สถานศึกษา<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div id="sh_data_register" name="sh_data_register"></div>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">สาขาวิชา<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select class="form-control form-control-sm" id="t_type_article_id" name="t_type_article_id">
                                                        <option value="0">กรุณาเลือก</option>
<?php
                                                        $sql_t_a = "SELECT * FROM type_article ";
                                                        $result_t_a = $conn->query($sql_t_a);
                                                        $fetch_t_a = $result_t_a->fetch_assoc();

                                                        do{
?>
                                                        <option value="<?php echo $fetch_t_a['type_article_id'];?>"><?php echo $fetch_t_a['type_article_name'];?></option>
<?php
                                                        }while($fetch_t_a = $result_t_a->fetch_assoc());
?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">คำนำหน้า<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <select class="form-control form-control-sm" id="title_name" name="title_name">
                                                        <option value="0">กรุณาเลือก</option>
                                                        <option value="1">นาย</option>
                                                        <option value="2">นาง</option>
                                                        <option value="3">นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">ตำแหน่งทางวิชาการภาษาไทย</label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <!-- <input type="text" class="form-control form-control-sm" id="position_thai" name="position_thai"> -->
                                                    <select class="form-control form-control-sm" id="position_thai" name="position_thai">
                                                        <option value="0">กรุณาเลือก</option>
<?php
                                                        $sql_pre_thai = "SELECT * FROM pre ";
                                                        $result_pre_thai = $conn->query($sql_pre_thai);
                                                        $fetch_pre_thai = $result_pre_thai->fetch_assoc();

                                                        do{
?>
                                                        <option value="<?php echo $fetch_pre_thai['pre_id'];?>"><?php echo $fetch_pre_thai['pre_th'];?></option>
<?php
                                                        }while($fetch_pre_thai = $result_pre_thai->fetch_assoc());
?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="position_eng_hide" id="position_eng_hide" value="">
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">ตำแหน่งทางวิชาการภาษาอังกฤษ</label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div id="sh_data_register_position_eng" name="sh_data_register_position_eng"></div>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">ที่อยู่ที่สามารถติดต่อได้<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <!-- <input type="text" class="form-control form-control-sm" id="a_add" name="a_add"> -->
                                                    <textarea class="form-control form-control-sm" rows="4" id="a_add" name="a_add"></textarea>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4 mb-3" style="text-align:right">
                                                    <label for="name">รหัสไปรษณีย์<span style="color: red">*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="zip_code" name="zip_code">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                    <div class="col-md-4 mb-3" style="text-align:right">
                                                        <label for="name">เบอร์โทร</label>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <input type="text" class="form-control form-control-sm" id="p_phone" name="p_phone">
                                                    </div>
                                                </div>

                                        </form>
                            </div>
                            </div>

                    
                
                <div class="row">
                        <div class="col-md-12 order-md-1" style="align-items: center">
                            <form class="needs-validation" novalidate>
                                <div class="row" style="height: 38px;">
                                    <div class="col-md-5 mb-3"></div>
                                    <div class="col-md-5 mb-3">
                                        <button type="button" id="aaa" name="aaa" class="btn btn-primary btn-sm">บันทึก</button>
                                        <button type="button" class="btn btn-danger btn-sm">ยกเลิก</button>
                                    </div>                                          
                                </div>                                        
                            </form>
                        </div>
                    </div>
            </div>
        </div>                             
    </div>
    </div>
    </div>
</div> 


<script>

$(document).ready(function(){
    fu_show_data_register();
    fu_show_data_register_position_eng();

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Value must not equal arg.");

    $('#form_1').validate({
        rules: {
            e_eail: {
                required: true
            },
            p_pass: {
                required: true
            },
            conf_pass: {
                required: true
            }
        },
        messages: {
            e_eail: {
                required: "* กรุณากรอก อีเมล์"
            },
            p_pass: {
                required: "* กรุณากรอก รหัสผ่าน"
            },
            conf_pass: {
                required: "* กรุณากรอก รหัสผ่านยืนยัน"
            }
        }
    });

    $('#form_2').validate({
        rules: {
            position:{
                valueNotEquals: '0'
            },
            name_th: {
                required: true
            },
            last_th: {
                required: true
            },
            name_eng: {
                required: true
            },
            last_eng: {
                required: true
            },
            department: {
                valueNotEquals: '0'
            },
            e_education: {
                valueNotEquals: '0'
            },
            t_type_article_id: {
                valueNotEquals: '0'
            },
            title_name: {
                valueNotEquals: '0'
            },
            position_thai: {
                valueNotEquals: '0'
            },
            a_add: {
                required: true
            },
            zip_code: {
                required: true
            },
            p_phone: {
                required: true
            }
        },
        messages: {
            position:{
                valueNotEquals: "* กรุณาเลือก"
            },
            name_th: {
                required: "* กรุณากรอก อีเมล์"
            },
            last_th: {
                required: "* กรุณากรอก รหัสผ่าน"
            },
            name_eng: {
                required: "* กรุณากรอก รหัสผ่านยืนยัน"
            },
            last_eng: {
                required: "* กรุณากรอก รหัสผ่านยืนยัน"
            },
            department: {
                valueNotEquals: "* กรุณาเลือก"
            },
            e_education: {
                valueNotEquals: "* กรุณาเลือก"
            },
            t_type_article_id:{
                valueNotEquals: "* กรุณาเลือก"
            },
            title_name: {
                valueNotEquals: "* กรุณาเลือก"
            },
            position_thai: {
                valueNotEquals: "* กรุณาเลือก"
            },
            a_add: {
                required: "* กรุณากรอก"
            },
            zip_code: {
                required: "* กรุณากรอก"
            },
            p_phone: {
                required: "* กรุณากรอก"
            }
        }
    });
});

    $("#department").change(function(){
        
        id_d = $("#department").val();
        $("#hide_id_department").val(id_d);

        function fu_show_data_register() {
            id_d = $("#hide_id_department").val();
            $.ajax({

                url: "register_data.php?action=da_depar",
                type: "POST",
                data: {
                    id_d : id_d
                },
                success: function (data, status) {
                    $("#sh_data_register").html(data);
                },
                error: function(data, status, error) {
                    $('#sh_data_register').html('<p>An error has occurred</p>');
                }

            });
        }
        fu_show_data_register();
    });

    function fu_show_data_register() {
        id_d = $("#hide_id_department").val();
        $.ajax({

            url: "register_data.php?action=da_depar",
            type: "POST",
            data: {
                id_d : id_d
            },
            success: function (data, status) {
                $("#sh_data_register").html(data);
            },
            error: function(data, status, error) {
                $('#sh_data_register').html('<p>An error has occurred</p>');
            }

        });
    }

    $("#position_thai").change(function(){
        
        id_d = $("#position_thai").val();
        $("#position_eng_hide").val(id_d);

        function fu_show_data_register_position_eng() {
            id_d = $("#position_eng_hide").val();
            $.ajax({

                url: "register_data.php?action=position_eng",
                type: "POST",
                data: {
                    id_d : id_d
                },
                success: function (data, status) {
                    $("#sh_data_register_position_eng").html(data);
                },
                error: function(data, status, error) {
                    $('#sh_data_register_position_eng').html('<p>An error has occurred</p>');
                }

            });
        }
        fu_show_data_register_position_eng();
    });

    function fu_show_data_register_position_eng() {
        id_d = $("#position_eng_hide").val();
        $.ajax({

            url: "register_data.php?action=position_eng",
            type: "POST",
            data: {
                id_d : id_d
            },
            success: function (data, status) {
                $("#sh_data_register_position_eng").html(data);
            },
            error: function(data, status, error) {
                $('#sh_data_register_position_eng').html('<p>An error has occurred</p>');
            }

        });
    }
  
$("#aaa").click(function(){
    var form_1 = $("#form_1");
    var form_2 = $("#form_2");

    if(form_1.valid())
	{
        if(form_2.valid())
        {

            e_eail              = $("#e_eail").val();
            p_pass              = $("#p_pass").val();
            conf_pass           = $("#conf_pass").val();
            position            = $("#position").val();
            name_th             = $("#name_th").val();
            last_th             = $("#last_th").val();
            name_eng            = $("#name_eng").val();
            last_eng            = $("#last_eng").val();
            department          = $("#department").val();
            e_education         = $("#e_education").val();
            t_type_article_id   = $("#t_type_article_id").val();
            title_name          = $("#title_name").val();
            position_thai       = $("#position_thai").val();
            a_add               = $("#a_add").val();
            zip_code            = $("#zip_code").val();
            p_phone             = $("#p_phone").val();

            if(form_2.valid())
            {
                $.ajax({
                    type: "POST",
                    url: "u_update.php?action=insert_register",
                    data: {
                        e_eail: e_eail,
                        p_pass: p_pass,              
                        conf_pass: conf_pass,           
                        position: position,           
                        name_th: name_th,            
                        last_th: last_th,            
                        name_eng: name_eng,           
                        last_eng: last_eng,           
                        department: department,
                        e_education: e_education,    
                        t_type_article_id: t_type_article_id,     
                        title_name: title_name,         
                        position_thai: position_thai,       
                        a_add: a_add,             
                        zip_code: zip_code,          
                        p_phone: p_phone             
                    },
                    success: function(data, status) {
                        response = data.trim(); 
  
                        if(response == "true") // Success
                        {
                            alert("บันทึกข้อมูลสำเร็จ");
                            window.location.href = 'register.php'; 
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
       


        }
        else
        {   
            alert("ไม่ได้กรอก form2");
        }
    }
    else
    {   
        alert("ไม่ได้กรอก form1");
    }

});
</script>
</body>
</html>