<?php
// error_reporting(0);
// session_start();
include('includes/config.php');

if(isset($_POST['reset'])){
    $email = $_POST['email'];
    $mobile = $_POST['mobileno'];
    $newpassword = $_POST['newpassword'];


    $sql = "SELECT * FROM theblooddonors WHERE Email = '$email' AND ContactNumber = '$mobile' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $sql = "UPDATE theblooddonors SET Password = '$newpassword' WHERE Email='$email' AND ContactNumber='$mobile' ";
        $result = mysqli_query($conn, $sql);

        echo '<script>alert("Your password has been successully changed")</script>';
        // header("location: login.php");
    }
    else{
        echo "<script>alert('Invalid Email ID or Mobile Number');</script>";
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

        <script type="text/javascript">
        function checkpass()
        {
            if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
            {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }   

        </script>
        
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
                    <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- login -->
        <section class="about py-5">
            <div class="container py-xl-5 py-lg-3">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Reset Password</h5>
                    <form action="#" method="post" onsubmit="return checkpass();" name="changepassword">
                        <div class="form-group">
                            <label class="mb-2">Email Id</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" maxlength="10" pattern="[0-9]+">
                        </div>
                        <div class="form-group">
                            <label for="newpassword" class="col-form-label">New Password</label>
                            <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                        </div>

                        <button type="submit" class="btn btn-primary submit mb-4" name="reset">Reset</button>

                        <p class="account-w3ls text-center pb-4" style="color: black">
                            Already Know Your Password?
                            <a href="login.php">Sign In</a>
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