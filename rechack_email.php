<?php
include('connect/connect.php');
?>  
<?php
$sql = sprintf("SELECT * FROM `user` left join pre on user.pre_id = pre.pre_id WHERE user.`user_id` = %s ",GetSQLValueString($_GET['u'], 'text'));
$query = $conn->query($sql);
$row = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>วารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
    .a{
        font-size: 14px;
    }
    .bg-white{
        background-color:rgb(21, 144, 124)!important;
    }
    .border-bottom{
        border-bottom:1px solid #e4ff00!important;
    }
    .text-dark{
        color:#ffffff!important;
    }
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

    .utxt{
        background-color: #e9ecef;
        padding: 15px;
        border-radius: 5px;
    }
    .error{
        color: red;
    }
</style>
<body class="bg-light">
    <!-- <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm" style="height: 111px;">
        <h5 class="my-0 mr-md-auto font-weight-normal"><img src="img/banner3-01.png"></h5>
    </div> -->
    <?php if(1==1){ ?>

        <div class="container">
            <div class="card" >
                <div class="card-body">
                   <form id="form_add_mange_user_user">
                    <div class="container" style="padding-left: 0px;padding-right: 0px;">
                        <p class="utxt"><b>เรียนคุณ <?php echo $row['pre_th_short']; ?><?php echo $row['name_th']; ?> <?php echo $row['surname_th']; ?> จะรับอ่านวารสารเรื่อง <?php echo $_GET['t']; ?> ( <?php echo $_GET['e']; ?> ) หรือไม่</b></p>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input a" type="radio" name="accept_status" id="a1" value="1">
                            <label class="form-check-label"  for="a1">&nbsp;รับ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-inpu a"  type="radio" name="accept_status" id="a2" value="0">
                            <label class="form-check-label" for="a2">&nbsp;ไม่รับ</label>
                        </div>
                        <hr/>
                        <span id="view_profile" style="display: none;">
                            <p class="utxt"><b>ข้อมูลส่วนตัว</b></p>
                            
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">คำนำหน้าทางวิชาการ*</label>
                                    <?php
                                    $sql_pre = "SELECT * FROM `pre`";
                                    $query_pre = $conn->query($sql_pre);
                                    $row_pre = $query_pre->fetch_assoc();
                                    ?>
                                    <select class="form-control" id="inputEmail4" name="pre_id">
                                        <option value="">กรุณาเลือก</option>
                                        <?php do { ?>
                                            <option <?php if($row['pre_id']==$row_pre['pre_id']){ ?>selected=""<?php }  ?>  value="<?php echo $row_pre['pre_id']; ?>"><?php echo $row_pre['pre_th']; ?></option>
                                        <?php }while($row_pre = $query_pre->fetch_assoc()); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>คำนำหน้า*</label>
                                    <?php
                                    $sql_type_title = "SELECT * FROM `type_title`";
                                    $query_type_title = $conn->query($sql_type_title);
                                    $row_type_title = $query_type_title->fetch_assoc();
                                    ?>
                                    <select class="form-control" name="type_title_id">
                                        <option value="">กรุณาเลือก</option>
                                        <?php do { ?>
                                            <option <?php if($row['type_title_id']==$row_type_title['type_title_id']){ ?>selected=""<?php } ?>  value="<?php echo $row_type_title['type_title_id']; ?>"><?php echo $row_type_title['type_title_name']; ?></option>
                                        <?php }while($row_type_title = $query_type_title->fetch_assoc()); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label >ชื่อ(ภาษาไทย)*</label>
                                    <input type="text" class="form-control" name="name_th" value="<?php echo $row['name_th']; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>นามสกุล(ภาษาไทย)*</label>
                                    <input type="text" class="form-control" name="surname_th" value="<?php echo $row['surname_th']; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>ชื่อ(ภาษาอังกฤษ)*</label>
                                    <input type="text" class="form-control" name="name_en" value="<?php echo $row['name_en']; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>นามสกุล(ภาษาอังกฤษ)*</label>
                                    <input type="text" class="form-control" name="surname_en" value="<?php echo $row['surname_en']; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">สถานศึกษา*</label>
                                    <?php
                                    $sql_academe = "SELECT * FROM `academe`";
                                    $query_academe = $conn->query($sql_academe);
                                    $row_academe = $query_academe->fetch_assoc();
                                    ?>
                                    <select class="form-control" name="academe_id">
                                        <option value="">กรุณาเลือก</option>
                                        <?php do { ?>
                                            <option <?php if($row['academe_id']==$row_academe['academe_id']){ ?> selected="" <?php } ?>  value="<?php echo $row_academe['academe_id']; ?>"><?php echo $row_academe['academe_name']; ?></option>
                                        <?php }while($row_academe = $query_academe->fetch_assoc()); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">หมายเลขโทรศัพท์*</label>
                                    <input type="tel" class="form-control" name="phonenumber_user" value="<?php echo $row['phonenumber_user']; ?>">
                                </div>
                            </div>

                            <hr/>

                            <div class="form-group">
                                <label for="inputAddress">ที่อยู่ปัจจุบัน</label>
                                <textarea class="form-control" name="address_user" rows="5"><?php echo $row['address_user']; ?></textarea>
                            </div>
                            <hr/>
                            <p class="utxt"><b>รหัสเข้าสู่ระบบ</b></p>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="">อีเมล (E-mail)<span style="color: red;"> * </span></label>
                                    <input type="text" class="form-control" id="add_email" name="add_email" value="<?php echo $row['email']; ?>" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">รหัสผ่าน <span style="color: red;"> * </span></label>
                                    <input type="password" class="form-control" id="add_pass" name="add_pass" value="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <div id="hid_show_add_conf_pass" name="hid_show_add_conf_pass">
                                        <label for="">รหัสผ่าน (ยืนยันรหัสผ่าน)<span style="color: red;"> * </span></label>
                                        <input type="password" class="form-control" id="add_conf_pass" name="add_conf_pass" value="" placWeholder="">
                                    </div>
                                </div>
                            </div>
                        </span>

                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>

                    </div>
                    <input type="hidden" name="type_user_id" value="3">
                    <input type="hidden" name="sta_P" value="1">
                    <input type="hidden" name="user_id" value="<?php echo $_GET['u']; ?>">
                    <input type="hidden" name="article_id" value="<?php echo $_GET['i']; ?>">
                    <input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
                </form>
            </div>         
        </div>
    </div>

<?php }else{ ?> 

    <p style="color: red;">*ลิ้งค์หมดอายุแล้ว ไม่สามารถเข้าระบบได้</p>

<?php } ?>

<div class="modal fade bd-example-modal-sm" id="msg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>ข้อความ!</strong> <span id="txt">ขอบคุณ....</span>
        </div>
    </div>
</div>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery-validation-1.19.0/dist/jquery.validate.js"></script>

<script type="text/javascript">
    $('.a').click(function(event) {
        var a = $(this).val();
        if(a==1){
            $('#view_profile').css('display', 'block');
        }else{
            $('#view_profile').css('display', 'none');
        }
    });

    // $.validator.addMethod("valueNotEquals", function(value, element, arg){
    //     return arg !== value;
    // }, "Value must not equal arg.");

//     $('#form_add_mange_user_user').validate({
//        errorClass: "errors",
//        rules: {
//         add_email:{
//             required: true,
//             email: true
//         },
//         add_pass:{
//             required: true
//         },
//         add_conf_pass:{
//             required: true,
//             equalTo: "#add_pass"
//         }
//     },
//     messages: {
//         add_email:{
//             required: "กรุณากรอกอีเมล (E-mail) ของท่าน",
//             email: "รูปแบของ Email ของท่านไม่ถูกต้อง!"
//         },
//         add_pass:{
//             required: "กรุณากรอก password ของท่าน"
//         },
//         add_conf_pass:{
//             required: "กรุณากรอกยืนยัน password ของท่าน",
//             equalTo: "ยืนยันรหัสผ่าน ของท่านไม่ตรงกัน"
//         }
//     }
// });

$( "#form_add_mange_user_user" ).validate( {

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
        }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        error.addClass( "help-block" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
    },
    submitHandler: function(e) {
        var u = $('[name=user_id]').val();
        var e = $('[name=e]').val();
        $.post('rechack_email/sql.php',$('#form_add_mange_user_user').serialize(),function(response){



            $('#msg').modal('show');



            
            if(response==1){
                $.post('rechack_email/reSent_mail.php',{ u:u, e:e },function(response){

                     // $('#view').html(response);
                     location.href = "/ajsas";
                 });

            }else{
                setTimeout(function(){ window.close(); }, 2000);
                
            }


        }); 
        return false;
    }

});
</script>   

</body>
</html>



