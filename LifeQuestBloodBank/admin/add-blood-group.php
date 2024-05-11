<?php
	session_start();
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
	{
  		header("location: index.php");
  		exit;
	}
	else
	{
		$showError=false;
		$showAlert=false;
		
    	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
        	$bloodgrup = $_POST['inputblood'];
         
     		require 'includes/config.php';
      		if (!$conn)
			{
          		die("Sorry we failed to connect: ". mysqli_connect_error());
      		}
      		else
			{ 
        		$existSql = "SELECT * FROM `thebloodgroup` WHERE BloodGroup = '$bloodgrup'";
				$result = mysqli_query($conn, $existSql);
				$numExistRows = mysqli_num_rows($result);
				if($numExistRows > 0)
				{
					$showError = "Your entry already exist!";
				}
				else
				{
					$sql ="INSERT INTO `thebloodgroup` (`BloodGroup`, `PostingDate`) VALUES ('$bloodgrup', current_timestamp());";
					$result = mysqli_query($conn, $sql);
					$showAlert = true;

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
				  		<strong>Succes!</strong> Your entry has been submitted successfully!  
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
             
 
				<form action="add-blood-group.php" method="post">
  					<div class="row mb-3">
    					<label for="inputblood" class="col-sm-2 col-form-label"><h6>Blood Group</h6></label>
    					<div class="col-sm-10">
      						<input type="text" class="form-control" id="inputblood" name="inputblood" required>
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

  