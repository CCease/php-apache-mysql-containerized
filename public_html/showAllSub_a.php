<?php

   session_start();
   require 'dbh.php';
   $UserID = $_SESSION['usrid'];
   $matID = $_GET['materialID'];

   $sql6 = "SELECT * FROM material WHERE MATERIAL_ID = '$matID'";
   $link = $conn->query($sql6);
   $row3 = $link->fetch_assoc();
   $Mat_name = $row3['MATERIAL_NAME'];

   $sql3 = "SELECT SUM(submission.WEIGHT_IN_KG) AS sum_w, SUM(submission.POINTS_AWARDED) AS sum_p
            FROM material
            INNER JOIN collectormaterial
            ON material.MATERIAL_ID = collectormaterial.MATERIAL_ID
            AND material.MATERIAL_ID = '$matID'
            INNER JOIN submission
            ON submission.COLLECTORMATERIAL_ID = collectormaterial.COLLECTORMATERIAL_ID
            INNER JOIN user
            ON user.id = collectormaterial.id";

   $result3 = mysqli_query($conn, $sql3);
   $row4 = mysqli_fetch_assoc($result3);
   $sum_weight = $row4['sum_w'];
   $sum_points = $row4['sum_p'];

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
 					<a class="nav-link" href="manageMaterial.php">Maintain Material</a>
 				</li>
 				<li class="nav-item pill-3">
 					<a class="nav-link active" href="viewSub_a.php">View Submission History</a>
 			</ul>
 			<ul class="navbar-nav mr-auto">
       </ul>
       <a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>

       <form class="form-inline" style="float:right;">
   			<input class="form-control mr-sm-2" id="searchBar" type="text" placeholder="Search by date..." onkeyup="searchFunction2()">
   		</form>

 		</div>
 	</nav>

 <br><br>

 	<div class = "container">
    <div class="row">
    <div class="col-lg-12">
      <div class="jumbotron">
        <h1 class="display-4">View Submission</h1>
        <hr class="my-4">
        <?php
          echo "<p style='font-size:20px'>Material Name: $Mat_name </p><br>";
          ?>
          <p class="lead">
          <a href = "viewSub_a.php"><button class="btn btn-success" id="btn1">Back to Material List</button></a>
          </p>
      </div>
      <hr>
    </div>
    </div>




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
       $sql2 = "SELECT submission.RECYCLER_USERNAME, material.MATERIAL_NAME, submission.WEIGHT_IN_KG, submission.STATUS, submission.SUBMISSION_ID, submission.POINTS_AWARDED, user.username, submission.ACTUAL_DATE
                FROM material
                INNER JOIN collectormaterial
                ON material.MATERIAL_ID = collectormaterial.MATERIAL_ID
                AND material.MATERIAL_ID = '$matID'
                INNER JOIN submission
                ON submission.COLLECTORMATERIAL_ID = collectormaterial.COLLECTORMATERIAL_ID
                INNER JOIN user
                ON user.id = collectormaterial.id";
                //AND submission.STATUS = 'Proposed'

       $result2 = mysqli_query($conn, $sql2);

     ?>

     <?php
       if (mysqli_num_rows($result2) == 0) {
        //echo "<h5> Opps, There is no any Submissions at this moment... </h5>";
        echo '<div class="alert alert-danger alert-dismissible">
      	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      	<strong> Opps, There is no any Submissions at this moment... </strong></div>';
            }
      ?>
      <br>

      <div class="row">
        <div class="col-lg-8">
            <!-- search bar -->
            <input type="text" class="form-control" id="filter" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Search by Status" onkeyup="searchFunction()">
        </div>
        <div class="col-lg-4">
          <?php echo "<h5> Total weight: $sum_weight | Total points: $sum_points </h5>"; ?>
        </div>
      </div>


      <br>


     <!--Mateiral list-->
     <table class="table table-borderless table-secondary" id="mydatatable">
       <form class="form-control">
       <thead>
         <tr class="thead-dark">
           <th class="text-center">SubmissionID</th>
           <th class="text-center">Recycler name</th>
           <th class="text-center">Collector name</th>
           <th class="text-center"> Weight(kg)</th>
           <th class="text-center">Points Awarded</th>
           <th class="text-center">Status</th>
           <th class="text-center">Actual Date</th>
           <th></th>
         </tr>
       </thead>
       <tbody>
         <?php while($row = mysqli_fetch_array($result2)):?>
         <tr>
           <td align="center"><?php echo $row['SUBMISSION_ID'];?></td>
           <td align="center"><?php echo $row['RECYCLER_USERNAME'];?></td>
           <td align="center"><?php echo $row['username'];?></td>
           <td align="center"><?php echo $row['WEIGHT_IN_KG'];?></td>
           <td align="center"><?php echo $row['POINTS_AWARDED'];?></td>
           <td align="center"><?php echo $row['STATUS'];?></td>
           <td align="center"><?php echo $row['ACTUAL_DATE'];?></td>
         </tr>



       <?php endwhile;?>

       </tbody>
       </form>
     </table>

 		<br><br>
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
 			td = tr[i].getElementsByTagName("td")[5];
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

    function searchFunction2() {
 		  var input, filter, table, tr, td, i, txtValue;
 		  input = document.getElementById("searchBar");
 		  filter = input.value.toUpperCase();
 		  table = document.getElementById("mydatatable");
 		  tr = table.getElementsByTagName("tr");
 		  for (i = 0; i < tr.length; i++) {
 			td = tr[i].getElementsByTagName("td")[6];
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
