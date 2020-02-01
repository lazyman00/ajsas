<?php  include('../../../connect/connect.php'); ?>
<?php  $_SESSION['data'] = array(); ?>
<?php

$type          = $_GET["action"]; 
$page          = $_GET["page"];
$search_name   = $_POST['search_name'];
$search_name2  = $_POST['search_name2'];
$search_name3  = $_POST['search_name3'];

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

    $display_n2 = ($search_name != "") ? "" :  "display:none" ;
    if(!empty($search_name))
    { 
        $search_name = " AND m.article_name_th Like '%".$search_name."%' ";         
    }else{
        $search_name ="";
    }
    if(!empty($search_name2))
    { 
        $search_name2 = " AND ta.type_article_id Like '%".$search_name2."%' ";         
    }else{
        $search_name2 ="";
    }
    if(!empty($search_name3))
    {      
        $search_name3 = " AND YEAR(m.date_article) = $search_name3  "; 
    }else{
        $search_name3 ="";
    }

    $sql = "SELECT * FROM (SELECT m.article_id as row, m.article_id, m.user_id, m.type_article_id, m.article_name_th, m.article_name_en, m.abstract_th, m.abstract_en, m.keyword_th, m.attach_article, m.date_article, ta.type_article_name, m.year, m.time, m.sta_work FROM article AS m left join type_article as ta on ta.type_article_id = m.type_article_id WHERE m.article_id is not null ".$search_name." ".$search_name2." ".$search_name3."
) AS tb WHERE tb.row > ".$data_first." AND tb.row <= ".$data_last." ORDER BY row DESC"; 

$result = $conn->query($sql);
$fetch = $result->fetch_assoc();
$nom_row = $result->num_rows;

$display_n2 = ($search_name != "") ? "" :  "display:none" ;

?>  
<div class="container">    
   <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" style="width: 5%">ลำดับ</th>
                <th scope="col" style="width: 35%">ชื่อบทความ</th>
                <th scope="col" style="width: 20%">สาขา</th>
                <th scope="col" style="width: 10%">ปี</th>
                <th scope="col" style="width: 15%">Download</th>  
                <th scope="col" style="width: 15%" ><center>ส่งบทความ</center></th>                               
            </tr>
        </thead>
        <tbody>
            <?php           $i=1; 
            if($nom_row >0)
            {
                do{ 
                    $select_yesr = $fetch['date_article']; 
                    $yesr_show = date("Y",strtotime($select_yesr))+543;
                    ?>
                    <tr>
                        <th scope="row" style="padding-bottom: 6px; padding-top: 6px;"><?php echo $i; ?></th>
                        <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["article_name_th"]; ?></td>
                        <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["type_article_name"]; ?></td>
                        <td style="padding-bottom: 6px; padding-top: 6px;"><?php echo $fetch["year"]; ?></td>
                        <td style="padding-bottom: 6px; padding-top: 6px;"><a href="../../files_work/<?php echo $fetch["attach_article"]; ?>">ไฟล์เอกสาร</a></td>

                        <td style="padding-bottom: 6px; padding-top: 6px;">
                        <center>
                            <?php if($fetch["sta_work"]==0){ ?> 
                                <button style="width : 125px;" data-article_id="<?php echo $fetch["article_id"]; ?>" data-type_article_id="<?php echo $fetch["type_article_id"]; ?>" data-sta_work="<?php echo $fetch["sta_work"]; ?>" class="btn btn-primary btn-sm btnUp">เทียบเชิญ..</button>
                            <?php }else if($fetch["sta_work"]==1){ ?>
                                <button style="width : 125px;" data-article_id="<?php echo $fetch["article_id"]; ?>" data-type_article_id="<?php echo $fetch["type_article_id"]; ?>" data-sta_work="<?php echo $fetch["sta_work"]; ?>" class="btn btn-success btn-sm btnUp">ผลประเมินวารสาร..</button>    
                            <?php }else if($fetch["sta_work"]==2){ ?>
                                <button style="width : 125px;" data-article_id="<?php echo $fetch["article_id"]; ?>" data-type_article_id="<?php echo $fetch["type_article_id"]; ?>" data-sta_work="<?php echo $fetch["sta_work"]; ?>" class="btn btn-info btn-sm btnUp">ส่งผลการประเมิน..</button>    
                            <?php }else if($fetch["sta_work"]==3){ ?>
                                <button style="width : 125px;" data-article_id="<?php echo $fetch["article_id"]; ?>" data-type_article_id="<?php echo $fetch["type_article_id"]; ?>" data-sta_work="<?php echo $fetch["sta_work"]; ?>" class="btn btn-warning btn-sm btnUp">ตรวจสอบ..</button>    
                            <?php }else if($fetch["sta_work"]==4){ ?>
                                <button style="width : 125px;" data-article_id="<?php echo $fetch["article_id"]; ?>" data-type_article_id="<?php echo $fetch["type_article_id"]; ?>" data-sta_work="<?php echo $fetch["sta_work"]; ?>" class="btn btn-danger btn-sm btnUp">รอการตีพิมพ์</button>    
                            <?php } ?>
                            </center>
                        </td>
                    </tr>
                    <?php
                    $i++; 
                }while($fetch = $result->fetch_assoc()); 
            }   
            else
            {
                ?>
                <tr>
                    <td align="center" colspan="6">
                        ไม่พบข้อมูลที่ท่านค้นหา
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>   
</div> 

<?php


$sql_page = "SELECT count(*) AS COUNT FROM ( 
SELECT m.article_id as row,
m.article_id, m.article_name_th, m.date_article, ta.type_article_name
FROM article AS m
left join type_article as ta on ta.type_article_id = m.type_article_id
WHERE m.article_id is not null ".$search_name." ".$search_name2." ".$search_name3."
) AS tb ";

$result_page = $conn->query($sql_page);
$fetch_page = $result_page->fetch_assoc();
$nom_row_page = $result_page->num_rows;

if($nom_row_page > 0){
    $total_record = $fetch_page["COUNT"];
}else{
    $total_record = 0;
}

if ($total_record > 0) {
    $total_page = ceil($total_record / $perpage);
    ?>

    <nav aria-label="Page navigation example" >
        <ul class="pagination">
            <?php
            if ($page == "1") {
                ?>
                <li class="page-item" style="display: none;"><a class="page-link" >«</a></li> 
                <!-- style="cursor: no-drop;" -->
                <?php
            } else {
                ?>
                <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page-1;?>)">«</a></li>
                <!-- pointer -->
                <?php
            }
            if ($total_page <= 6) {
                for ($i=1;$i<=$total_page;$i++) {
                    if ($i == $page) {
                        ?>
                        <li class="page-item active" ><a class="page-link"><?=$i;?></a></li>
                        <!-- active -->
                        <?php
                    } else {
                        ?>
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?=$i;?>)"><?=$i;?></a></li>
                        <!-- pointer -->
                        <?php
                    }
                }
            } else if (($page+4) > $total_page) {
                ?>
                <li class="page-item"><a class="page-link" onclick="show_date_table(1)">1</a></li>     
                <li class="page-item"><a class="page-link">...</a></li> 
                <!-- disabled -->
                <?php
                for ($i=$total_page-4;$i<=$total_page;$i++) {
                    if ($i == $page) {
                        ?>
                        <li class="page-item active"><a class="page-link"><?php echo $i;?></a></li>
                        <!-- active -->
                        <?php
                    } else {
                        ?>
                        <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $i;?>)"><?php echo $i;?></a></li>
                        <!-- pointer -->
                        <?php
                    }
                }
            } else {
                if ($page < 5) {
                    for ($i=1;$i<=5;$i++) {
                        if ($i == $page) {
                            ?>
                            <li class="page-item active"><a class="page-link"><?php echo $i;?></a></li>
                            <!-- active -->
                            <?php
                        } else {
                            ?>
                            <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $i;?>)"><?php echo $i;?></a></li>
                            <!-- pointer -->
                            <?php
                        }
                    }
                    ?>
                    <li class="page-item"><a class="page-link">...</a></li> 
                    <!-- disabled -->
                    <li class="page-item"><a class="page-link" onclick="show_date_table(<?php echo $total_page;?>)"><?php echo $total_page;?></a></li>
                    <?php
                } else {
                    ?>
                    <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(1)">1</a></li>
                    <!-- pointer -->
                    <li class="page-item"><a class="page-link">...</a></li> 
                    <!-- disabled -->
                    <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page-1;?>)"><?php echo $page-1?></a></li>
                    <!-- pointer -->
                    <li class="page-item active"><a class="page-link"><?php echo $page;?></a></li>
                    <!-- active -->
                    <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $page+1;?>)"><?php echo $page+1?></a></li>
                    <!-- pointer -->
                    <li class="page-item"><a class="page-link">...</a></li> 
                    <!-- disabled -->
                    <li class="page-item" style="cursor: pointer;"><a class="page-link" onclick="show_date_table(<?php echo $total_page;?>)"><?php echo $total_page;?></a></li>
                    <!-- pointer -->
                    <?php
                }
            }
            if ($page == $total_page) {
                ?>
                <li style="display: none;"><a>»</a></li>
                <!-- disabled -->
                <?php
            } else {
                ?>
                <li class="page-item"><a class="page-link" onclick="show_date_table(<?php echo $page+1;?>)">»</a></li>
                <!-- pointer -->
                <?php
            }
            ?>
        </ul>
    </nav>
<?php } ?>
</div>
<?php } ?>
<!-- Modal -->


<div class="modal fade" id="myModalA" tabindex="-1" style="padding-right: 0px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>ข้อมูลบทความวิชาการ</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="POST">
                <div class="modal-body">
                    <div style="overflow-x: hidden; overflow-y: scroll; height: 350px;">
                        <span id="view_allaricle_data"></span>
                    </div>

                    <hr>
                    <ul class="nav nav-tabs">
                        <li class="nav-item ">
                            <a class="nav-link li active" data-pages="1" data-type_article_id="" data-article_id="" href="#">ข้อมูลผู้ทรวคุณวุฒิ</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link li" data-pages="2" data-type_article_id="" data-article_id="" href="#">ผลการประเมินจากผู้ทรง</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link li" data-pages="3" data-type_article_id="" data-article_id="" href="#">ส่งผลการประเมิน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link li" data-pages="4" data-type_article_id="" data-article_id="" href="#">ตรวจสอบบทความ</a>
                        </li>
                    </ul>
                    <span id="view_del_all"></span>
                    
                </div>
                <div class="modal-footer">
                   <!--  <button type="submit" class="btn btn-primary">ตกลง</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button> -->

                </div>
                
            </form>
        </div>
    </div>
</div> 

<div class="modal fade bd-example-modal-lg" id="modal_Professional" style="z-index: 1060; padding-left: 0px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">เทียบเชิญผู้ทรงคุณวุฒิ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="send_email">
                <div class="modal-body">
                    <span id="view_Professional"></span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ส่งเมล์</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

                </div>
                <input type="hidden" name="article_id" id="article_id">
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
    $('#modal_Professional').on('hidden.bs.modal', function () {
        $('body').addClass('modal-open');
    });

    $('#msg').on('hidden.bs.modal', function () {
        $('body').addClass('modal-open');
    });

    $('.nav-link').click(function(e) {
        var type_article_id = $(this).attr('data-type_article_id');
        var article_id = $(this).attr('data-article_id');

        var pages = $(this).attr('data-pages');
        $('.nav-link').removeClass('active');
        $(this).toggleClass('active');

        if(pages==1){
            var  url = "allarticle/view_Professional_pages.php";
        }if(pages==2){
            var  url = "allarticle/view_comment.php";
        }if(pages==3){
            var  url = "allarticle/send_comment_sender.php";
        }if(pages==4){
            var  url = "allarticle/view_files_comsender.php";
        }

        $.get(url,{ type_article_id: type_article_id, article_id: article_id }, function(data) {
            $('#view_del_all').html(data);
        });
        e.preventdefault();

    });

    $('.btnUp').click(function(event) {
        var type_article_id = $(this).attr('data-type_article_id');
        var article_id = $(this).attr('data-article_id');
        var sta_work = $(this).attr('data-sta_work');

        $('[name=detal_comment]').prop('readonly', false);
        $('#fiie_view').css('display', '');
        $('#a1').css('display', 'none');
        $('#a2').css('display', '');

        $('.li').removeClass('active');
        $('.li').eq(sta_work).toggleClass('active');

        if(sta_work==0){
            var  url = "allarticle/view_Professional_pages.php";
        }if(sta_work==1){
            var  url = "allarticle/view_comment.php";
        }if(sta_work==2){
            var  url = "allarticle/send_comment_sender.php";
        }if(sta_work==3){
            var  url = "allarticle/view_files_comsender.php";
        }if(sta_work==4){
             $('.li').eq(3).toggleClass('active');
            var  url = "allarticle/view_files_comsender.php";
        }

        $.get(url,{ type_article_id: type_article_id, article_id: article_id }, function(data) {
            $('#view_del_all').html(data);
        });

        $('#article_id').val(article_id);
        $('.nav-link').attr({
            'data-type_article_id': type_article_id,
            'data-article_id': article_id
        });
        
        $.post('allarticle/view_allaricle_data.php',{ article_id: article_id }, function(data) {
            $('#view_allaricle_data').html(data);
        });


        $("#myModalA").modal({backdrop: true});
        $('body').removeAttr('style');
        $('#myModalA').css('padding-right', '0px');
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


            $('#modal_Professional').modal('hide').next('#msg').modal('show');

            var type_article_id = $('[name=type_article_id]').val();
            var article_id = $('[name=article_id]').val();

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

                    $.get('allarticle/view_Professional_pages.php',{ type_article_id: type_article_id, article_id: article_id }, function(data) {
                        $('#view_del_all').html(data);
                    });

                }); 
            }, 300);
            return false;
        }
    });


    // submitHandler: function(e) {


    //         $('#myModalA').modal('hide').next('#msg').modal('show');

    //         var formData = new FormData($("#send_email")[0]);
    //         setTimeout(function(){  
    //             $.ajax({ 
    //                 url: 'allarticle/send_email_1.php',
    //                 type: 'POST',
    //                 data: formData,
    //                 async: false,
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false
    //             }).then(function(){ 
    //                 $('#msg').modal('hide');

    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: "<font color=#009900>สำเร็จ!</font>", 
    //                     text: "ส่งเมลสำเร็จแล้ว!",
    //                     type: "success",
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 });
    //             }); 
    //         }, 300);
    //         return false;
    //     }



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










