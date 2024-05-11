 <?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require 'includes/config.php';
        $username = $_POST["username"];
        $password = $_POST["password"]; 
    
        $sql = "SELECT * FROM theadmin WHERE UserName ='$username' AND Password ='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1)
        {
         
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location:dashboard.php");
          
        }
        else
        {
            echo "<script>alert('Invalid Credentials');</script>";
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
    <title>LifeQuest Alliance | Admin Login</title>

	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <h1 class="text-center text-bold text-light mt-4x">LifeQuest Blood Bank Alliance</h1>

                        <div class="well row pt-2x pb-3x  mt-5 bk-alt" > 
                            <div class="col-md-8 col-md-offset-2">

                                <h4 class="text-center mt-2 mb-5 text-danger">SIGN IN TO YOUR ACCOUNT</h4>

                                <form action="#" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="username" placeholder="name@example.com">
                                        <label for="floatingInput">User Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    <div class="d-grid gap-3 mb-3">
                                        <button class="btn btn-primary" name="login" type="submit">SIGN IN</button>
                                    </div>
                                    <div class="text-center">
                                    <a href="forgot_password.php">Forgot your password?</a>
                                    </div>
                                </form>

                            </div>

                            <div class="text-center" style="padding-top: 30px;">
                                <div class="small bk-alt"><a href="../index.php" class="btn btn-primary">Back to Home</a></div>
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