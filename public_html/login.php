<?php
if (isset($_POST['loginOfficer'])) {
  require 'dbh.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    header("Location:index.php?error=emptyfields");
    exit();
  }else {
    $sql = "SELECT * FROM user WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location:index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt,"s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $passwordCheck = password_verify($password, $row['password']);
        if ($passwordCheck == false) {
          header("Location:index.php?error=wrongpwd");
          exit();
        }else if ($passwordCheck == true) {
          session_start();
          $_SESSION['usrid'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          if($row['type'] === 'admin'){
            header("Location:manageMaterial.php?login=success&type=admin");
            exit();
          }
          elseif ($row['type'] === 'recycler') {
            header("Location:r_pro.php?login=success&type=recycler");
            exit();
          }
          elseif ($row['type'] === 'collector') {
            header("Location:c_pro.php?login=success&type=collector");
            exit();
          }

        }
      }
      else {
        header("Location:index.php?error=nouser");
        echo "no user";
      }
    }
  }
}
else {
  header("Location:index.php");
  exit();
}
