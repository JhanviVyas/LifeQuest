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
			$sql = "DELETE FROM `thecontactusquery` WHERE ID = '$id'";
			$result = mysqli_query($conn , $sql);
			 
		}  

		if(isset($_GET['read']))
		{ 
				 
			$id = $_GET['read'];
			$sql = "UPDATE  `thecontactusquery` SET status ='1' WHERE ID = '$id'";
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
	
		<div class="row" >
			<?php include('includes/leftbar.php');?>
			
			<div class="col" style="margin-top:62px;">
				<h2 class="pt-3">Manage Contact Us Queries</h2>
            	<hr>
				<div class="table-responsive">
				 	<table class="table table-bordered table-hover table-striped">
					
  					<thead>
    					<tr>
      						<th scope="col">#</th>
      						<th scope="col">Name</th>
      						<th scope="col">Mobile No.</th>
      						<th scope="col">Email ID</th>
							<th scope="col">Message</th>
							<th scope="col">Posting Date</th>
							<th scope="col">Status</th>
    					</tr>
  					</thead>
  					<tbody>

						<?php
					  		$sql = "SELECT * FROM `thecontactusquery`"; 
         					$result = mysqli_query($conn, $sql);
							$count = 1;
         					while($row = mysqli_fetch_assoc($result))
							{

								$id = $row['ID'];
								$fname = $row['Name'];
								$mobile = $row['ContactNumber'];
								$email = $row['Email'];
								$msg = $row['Message'];
								$postingdate = $row['PostingDate'];
								$status = $row['status'];
							
          						 
         					
    							 echo '<tr>
      					  
									<th> '.$count.'</th>
      					 			<td> '.$fname .'</td>
						 			<td>'.$mobile .'</td>
      					 			<td>'. $email.'</td>
      					 			<td>'. $postingdate .'</td>
									<td>'. $msg .'</td>';
      								
									

									if($status == 1)
									{ 
										echo '<td>Read
												<br><br>
											<button  class="btn btn-danger">';?>
									
												<a style="color:white; text-decoration:none;" href="manage-query.php?del=<?php echo  $row['ID']; ?>" onclick="return del()">
													Delete
												</a>
											</button>
										</td>
											<?php
									}
									else
									{
										echo '<td><button  class="btn btn-info">'; ?>
											<a style="color:white; text-decoration:none;" href="manage-query.php?read=<?php echo  $row['ID']; ?>" onclick="return read();">
												Pending
											</a>
												</button>
												<br><br>
									
									
										<button  class="btn btn-danger">
											<a style="color:white; text-decoration:none;" href="manage-query.php?del=<?php echo  $row['ID']; ?>" onclick="return del();">
												Delete
											</a>
										</button>
										</td>
										<?php	
									}

									echo '</tr>';
									
						 		
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

		function read()
		{
			return confirm('Do you really want to read?');
		}
	  </script>

	
	
 
</body>
</html>