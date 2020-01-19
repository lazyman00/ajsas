<?php  include('../../connect/connect.php'); ?>



<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<style type="text/css">
    .a{
        font-size: 14px;
    }
    .bg-white{
        background-color:rgb(14, 130,0,1)!important;
    }
    .border-bottom{
        border-bottom:1px solid #e4ff00!important;
    }
    .text-dark{
        color:#ffffff!important;
    }
</style>
<body class="bg-light">
    <?php //include('menu.php'); ?>
    <?php //include('menu_index.php'); ?>
        <?php
            $sql = "SELECT * FROM `schedule` where sid = '2'  ";
            $query = $conn->query($sql);
            $row_data = $query->fetch_assoc();
        ?>

        <div class="container">
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 28px;font-weight: 500;color: #555;text-align:center">วารสารวิชาการวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์ </h3>
            </div>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 18px;font-weight: 500;color: #555;text-align:center">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ </h3>
            </div><br>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 28px;font-weight: 500;color: #006400;text-align:center">Academic Journal of Science and Applied Science  </h3>
            </div>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 18px;font-weight: 500;color: #555;text-align:center">Faculty of Science and Technology, Uttaradit Rajabhat University </h3>
            </div><br><br>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 18px;font-weight: 500;color: #555;text-align:center">เพื่อเผยแพร่ความรู้เชิงวิชาการ หรือการวิจัย ด้านวิทยาศาสตร์และวิทยาศาสตร์ประยุกต์ ได้แก่ วิทยาศาสตร์ที่เกิดขึ้นในเหตุการณ์ปัจจุบัน วิทยาศาสตร์บริสุทธิ์ วิทยาศาสตร์กายภาพ วิทยาศาสตร์และเทคโนโลยี วิทยาศาสตร์ สิ่งแวดล้อม วิทยาศาสตร์สุขภาพ และสาขาที่เกี่ยวข้อง </h3>
            </div><br><br>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 28px;font-weight: 500;color: #555;text-align:center">กำหนดการจัดทำวารสารแต่ละปี</h3>
            </div>
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 18px;font-weight: 500;color: #555;text-align:center">ฉบับที่ 1 มกราคม – มิถุนายน</h3>
            </div>
        </div>

        <div class="container">
            <table class="table table-hover">
            <?php
                $sql = "SELECT * FROM `schedule` ";
                $query = $conn->query($sql);
                $row_data_t = $query->fetch_assoc();
            ?>
                <thead>
                    <tr>
                        <th scope="col" style=" width:10%;text-align:center">ลำดับ</th> 
                        <th scope="col" style=" width:60%;text-align:center">กิจกรรม</th>
                        <th scope="col" style=" width:30%;text-align:center">ช่วงระยะเวลา</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">1</td>
                        <td><?php echo $row_data_t["schedule1"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data_t["date1"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">2</td>
                        <td><?php echo $row_data_t["schedule2"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data_t["date2"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">3</td>
                        <td><?php echo $row_data_t["schedule3"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data_t["date3"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">4</td>
                        <td><?php echo $row_data_t["schedule4"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data_t["date4"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">5</td>
                        <td><?php echo $row_data_t["schedule5"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data_t["date5"]  ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>

        <div class="container">
            <div class="col-md-12">
                <h3 style="fontfa: prompt;font-size: 18px;font-weight: 500;color: #555;text-align:center">ฉบับที่ 2 กรกฎาคม – ธันวาคม</h3>
            </div>
        </div>


        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style=" width:10%;text-align:center">ลำดับ</th> 
                        <th scope="col" style=" width:60%;text-align:center">กิจกรรม</th>
                        <th scope="col" style=" width:30%;text-align:center">ช่วงระยะเวลา</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">1</td>
                        <td><?php echo $row_data["schedule1"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data["date1"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">2</td>
                        <td><?php echo $row_data["schedule2"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data["date2"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">3</td>
                        <td><?php echo $row_data["schedule3"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data["date3"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">4</td>
                        <td><?php echo $row_data["schedule4"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data["date4"]  ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">5</td>
                        <td><?php echo $row_data["schedule5"]  ?></td>
                        <td style="text-align:center"><?php echo $row_data["date5"]  ?></td>
                    </tr>
                </tbody>
            </table><br>
        </div>




<script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>