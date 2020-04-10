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

	<!-- Libraries CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/materialList.css" type="text/css" media="screen">

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
					<a class="nav-link active" href="materialList.php">Recycle Material</a>
				</li>
				<li class="nav-item pill-4">
					<a class="nav-link" href="viewAppointment.php">View Appointment</a>
				</li>
				<li class="nav-item pill-5">
					<a class="nav-link" href="viewSub_r.php">View Submission History</a>
				</li>
			</ul>
		</div>
		<ul class="navbar-nav mr-auto">
		</ul>
		<a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>

		<form class="form-inline" style="float:right;">
			<input class="form-control mr-sm-2" id="searchBar" type="text" placeholder="Search for material..." onkeyup="searchFunction()">
		</form>

	</nav>

	<!-- Page Content-->
    <br><br>
	<div class="container">

    <div class="row">

		<div class="col-lg-12">
			<div class="jumbotron">
				<h1 class="display-4">Recycle Material</h1>
				<hr class="my-4">
				<p style="font-size:20px;">Choose a material, find a collector and make an appointment for recycle submission.</p>
				<hr>
				<br>
			</div>
			<hr>
			<br>

      <!-- /.col-lg-12 -->
      <div class="col-lg-12">
        <div class="row" id="materialList">
		<?php
			//connect to mysql
			$conn = new mysqli("192.168.124.131","root","rootpassword","greenearth","3306");
			if ($conn->connect_error){
				die("Connection failure: " . mysqli_connect_error());
			}

			//use table
			$materialTable = "use material";
			$conn->query($materialTable);
			$sql = "SELECT * FROM material";
			$result = mysqli_query($conn, $sql);

			//fetch the data into while loop
			$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

			//if material table dont have data, display the message
			if (mysqli_num_rows($result) == 0) { ?>
				<h5>There are no available materials at the moment...</h5>
			<?php
			//if materials have values
			} else {
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
				<div class="card p-3 col-lg-4 col-md-4 mb-4">
					<div class="card-box">
							<div class="card-img">
								<?php if($record['MATERIAL_IMAGE'] == null){
										//if material doesn't have picture, display a default pic
										echo '<img class="card-img-top" src="assets/images/recycle.jpg" alt="No picture available at this moment" title="">';
									} else {
										echo '<img src="data:image/jpg;base64,'.base64_encode( $record['MATERIAL_IMAGE'] ).'""/>';
									}
								?>
							</div>
							<div class="card-body">
								<center><h4 class="card-title" style="font-family: Arial, Helvetica, sans-serif;">
								  <?php echo $record['MATERIAL_NAME']; ?>
								</h4></center><br>
								<center><a href=makeAppointment.php?materialID=<?php echo $record['MATERIAL_ID'];?>><button type="button" id="btn1" class="btn btn-info">Recycle</button></a></center>
							</div>
					</div>
				</div>
          <?php }} ?>
		</div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
