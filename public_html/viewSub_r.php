<?php

session_start();
require 'dbh.php';
$UserID = $_SESSION['usrid'];
// //$_SESSION['resID'] = "";
// $sql = "SELECT MATERIAL_ID, MATERIAL_NAME, POINTSPERKG, DESCRIPTION FROM material";
// $result = mysqli_query($conn, $sql);

 $sql4 = "SELECT * FROM user WHERE id ='$UserID'";
 $fname = $conn->query($sql4);
 $row2 = $fname->fetch_assoc();
 $name = $row2['username'];

 ?>



<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/viewSub.css" type="text/css" media="screen">
    <title>viewSubmission page</title>
    <!-- <style>
    .jumbotron{
    	background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("viewMaterial_3.jfif");
    	background-size:cover;
    	color:white;
    }
    </style> -->
 </head>

<body>
  <!--navigation-->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
		<span class="navbar-toggler-icon"></span>
		</button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav nav-pills" role="tablist">
				<li class="nav-item pill-1">
					<a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;">Green Earth</a>
				</li>
				<li class="nav-item pill-2">
					<a class="nav-link" href="r_pro.php">Your Profile</a>
				</li>
				<li class="nav-item pill-3">
					<a class="nav-link" href="materialList.php">Recycle Material</a>
				</li>
				<li class="nav-item pill-4">
					<a class="nav-link" href="viewAppointment.php">View Appointment</a>
				</li>
				<li class="nav-item pill-5">
					<a class="nav-link active" href="viewSub_r.php">View Submission History</a>
				</li>
			</ul>
			<ul class="navbar-nav mr-auto">
      </ul>
      <a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>
      <form class="form-inline" style="float:right;">
       <input class="form-control mr-sm-2" id="filter" type="text" placeholder="Search by Mateiral ID..." onkeyup="searchFunction()">
     </form>
		</div>
	</nav>

  <br><br>

	<div class = "container">
    <div class="row">
    <div class="col-lg-12">
      <div class="jumbotron" style="height:388.6px">
        <h1 class="display-4">View Submission</h1>
        <hr class="my-4">
        <p style="font-size:20px;">The following are the materials: </p><br>
      </div>
      <hr>
    </div>


    <!-- search bar -->
    <!-- <input type="text" class="form-control" id="filter" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Search by Mateiral ID" onkeyup="searchFunction()"> -->


    <!-- alert box -->
    <div class="form-group">
      <div class="col-lg-12">
        <?php
        if (isset($_SESSION['alert'])) {
          echo $_SESSION['alert'];
          unset($_SESSION['alert']);} ?>
      </div>
    </div>

    <?php
    $sql2 = "SELECT DISTINCT material.MATERIAL_ID, material.MATERIAL_NAME,  material.POINTSPERKG,  material.DESCRIPTION
             FROM material
             INNER JOIN collectormaterial
             ON material.MATERIAL_ID = collectormaterial.MATERIAL_ID
             INNER JOIN user
             ON user.id = collectormaterial.id
             INNER JOIN submission
             ON collectormaterial.COLLECTORMATERIAL_ID = submission.COLLECTORMATERIAL_ID
             AND submission.RECYCLER_USERNAME = '$name'
             ORDER BY material.MATERIAL_ID";
    $result2 = mysqli_query($conn, $sql2);


    ?>

    <!--Mateiral list-->

    <table class="table table-borderless table-secondary" id="mydatatable">
      <form class="form-control">
      <thead>
        <tr class="thead-dark">
          <th class="text-center">MATERIAL_ID</th>
          <th class="text-center">MATERIAL_NAME</th>
          <th class="text-center">Points(kg)</th>
          <th class="text-center">Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result2)):?>
        <tr>
          <td align="center"><?php echo $row['MATERIAL_ID'];?></td>
          <td ><?php echo $row['MATERIAL_NAME'];?></td>
          <td align="center"><?php echo $row['POINTSPERKG'];?></td>
          <td><?php echo $row['DESCRIPTION'];?></td>
          <td align="middle"> <a href=showAllSub_r.php?materialID=<?php echo $row['MATERIAL_ID'];?>><button type="button" class="btn btn-primary"> Select </button></a></td>
        </tr>

      <?php endwhile;?>

      </tbody>
      </form>
    </table>


		<br><br>
  </div>
  </div>


  <!-- Footer -->
  <div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
      <div class="row">
      <div class="col-lg-5 col-xs-12 about-company">
        <h2><span style="color:#1aff1a;">GREEN</span> <span style="color:#00ccff;">EARTH</span></h2>
        <p class="pr-5 text-white-50">Brighten our future environment. </p>
      </div>
      <div class="col-lg-3 col-xs-12 links">
        <h4 class="mt-lg-0 mt-sm-3">Services</h4>
        <ul class="m-0 p-0">
          <li>Recycle Material</li>
          <li>Make Appointment</li>
          <li>Search Nearby Collectors</li>
        </ul>
      </div>
      <div class="col-lg-4 col-xs-12 location">
        <h4 class="mt-lg-0 mt-sm-4">Location</h4>
        <p>Malaysia</p>
        <p class="mb-0"><i class="fa fa-phone mr-3"></i>(60) 12-3456789</p>
        <p><i class="fa fa-envelope-o mr-3"></i>contact@hotmail.com</p>
      </div>
      </div>
      <div class="row mt-5">
      <div class="col copyright">
        <p class=""><small class="text-white-50">© 2020. All Rights Reserved.</small></p>
      </div>
      </div>
    </div>
  </div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script>
		function searchFunction() {
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("filter");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("mydatatable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		}
	</script>

</body>
</html>
