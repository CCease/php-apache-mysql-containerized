<?php
    session_start();
    $C_id = $_SESSION["usrid"];
    $C_oldpw = $_POST['c_oldpw'];
    $C_newpw = $_POST["c_newpw"];
    $C_conpw = $_POST["c_conpw"];


    //connect to database
    $conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");

    // this is to find income by using id
    $id = "SELECT * FROM user WHERE id = '$C_id'";
    $result = $conn->query($id);
    //$row = $result->fetch_assoc();



    if($conn ->connect_error){
      die("Connection error");
    }

    if ($C_newpw == $C_conpw){
      $new_pw = password_hash($C_conpw, PASSWORD_DEFAULT);

      if(password_verify($C_oldpw, $result->fetch_assoc()['password'])){
          $fetch = $conn -> query("UPDATE user SET password = '$new_pw' WHERE id ='$C_id'");
          echo "<script type='text/javascript'> alert('Change password successfully'); </script>";
          echo "<script type='text/javascript'> window.location='c_pro.php'</script>";
      }
      else{
        echo "<script type='text/javascript'> alert('Old Password is incorrect'); </script>";
        echo "<script type='text/javascript'> window.location='c_pro.php'</script>";
      }
    }
    else if (empty($C_oldpw) || empty($C_newpw) || empty($C_conpw)){
      echo "<script type='text/javascript'> alert('Please fill up the form'); </script>";
      echo "<script type='text/javascript'> window.location='c_pro.php'</script>";
    }
    else{
      echo "<script type='text/javascript'> alert('New password and confirm password do not match.'); </script>";
      echo "<script type='text/javascript'> window.location='c_pro.php'</script>";
    }









?>
