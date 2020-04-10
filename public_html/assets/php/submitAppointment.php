<?php
//get the data from makeAppointment.php
$username = $_POST["username"];
$cmID = $_POST["cMID"];
$proposedDate = $_POST["proposedDate"];

$conn = new mysqli("localhost","root","", "greenearth");
if ($conn->connect_error){
	die("Connection failure");
}

//insert the submission data
$insertData = "insert into submission(PROPOSED_DATE, STATUS, RECYCLER_USERNAME, COLLECTORMATERIAL_ID, WEIGHT_IN_KG, POINTS_AWARDED, ACTUAL_DATE)
values ('$proposedDate', 'Proposed', '$username','$cmID','0','0','-');";
if ($conn->query($insertData)==TRUE){
	echo "<script type='text/javascript'>
	alert('Your appointment has been submitted successfully!');
	window.location = '/BIT216/viewAppointment.php'; </script>";
}
?>