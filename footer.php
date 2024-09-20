<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <link rel="icon" href="resources/logo.png" />



</head>

<body class="body">
    <div class="">
        <div class="row">
            <div class="col-12 mt-5 foooter">
                <!-- FOOTER -->
                <footer id="footer">
                    <!-- top footer -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-3 col-xs-6">
                                    <div class="footer">
                                        <h3 class="footer-title">About Us</h3>
                                        <p class="about">
                                            Welcome to Chanaka Electronics, where innovation meets convenience!
                                            We're your go-to destination for all things electronic with a passion for cutting-edge gadgets and a
                                            commitment to top-notch service, we're here to elevate your tech experience.
                                            Discover the future of electronics with us at Chanaka Electronics.
                                        </p>
                                        <ul class="footer-links">
                                            <li><a href="https://maps.app.goo.gl/1fM9BCFsGSyPkZDT8"><i class="fa fa-map-marker"></i>Chanaka Electronics,Bandarawela</a></li>
                                            <li><a href="tel:+94778200344"><i class="fa fa-phone"></i> 0778200344</a></li>
                                            <li><a href="mailto:chanakaelectro@gmail.com"><i class="fa fa-envelope-o"></i> chanakaelectro@gmail.com</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <div class="footer">
                                        <h3 class="footer-title">Categories</h3>
                                        <ul class="footer-links">
                                            <?php

                                            $category_resultSet1 = Database::search("SELECT * FROM `category`");
                                            $category_num1 = $category_resultSet1->num_rows;

                                            for ($x = 0; $x < $category_num1; $x++) {
                                                $category_data1 = $category_resultSet1->fetch_assoc();

                                            ?>
                                                <li><a href="#"><?php echo $category_data1["name"]; ?></a></li>
                                            <?php
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="clearfix visible-xs"></div>

                                <div class="col-md-3 col-xs-6">
                                    <div class="footer">
                                        <h3 class="footer-title ">Information</h3>
                                        <ul class="footer-links">
                                            <li><a href="http://chanakaelectronics.000webhostapp.com/index.php">About Us</a></li>
                                            <li><a href="tel:+94778200344">Contact Us</a></li>
                                            <li><a href="Policies.php">Terms & Conditions</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xs-6">
                                    <div class="footer">
                                        <h3 class="footer-title">Service</h3>
                                        <ul class="footer-links">
                                            <li><a href="cart.php">Cart</a></li>
                                            <li><a href="wishlist.php">Wishlist</a></li>
                                            <li><a href="purchasingHistory.php">Purchasing History</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bottom-footer" class="section">
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <ul class="footer-payments">
                                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                                    </ul>
                                    <span class="copyright">

                                        Copyright &copy;<script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | Chanaka Electronics Online Store </a>

                                    </span>


                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /bottom footer -->
                </footer>
                <!-- /FOOTER -->



            </div>

        </div>

    </div>
    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>



</body>