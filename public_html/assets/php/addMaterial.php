<?php
session_start();

$conn = new mysqli("localhost","root","", "greenearth");
if ($conn->connect_error){
	die("Connection failure");
}

//get the data from manageMaterial.php
//prevent database error due to user's input
$materialName = mysqli_real_escape_string($conn, $_POST["materialName"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$pointsPerKg = mysqli_real_escape_string($conn, $_POST["pointsPerKg"]);

//check the material name exist or not
$sql = "SELECT * FROM material WHERE MATERIAL_NAME='$materialName'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) != 0)
{
	$alert = '<div class="alert alert-danger alert-dismissible">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Cannot add! ' . $materialName . ' (Material) has already existed.</strong></div>';
	$_SESSION['alert'] = $alert;
	echo "<script type='text/javascript'>
	window.location = '/BIT216/manageMaterial.php'; </script>";
}
else{
    //add the material 
	$insertData = "insert into Material(MATERIAL_NAME, POINTSPERKG, DESCRIPTION)
	values ('$materialName', '$pointsPerKg', '$description');";
	if ($conn->query($insertData)==TRUE){
		$alert = '<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>New material has been added successfully!</strong></div>';
		$_SESSION['alert'] = $alert;
		echo "<script type='text/javascript'>
		window.location = '/BIT216/manageMaterial.php'; </script>";
	}
}
?>
