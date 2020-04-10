<?php
session_start();

//get the data from manageMaterial.php
$materialID = $_POST["materialID"];
$materialName = $_POST["materialName"];

$conn = new mysqli("localhost","root","", "greenearth");
if ($conn->connect_error){
	die("Connection failure");
}

$deleteData = "DELETE FROM material where MATERIAL_ID='$materialID';";
if ($conn->query($deleteData)==TRUE){
	$alert = '<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>' . $materialName . ' (Material) has been removed successfully!</strong></div>';
	$_SESSION['alert'] = $alert;
	echo "<script type='text/javascript'>
	window.location = '/BIT216/manageMaterial.php'; </script>";
}
?>
