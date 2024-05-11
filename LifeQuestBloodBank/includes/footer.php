<footer>
    <div class="w3ls-footer-grids pt-sm-4 pt-3">
        <div class="container py-xl-5 py-lg-3">
            <div class="row">
                <div class="col-md-6 w3l-footer">
                    <h2 class="mb-sm-3 mb-2">
                        <a href="index.php" class="text-white font-italic font-weight-bold">
                            Life<span>Quest</span> Blood Bank Alliance
                            <i class="fas fa-syringe ml-2"></i>
                        </a>
                    </h2>
                    <p> Blood donation is a practice of donating healthy blood to people in need. People also tend to store blood in 
                        blood banks for future use. It is a sign of humanity which helps in uniting people of different religion, caste, 
                        and creed.</p>
                </div>
                <?php
                $sql = "SELECT * from thecontactusinfo";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col-md-3 w3l-footer my-md-0 my-4">
                    <h3 class="mb-sm-3 mb-2 ml-5 text-white">Address</h3>
                    <ul class="list-unstyled ml-5">
                        <li>
                            <i class="fas fa-location-arrow float-left"></i>
                            <p class="ml-4"><?php echo $row['Address'] ?></p>
                            <div class="clearfix"></div>
                        </li>
                        <li class="my-3">
                            <i class="fas fa-phone float-left"></i>
                            <p class="ml-4">+<?php echo $row['ContactNumber'] ?></p>
                            <div class="clearfix"></div>
                        </li>
                        <li>
                            <i class="far fa-envelope-open float-left"></i>
                            <a href="mailto:lifeQuest@people.com" class="ml-3"><?php echo $row['Email'] ?></a>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 w3l-footer">
                    <h3 class="mb-sm-3 mb-2 ml-5 text-white">Quick Links</h3>
                    <div class="nav-w3-l">
                        <ul class="list-unstyled ml-5">
                            <li>
                                <a href="index.php">HOME</a>
                            </li>
                            <li class="my-3">
                                <a href="about.php">About Us</a>
                            </li>
                            <li class="mt-2">
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-top mt-5 pt-lg-4 pt-3 pb-lg-0 pb-3 text-center">
                <p class="copy-right-grids mt-lg-1">&copy; LifeQuest Blood Bank Alliance</p>
            </div>
        </div>
    </div>
</footer>