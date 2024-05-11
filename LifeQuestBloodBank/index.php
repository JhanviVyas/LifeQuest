<?php
// session_start();
include('includes/config.php');
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

        <style>
            .banner-top1{
                background:url('images/3.jpg') no-repeat 0px 0px; 
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -moz-background-size: cover;
            }
            .banner-top2 {
                background: url('images/blog2.jpg') no-repeat 0px 0px;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -moz-background-size: cover;
}
        </style>

        
        <!-- Web-Fonts -->
	    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	    <!-- //Web-Fonts -->
    
    </head>
    <body>
        <!-- header -->
        <?php include('includes/header.php');?>
        <!-- //header -->

        <!-- banner -->
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides callbacks callbacks1" id="slider4">
                    <li>
                        <div class="banner-top1" style="">
                            <div class="banner-info_agile_w3ls">
                                <div class="container">
                                    <h3><br>The blood is <span>red gold</span> to save a life</h3>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner-top2">
                            <div class="banner-info_agile_w3ls">
                                <div class="container">
                                    <h3><br><br>The only gift that saves lives
                                        <span>Blood Donation</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //banner -->

        <div class="clearfix"></div>

        <!-- banner bottom -->
        <div class="banner-bottom py-5">
            <div class="container d-flex py-xl-3 py-lg-3">
                <div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1">
                    <h3 class="text-white my-3">High Professional Doctors</h3>
                    <p>All specialists have extensive practical experience and regularly training courses in educational centers of the
					world</p>
                </div>
                <div class="button">
                    <a href="about.php" class="w3ls-button-agile">Read More
                        <i class="fas fa-hand-point-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- //banner bottom -->

        <!-- blog -->
        <div class="blog-w3ls py-5" id="blog">
            <div class="container py-xl-5 py-lg-3">
                <div class="w3ls-titles text-center mb-5">
                    <h3 class="title text-white">Some of the Donor</h3>
                    <span>
                        <i class="fas fa-user-md text-white"></i>
                    </span>
                </div>
                <div class="row package-grids mt-5">
                    <?php
                    $status = 1;
                    $sql = "SELECT * from theblooddonors where status = $status order by rand() limit 6";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);

                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-md-4 pricing" style="margin-top:2%;">
                        <div class="price-top">
                            <img src="images/blood-donor.jpg" alt="" class="img-fluid">
                            <h3><?php echo $row['FullName'] ?></h3>
                        </div>
                        <div class="price-bottom p-4">
                            <h4 class="text-dark mb-3">Gender: <?php echo $row['Gender'] ?></h4>
                            <p class="card-text"><b>Blood Group: </b><?php echo $row['BloodGroup'] ?></p>

                            <a href="contact-blood.php?cid=<?php echo $row['ID'] ?>" class="btn btn-primary" style="color: white;">Request</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- //blog -->

        <!-- treatments -->
        <div class="screen-w3ls py-5">
            <div class="container py-xl-5 py-lg-3">
                <div class="w3ls-titles text-center mb-5">
                    <h3 class="title">Blood Groups</h3>
                    <span>
                        <i class="fas fa-user-md"></i>
                    </span>
                    <p class="mt-2">Blood group of many people will mainly fall in any one of the following groups...</p>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li>O Negative or O Positive</li>
                            <li>A Negative or A Positive</li>
                            <li>B Negative or B Positive</li>
                            <li>AB Negative or AB Positive</li>
                        </ul>
                        <p class="mt-3"><b>A healthy diet helps ensure a successful blood donation, and also makes you feel better!</b></p>
                        
                        <div class="col-8 mt-3" style="padding-top: 30px;">
                            <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" href="sign-up.php">Become a Donar</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="images/donblood.jpg" alt="blood-donor" class="mx-3">
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-md-6">
                        <h3 style="padding-top: 30px;"><b>UNIVERSAL DONORS AND RECIPIENTS</b></h3>
                        <p class="mt-5">The most common blood type is O, followed by type A. Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
                    </div>
                    <div class="col-md-6" style="padding-top: 30px;">
                        <img src="images/universal_donor_recieptor.jpg" class="mx-5" alt="blood-donar-recieptor" height="80%">
                    </div>
                </div>
            </div>
        </div>
        <!-- //treatments -->

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