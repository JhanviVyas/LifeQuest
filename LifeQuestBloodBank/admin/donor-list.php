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
		
		if(isset($_GET['del']))
		{ 
				 
			$id = $_GET['del'];
			$sql = "DELETE FROM `theblooddonors` WHERE ID = '$id'";
			$result = mysqli_query($conn , $sql);
			 
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
				<h2 class="pt-3">Donors List</h2>
            	<hr>
				<div class="table-responsive">
				 	<table class="table table-bordered table-hover table-striped">
					
  					<thead>
    					<tr>
      						<th scope="col">#</th>
      						<th scope="col">Name</th>
      						<th scope="col">Mobile No.</th>
      						<th scope="col">EmailID</th>
							<th scope="col">Age</th>
							<th scope="col">Gender</th>
							<th scope="col">Blood Group</th>
							<th scope="col">Address</th>
							<th scope="col">Message</th>
							<th scope="col">Action</th>
    					</tr>
  					</thead>
  					<tbody>

						<?php
					  		$sql = "SELECT * FROM `theblooddonors`"; 
         					$result = mysqli_query($conn, $sql);
							$count = 1;
         					while($row = mysqli_fetch_assoc($result))
							{

							
								$fname = $row['FullName'];
								$mobile = $row['ContactNumber'];
								$email = $row['Email'];
								
								$gender = $row['Gender'];
								$age = $row['Age'];
								$bloodgroup = $row['BloodGroup'];
								$address = $row['Address'];
								$msg = $row['Message'];
          						?>
         					
    							<tr>
      					  
									<th><?php echo $count;?></th>
      					 			<td><?php echo $fname;?></td>
						 			<td><?php echo $mobile;?></td>
      					 			<td><?php echo $email;?></td>
      					 			<td><?php echo $age;?></td>
									<td><?php echo $gender;?></td>
      					 			<td><?php echo $bloodgroup;?></td>
      					 			<td><?php echo $address;?></td>
						 			<td><?php echo $msg;?></td>
      						
      					 		
									<td>   
							   			<button  class="btn btn-primary">
										   <a style="color:white; text-decoration:none;" href="donor-list.php?del=<?php echo  $row['ID']; ?>" onclick="return del()">Delete</a>
							   			</button>
							   		</td>
								</tr>
								<?php
						 			$count++;
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