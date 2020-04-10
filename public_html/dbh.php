<?php

$servername = "192.168.124.131";
$dbUsername = "root";
$dbPassword = "rootpassword";


$conn  = mysqli_connect($servername, $dbUsername, $dbPassword,'greenearth','3306');

if (!$conn) {
  die("Connection error: ".mysqli_connect_error());
}
