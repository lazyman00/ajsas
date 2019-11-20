<?php  include('../../../connect/connect.php'); ?>
<?php $_SESSION['data'] = array(); ?>
<?php

$type          = $_GET["action"]; 
$page          = $_GET["page"];
$search_name   = $_POST['search_name'];


$total_record  ="";
$total_page    ="";

$perpage       = 10;
$data_last     = $page * $perpage;
$data_first    = $data_last - $perpage;

if($data_last <= 10)
{
    $i = 1;
}
else 
{
    $i = $data_last-9;
}

if($type=="showdata_table"){


// $sql = "SELECT * FROM article a
// left join type_article ta on ta.type_article_id = a.type_article_id";
// $result = $conn->query($sql); 

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;

    if($search_name != "")
    { 

        $search_name = " AND concat(m.article_id, ' ', m.article_name_th) Like '%".$search_name."%' ";         

    }else{
            //echo "ไม่มีมีค่า";
        $search_name ="";
    }

    if($search_name != ""){

        $sql = "SELECT * FROM ( 
        SELECT ROW_NUMBER() OVER (ORDER BY m.article_id DESC) as row,
        m.article_id, m.article_name_th, ta.type_article_name
        FROM article AS m
        left join type_article as ta on ta.type_article_id = m.type_article_id
        WHERE m.article_id is not null ".$search_name." ) AS tb

        WHERE tb.row > ".$data_first." AND tb.row <= ".$data_last;

    }else{
        $sql="SELECT * FROM article
        left join type_article on type_article.type_article_id = article.type_article_id
        ";

    }

    $result = $conn->query($sql); //or die($conn->error);
    $fetch = $result->fetch_assoc();
    $nom_row = $result->num_rows;

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;
    ?>    
    <div class="container">    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%">#</th>
                        <th scope="col">ชื่อบทความ</th>
                        <th scope="col" style="width: 20%">สาขา</th>
                        <th scope="col" style="width: 15%">Download</th>  
                        <th scope="col" style="width: 15%"></th>                               
                    </tr>
                </thead>
                <tbody>
                    <?php             $selectall=1; 
                    if($nom_row >0)
                    {
                        do{ 
                            ?>
                            <tr>
                                <th scope="row" style="padding-bottom: 6px; padding-top: 6px;"><?php echo $selectall; ?></th>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["article_name_th"] ?></td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["type_article_name"] ?></td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><a href="../files_work/<?php echo $fetch["article_name_th"] ?>">ดาวน์โหลด</a></td>
                                <td style="padding-bottom: 6px; padding-top: 6px;"><button data-row='<?php  echo json_encode($fetch); ?>' class="btn btn-outline-secondary btn-sm btnUp">send</button></td>
                            </tr>

                            <?php
                            $selectall++; 
                        }while($fetch = $result->fetch_assoc()); 
                    }   
                    else
                    {

                    }
                    ?>
                </tbody>
            </table>   
        </div>      
    </div>

    <?php
}
?>
<!-- Modal -->
<div class="modal fade" id="myModalA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>ข้อมูลบทความวิชาการ</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="POST" id="send_email">
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="article_name_th">ชื่อบทความภาษาไทย :</label>
                            <input type="text" readonly="" name="article_name_th" class="form-control" id="article_name_th">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="abstract_th">บทคัดย่อภาษาไทย :</label>
                            <textarea readonly="" name="abstract_th" class="form-control" id="abstract_th" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="article_name_en">ชื่อบทความภาษาอังกฤษ :</label>
                            <input type="text" readonly="" name="article_name_en" class="form-control" id="article_name_en">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="abstract_en">บทคัดย่อภาษาอังกฤษ :</label>
                            <textarea readonly="" name="abstract_en" class="form-control" id="abstract_en" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_article_name">ประเภทบทความ :</label>
                        <input type="text" readonly="" class="form-control" id="type_article_name">
                        <input type="hidden" name="type_article_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="keyword_th">คำสำคัญภาษาไทย :</label>
                        <input type="text" readonly="" name="keyword_th" class="form-control" id="keyword_th">
                    </div>
                    <div class="form-group">
                        <label for="keyword_en">คำสำคัญภาษาอังกฤษ :</label>
                        <input type="text" readonly="keyword_en" name="" class="form-control" id="keyword_en">
                    </div>
                    <div class="form-group">
                        <label for="attach_article">แบบไฟล์บทความ :</label>
                        <a href="">attach_article</a>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="date_article">วันที่ส่งบทความ :</label>
                            <input type="text" readonly="" name="date_article" class="form-control" id="date_article">
                        </div>
                    </div>


                    <hr>
                    <p><b>ข้อมูลผู้ทรวคุณวุฒิ</b></p>
                    <span id="view_Professional"></span>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ตกลง</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
                <input type="text" name="article_id" id="article_id">
            </form>
        </div>
    </div>
</div> 

<div class="modal fade bd-example-modal-sm" id="msg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xm">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p><strong>ข้อความ!</strong></p> 
            <p><img width="50px;" src="../../img/l1.gif"><span id="txt">กรุณารอสักครู่ ระบบกำลังทำการจัดส่งเมล์</span></p>
        </div>
    </div>
</div>

<div id="wait" style="z-index: 2048;position:absolute;top:5%;left:34%;display:none"> 
    <center>
        <img src='../../img/img_icon/3ball.gif' /><br>
        <font color="#000000"><b>กรุณารอสักครู่..</b></font>
    </center>
</div>

<script type="text/javascript">

    // $(document).ajaxStart(function(){
    //     $("#wait").css("display", "block");
    // });

    // $(document).ajaxComplete(function(){
    //     $("#wait").css("display", "none");
    // });

    $('.btnUp').click(function(event) {
        var row = $(this).data( "row" );
        $('#article_id').val(row.article_id);
        $('#article_name_th').val(row.article_name_th);
        $('#abstract_th').val(row.abstract_th);
        $('#article_name_en').val(row.article_name_en);
        $('#abstract_en').val(row.abstract_en);

        $('#keyword_th').val(row.keyword_th);
        $('#keyword_en').val(row.keyword_en);
        $('#type_article_name').val(row.type_article_name);

        $('#date_article').val(row.date_article);

        $.get('allarticle/view_Professional.php',{ type_article_id: row.type_article_id }, function(data) {
            $('#view_Professional').html(data);
        });

        $("#myModalA").modal({backdrop: true});
    });


    $( "#send_email" ).validate( {
        rules: {
            user: "required",
            pass: "required"

        },
        messages: {
            user: "*กรุณากรอกข้อมูล",
            pass: "*กรุณาเลือกข้อมูล"

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
        },submitHandler: function(e) {


            $('#myModalA').modal('hide').next('#msg').modal('show');

            var formData = new FormData($("#send_email")[0]);
            setTimeout(function(){  
                $.ajax({ 
                    url: 'allarticle/send_email_1.php',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false
                }).then(function(){ 
                    $('#msg').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: "<font color=#009900>สำเร็จ!</font>", 
                        text: "ส่งเมลสำเร็จแล้ว!",
                        type: "success",
                         showConfirmButton: false,
                      timer: 1500
                    });
                }); 
            }, 300);
            return false;
        }
    });


    // $.ajax({
    //             type: "POST",
    //             url: "send_email_professional.php", 
    //             data: {
    //                 e_email : $("#e_email").val(),
    //                 title_mail_name: $("#title_mail_name").val(),
    //                 story_mail_name: $("#story_mail_name").val(),
    //                 detail_mail_name: $("#detail_mail_name").val()
    //             },
    //             success: function(data, status) {
    //                 response = data.trim(); 
    //                 if(response == "true") // Success
    //                 {
    //                     Swal.fire({
    //    title: "<font color=#009900>สำเร็จ!</font>", 
    //    text: "ส่งเมลสำเร็จ!",
    //    type: "success"
    //   }).then(function(){ 
    //    location.reload(true);
    //   });

    //                 }
    //                 else // Err
    //                 {
    //                     Swal.fire(
    //    '<font color=red>ไม่สำเร็จ!</font>',
    //    'เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
    //    'error'
    //   ).then(function(){ 
    //    location.reload(true);
    //   });
    //                 }

    //             },
    //             error: function(data, status, error) {
    //                 alert("Error");
    //             }
    //         });
</script>










