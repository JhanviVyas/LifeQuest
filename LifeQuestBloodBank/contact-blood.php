<?php
error_reporting(0);
session_start();
include('includes/config.php');

if(isset($_POST['send'])){
    $cid = $_GET['cid'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $contactno = $_POST['contactno'];
    $brf = $_POST['brf'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `thebloodrequirer` (`BloodDonarID`, `Name`, `Email`, `ContactNumber`, `BloodRequireFor`, `Message`, `ApplyDate`) VALUES ('$cid', '$name', '$email', '$contactno', '$brf', '$message', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script>alert("Request has been sent. We will contact you shortly.")</script>';
    }
    else{
        echo "<script>alert('Something went wrong. Please try again.');</script>";
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
                    <li class="breadcrumb-item active" aria-current="page">Blood Needed Person</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- contact blood -->
        <section class="agileits-contact py-5">
            <div class="py-xl-5 py-lg-3">
                <div class="w3ls-titles text-center mb-5">
                    <h3 class="title">Contact For Blood</h3>
                    <span>
                        <i class="fas fa-user-md"></i>
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-lg-5 w3_agileits-contact-left">
                    </div>
                    <div class="col-lg-7 contact-right-w3l">
                        <h5 class="title-w3 text-center mb-5">Fill the below mentioned form</h5>
                        <form action="#" method="post">
                            <div class="d-flex space-d-flex">
                                <div class="form-group grid-inputs">
                                    <label for="recipient-name" class="col-form-label">Your Name</label>
                                    <input type="text" name="fullname" id="name" class="form-control" placeholder="Please enter your name...">
                                </div>
                                <div class="form-group grid-inputs">
                                    <label for="recipient-name" class="col-form-label">Phone Number</label>
                                    <input type="text" name="contactno" id="phone" class="form-control" placeholder="Please enter your phone number...">
                                </div>
                            </div>

                            <div class="d-flex space-d-flex">
                                <div class="form-group grid-inputs">
                                    <label for="recipient-name" class="col-form-label">Email Address</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Please enter your email address..." required>
                                </div>
                                <div class="form-group grid-inputs">
                                    <label for="recipient-name" class="col-form-label">Blood Require For</label>
                                    <select  class="form-control" id="phone" name="brf">
                                        <option value="">Select Option</option>
                                        <option value="Father">Father</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea rows="10" cols="100" name="message" id="message" class="form-control" placeholder="Please enter your message..." maxlength="999" style="resize:none;"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" name="send">
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //contact blood -->
        
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