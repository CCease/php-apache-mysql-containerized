<?php
    session_start();
    $R_id = $_SESSION["usrid"];
    $R_name = $_POST["r_fullname"];


    //connect to database
    $conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");

    // this is to find income by using id
    $name = "SELECT * FROM user WHERE id = '$R_id'";
    $result = $conn->query($name);
    $row = $result->fetch_assoc();



    if($conn ->connect_error){
      die("Connection error");
    }


    $sql = "UPDATE user SET fullname = '$R_name' WHERE id = '$R_id'";

    //execute the query
    if(empty($R_name)){
      echo "<script type='text/javascript'> alert('New fullname cannot be empty'); </script>";
      echo "<script type='text/javascript'> window.location='r_pro.php'</script>";
    }
    else{
      if($conn->query($sql) == TRUE){
          echo "<script type='text/javascript'> alert('Change fullname successfully'); </script>";
          echo "<script type='text/javascript'> window.location='r_pro.php'</script>";

      }
      else{
        echo "Fail";
      }

    }

?>
