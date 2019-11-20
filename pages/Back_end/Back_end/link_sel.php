
<html>
<head>
<title>Selection Link</title>
</head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Bootstrap core JavaScript-->
    <script src="../../bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="../../bootstrap/vendor/jquery/jquery.validate.min.js"></script>
<body>
    <div class="container">
        <h1>Test Selection Link</h1>
        <p>ทดสอบๆ</p>
        <hr>
        <div class="row">
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">ผู้ใช้งานท่านที่ 1 <span style="color: red;">*</span> :</span></label>
                <select class="form-control" id="send_mail_1" name="send_mail_1">
                </select>
            </div>
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">เมล ผู้ใช้งานท่านที่ 1 <span style="color: red;">*</span> :</span></label>
                <input type="text" class="form-control" id="show_send_mail_1" name="show_send_mail_1" >
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">ผู้ใช้งานท่านที่ 2 <span style="color: red;">*</span> :</span></label>
                <select class="form-control" id="send_mail_2" name="send_mail_2">
                </select>
            </div>
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">เมล ผู้ใช้งานท่านที่ 2 <span style="color: red;">*</span> :</span></label>
                <input type="text" class="form-control" id="show_send_mail_2" name="show_send_mail_2">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">ผู้ใช้งานท่านที่ 3 <span style="color: red;">*</span> :</span></label>
                <select class="form-control" id="send_mail_3" name="send_mail_3">
                </select>
            </div>
            <div class="col-6 col-md-6">
                <label for=""><span style="font-weight: bold; color: #333333">เมล ผู้ใช้งานท่านที่ 3 <span style="color: red;">*</span> :</span></label>
                <input type="text" class="form-control" id="show_send_mail_3" name="show_send_mail_3" >
            </div>
        </div>
        <input type="text" name="hid_send_mail_1" id="hid_send_mail_1" value="0">
        <input type="text" name="hid_send_mail_2" id="hid_send_mail_2" value="0">
        <input type="text" name="hid_send_mail_3" id="hid_send_mail_3" value="0">
    </div>

<script>

    $(document).ready(function(){
        show_selection_all();
    })
    function show_selection_all()
    {
        $.ajax({
            type: 'POST',
            url: "link_sel_data.php?action=show_all", 
            data: {
                show_all : "show_all"
            },
            success: function(data) {
                $("#send_mail_1").html(data);
                $("#send_mail_2").html(data);
                $("#send_mail_3").html(data);
            }
        });
    }

    $("#send_mail_1").change(function(){
        var id_send_mail_1 = $("#send_mail_1").val();
        $("#hid_send_mail_1").val(id_send_mail_1);

        var id_send_mail_2 = $("#send_mail_2").val();
        $("#hid_send_mail_2").val(id_send_mail_2);

        var id_send_mail_3 = $("#send_mail_3").val();
        $("#hid_send_mail_3").val(id_send_mail_3);

        $.ajax({
            type: 'POST',
            url: "link_sel_data.php?action=show_selection", 
            data: {
                post_sel : "post_sel_1",
                change_id1 : $("#hid_send_mail_1").val(),
                change_id2 : $("#hid_send_mail_2").val(),
                change_id3 : $("#hid_send_mail_3").val()
            },
            success: function(data) {
                $("#send_mail_2").html(data);
                $("#send_mail_3").html(data);
            }
        });
    });

    $("#send_mail_2").change(function(){
        var id_send_mail_1 = $("#send_mail_1").val();
        $("#hid_send_mail_1").val(id_send_mail_1);

        var id_send_mail_2 = $("#send_mail_2").val();
        $("#hid_send_mail_2").val(id_send_mail_2);

        var id_send_mail_3 = $("#send_mail_3").val();
        $("#hid_send_mail_3").val(id_send_mail_3);

        // $.ajax({
        //     type: 'POST',
        //     url: "link_sel_data.php?action=show_selection", 
        //     data: {
        //         post_sel : "post_sel_2",
        //         change_id1 : $("#hid_send_mail_1").val(),
        //         change_id2 : $("#hid_send_mail_2").val(),
        //         change_id3 : $("#hid_send_mail_3").val()
        //     },
        //     success: function(data) {
        //         $("#send_mail_1").html(data);
        //         $("#send_mail_3").html(data);
        //     }
        // });
    });

    $("#send_mail_3").change(function(){
        var id = $("#hid_send_mail_3").val($("#send_mail_3").val());
    });

</script>
</body>
</html>