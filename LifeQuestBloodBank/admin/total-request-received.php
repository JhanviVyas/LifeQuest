<?php
    session_start();
	$donorname = '';
	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
	{
  		header("location: index.php");
  		exit;
	}
	else
	{
        require 'includes/config.php';
		 
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
				<h2 class="pt-3">Total Blood Request Received</h2>
            	<hr>

				 
				 
				   <div class="table-responsive">
				 	<table class="table table-bordered table-hover table-striped">
					<caption class="pb-2" style="caption-side:top;">Blood Info</caption>
  					<thead>
    					<tr>
      						<th scope="col">#</th>
      						<th scope="col">Name</th>
      						<th scope="col">Email ID</th>
      						<th scope="col">Contact Number</th>
							 
							<th scope="col">Blood Require For</th> 
							<th scope="col">Message of Requirer</th>
							<th scope="col">Apply Date</th>
    					</tr>
  					</thead>
  					<tbody>

						<?php
							
					  	 	$sql = "SELECT * FROM thebloodrequirer";

         					$result = mysqli_query($conn, $sql);
						 	$count = 1;
							 
							 
								while($row = mysqli_fetch_assoc($result))
						 		{	
						 			$name = $row['Name'];
									$contact = $row['ContactNumber'];
									$email = $row['Email'];
									$rbloodgroup = $row['BloodRequireFor'];
						 	 		$rmsg = $row['Message'];
									$pdate = $row['ApplyDate'];
									?>
								
         					
    					 			<tr>
										<th><?php echo $count; ?></th>
						 				<td><?php echo $name; ?></td>
      					 			 
      					 			
      					 				<td><?php echo $email; ?></td>
                                       	<td><?php echo $contact; ?></td>
										<td><?php echo $rbloodgroup; ?></td>
      					 				<td><?php echo $rmsg; ?></td>
      					 				<td><?php echo $pdate; ?></td>
      					  		  
									 
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


	
	
 
</body>
</html>