<?php
// session_start();
include("includes/config.php");

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['emailid'];
    $password = $_POST['password'];
    $mobile = $_POST['mobileno'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bloodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    $status = 1;
    $sql = "SELECT ID FROM theblooddonors WHERE Email = '$email' AND Password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    if($num == 0){
        $sql = "INSERT INTO `theblooddonors` (`FullName`, `ContactNumber`, `Email`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `status`, `Password`) VALUES ('$fullname', '$mobile', '$email', '$gender', '$age', '$bloodgroup', '$address', '$message', '$status', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('You have signup Successfully. You can login Now.');</script>";
            // header("location: login.php");
        }
        else{
            echo "<script>alert('Oops! Something went wrong.Please try again');</script>";
        }
    }
    else{
        echo "<script>alert('Email Id already exist. Please try another');</script>";
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
                    <li class="breadcrumb-item active" aria-current="page">SignUp</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- about -->
        <section class="about py-5">
            <div class="container py-xl-5 py-lg-3">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Register Now</h5>
                    <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name...">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Email Id</label>
                            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email Id...">
                        </div>
                        <div class="form-group">
                            <label>Create Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password...">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="10 digits Mobile Number..." maxlength="10" pattern="[0-9]+">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Age</label>
                            <input type="text" class="form-control" name="age" id="age" placeholder="Your Age..." required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="mb-2">Blood Group</label>
                            <select name="bloodgroup" class="form-control" required>
                                <option value="">Select</option>
                                <option value="O-">O-</option>
                                <option value="O+">O+</option> 
                                <option value="A-">A-</option> 
                                <option value="A+">A+</option>  
                                <option value="B-">B-</option>
                                <option value="B+">B+</option>
                                <option value="AB-">AB-</option>
                                <option value="AB+">AB+</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter your Address here..." required="true">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="message"> </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>

                        <p class="account-w3ls text-center pb-4" style="color: black">
                            Already Registered?
                            <a href="login.php">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
        <!-- //about -->
        
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