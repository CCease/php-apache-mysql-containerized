<?php
session_start();

//get the data from viewAppointment.php
$sID = $_POST["submission"];

$conn = new mysqli("localhost","root","", "greenearth");
if ($conn->connect_error){
	die("Connection failure");
}

$deleteData = "DELETE FROM submission where SUBMISSION_ID='$sID';";
if ($conn->query($deleteData)==TRUE){
	$alert = '<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Your Submission (ID: ' . $sID . ') has been cancelled successfully.</strong></div>';
	$_SESSION['alert'] = $alert;
	echo "<script type='text/javascript'>
	window.location = '/BIT216/viewAppointment.php'; </script>";
}
?>
