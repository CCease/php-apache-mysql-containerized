<?php
    session_start();
    $R_id = $_SESSION["usrid"];
    $CMaterial_id = $_POST["collectormaterialID"];


    //connect to database
    $conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");

    // this is to find income by using id
    $id= "SELECT * FROM collectormaterial WHERE COLLECTORMATERIAL_ID = '$CMaterial_id'";
    $result = $conn->query($id);
    $row = $result->fetch_assoc();



    if($conn ->connect_error){
      die("Connection error");
    }


    $sql = "DELETE FROM collectormaterial WHERE COLLECTORMATERIAL_ID = '$CMaterial_id'";

    //execute the query
    if($conn->query($sql) == TRUE){
      $alert = '<div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong> Material has been deleted. </strong></div>';
      $_SESSION['alert'] = $alert;
      echo "<script type='text/javascript'>
      window.location = 'viewMaterial_c.php'; </script>";


    }




?>
