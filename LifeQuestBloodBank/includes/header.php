<?php
session_start();
// error_reporting(0);
if(isset($_SESSION['lbba'])){
    $login = true;
}
else{
    $login = false;
}
?>
<!-- header -->
    <header>
        <!-- top-bar -->
            <div class="top-bar py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 top-social-agile">
                            <div class="row">
                                <!-- social-icons -->
                                <ul class="col-lg-4 col-6 top-right-info text-center">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="mx-3">
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="ml-3">
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="ml-3">
                                        <a href="#">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- //social-icons -->
                                <?php
                                $sql = "SELECT * from thecontactusinfo";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-6 header-top_w3layouts pl-5 text-lg-left text-center">
                                    <p class="text-white">
                                        <i class="fas fa-map-marker-alt mr-2"></i><?php echo $row['Address'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 top-social-agile text-lg-right text-center">
                            <div class="row">
                                <div class="col-lg-7 col-6 top-w3layouts">
                                    <p class="text-white">
                                        <i class="far fa-envelope-open mr-2"></i>
                                        <a href="mailto:lifeQuest@people.com" class="text-white"><?php echo $row['Email'] ?></a>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-6 header-w3layouts pl-4 text-lg-left">
                                    <p class="text-white">
                                        <i class="fas fa-phone mr-2"></i>+<?php echo $row['ContactNumber'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- //top-bar -->
    </header>
<!-- //header  -->

<!-- header 2 -->
    <div id="home">
        <!-- navigation -->
            <div class="main-top py-1">
                <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
                    <div class="container">
                        <!-- logo -->
                        <h1>
                            <a class="navbar-brand font-weight-bold font-italic" href="index.php">
                                <span>Life</span>Quest
                                <i class="fas fa-syringe"></i>
                            </a>
                        </h1>
                        <!-- //logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            arial-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-lg-auto">
                                <li class="nav-item active mt-lg-0 mt-3">
                                    <a href="index.php" class="nav-link">HOME</a>
                                </li>
                                <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                    <a class="nav-link" href="about.php">About Us</a>
                                </li>
                                <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                    <a class="nav-link" href="contact.php">Contact Us</a>
                                </li>
                                <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                    <a class="nav-link" href="donor-list.php">Donor List</a>
                                </li>
                                <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                    <a class="nav-link" href="search-donor.php">Search Donor</a>
                                </li>

                                <?php if($login){ ?>
                                </li>
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        My Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="change-password.php">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="request-received.php">Request Received</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </li>
                                <?php } ?>
                                
                                <?php if(!$login){ ?>
                                <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                    <a class="nav-link" href="admin/index.php">Admin</a>
                                </li>
                            </ul>
                            <!-- login -->
                            <a href="login.php" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            <?php } ?>
                            <!-- //login -->
                        </div>
                    </div>
                </nav>
            </div>
        <!-- //navigation -->
    </div>
<!-- //header 2 -->