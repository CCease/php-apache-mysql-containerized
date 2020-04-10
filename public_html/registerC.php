
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/registerR.css">
	<title> Recycler Registration </title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand" href="index.php" style="font-family: cursive; color: white;">Green Earth</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="registerR.php"> Recycler Registration</a>
					</li>
				</ul>

			</div>
		</nav>





	<!-- Main part -->
	<div class="container">

			<div class="col">

				<form action="signupC.php" method="post">
					<div style="font-size:25px; margin:0 25% 0 ;text-align:center;"><b>Collector Registration</b></div>
					<br>
					<div class="form-row">



						<div class="form-group col-md-6">

							<label for="name_checking1"><b>Username</b></label>
							<input type="text" name="Fname" class="form-control" id="name_checking1" placeholder="Enter your Username" onfocusout="validate_name1()" >
						</div>

						<div class="form-group col-md-6">
							<label for="name_checking2"><b>FullName</b></label>
							<input type="text" name="Sname" class="form-control" id="name_checking2" placeholder="Enter your Fullname" onfocusout="validate_name2()">
						</div>

					</div>
					<div class="form-row">

						<div class="form-group col-md-6">
							<label for="password_checking1"><b>Password</b></label>
							<input type="password" name="password" class="form-control" id="password_checking1" placeholder="Enter your password" onfocusout="validate_pw1()"  >
						</div>

						<div class="form-group col-md-6">
							<label for="password_checking2"><b>Re-enter password</b></label>
							<input type="password" name="repassword" class="form-control" id="password_checking2" placeholder="Re-enter password" onfocusout="validate_pw2()">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="name_checking"><b>Email</b></label>
							<input type="text" name="mail" class="form-control" id="email_checking" onfocusout="validate_email()"  placeholder="Enter email">
						</div>

					</div>
					<div class="form-row">

						<div class="form-group col-md-12">
							<label for="contact_checking"><b>Contact</b> </label>
							<input type="text" name="contact" placeholder="019-xxxx" onfocusout="validate_contact()" class="form-control" id="contact_checking"/ >
						</div>

					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label> <b> Address </b> </label>
							<input type="text" name="address" placeholder="No 1..Taman....." class="form-control" onfocusout="validate_ic()" id="ic_checking" required/>
						</div>
					</div>
					<br>
					<div style="margin:0 25% 0 ;text-align:center;"><button type="submit" name="signUpC" class="btn btn-lg btn-outline-success" onclick="register()" id="regis">Register</button></div>

						</form>
			</div>


	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'> </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/JavaScript" src="assets/javascript/register.js"></script>
	<script>
	//This is to fade out the register form
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




	// The following code is to let the name of the file appear on select
	$(".custom-file-input").on("change", function() {
	  var fileName = $(this).val().split("\\").pop();
	  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});


	</script>
</body>
</html>
