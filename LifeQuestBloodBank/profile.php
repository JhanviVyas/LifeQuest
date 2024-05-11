<?php
error_reporting(0);
session_start();
include('includes/config.php');

if(!isset($_SESSION['lbba'])){
    header("location: logout.php");
}
else{
    if(isset($_POST['update'])){
        $uid = $_SESSION['lbba'];
        $name = $_POST['fullname'];
        $mob = $_POST['mobileno']; 
        $emailid = $_POST['emailid'];
        $age = $_POST['age']; 
        $gender = $_POST['gender'];
        $bloodgroup = $_POST['bloodgroup']; 
        $address = $_POST['address'];
        $message = $_POST['message'];

        $sql = "UPDATE theblooddonors set FullName = '$name', ContactNumber = '$mob', Age = '$age', Gender = '$gender', BloodGroup = '$bloodgroup', Address = '$address', Message = '$message' where ID = '$uid' ";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script>alert("Profile has been updated")</script>';
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
                        <li class="breadcrumb-item active" aria-current="page">Donor Profile</li>
                    </ol>
                </div>
            </div>
            <!-- //page details -->
            
            <!-- profile details -->
            <section class="appointment py-5">
                <div class="py-xl-5 py-lg-3">
                    <div class="w3ls-titles text-center mb-5">
                        <h3 class="title">Donor Profile</h3>
                        <span>
                            <i class="fas fa-user-md"></i>
                        </span>
                    </div>
                    <div class="d-flex">
                        <div class="col-lg-5 appoint-img">
                            </div>
                            <div class="col-lg-7 contact-right-w3l appoint-form">
                                <h5 class="title-w3 text-center mb-5">Details of your Profile</h5>
                                <form action="#" method="post">
                                <?php
                                $uid = $_SESSION['lbba'];
                                $sql = "SELECT * from theblooddonors where ID = '$uid' ";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Full Name</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $row['FullName'] ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="recipient-phone" class="col-form-label">Mobile Number</label>
                                            <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" maxlength="10" pattern="[0-9]+" value="<?php echo $row['ContactNumber'] ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="recipient-email" class="col-form-label">Email ID <span style="color:red; font-size:10px;">(Can't be changed)</span></label>
                                            <input type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row['Email'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-age" class="col-form-label">Age</label>
                                            <input type="text" class="form-control" name="age" id="age" value="<?php echo $row['Age'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-gender" class="col-form-label">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="<?php echo $row['Gender'] ?>"><?php echo $row['Gender'] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-bloodgroup" class="col-form-label">Blood Group</label>
                                            <select name="bloodgroup" class="form-control" required>
                                                <option value="<?php echo $row['BloodGroup'] ?>"><?php echo $row['BloodGroup'] ?></option>
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
                                            <label for="recipient-address" class="col-form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" required="true" value="<?php echo $row['Address'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="datepicker" class="col-form-label">Message</label>
                                            <textarea class="form-control" name="message" required><?php echo $row['Message'] ?></textarea>
                                        </div>
                            
                            <input type="submit" value="Update" name="update" class="btn_apt">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <!-- //profile details -->
        
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