<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
            <center><h1>หน้าค้นหา</h1></center>
            <div class="col-sm-8 col-md-8" align="right">
                <lable>กรุณากรอก <u>ชื่อ - นามสกุล</u>ที่ท่านต้องการค้นหา : </lable>
                <input type="text" id="search_name" value="" style="width: 260px;" class="sech">
                <button class="btn btn-primary" type="button" onclick="show_date_table(1)"> ค้นหา</button>
            </div>
        <br><br><br>

            <div id="show_date" name="show_date"></div>
    </div>
<script type="text/javascript">

	$(document).ready(function() {
        show_date_table(1);
	});

    function show_date_table(page) {

        $.ajax({
            url: "home_data_table.php?action=showdata_table&page=" +page,
            type: "POST",
            data: {
                search_name : $("#search_name").val()
            },
            success: function (data, status) {
                $("#show_date").html(data);
            },
            error: function(data, status, error) {
                $('#show_date').html('<p>An error has occurred</p>');
            }
        });
    }

</script>

</body>
</html>
