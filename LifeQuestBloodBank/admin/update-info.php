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
		require 'includes/config.php';
    	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
        	$add = $_POST['add'];
			$contact = $_POST['contact'];
			$email = $_POST['email'];
         
     		
      		if (!$conn)
			{
          		die("Sorry we failed to connect: ". mysqli_connect_error());
      		}
      		else
			{ 
        		 
					$sql ="UPDATE `thecontactusinfo` SET Address='$add', ContactNumber='$contact'
							WHERE Email = '$email' ";
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
  	<title>LifeQuest Alliance | Dashboard</title>
  

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
				<h2 class="pt-3">Update Contact Info</h2>
            	<hr>
				<?php 
					if($showAlert)
					{
			  		 	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  	 	<strong>Succes!</strong>Information Updated successfully!  
				  	  
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

						$sql2 = "SELECT * FROM thecontactusinfo ";
						$result2 = mysqli_query($conn , $sql2);

						while($row = mysqli_fetch_assoc($result2))
						{

								
							$mobile = $row['ContactNumber'];
							$email = $row['Email'];
							$address = $row['Address'];
							 

						}

						?>
             
 
			 <form action="update-info.php" method="post">
  				<div class="row mb-3">
    				<label for="inputEmail3" class="col-sm-2 col-form-label"><h6>Email</h6></label>
    					<div class="col-sm-10">
     						<input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $email; ?>" readonly>
    					</div>
  				</div>
  				<div class="row mb-3">
    				<label for="inputPassword3" class="col-sm-2 col-form-label"><h6>Contact Number</h6></label>
    				<div class="col-sm-10">
      					<input type="text" class="form-control" id="inputPassword3" name="contact" value="<?php echo $mobile; ?>" required>
    				</div>
  				</div>
				<div class="row mb-3">
  					<label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"><h6>Address</h6></label>
					  <div class="col-sm-10">
      					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="add" value="Address" required><?php echo $address; ?></textarea>
    				</div>
  					
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
  				
			</form>

			</div>
		</div>
	</div>


	
	
 
</body>
</html>








 