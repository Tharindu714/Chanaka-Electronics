<!DOCTYPE html>
<html lang="en">
<!-- changes -->
<?php

session_start();
require "connection.php";

if (isset($_SESSION["aduser"])) {

    $email = $_SESSION["aduser"]["email"];
    $pageno;

?>

    <!-- changes -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Search By Sellers</title>

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
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo.png" />

    </head>

    <body class="body">

        <div class="container-fluid vh-100">
            <div class="row">
                <div class="col-12  d-flex justify-content-center vh-100">


                    <!-- BREADCRUMB -->
                    <div id="breadcrumb" class="section" style="height:80px; background-color: rgba(43, 45, 66, 0.91);">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row bread">
                                <div class="col-md-3 breadcrumb-resp" style="margin-top: 22px;">
                                    <ul class="breadcrumb-tree">
                                        <li><a href="#">Sellers Search</a></li>
                                        <li><a href="myProducts.php">My Product</a></li>
                                        <!-- <li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li> -->
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 wishlist" style="display: flex; justify-content: center; margin-top: 16px;">
                                    <h2 class="f3" style="font-weight:normal; color: white;">Search By Seller</h2>
                                    <a href="#" style="font-size: 24px; margin-left: 5px; color: #0073e6;"><i class="fa fa-trademark" aria-hidden="true"></i></a>
                                </div>

                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /BREADCRUMB -->
                </div>

                <!-- SECTION -->
                <div class="section">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <!-- ASIDE -->
                            <div id="aside" class="col-12 col-sm-12 col-md-3 text-center">

                                <!-- aside Widget -->
                                <div class="aside">
                                    <h3 class="aside-title text-primary">Categories</h3>
                                    <div class="checkbox-filter">
                                        <div class="input-checkbox">
                                            <input type="radio" id="supe" name="r1">
                                            <label for="Electronic">
                                                <span></span>
                                                SuperLight
                                            </label>
                                        </div>

                                        <div class="input-checkbox">
                                            <input type="radio" id="tv" name="r1">
                                            <label for="Electricals">
                                                <span></span>
                                                TV - Center
                                            </label>
                                        </div>

                                        <div class="input-checkbox">
                                            <input type="radio" id="alp" name="r1" class="justify-content-lg-start">
                                            <label for="spares">
                                                <span></span>
                                                Alpex Mobiles
                                            </label>
                                        </div>

                                        <div class="input-checkbox">
                                            <input type="radio" id="d" name="r1" class="align-content-end">
                                            <label for="spares">
                                                <span></span>
                                                Dissanayaka Electronics
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /aside Widget -->

                                <!-- aside Widget -->
                                <div class="aside">
                                    <div class="product">
                                        <div class="product product-body">
                                            <div class="product-btns">
                                                <button class="add-to-wishlist" onclick="sortseller(0);">
                                                    <i class="fa fa-dropbox text-dark"></i>
                                                    <span class="tooltipp">Sort Product</span>
                                                </button>
                                                <button class="add-to-wishlist" onclick="clearSort();">
                                                    <i class="fa fa-refresh text-dark"></i>
                                                    <span class="tooltipp">Clear Sort</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /aside Widget -->

                                <!-- aside Widget -->
                                <div class="aside">
                                    <h3 class="aside-title text-primary">Most Recent Products</h3>
                                    <?php

                                    $product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '1' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 2 OFFSET 0");

                                    $product_num = $product_resultSet->num_rows;

                                    for ($z = 0; $z < $product_num; $z++) {
                                        $product_data = $product_resultSet->fetch_assoc();

                                    ?>
                                        <div class="product-widget">
                                            <?php

                                            $image_resultSet = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $product_data["id"] . "';");
                                            $image_data = $image_resultSet->fetch_assoc();

                                            ?>
                                            <div class="product-img">
                                                <img src="<?php echo $image_data["code"]; ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Electronic Items</p>

                                                <h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
                                                <h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00 </h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php

                                    $product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '2' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 2 OFFSET 0");

                                    $product_num = $product_resultSet->num_rows;

                                    for ($z = 0; $z < $product_num; $z++) {
                                        $product_data = $product_resultSet->fetch_assoc();

                                    ?>
                                        <div class="product-widget">
                                            <?php

                                            $image_resultSet = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $product_data["id"] . "';");
                                            $image_data = $image_resultSet->fetch_assoc();

                                            ?>
                                            <div class="product-img">
                                                <img src="<?php echo $image_data["code"]; ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Electrical Items</p>

                                                <h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
                                                <h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00 </h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php

                                    $product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '3' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 2 OFFSET 0");

                                    $product_num = $product_resultSet->num_rows;

                                    for ($z = 0; $z < $product_num; $z++) {
                                        $product_data = $product_resultSet->fetch_assoc();

                                    ?>
                                        <div class="product-widget">
                                            <?php

                                            $image_resultSet = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $product_data["id"] . "';");
                                            $image_data = $image_resultSet->fetch_assoc();

                                            ?>
                                            <div class="product-img">
                                                <img src="<?php echo $image_data["code"]; ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Spare Parts</p>

                                                <h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
                                                <h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00 </h4>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- /aside Widget -->

                            </div>
                            <!-- /ASIDE -->

                            <!-- STORE -->
                            <div id="store" class="col-12 col-md-9">

                                <!-- store products -->
                                <div class="row" id="sortseller">
                                    <?php
                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {
                                        $pageno = 1;
                                    }

                                    $product_Rs = Database::search("SELECT * FROM `product`");
                                    $product_num = $product_Rs->num_rows;

                                    $result_per_page = 6;
                                    $number_of_pages = ceil($product_num / $result_per_page); // EX :-(2-1)*4  (3-1)*4

                                    $page_results = ($pageno - 1) * $result_per_page;
                                    $selected_rs = Database::search("SELECT * FROM `product`
                                    LIMIT " . $result_per_page . "
                                    OFFSET " . $page_results . "");

                                    $selected_num = $selected_rs->num_rows;

                                    for ($x = 0; $x < $selected_num; $x++) {
                                        $selected_data = $selected_rs->fetch_assoc();

                                    ?>
                                        <!-- product -->
                                        <div class="col-12 col-md-4">
                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $product_img_rs = Database::search("SELECT * FROM `image`
                                        WHERE `product_id` = '" . $selected_data["id"] . "';");

                                                    $product_img_data = $product_img_rs->fetch_assoc();

                                                    ?>
                                                    <img src="<?php echo $product_img_data["code"]; ?>" alt="">
                                                    <div class="product-label">
                                                        <span class="new"><?php echo $selected_data["qty"]; ?></span>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#"><?php echo $selected_data["title"]; ?></a></h3>
                                                    <?php

                                                    $price = $selected_data["price"];
                                                    $adding_price = ($price / 100) * 5;
                                                    $new_price = $price + $adding_price;
                                                    $difference = $new_price - $price;
                                                    $percentage = ($difference / $price) * 100;

                                                    ?>
                                                    <h4 class="product-price">Rs.<?php echo $price; ?>.00 <del class="product-old-price">Rs.<?php echo $new_price; ?>.00</del></h4>
                                                    <?php
                                                    $Rf_rs = Database::search("SELECT * FROM `feedback`WHERE `product_id`='" . $selected_data["id"] . "' ORDER BY `date` DESC");
                                                    $Rf_num = $Rf_rs->num_rows;
                                                    $Rf_data = $Rf_rs->fetch_assoc();
                                                    ?>
                                                    <div class="product-rating">
                                                        <?php
                                                        if ($Rf_num == 0) {
                                                        ?>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php
                                                        } else {
                                                        ?>

                                                            <?php

                                                            if ($Rf_data["type"] == 5) {
                                                            ?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>

                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($Rf_data["type"] == 4) {
                                                            ?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($Rf_data["type"] == 3) {
                                                            ?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php
                                                            }
                                                            ?>


                                                            <?php
                                                            if ($Rf_data["type"] == 2) {
                                                            ?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            if ($Rf_data["type"] == 1) {
                                                            ?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            <?php
                                                            }
                                                            ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <?php if ($selected_data["status_id"] == 2) { ?>
                                                            <button class="add-to-wishlist" id="fd<?php echo $selected_data["id"]; ?>" <?php if ($selected_data["status_id"] == 2) { ?>checked<?php } ?> onclick="changeStatus(<?php echo $selected_data['id']; ?>);">
                                                                <i class="fa fa-toggle-off text-primary"></i>
                                                                <span class="tooltipp">Activate</span>
                                                            </button>
                                                        <?php } else { ?>
                                                            <button class="add-to-wishlist" id="fd<?php echo $selected_data["id"]; ?>" <?php if ($selected_data["status_id"] == 1) { ?>checked<?php } ?> onclick="changeStatus(<?php echo $selected_data['id']; ?>);">
                                                                <i class="fa fa-toggle-on text-primary"></i><span class="tooltipp">Deactivate</span></button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <button class="quick-view" onclick="sendId(<?php echo $selected_data['id']; ?>);"><i class="fa fa-upload"></i><span class="tooltipp">Update Product</span></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12" style="display: none;" id="activemsgdiv">
                                                <div class="alert alert-danger" role="alert" id="activealertdiv">
                                                    <i class="bi bi-x-octagon-fill fs-5" id="activemsg">

                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->

                                        <div class="clearfix visible-sm visible-xs"></div>
                                    <?php

                                    }

                                    ?>

                                    <!-- /store products -->

                                    <!-- store bottom filter -->
                                    <div class="store-filter clearfix">
                                        <ul class="store-pagination">
                                            <?php
                                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                                if ($x == $pageno) {

                                            ?>
                                                    <li class="active"><a href="<?php echo "?page=" . ($x); ?>" class="text-light"><?php echo $x; ?></a></li>

                                                <?php
                                                } else {
                                                ?>
                                                    <li><a href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <!-- /store bottom filter -->
                                </div>
                            </div>
                            <!-- /STORE -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /SECTION -->
            </div>
        </div>

        <?php require "footer.php" ?>

        <!-- jQuery Plugins -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/nouislider.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/main.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>

</html>
<?php

} else {

    header("location:html/index.php");
}

?>