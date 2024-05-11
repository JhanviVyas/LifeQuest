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
        	
			$current = $_POST['currentpassword'];
			$new = $_POST['newpassword'];
			$pass = $_POST['cpassword'];
         
     	 
      		if (!$conn)
			{
          		die("Sorry we failed to connect: ". mysqli_connect_error());
      		}
      		else
			{   
				$existSql = "SELECT * FROM `theadmin`  WHERE Password = '$current'";
				$result2 = mysqli_query($conn, $existSql);
				$num = mysqli_num_rows($result2);
				if($num == 1)
				{
				
					if($new === $pass)
					{
        				$sql = "UPDATE `theadmin` 
							SET Password = '$new' 
							WHERE UserName = '$username'";
						$result = mysqli_query($conn, $sql);
			 
						if($result)
						{
							$showAlert = true;
						}
						else
						{
					 
							$showError = "Password not changed successfully";
						}
					}
					else
					{
						$showError = 'New Password and Confirm Password not matched !';
					}
				}
				else
				{
					$showError = " Incorrect Current Password !";
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
				<h2 class="pt-3">Add Blood Group</h2>
            	<hr>
				<?php 
					if($showAlert)
					{
			  			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  		<strong>Succes!</strong> Password changed successfully!
				  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					}
					if($showError)
					{
			 			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  		<strong>Error! </strong>'.$showError.'
				  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>';
					}
				?>

				<form action="changepassword.php" method ="post">
					<div class="mb-3 row">
    					<label for="input1" class="col-sm-2 col-form-label"><h6> Current Password</h6></label>
    					<div class="col-sm-10">
      						<input type="password" class="form-control" id="input1" name="currentpassword">
    					</div>
  					</div>
					<div class="mb-3 row">
    					<label for="input2" class="col-sm-2 col-form-label"><h6> New Password</h6></label>
    					<div class="col-sm-10">
      						<input type="password" class="form-control" id="input2" name="newpassword">
    					</div>
  					</div>
					<div class="mb-3 row">
    					<label for="input3" class="col-sm-2 col-form-label"><h6>Comfirm Password</h6></label>
    					<div class="col-sm-10">
      						<input type="password" class="form-control" id="input3" name="cpassword">
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

  