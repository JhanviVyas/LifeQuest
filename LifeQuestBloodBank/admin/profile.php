<?php
    session_start();
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
	{
  		header("location: index.php");
  		exit;
	}
	else
	{
        require 'includes/config.php';
		$username =  $_SESSION['username'];
		 
		$showError=false;
		$showAlert=false;
		
    	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
        	
			$nadmin = $_POST['adminname'];
			$contact = $_POST['contact'];
			$email = $_POST['emailid'];
         
     	 
      		if (!$conn)
			{
          		die("Sorry we failed to connect: ". mysqli_connect_error());
      		}
      		else
			{ 
        		$sql = "UPDATE `theadmin` 
					SET AdminName = '$nadmin' , Email = '$email' , ContactNumber = '$contact'
					WHERE UserName = '$username'";
				$result = mysqli_query($conn, $sql);
			 
				if($result)
				{
					$showAlert = true;
				}
				else
				{
					 
					$showError = true;

				}
			}

		}

    }
?>


<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
  	<title>LifeQuest Alliance | Add BloodGroup</title>
  

	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  	<style>
		.col-wh{
			color:white;
		}
  	</style>
</head>

<body>


<?php include('includes/header.php');?> 

	<div class="container-fluid">
	
		<div class="row">
			<?php include('includes/leftbar.php');?>
			 
			<div class="col" style="margin-top:62px;">
				<h2 class="pt-3">Admin Profile</h2>
            	<hr>

				<?php

					if($showAlert)
					{
			  			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  		<strong>Succes!</strong> Your entry has been updated successfully!  
				  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					}
					if($showError)
					{
			 			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  		<strong>Error!</strong>'.$showError.'
				  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					}
				?>
				<?php
					$sql = "SELECT * FROM `theadmin` WHERE UserName = '$username'";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result))
					{

						$name = $row['AdminName'];
						$mobile = $row['ContactNumber'];
						$email = $row['Email'];
						$date = $row['AdminRegDate'];
							 
					}
			 
				?>


				<form action="profile.php" method="post">
					<div class="row mb-3">
    					<label for="ad" class="col-sm-2 col-form-label"><h6>Admin Name</h6></label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control" id="ad" name="adminname" value="<?php echo $name;?>" required>
    						</div>
  					</div>
					<div class="row mb-3">
    					<label for="un" class="col-sm-2 col-form-label"><h6>Username</h6></label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="un" name="username" value="<?php echo $username;?>" disabled>
    					</div>
  					</div>
					<div class="row mb-3">
    					<label for="con" class="col-sm-2 col-form-label"><h6>Contact Number</h6></label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="con" name="contact" value="<?php echo $mobile;?>" required>
    					</div>
  					</div>
  					<div class="row mb-3">
    					<label for="exampleInputEmail1" class="col-sm-2 col-form-label"><h6>Email address</h6></label>
						<div class="col-sm-10">
    						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailid" value="<?php echo $email;?>" required>
						</div>
  					</div>
  					<div class="row mb-3">
    					<label for="date" class="col-sm-2 col-form-label"><h6>Admin Registration Date</h6></label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="date" name="contact" value="<?php echo $date;?>" disabled>
    					</div>
  					</div>
 
 					<div class="text-center">
  						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
				 
			</div>
		</div>
	</div>

   
</body>
</html>

  