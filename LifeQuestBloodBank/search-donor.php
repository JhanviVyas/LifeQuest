<?php
include("includes/config.php");
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
                    <li class="breadcrumb-item active" aria-current="page">Search Blood Donar</li>
                </ol>
            </div>
        </div>
        <!-- //page details -->
        
        <!-- search donor -->
        <div class="agileits-contact py-3">
            <div class="container py-xl-5 py-lg-3">
                <form name="donar" method="post" style="padding-left: 30px;">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div class="font-italic">Blood Group<span style="color: red;">*
                            </div>
                            <div>
                                <select name="bloodgroup" class="form-control" required>
                                    <option value="">Select..</option>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div><input type="submit" value="Submit" class="btn btn-primary" name="sub" style="cursor:pointer"></div>
                        </div>
                    </div>
                </form>


                <div class="agileits-contact py-5">
                    <div class="py-xl-5 py-lg-3">
                        <?php
                            if(isset($_POST['sub'])){
                                $status = 1;
                                $bloodgroup = $_POST['bloodgroup'];

                                $sql = "SELECT * from theblooddonors where status = '$status' AND BloodGroup = '$bloodgroup' ";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if($num>0)
                                {
                                    echo '<script>alert("Record Found")</script>';
                        ?>
                        <div class="w3ls-titles text-center mb-5">
                            <h3 class="title">Blood Donor List</h3>
                            <span>
                                <i class="fas fa-user-md"></i>
                            </span>
                        </div>
                        <div class="row package-grids mt-5">

                        <?php 
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>

                            <div class="col-md-6 pricing" style="margin-top:2%;">
                                <div class="price-top">
                                    <img src="images/blood-donor.jpg" alt="" class="img-fluid">
                                    <h3><?php echo $row['FullName'] ?></h3>
                                </div>
                                <div class="price-bottom p-2">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $row['Gender'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Blood Group</td>
                                                <td><?php echo $row['BloodGroup'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td><?php echo $row['ContactNumber'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['Email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Age</td>
                                                <td><?php echo $row['Age'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $row['Address'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Message</td>
                                                <td><?php echo $row['Message'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-primary" style="color: white;" href="contact-blood.php?cid=<?php echo $row['ID'] ?>">Request</a>
                                </div>
                            </div>
                            <?php }} else{
                                echo '<script>alert("No Record Found")</script>'; } }
                            ?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- //search donor -->
        
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