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

		$showError=false;
		$showAlert=false;
		
    	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
        	
			$newdetails = $_POST['pagedetail'];
			$name = $_POST['page'];
			 
     	 
      		if (!$conn)
			{
          		die("Sorry we failed to connect: ". mysqli_connect_error());
      		}
      		else
			{   
				$existSql = "SELECT * FROM `thepages`  WHERE PageName = '$name'";
				$result2 = mysqli_query($conn, $existSql);
				$num = mysqli_num_rows($result2);
				if($num == 1)
				{
					$sql = "UPDATE `thepages` 
							SET Detail = '$newdetails' 
							WHERE PageName = '$name'";
					$result = mysqli_query($conn, $sql);
			 
					if($result)
					{
						$showAlert = true;
					}
					else
					{
					 
						$showError = "Not updated successfully";
					}
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
				<h2 class="pt-3">Manage Pages</h2>
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

			 
				<form action = "manage-pages.php" method = "post">
					 	
					<?php

						$sql2 = "SELECT * FROM thepages";
						$result2 = mysqli_query($conn , $sql2);

						while($row = mysqli_fetch_assoc($result2))
						{
							$pgname =  $row['PageName'];
							$detail = $row['Detail'];
							$type = $row['Type'];
						}
					?>
    	 
					<div class="row mb-3">
    					<label for="page" class="col-sm-2 col-form-label"><h6>Page Name</h6></label>
							<div class="col-sm-10">
      							<input type="text" class="form-control" id="un" name="page" value="<?php echo $pgname;?>" readonly>
    						</div>
					</div>
					<div class="row mb-3">
    					<label for="pagedetail" class="col-sm-2 col-form-label"><h6>Page Name</h6></label>
						<div class="col-sm-10">
							<textarea class="form-control"  id="Textarea" style="height: 100px" name="pagedetail"><?php echo $detail; ?></textarea>
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