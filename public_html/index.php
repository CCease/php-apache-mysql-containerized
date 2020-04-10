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
  <link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
	<!-- Libraries CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/main.css" type="text/css" media="screen">

</head>
<style>
body {
  /* padding-top: 3.5rem; */
  background-image: url('test2_1.gif');
  background-repeat: no-repeat;
  background-position: center;
  height: 500px;
  }

  #welcome {
		margin-top: 385px;
    font-size: 50px;
		font-family: 'Mansalva', cursive;
		color: black;
		}



  </style>
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
			</ul>
      <ul class="navbar-nav mr-auto">
      </ul>
      <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target=".bd-example-modal-sm" >Login</button>
		</div>
	</nav>

  <h1 id="welcome" class="text-center"></h1>
  <br><br>
  <div style="margin:0 25% 0; text-align:center">
    <a class="yeng" href="#">
      <span class="yengleh"></span>
      <span class="yengleh"></span>
      <span class="yengleh"></span>
      <span class="yengleh"></span>
      <span role="button" data-toggle="modal" data-target=".bd-example-modal-sm">Get Started</span>
    </a>
  </div>

  <!--login and register modal"-->
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="form">
          <form id="login-form" autocomplete="off" action="login.php" method="post">
            <input type="text" name="username" class="form-control" placeholder="Enter name" id="userName">
            <input type="password" name="pwd" class="form-control"  placeholder="Enter password" id="password">
            <button type="submit" name="loginOfficer" class="btn my-2 my-sm-0" > login </button>

            <p class="message"> Not Registered? <a href="#"> Register</a></p>
          </form>
          <form class="register-form" autocomplete="off">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href ='registerR.php';"> Recycler </button>
            <button class="btn btn-outline-success my-2 my-sm-3" type="button" onclick="window.location.href ='registerC.php';"> Collector </button>
            <p class="message"> Already Registered? <a href="#"> Log in</a></p>
          </form>
        </div>
      </div>
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


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'> </script>
    <script>
    $('.message a').click(function(){
  		$('form').animate({height:"toggle", opacity:"toggle"}, "slow");
  		if($('#exampleModalLabel').text() =="Login")
  		{	$('#exampleModalLabel').text("Register as");
  			}
  		else if ($('#exampleModalLabel').text() =="Register as")
  		{
  			$('#exampleModalLabel').text("Login");
  		}
  	});





    var i = 0;
    var txt = 'Welcome to Green Earth System.';
    var speed = 50;

    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("welcome").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
      }
    }
      typeWriter();
    </script>


</body>
</html>
