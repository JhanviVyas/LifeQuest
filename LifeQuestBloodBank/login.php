<?php
error_reporting(0);
session_start();
include('includes/config.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT ID FROM theblooddonors WHERE Email = '$email' AND Password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        // session_start();
        $login = $row['ID'];
        $_SESSION['lbba'] = $login;
        $_SESSION['login'] = $_POST['FullName'];

        // echo $_SESSION['lbba'];
        // echo $_SESSION['login'];

        // echo "You are logged in";
        header("location: index.php");
    }
    else{
        echo "<script>alert('Invalid Credentials');</script>";
    }

}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LifeQuest Alliance</title>

        <!-- Custom files -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Bootstrap-Core-CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Style-CSS -->
        <link rel="stylesheet" href="css/fontawesome-all.css">
	    <!-- Font-Awesome-Icons-CSS -->
        <!-- //Custom files -->

        
        <!-- Web-Fonts -->
	    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	    <!-- //Web-Fonts -->
    
    </head>
    <body>
        <!-- header -->
        <?php include('includes/header.php');?>
        <!-- //header -->

        <!-- banner 2 -->
        <div class="inner-banner-w3ls">
            <div class="container">

            </div>
        </div>
        <!-- //banner 2 -->

        <!-- page details -->
        <div class="breadcrumb-agile">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- login -->
        <section class="about py-5">
            <div class="container py-xl-5 py-lg-3">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Login Here</h5>
                    <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                        <div class="form-group">
                            <label class="mb-2">Email Id</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Id..." required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password..." required>
                        </div>

                        <button type="submit" class="btn btn-primary submit mb-4" name="login">Login</button>

                        <p class="account-w3ls text-center pb-4" style="color: black">
                            Forgot Password?
                            <a href="forgot-password.php">Click here</a>
                        </p>

                        <p class="account-w3ls text-center pb-4" style="color: black">
                            Don't have an account?
                            <a href="sign-up.php">Create a New One</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
        <!-- //login -->
        
        <!-- footer -->
        <?php include('includes/footer.php'); ?>
        <!-- //footer -->



        <!-- Js Files -->

        <!-- JavaScript -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <!-- Default-JavaScript-File -->

        <!-- bammer slider -->
        <script src="js/responsiveslides.min.js"></script>
        <script>

        </script>
        <!-- //banner slider -->

        <!-- fixed navigation -->
	    <script src="js/fixed-nav.js"></script>
	    <!-- smooth scrolling -->
	    <script src="js/SmoothScroll.min.js"></script>
        <!-- move-top -->
	    <script src="js/move-top.js"></script>
	    <!-- easing -->
	    <script src="js/easing.js"></script>
	    <!--  necessary snippets for few javascript files -->
	    <script src="js/medic.js"></script>


        <script src="js/bootstrap.js"></script>
	    <!-- Necessary-JavaScript-File-For-Bootstrap -->

	    <!-- //Js files -->
    </body>
</html>