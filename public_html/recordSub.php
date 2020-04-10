<?php
    session_start();
    $userId = $_SESSION['usrid'];
    $Sub_ID = $_POST['sub_id'];
    $R_name = $_POST['R_name'];
    $materialName = $_POST['materialName'];
    $point = $_POST['points'];
    $weight = $_POST['weight'];

    //point awared
    $award = $point * $weight;

    //local date
    $date = date("Y-m-j");

    //connect to database
    $conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");

    if($conn ->connect_error){
      die("Connection error");
    }

    //find ecolevel and totalpoints of recyclers
    $sql3 = "SELECT * FROM user WHERE username = '$R_name'";
    $test= $conn->query($sql3);
    $row1 = $test->fetch_assoc();
    //$Recyler_lvl = $row1['ecolevel'];
    $R_total = $row1['totalpoint'];
    $R_id = $row1['id'];


    //find total point of collector
    $sql2 = "SELECT user.username, user.totalpoint, user.ecolevel
             FROM user
             INNER JOIN collectormaterial
             ON user.id = collectormaterial.id
             INNER JOIN submission
             ON submission.COLLECTORMATERIAL_ID = collectormaterial.COLLECTORMATERIAL_ID";
   $link = $conn->query($sql2);
   $row = $link->fetch_assoc();
   $C_total = $row['totalpoint'];



    //update submission
    $sql4 = "UPDATE submission
            SET WEIGHT_IN_KG = '$weight' , POINTS_AWARDED = '$award', ACTUAL_DATE = '$date', STATUS = 'Submitted'
            WHERE SUBMISSION_ID = '$Sub_ID'";

    //update totalpoints of recycler
    $Rnew_total = $R_total + $award;

    //condition of ecoLevel
    if($Rnew_total < 100){
      $R_level = 'Newbie';
      }
    else if($Rnew_total >= 100 && $Rnew_total < 500){
      $R_level = 'EcoSaver';
      }
    else if($Rnew_total >= 500 && $Rnew_total < 1000){
      $R_level = 'Eco-Hero';
      }
    else{
      $R_level = 'Eco-Warrior';
      }

    //update recyler evolevel
    $sql5 = "UPDATE user
             SET totalpoint = '$Rnew_total' , ecolevel = '$R_level'
             WHERE username = '$R_name'";

    //update collector totalpoint
    $Cnew_total = $C_total + $award;
    $sql6 = "UPDATE user
             SET totalpoint = '$Cnew_total'
             WHERE id = '$userId'";



    if(empty($weight)){
      $alert = '<div class="alert alert-danger alert-dismissible">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong> Input cannot be empty </strong></div>';
    	$_SESSION['alert'] = $alert;
    	echo "<script type='text/javascript'>
    	window.location = 'recordApp.php'; </script>";
    }

    else{
      $conn->query($sql4);
      $conn->query($sql5);
      $conn->query($sql6);

      $alert = '<div class="alert alert-success alert-dismissible">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong> Record Submission Succesfully !! </strong></div>';
    	$_SESSION['alert'] = $alert;
    	echo "<script type='text/javascript'>
    	window.location = 'recordApp.php'; </script>";



    }




?>
