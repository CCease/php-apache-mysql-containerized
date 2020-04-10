<?php

session_start();
require 'dbh.php';
$UserID = $_SESSION['usrid'];
//$_SESSION['resID'] = "";
$sql = "SELECT MATERIAL_ID, MATERIAL_NAME, POINTSPERKG, DESCRIPTION FROM material";
$result = mysqli_query($conn, $sql);

 ?>


<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/viewMaterial_c.css" type="text/css" media="screen">
    <title>viewMaterial page</title>
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
            <a class="nav-link" href="c_pro.php" style ="color:white">Your Profile</a>
        </li>
        <li class="nav-item pill-3">
            <a class="nav-link active" href="viewMaterial_c.php" style ="color:white">Collect Material</a>
        </li>
        <li class="nav-item pill-4">
            <a class="nav-link" href="recordApp.php" style ="color:white">Record Submission</a>
        </li>
        <li class="nav-item pill-5">
            <a class="nav-link" href="viewSub_c.php" style ="color:white">View Submission History</a>
        </li>
			</ul>
      <ul class="navbar-nav mr-auto">
      </ul>
      <a class="navbar-brand" href="index.php" style="font-family:cursive; color: white;"><i class="fa fa-sign-out"></i>Sign out</a>
		</div>
	</nav>

<br><br>
	<div class = "container">
    <div class="row">

      <div class="col-lg-12">
      <div class="jumbotron">
      <h1 class="display-4">Choose Material</h1>
      <hr class="my-4">
      <p style="font-size:20px;">Add the material to the list</p><br>
      <p class="lead">
      <button class="btn btn-success" id="btn1" data-toggle="modal" data-target="#exampleModalCenter">Choose Material</button>
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
      
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Choose Material</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-secondary" id="mydatatable">
          				<thead>
          					<tr class="thead-dark">
          						<th class="text-center">MATERIAL_ID</th>
          						<th class="text-center">MATERIAL_NAME</th>
          						<th class="text-center">POINTSPERKG</th>
                      <th> </th>

          					</tr>
          				</thead>
          				<tbody>
          					<?php while($row = mysqli_fetch_array($result)):?>
          					<tr>
          						<td align="center"><?php echo $row['MATERIAL_ID'];?></td>
          						<td ><?php echo $row['MATERIAL_NAME'];?></td>
          						<td align="center"><?php echo $row['POINTSPERKG'];?></td>
                      <td align="middle"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pop<?php echo $row['MATERIAL_ID'];?>"> Add </button></td>
          					</tr>


                    <form action="addMaterial_c.php" method ="POST">
                				<div class="modal fade" id="pop<?php echo $row['MATERIAL_ID'];?>" tabindex="-1" role="dialog">
                					<div class="modal-dialog modal-dialog-centered" role="document">
                						<div class="modal-content">
                							<div class="modal-header">
                								<h5 class="modal-title" id="exampleModalLongTitle">Add Material</h5>
                								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                									<span aria-hidden="true">&times;</span>
                								</button>
                							</div>
                							<!-- Display the retrieved data into modal -->
                							<div class="modal-body">
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <b> UserID :</b>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="text" readonly="readonly" name="userID" value="<?php echo $UserID;?>">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <b> MaterialID :</b>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="text" readonly="readonly" name="materialID" value="<?php echo $row['MATERIAL_ID'];?>">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <b> MaterialName :</b>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="text" readonly="readonly" name="MaterialName" value="<?php echo $row['MATERIAL_NAME'];?>">
                                  </div>
                                </div>

                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <b> Points Per Kg :</b>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <input type="text" readonly="readonly" name="point" value="<?php echo $row['POINTSPERKG'];?>">
                                    </div>

                                </div>
                              <div class="apply_btn" align="center"><button class="btn btn-outline-info" type="submit" name="sub" data-target="#pop<?php echo $row['MATERIAL_ID'];?>"> Submit</button></div>
                						</div>
                					</div>
                				</div>
                	 </form>
          	  </div>
                  <?php endwhile;?>
                  </tbody>
            </table>

            </div>

          </div>
        </div>
      </div>

      </div>
    </div>

    <?php
      $sql2 = "SELECT material.MATERIAL_ID, material.MATERIAL_NAME,  material.POINTSPERKG,  material.DESCRIPTION,collectormaterial.COLLECTORMATERIAL_ID
               FROM material
               INNER JOIN collectormaterial
               ON material.MATERIAL_ID = collectormaterial.MATERIAL_ID
               AND collectormaterial.id = $UserID";
      $result2 = mysqli_query($conn, $sql2);


    ?>
    <!--Mateiral that added-->
    <table class="table table-borderless table-secondary" id="mydatatable">
      <thead>
        <tr class="thead-dark">
          <th class="text-center">MaterialCollector_ID</th>
          <th class="text-center">Material_ID</th>
          <th class="text-center">Material_Name</th>
          <th class="text-center">Point(kg)</th>
          <th class="text-center">Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($result2)):?>
        <tr>
          <td align="center"><?php echo $row['COLLECTORMATERIAL_ID'];?></td>
          <td align="center"><?php echo $row['MATERIAL_ID'];?></td>
          <td><?php echo $row['MATERIAL_NAME'];?></td>
          <td align="center"><?php echo $row['POINTSPERKG'];?></td>
          <td><?php echo $row['DESCRIPTION'];?></td>

          <?php
            $mate = $row['COLLECTORMATERIAL_ID'];
            $check = "SELECT * FROM submission WHERE COLLECTORMATERIAL_ID ='$mate'";
            $ch = mysqli_query($conn, $check);
           ?>

          <td align="middle"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#show<?php echo $row['COLLECTORMATERIAL_ID'];?>"
            <?php if(mysqli_num_rows($ch) != 0){ ?> disabled title = "Sorry, material cannot be removed because some recyclers have make appointment on it" <?php } ?> > Remove </button></td>

        </tr>

        <form action="removeM_c.php" method ="POST">
            <div class="modal fade" id="show<?php echo $row['COLLECTORMATERIAL_ID'];?>" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Remove Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- Display the retrieved data into modal -->
                  <div class="modal-body">


                    <div class="row">
                      <div class="form-group col-md-6">
                        <b> MaterialID :</b>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" readonly="readonly" name="materialID" value="<?php echo $row['MATERIAL_ID'];?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <b> MaterialName :</b>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" readonly="readonly" name="MaterialName" value="<?php echo $row['MATERIAL_NAME'];?>">
                      </div>
                    </div>

                      <div class="row">
                        <div class="form-group col-md-6">
                          <b> Points Per Kg :</b>
                        </div>

                        <div class="form-group col-md-6">
                          <input type="text" readonly="readonly" name="point" value="<?php echo $row['POINTSPERKG'];?>">
                        </div>
                    </div>

                    <div class="row">
                      <!-- <div class="form-group col-md-6">
                        <b> CollectorMaterial_ID :</b>
                      </div> -->
                      <div class="form-group col-md-6">
                        <input type="text" readonly="readonly" name="collectormaterialID" value="<?php echo $row['COLLECTORMATERIAL_ID'];?>" hidden>
                      </div>
                    </div>

                  <div class="apply_btn" align="center"><button class="btn btn-outline-danger" type="submit" name="submitApp" data-target="#show<?php echo $row['COLLECTORMATERIAL_ID'];?>"> REMOVE</button></div>
                </div>
              </div>
            </div>
       </form>

      <?php endwhile;?>
      </tbody>
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
