<?php
	session_start();
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
	<link rel="stylesheet" href="assets/css/manageMaterial.css" type="text/css" media="screen">

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
					<a class="nav-link active" href="manageMaterial.php">Maintain Material</a>
				</li>
				<li class="nav-item pill-3">
					<a class="nav-link" href="viewSub_a.php">View Submission History</a>
			</ul>
			<ul class="navbar-nav mr-auto">
      </ul>
      <a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>

		</div>
	</nav>

	<!-- Page Content-->
    <br><br>
	<div class="container">

    <div class="row">

      <div class="col-lg-12">
		<div class="jumbotron">
		  <h1 class="display-4">Maintain Material</h1>
		  <hr class="my-4">
		  <p style="font-size:20px;">Manage the material by adding a new material, updating or removing a material.</p><br>
		  <p class="lead">
			<button class="btn btn-success" id="btn1" data-toggle="modal" data-target="#exampleModalCenter">Add Material</button>
		  </p>
		</div>
		<hr>
		<div class="form-group">
			<div class="col-lg-12">
				<?php
				if (isset($_SESSION['alert'])) {
					echo $_SESSION['alert'];
					unset($_SESSION['alert']);} ?>
			</div>
		</div>
		<br>

		<!--Modal for add material-->
		<form action="assets/php/addMaterial.php" method="POST" class="needs-validation" novalidate>
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Add a New Material</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label for="materialname" class="col-sm-6 col-lg-4 col-form-label"> Material Name</label>
								<div class="col-sm-12 col-lg-8">
									<input type="text" class="form-control" name="materialName" required>
									<div class="invalid-feedback">Please enter the material name.</div><br>
								</div>

								<label for="pointsperkg" class="col-sm-6 col-lg-4 col-form-label"> Points Per Kg</label>
								<div class="col-sm-12 col-lg-8">
									<input type="number" class="form-control" name="pointsPerKg" required>
									<div class="invalid-feedback">Please enter the points per kg.</div><br>
								</div>


								<label for="description" class="col-sm-6 col-lg-4 col-form-label"> Description</label>
								<div class="col-sm-12 col-lg-12">
									<textarea type="text" class="form-control" rows="3" name="description" required></textarea>
									<div class="invalid-feedback">Please enter the description.</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" name="submit" value="Add" >
						</div>
					</div>
				</div>
			</div>
		</form>
      </div>

      <!-- /.col-lg-3 -->
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
				<h5>There are no materials at the moment, feel free to add one!</h5>
			<?php
			//if materials have values
			} else {
			while( $record = mysqli_fetch_assoc($resultset) ) {
			?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
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
							<center><h4 class="card-title" style="color:#00008b; font-family: Arial, Helvetica, sans-serif;">
							  <?php echo $record['MATERIAL_NAME']; ?>
							</h4></center>
							<table class="table table-borderless" style="font-size:14px;">
								  <tbody>
									<tr class="d-flex">
									  <th class="col-7">Material ID</th>
									  <td class="col-5" id="residenceID"><?php echo $record['MATERIAL_ID']; ?></td>
									</tr>
									<tr class="d-flex">
									  <th class="col-7">Points Per Kg</th>
									  <td "col-5"><?php echo $record['POINTSPERKG']; ?></td>
									</tr>
									<tr class="d-flex">
									  <td><b>Description</b><br>
									  <?php echo $record['DESCRIPTION']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="card-footer">
							<input type="submit" class="btn btn-primary" value="Update" data-toggle="modal" data-target="#exampleModal<?php echo $record['MATERIAL_ID'];?>">
							<?php
							$mid = $record['MATERIAL_ID'];
							$sql2 = "SELECT * FROM collectormaterial WHERE MATERIAL_ID='$mid'";
							$rst = mysqli_query($conn, $sql2);
							?>
							<input type="submit" class="btn btn-danger" value="Remove" data-toggle="modal" data-target="#Modal3<?php echo $record['MATERIAL_ID'];?>" style="float:right;" <?php
							//check if the selected material can be removed or not
							//since some collectors may hold it in their material collection
							if(mysqli_num_rows($rst) != 0){ ?> disabled title="Sorry, material cannot be removed because some collectors have held it." <?php } ?> >
						</div>
					</div>
				</div>

			<!--Modal for updating material-->
				<form action="assets/php/updateMaterial.php" method="POST" class="needs-validation" novalidate>
					<div class="modal fade" id="exampleModal<?php echo $record['MATERIAL_ID'];?>" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Change Material Information</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label for="materialid" class="col-sm-6 col-lg-4 col-form-label"> Material ID</label>
										<div class="col-sm-12 col-lg-8">
											<input type="text" class="form-control" name="materialID" value="<?php echo $record['MATERIAL_ID']; ?>" readonly><br>
										</div>

										<label for="materialname" class="col-sm-6 col-lg-4 col-form-label"> Material Name</label>
										<div class="col-sm-12 col-lg-8">
											<input type="text" class="form-control" name="materialName" value="<?php echo $record['MATERIAL_NAME']; ?>" readonly><br>
										</div>

										<label for="pointsperkg" class="col-sm-6 col-lg-4 col-form-label"> Points Per Kg</label>
										<div class="col-sm-12 col-lg-8">
											<input type="number" class="form-control" name="pointsPerKg" value="<?php echo $record['POINTSPERKG']; ?>" required>
											<div class="invalid-feedback">Please enter the points per kg.</div><br>
										</div>


										<label for="description" class="col-sm-6 col-lg-4 col-form-label"> Description</label>
										<div class="col-sm-12 col-lg-12">
											<textarea type="text" class="form-control" name="description" rows="3" required><?php echo $record['DESCRIPTION']; ?></textarea>
											<div class="invalid-feedback">Please enter the description.</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" name="submit" value="Update" >
								</div>
							</div>
						</div>
					</div>
				</form>

				<!--Modal for removing material-->
				<form action="assets/php/removeMaterial.php" method="POST" class="needs-validation" novalidate>
					<div class="modal fade" id="Modal3<?php echo $record['MATERIAL_ID'];?>" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to remove this material?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label for="materialid" class="col-sm-6 col-lg-4 col-form-label"> Material ID</label>
										<div class="col-sm-12 col-lg-8">
											<input type="text" class="form-control" name="materialID" value="<?php echo $record['MATERIAL_ID']; ?>" readonly><br>
										</div>

										<label for="materialname" class="col-sm-6 col-lg-4 col-form-label"> Material Name</label>
										<div class="col-sm-12 col-lg-8">
											<input type="text" class="form-control" name="materialName" value="<?php echo $record['MATERIAL_NAME']; ?>" readonly><br>
										</div>

										<label for="pointsperkg" class="col-sm-6 col-lg-4 col-form-label"> Points Per Kg</label>
										<div class="col-sm-12 col-lg-8">
											<input type="number" class="form-control" name="pointsPerKg" value="<?php echo $record['POINTSPERKG']; ?>" readonly><br>
										</div>


										<label for="description" class="col-sm-6 col-lg-4 col-form-label"> Description</label>
										<div class="col-sm-12 col-lg-12">
											<textarea type="text" class="form-control" name="description" rows="3" readonly><?php echo $record['DESCRIPTION']; ?></textarea>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-danger" name="submit" value="Remove" >
								</div>
							</div>
						</div>
					</div>
				</form>
          <?php }} ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

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
