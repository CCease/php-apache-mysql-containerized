<?php
if (isset($_POST['signUpC'])) {

    require 'dbh.php';

    $fname = $_POST['Fname'];
    $sname = $_POST['Sname'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['mail'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];


    if (empty($fname) || empty($sname) || empty($password) || empty($repassword) || empty($email) || empty($contact) || empty($address)) {
      header("Location:registerC.php?error=emptyfields&fname=".$fname."&sname=".$sname."&mail=".$email."&contact=".$contact."&address=".$address);
      exit();
    }else{
      $sql = "INSERT INTO user (username, fullname, password, email, contact, totalpoint, ecolevel, address, type) VALUES (?,?,?,?,?,0,'-',?,'collector')";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:registerC.php?error=sqlerror");
        exit();
      }else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $sname, $hashedPwd, $email, $contact, $address);
        mysqli_stmt_execute($stmt);
        header("Location:index.php?signup=success");
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
