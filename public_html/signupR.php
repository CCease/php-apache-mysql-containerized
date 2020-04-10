<?php
if (isset($_POST['signUpR'])) {

    require 'dbh.php';

    $fname = $_POST['Fname'];
    $sname = $_POST['Sname'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['mail'];
    $contact = $_POST['contact'];


    if (empty($fname) || empty($sname) || empty($password) || empty($repassword) || empty($email) || empty($contact)) {
      header("Location:registerR.php?error=emptyfields&fname=".$fname."&sname=".$sname."&mail=".$email."&contact=".$contact);
      exit();
    }else{
      $sql = "INSERT INTO user (username, fullname, password, email, contact, totalpoint, ecolevel, address, type) VALUES (?,?,?,?,?,0,'newbie','-','recycler')";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:registerR.php?error=sqlerror");
        exit();
      }else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $sname, $hashedPwd, $email, $contact);
        mysqli_stmt_execute($stmt);
        header("Location:index.php?signup=success");
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
