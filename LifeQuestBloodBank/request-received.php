<?php
error_reporting(0);
session_start();
include('includes/config.php');

if(!isset($_SESSION['lbba'])){
    header("location: logout.php");
}
else{
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
                    <li class="breadcrumb-item active" aria-current="page">Request Received</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- about -->
        <section class="about py-5">
            <div class="container py-xl-5 py-lg-3">
                <div class="w3ls-titles text-center mb-5">
                    <h3 class="title">Request Received</h3>
                    <span>
                        <i class="fas fa-user-md"></i>
                    </span>
                </div>
                <div class="d-flex">
                    <div class="contact-right-w3l appoint-form" style="width:100%; !important;">
                        <h5 class="title-w3 text-center mb-5">Details of Blood Requirer</h5>
                        <table border="1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Blood Require for</th>
                                    <th>Message</th>
                                    <th>Apply Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $uid = $_SESSION['lbba'];
                                $sql = "SELECT thebloodrequirer.BloodDonarID, thebloodrequirer.Name, thebloodrequirer.Email, thebloodrequirer.ContactNumber, thebloodrequirer.BloodRequireFor, thebloodrequirer.Message, thebloodrequirer.ApplyDate, theblooddonors.ID as donid from thebloodrequirer join theblooddonors on theblooddonors.ID = thebloodrequirer.BloodDonarID where thebloodrequirer.BloodDonarID = '$uid' ";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if($num>0){
                                    $cnt = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $cnt ?></td>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['ContactNumber'] ?></td>
                                    <td><?php echo $row['Email'] ?></td>
                                    <td><?php echo $row['BloodRequireFor'] ?></td>
                                    <td><?php echo $row['Message'] ?></td>
                                    <td><?php echo $row['ApplyDate'] ?></td>
                                </tr>
                                <?php $cnt = $cnt+1; }} else{ ?>
                                <tr>
                                    <th colspan = "8" style="color:red;">No Record Found</th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
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
<?php } ?>