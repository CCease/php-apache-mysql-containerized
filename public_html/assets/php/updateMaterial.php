<?php
session_start();

$conn = new mysqli("localhost","root","", "greenearth");
if ($conn->connect_error){
	die("Connection failure");
}

//get the data from manageMaterial.php
//prevent database error due to user's input
$materialID = $_POST["materialID"];
$materialName = $_POST["materialName"];
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$pointsPerKg = mysqli_real_escape_string($conn, $_POST["pointsPerKg"]);

//update the material data
$updateData = "update material set POINTSPERKG='$pointsPerKg', DESCRIPTION='$description' where MATERIAL_ID='$materialID';";
if ($conn->query($updateData)==TRUE){
	$alert = '<div class="alert alert-success alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>The details of ' . $materialName . ' (Material) has been updated successfully!</strong></div>';
	$_SESSION['alert'] = $alert;
	echo "<script type='text/javascript'>
	window.location = '/BIT216/manageMaterial.php'; </script>";}
else{
	echo "update fail";}
?>
