<?php
    session_start();
    $R_id = $_SESSION["usrid"];
    $R_oldpw = $_POST['r_oldpw'];
    $R_newpw = $_POST["r_newpw"];
    $R_conpw = $_POST["r_conpw"];


    //connect to database
    $conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");

    // this is to find income by using id
    $id = "SELECT * FROM user WHERE id = '$R_id'";
    $result = $conn->query($id);
    //$row = $result->fetch_assoc();



    if($conn ->connect_error){
      die("Connection error");
    }

    if ($R_newpw == $R_conpw){
      $new_pw = password_hash($R_conpw, PASSWORD_DEFAULT);

      if(password_verify($R_oldpw, $result->fetch_assoc()['password'])){
          $fetch = $conn -> query("UPDATE user SET password = '$new_pw' WHERE id ='$R_id'");
          echo "<script type='text/javascript'> alert('Change password successfully'); </script>";
          echo "<script type='text/javascript'> window.location='r_pro.php'</script>";
      }
      else{
        echo "<script type='text/javascript'> alert('Old Password is incorrect'); </script>";
        echo "<script type='text/javascript'> window.location='r_pro.php'</script>";
      }
    }
    else if (empty($R_oldpw) || empty($R_newpw) || empty($R_conpw)){
      echo "<script type='text/javascript'> alert('Please fill up the form'); </script>";
      echo "<script type='text/javascript'> window.location='r_pro.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('New password and confirm password do not match.'); </script>";
      echo "<script type='text/javascript'> window.location='r_pro.php'</script>";
    }









?>
