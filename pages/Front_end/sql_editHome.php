<?php 
            include('../../connect/connect.php'); 
              mysqli_set_charset($conn,"utf8");
              
           echo $start_time = $_POST['start_time']; 
           echo $end_time = $_POST['end_time']; 
            $home_id = $_POST['home_id']; 
            $topic1 = $_POST['topic1']; 
            $duration1 = $_POST['duration1'];
            $topic2 = $_POST['topic2']; 
            $duration2 = $_POST['duration2'];
            $topic3 = $_POST['topic3']; 
            $duration3 = $_POST['duration3'];
            $topic4 = $_POST['topic4']; 
            $duration4 = $_POST['duration4'];
            $topic5 = $_POST['topic5']; 
            $duration5 = $_POST['duration5'];
      
            
      
           echo $sql = "UPDATE `home` set `topic1`='$topic1',`duration1`='$duration1', `topic2`='$topic2', `duration2`='$duration2',`topic3`='$topic3',`duration3`='$duration3', `topic4`='$topic4', `duration4`='$duration4' , `topic5`='$topic5', `duration5`='$duration5' where `home_id` = '$home_id' ";


         // $result = $conn->query($sql);
          //header('Location:data_teacher.php');
          $conn->close();
          
?>