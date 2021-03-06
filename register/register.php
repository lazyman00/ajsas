<?php
    $hostname_connect = "localhost";
    $username_connect = "root";
    $password_connect = "1150"; //1150
    $database_connect = "ajsas"; // ajsas
    $conn = new mysqli($hostname_connect, $username_connect, $password_connect, $database_connect);
    if ($conn->connect_errno) {
        echo $conn->connect_error;
        exit;
    }

    $conn->set_charset("utf8");	
    mysqli_query($conn, "SET NAMES UTF8");
    date_default_timezone_set('Asia/Bangkok');
?>

<style>
/* thai */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWzVaF5NQ.woff2) format('woff2');
  unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
}
/* vietnamese */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWoVaF5NQ.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWpVaF5NQ.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local('Kanit Light'), local('Kanit-Light'), url(https://fonts.gstatic.com/s/kanit/v5/nKKU-Go6G5tXcr4-ORWnVaE.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* thai */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraBGwCYdA.woff2) format('woff2');
  unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
}
/* vietnamese */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraaGwCYdA.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcrabGwCYdA.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Kanit';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local('Kanit Regular'), local('Kanit-Regular'), url(https://fonts.gstatic.com/s/kanit/v5/nKKZ-Go6G5tXcraVGwA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
	body{
	font-family: 'Kanit Light';
}div{
	font-family: 'Kanit';
}h3{
	font-family: 'Kanit Light';
}option{
	font-family: 'Kanit Light';
}select{
	font-family: 'Kanit Light';
}tbody{
	font-family: 'Kanit Light';
}label{
	font-family: 'Kanit';
}.form-control{
	font-family: 'Kanit Light';
}
</style>
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

<link rel="stylesheet" href="../bootstrap/css/select2.css">
<script src="../bootstrap/js/select2.js"></script>

<!-- sweetalert --> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.3/dist/sweetalert2.all.min.js"></script>

<style>
    .error{
        color:red;
        margin-bottom: 0px;
    }
</style>

</head>

<body class="bg-light">

<style>
    .modal-header {
        background-color: #e9ecef;
        color: #585f65;
    }
    .modal-footer{
        display: block;
        text-align: -webkit-center;
    }.bg-white {
        background-color: #008000!important;
    }
    .select2-container .select2-selection--single {
        height: 33px !important;
        border: 1px solid #CFCFCF;
        border-radius: 1px;
    }
    .select2-results__options{
        font-size:14px !important;
    }
    .select2-selection__rendered {
        font-size: 14px;
    }
</style>
<!-- background-color: #5d3333!important; -->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 111px;">
<a href="../"><h5 class="my-0 mr-md-auto font-weight-normal"><img src="../img/banner3-01.png"></h5></a>
    
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
                                            <input type="password" class="form-control form-control-sm " id="conf_pass" name="conf_pass">
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
                                            <!-- <div class="row" >
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
                                            </div> -->
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
                                                    <select class="form-control form-control-sm " id="department" name="department">
                                                        <option value="">กรุณาเลือก</option>
<?php
                                                        $sql_depar = "SELECT * FROM department where status_department = 1";
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
                                                        <option value="">กรุณาเลือก</option>
<?php
                                                        $sql_t_a = "SELECT * FROM type_article where status_type_article = 1";
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
                                                        <option value="">กรุณาเลือก</option>
<?php
                                                        $sql_u_a = "SELECT * FROM type_title where status_type_title = 1";
                                                        $result_u_a = $conn->query($sql_u_a);
                                                        $fetch_u_a = $result_u_a->fetch_assoc();

                                                        do{
?>
                                                        <option value="<?php echo $fetch_u_a['type_title_id'];?>"><?php echo $fetch_u_a['type_title_name'];?></option>
<?php
                                                        }while($fetch_u_a = $result_u_a->fetch_assoc());
?>
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
                                                        <option value="">กรุณาเลือก</option>
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
                                                    <label for="name">รหัสไปรษณีย์<span style="color: red" >*</span></label>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <input type="text" class="form-control form-control-sm" id="zip_code" name="zip_code" maxlength="5">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                    <div class="col-md-4 mb-3" style="text-align:right">
                                                        <label for="name">เบอร์โทร</label>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <input type="text" class="form-control form-control-sm" id="p_phone" name="p_phone" maxlength="10">
                                                    </div>
                                                </div>

                                        </form>
                            </div>
                            </div>

                    <div id="ga"></div>
                
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
    $('.select2_re').select2();
    fu_show_data_register();
    fu_show_data_register_position_eng();

    jQuery.validator.addMethod("emailfull", function(value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
    }, "Please enter valid email address!");

    $('#form_1').validate({
        rules: {
            e_eail: {
                required: true,
                email: true,
                emailfull: true,
                remote: { 
					url: "check_register.php?action=check_email", 
					type: "post",
					cache: false,
					global: false,
					data: {
						e_eail: function() {
							return $( "#e_eail" ).val();
						}
					}
				}
            },
            p_pass: {
                required: true,
                minlength: 4
            },
            conf_pass: {
                required: true,
                equalTo: "#p_pass"
            }
        },
        messages: {
            e_eail: {
                required: "* กรุณากรอก อีเมล์",
                email: "รูปแบของ Email ของท่านไม่ถูกต้อง!",
                emailfull: "รูปแบของ Email ของท่านไม่ถูกต้อง!",
                remote: "<font color=red>E-mail นี้ถูกใช้งานแล้ว</font>"
            },
            p_pass: {
                required: "* กรุณากรอก รหัสผ่าน",
                minlength: "* กรุณากรอก รหัสผ่าน 4 หลักขึ้นไป"
            },
            conf_pass: {
                required: "* กรุณากรอก รหัสผ่านยืนยัน",
                equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
            }
        }
    });

    $('#form_2').validate({
        rules: {
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
                required: true
            },
            e_education: {
                required: true
            },
            t_type_article_id: {
                required: true
            },
            title_name: {
                required: true
            },
            position_thai: {
                required: true
            },
            a_add: {
                required: true
            },
            zip_code: {
                required: true,
                number: true,
                minlength: 5
            },
            p_phone: {
                required: true,
                number: true,
                minlength: 10
            }
        },
        messages: {
            name_th: {
                required: "* กรุณากรอก "
            },
            last_th: {
                required: "* กรุณากรอก "
            },
            name_eng: {
                required: "* กรุณากรอก "
            },
            last_eng: {
                required: "* กรุณากรอก "
            },
            department: {
                required: "* กรุณาเลือก "
            },
            e_education: {
                required: "* กรุณาเลือก "
            },
            t_type_article_id:{
                required: "* กรุณาเลือก "
            },
            title_name: {
                required: "* กรุณาเลือก "
            },
            position_thai: {
                required: "* กรุณาเลือก "
            },
            a_add: {
                required: "* กรุณากรอก"
            },
            zip_code: {
                required: "* กรุณากรอก",
                number: "* กรุณากรอกเฉพาะตัวเลข",
                minlength: "* กรุณากรอกให้ครบ 5 หลัก"
            },
            p_phone: {
                required: "* กรุณากรอก",
                number: "* กรุณากรอกเฉพาะตัวเลข",
                minlength: "* กรุณากรอกให้ครบ 10 หลัก"
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
            position            = 2;
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
                        //$("#ga").html(response);
                        //alert(response);
                        if(response == "true") // Success
                        {
                            Swal.fire({
                                title: "<font color=#009900>สำเร็จ!</font>", 
                                text: "บันทึกข้อมูลสำเร็จ!",
                                type: "success"
                            }).then(function(){ 
                                //location.reload();
                                window.location.href = '../index.php';
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
        else
        {   
            Swal.fire(
				'<font color=#ffc592>คำเตือน!</font>',
				'กรุณากรอกส่วน ข้อมูลที่ใช้ในการเข้าสู่ระบบ!',
				'warning'
			);
        }
    }
    else
    {   
        Swal.fire(
            '<font color=#ffc592>คำเตือน!</font>',
            'กรุณากรอกส่วน ข้อมูลเกี่ยวกับผู้ส่งบทความ!',
            'warning'
        );
    }

});
</script>
</body>
</html>