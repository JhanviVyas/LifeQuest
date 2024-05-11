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
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$donorname = $_POST['donorname'];
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
				<h2 class="pt-3">Request Received By Donor</h2>
            	<hr>

				<form action="request-received-donor.php" method="post">
  					<div class="row mb-3">
    					<label for="inputblood" class="col-sm-3 col-form-label"><h6>Search By Donor Name / Number</h6></label>
    					<div class="col-sm-8">
      						<input type="text" class="form-control" id="inputblood" name="donorname" required>
    					</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary " name="ser">Search</button>
					</div>
   				</form>
				<br/>
				   <div class="table-responsive">
				 	<table class="table table-bordered table-hover table-striped">
					<caption class="pb-2" style="caption-side:top;">Blood Info</caption>
  					<thead>
    					<tr>
      						<th scope="col">S.No.</th>
      						<th scope="col">Name of Donor</th>
      						<th scope="col">Contact No. of Donor</th>
      						<th scope="col">Name of Requirer</th>
							<th scope="col">Mobile No. of Requirer</th>
							<th scope="col">Email ID of Requirer </th>
							<th scope="col">Blood Require For</th> 
							<th scope="col">Message of Requirer</th>
							<th scope="col">Apply Date</th>
    					</tr>
  					</thead>
  					<tbody>

						<?php
							
						if(isset($_POST['ser']))
						{
							$searchdata = $_POST['donorname'];
							$sql = "SELECT 
							thebloodrequirer.BloodDonarID,   thebloodrequirer.Name,   thebloodrequirer.Email,   thebloodrequirer.ContactNumber,     thebloodrequirer.BloodRequireFor,   thebloodrequirer.Message,   thebloodrequirer.ApplyDate, 
							theblooddonors.ContactNumber   AS   doncontact ,    theblooddonors.FullName
							FROM       thebloodrequirer 
							JOIN       theblooddonors     ON     theblooddonors.ID = thebloodrequirer.BloodDonarID 
							WHERE       theblooddonors.FullName LIKE '%$searchdata%' || theblooddonors.ContactNumber LIKE '%$searchdata%' ";

         					$result = mysqli_query($conn, $sql);
						 	$count = 1;
							 
							$row = mysqli_num_rows($result);
							if($row>0)
							{
								 
								while($row = mysqli_fetch_assoc($result))
						 		{	
						 		$dname = $row['FullName'];
								$dmobile = $row['doncontact'];
								$rname = $row['Name'];
								$rcontact = $row['ContactNumber'];
								$remail = $row['Email'];
								$rbloodgroup = $row['BloodRequireFor'];
						 	 	$rmsg = $row['Message'];
								$pdate = $row['ApplyDate'];
								?>
								
         					
    					 		<tr>
									<th><?php echo $count; ?></th>
						 			<td><?php echo $dname; ?></td>
      					 			<td><?php echo $dmobile; ?></td>
						 			<td><?php echo $rname; ?></td>
      					 			<td><?php echo $rcontact; ?></td>
      					 			<td><?php echo $remail; ?></td>
									<td><?php echo $rbloodgroup; ?></td>
      					 			<td><?php echo $rmsg; ?></td>
      					 			<td><?php echo $pdate; ?></td>
      					  		  
									 
								</tr>
						 		<?php $count++; 
						 		} 
							} 
							
							else 
							{
						  
						  		echo "<script>alert('No Record Found');</script>";
							}
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