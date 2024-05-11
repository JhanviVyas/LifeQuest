<?php
error_reporting(0);
session_start();
include('includes/config.php');

if(!isset($_SESSION['lbba'])){
    header("location: logout.php");
}
else{
    if(isset($_POST['change'])){
        $uid = $_SESSION['lbba'];
        $currentpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];

        $sql = "SELECT ID from theblooddonors WHERE ID = '$uid' AND Password = '$currentpassword' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $sql = "UPDATE `theblooddonors` SET `Password` = '$newpassword' WHERE `ID` = '$uid' ";
            $result = mysqli_query($conn, $sql);
            echo '<script>alert("Your password has been successully changed")</script>';
        }
        else{
            echo '<script>alert("Your current password is wrong")</script>';
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
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- change password -->
        <section class="appointment py-5">
            <div class="py-xl-5 py-lg-3">
                <div class="w3ls-titles text-center mb-5">
                    <h3 class="title">Change Password</h3>
                    <span>
                        <i class="fas fa-user-md"></i>
                    </span>
                </div>
                <div class="d-flex">
                    <div class="col-lg-5 appoint-img" style="background-size: cover; min-height: 553px;">
                    </div>
                    <div class="col-lg-7 contact-right-w3l appoint-form">
                        <h5 class="title-w3 text-center mb-5">Reset your Password</h5>
                        <form action="#" method="post" onsubmit="return checkpass();" name="changepassword">
                           <div class="form-group">
                                <label for="currentpassword" class="col-form-label">Current Password</label>
                                <input type="password" class="form-control" name="currentpassword" id="currentpassword" required>
                           </div>
                           <div class="form-group">
                                <label for="newpassword" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                           </div>
                           <div class="form-group">
                                <label for="confirmpassword" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                           </div>
                           <input type="submit" value="Update" name="change" class="btn_apt">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- //change password -->
        
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
<?php } ?>