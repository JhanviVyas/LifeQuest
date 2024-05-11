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
		if (!$conn)
		{
			die("Sorry we failed to connect: ". mysqli_connect_error());
		}
		else
		{ 
			 
			if(isset($_GET['del']))
			{ 
						 
				$id = $_GET['del'];
				$sql = "DELETE FROM `thebloodgroup` WHERE ID = '$id'";
				$result = mysqli_query($conn , $sql);
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
				<h2 class="pt-3">Manage Blood Groups</h2>
            	<hr>

				<?php 
					if($showAlert)
					{
			  			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  		<strong>Succes!</strong> Your entry has been deleted successfully!  
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

				<div class="table-responsive">
				 	<table class="table table-bordered table-hover table-striped">
					
  						<thead>
    						<tr>
      							<th scope="col">#</th>
      							<th scope="col">Blood Group</th>
      							<th scope="col">Creation Date</th>
      							<th scope="col">Action</th>
							</tr>
  						</thead>
  						<tbody>

							<?php
					  			$sql = "SELECT * FROM `thebloodgroup`"; 
         						$result = mysqli_query($conn, $sql);
								$count = 1;
         						while($row = mysqli_fetch_assoc($result))
								{
									$bloodgroup = $row['BloodGroup'];
									$creationdate = $row['PostingDate'];
							?>
								<tr>
									<th><?php echo $count; ?></th>
									<td><?php echo $bloodgroup; ?></td>
      					 			<td><?php echo $creationdate;?></td>
						   			<td>   
										<button class="btn btn-danger">
							   				<a style="color:white; text-decoration:none;" href="manage-blood-group.php?del=<?php echo $row['ID'];?>" onclick="return del()" >
												DELETE
											</a>
							   			</button>
							   		</td>
								</tr>
						 	<?php $count++;
						 		}
		 					?>
  						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>


	
	<script>
		function del()
		{
			return confirm('Do you really want to delete?');
		}
	</script>
 
</body>
</html>