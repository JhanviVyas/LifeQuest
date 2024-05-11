<?php
    $login = false;
    $showError = false;
	$showAlert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require 'includes/config.php';
        $email = $_POST["email"];
        $mobile = $_POST["mobile"]; 
		$npassword = $_POST["newpassword"];

		$sql = "SELECT * FROM theadmin   WHERE Email='$email' AND ContactNumber='$mobile'";
		$result = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($result);

		if($num == 1)
		{
			$sql = "UPDATE theadmin SET Password = '$npassword' WHERE Email='$email' AND ContactNumber='$mobile'";
			$result = mysqli_query($conn, $sql);
			
			echo '<script>alert("Your password has been successully changed")</script>';
		}
		else
		{
			echo "<script>alert('Invalid Email ID or Mobile Number');</script>";
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

	<title>LifeQuest | Forgot Password</title>

  
	 
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
	function valid()
	{
		if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
		{
			alert("New Password and Confirm Password Field do not match  !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
	}
	</script>

	 

	 

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 
</script>
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-3x mb-4">LifeQuest Blood Bank Alliance</h1>
						<div class="well row pt-2x pb-3x bk-alt">
                        	<h4 class="text-center mt-1 mb-5 text-danger">RESET PASSWORD</h4>
							<div class="col-md-8 col-md-offset-2">
								<form method="post" name="chngpwd" onsubmit="return valid();" action="forgot_password.php">

                                <div class="form-floating mb-3">
                               		<input type="email"  class="form-control" placeholder="Email Address" required="true" name="email" id="floating_email">
                                	<label for="floating_email">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
									<input type="text" class="form-control"  name="mobile" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                                	<label for="" class="text-uppercase text-sm">Mobile Number</label>
                                </div>
                                <div class="form-floating mb-3">
									<input class="form-control" type="password" name="newpassword" placeholder="New Password" required="true"/>
                                	<label for="" class="text-uppercase text-sm">New Password</label>
								</div>
								<div class="form-floating mb-3">
									<input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
                                	<label for="" class="text-uppercase text-sm">Confirm Password</label>
								</div>
								<div class="d-grid gap-3 mb-3">
									<button class="btn btn-primary btn-block" name="submit" type="submit">RESET</button>
								</div>
                                <div class="text-center">
                                    <a href="index.php">SignIn</a>
                                </div>

								</form>
								<div class="text-center" style="padding-top: 30px;">
                                    <div class="small"><a href="../index.php" class="btn btn-primary">Back to Home</a></div>
                                </div>
							 
					 
								 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>