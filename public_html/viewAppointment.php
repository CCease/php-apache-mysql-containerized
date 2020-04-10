<?php
	session_start();
	$Username = $_SESSION['username'];
 ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Green Earth</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Libraries CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/viewAppointment.css" type="text/css" media="screen">

	<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
</head>
<body>
	<!--top section-->
	<!-- <section id="topbar" class="d-none d-lg-block">
		<div class="container-fluid clearfix">
			<div class="contact-info float-left">
				<i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@hotmail.com</a>
				<i class="fa fa-phone"></i> +6012-345678
			</div>
			<div class="social-links float-right">
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</section> -->

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
					<a class="nav-link active" href="viewAppointment.php">View Appointment</a>
				</li>
				<li class="nav-item pill-5">
					<a class="nav-link" href="viewSub_r.php"> View Submission History</a>
				</li>
			</ul>
		</div>
		<ul class="navbar-nav mr-auto">
		</ul>
		<a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>
	</nav>

	<!-- Page Content-->
    <br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<h1 class="display-4">View Appointment</h1>
					<hr class="my-4">
					<p style="font-size:20px;">View the recent appointment you have made.</p>
					<hr>
					<br>
				</div>
				<hr>
				<div class="form-group">					<div class="col-lg-12">
						<?php
						if (isset($_SESSION['alert'])) {
							echo $_SESSION['alert'];
							unset($_SESSION['alert']);} ?>
					</div>
				</div>

				<div class="container" style="color: #566787;
					background: #f5f5f5;
					font-family: 'Varela Round', sans-serif;
					font-size: 13px;">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-5">
									<h2><b>Your Appointment</b></h2>
								</div>
							</div>
						</div>
						<?php
							//connect to mysql
							$conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");
							if ($conn->connect_error){
								die("Connection failure: " . mysqli_connect_error());
							}

							//use table
							$sub = "use submission";
							$conn->query($sub);
							$sql = "SELECT * FROM submission WHERE RECYCLER_USERNAME='$Username' AND STATUS='Proposed'";
							$result = mysqli_query($conn, $sql);

							//fetch the data into while loop
							$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
						?>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Collector Name</th>
									<th>Material Name</th>
									<th>Proposed Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (mysqli_num_rows($result) == 0) { ?>
										<h5>Looks like you don't have any recent appointment.</h5>
									<?php
									} else {
									while($record = mysqli_fetch_assoc($resultset))
									{
								?>
								<tr>
									<?php
										//use table
										$cmTable = "use collectormaterial";
										$cmID = $record['COLLECTORMATERIAL_ID'];
										$conn->query($cmTable);
										$sql = "SELECT * FROM collectormaterial WHERE COLLECTORMATERIAL_ID='$cmID';";
										$result2 = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
										$record2 = mysqli_fetch_assoc($result2);

										$userTable = "use user";
										$uid = $record2['id'];
										$conn->query($userTable);
										$sql = "SELECT * FROM user WHERE id='$uid';";
										$result3 = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
										$record3 = mysqli_fetch_assoc($result3);

										$materialTable = "use material";
										$mid = $record2['MATERIAL_ID'];
										$conn->query($materialTable);
										$sql = "SELECT * FROM material WHERE MATERIAL_ID='$mid';";
										$result4 = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
										$record4 = mysqli_fetch_assoc($result4);
									?>
									<td><?php echo $record['SUBMISSION_ID']; ?></td>
									<td><?php echo $record3['fullname']; ?></td>
									<td><?php echo $record4['MATERIAL_NAME']; ?></td>
									<td><?php echo $record['PROPOSED_DATE']; ?></td>
									<td><span class="status text-warning">&bull;</span> <?php echo $record['STATUS']; ?></td>
									<td>
									<a href="#" class="delete" title="Cancel" data-toggle="modal" data-target="#Modal<?php echo $record['SUBMISSION_ID'];?>"><i class="material-icons">&#xE5C9;</i></a>
									</td>
								</tr>
								<!--Modal for removing material-->
								<form action="assets/php/cancelAppointment.php" method="POST" class="needs-validation" novalidate>
									<div class="modal fade" id="Modal<?php echo $record['SUBMISSION_ID'];?>" tabindex="-1" role="dialog">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to cancel this appointment?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<input type="hidden" class="form-control" name="submission" value="<?php echo $record['SUBMISSION_ID']; ?>" readonly>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
													<input type="submit" class="btn btn-danger" name="submit" value="Yes, I want to cancel my appointment." >
												</div>
											</div>
										</div>
									</div>
								</form>
								<?php }} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>


	<br><br>
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

	<script type="text/javascript" src="assets/javascript/manageMaterial.js"></script>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
