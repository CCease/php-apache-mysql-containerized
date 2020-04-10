<?php
session_start();
require 'dbh.php';
$userId = $_SESSION['usrid'];
$sql = "SELECT * FROM user WHERE id = $userId ;";
$result = mysqli_query($conn, $sql);

 ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Recycler profile</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/r_pro.css">

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
            <a class="nav-link active" href="r_pro.php" style ="color:white">Your Profile</a>
        </li>
        <li class="nav-item pill-3">
            <a class="nav-link" href="materialList.php" style ="color:white"> Recycle Material</a>
        </li>
        <li class="nav-item pill-4">
					<a class="nav-link" href="viewAppointment.php" style ="color:white">View Appointment</a>
		</li>
		<li class="nav-item pill-5">
			<a class="nav-link" href="viewSub_r.php" style ="color:white">View Submission History</a>
		</li>
	</ul>
      <ul class="navbar-nav mr-auto">
      </ul>
      <a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>
		</div>
	</nav>

  <div align="center" id="font"> Recycler info </div>

  <div class="container contact">

  	<div class="row">

      <?php while($row = mysqli_fetch_array($result)):?>

  		<div class="col-md-3">
  			<div class="contact-info">
  				<div id="pic"><img src="icon_r.png" alt="image" height="200px" width="200px"/></div>
  				<div align ="center"> <h2><?php echo $row['username'];?></h2> </div>

  			</div>
  		</div>
  		<div class="col-md-9">
  			<div class="contact-form">
  				<div class="form-group">
  				  <label class="control-label col-sm-2" for="fname">FullName :</label>
  				  <div class="col-sm-10">
  					<input type="text" class="form-control" id="fname"  value="<?php echo $row['fullname'];?>" name="fname" style="background-color:white" readonly>
  				  </div>
  				</div>
  				<div class="form-group">
  				  <label class="control-label col-sm-2" for="contact">Contact :</label>
  				  <div class="col-sm-10">
  					<input type="text" class="form-control" id="contact"  value="<?php echo $row['contact'];?>" name="contact" style="background-color:white" readonly>
  				  </div>
  				</div>
  				<div class="form-group">
  				  <label class="control-label col-sm-2" for="email">Email:</label>
  				  <div class="col-sm-10">
  					<input type="email" class="form-control" id="email"  value="<?php echo $row['email'];?>" name="email" style="background-color:white" readonly>
  				  </div>
  				</div>
  				<div class="form-group">
  				  <label class="control-label col-sm-2" for="point">Total Point:</label>
  				  <div class="col-sm-10">
  					<input type="text" class="form-control" id="point"  value="<?php echo $row['totalpoint'];?>" name="point" style="background-color:white" readonly>
  				  </div>
  				</div>
          <div class="form-group">
  				  <label class="control-label col-sm-2" for="level">Eco Level:</label>
  				  <div class="col-sm-10">
  					<input type="text" class="form-control" id="level" value="<?php echo $row['ecolevel'];?>" name="level" style="background-color:white" readonly>
  				  </div>
  				</div>
          <br>

  				<div class="form-group">
  					<button type="button" class="btn btn-default" id ="pw" data-toggle="modal" data-target="#pop1<?php echo $row['id'];?>">Change Password</button>
            <button type="button" class="btn btn-default" id = "fn" data-toggle="modal" data-target="#pop<?php echo $row['id'];?>">Change Fullname</button>

          </div>

          <!-- change password modal open -->
          <form  action="changepw_r.php" method="POST">

          <div class="modal fade" id="pop1<?php echo $row['id'];?>">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" >Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">


                <div class="row">
                  <div class="form-group col-md-6">
                    <b> Old password :</b>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password"  name="r_oldpw" >
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <b> New password :</b>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password"  name="r_newpw" >
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <b> Confirm password :</b>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password"  name="r_conpw" >
                  </div>
                </div>

                 <div class="apply_btn" align="center"><button class="btn btn-outline-info" type="submit" name="submitApp" data-toggle="modal" data-target="#pop1"> Submit</button></div>
              </div>

              </div>
            </div>
          </div>
        </form>

          <!-- change fullname modal open -->
          <form  action="changefn_r.php" method="POST">

          <div class="modal fade" id="pop<?php echo $row['id'];?>">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" >Change Fullname</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">


                <div class="row">
                  <div class="form-group col-md-6">
                    <b> Old Fullname :</b>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text"  name="R_ID" value="<?php echo $row['fullname'];?>" style="background-color:#f2f2f2" readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <b> New Fullname :</b>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text"  name="r_fullname" >
                  </div>
                </div>

                 <div class="apply_btn" align="center"><button class="btn btn-outline-info" type="submit" name="submitApp" data-toggle="modal" data-target="#pop"> Submit</button></div>
              </div>

              </div>
            </div>
          </div>
        </form>

  			</div>
  		</div>

  	</div>

  </div>

<br><br><br><br><br><br><br><br><br><br>
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
<?php endwhile;?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://code.jquery.com/jquery-3.2.1.min.js'> </script>

</body>
</html>
