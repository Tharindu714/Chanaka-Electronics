<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="resources/logo.png" />
	<?php
	session_start();
	if (isset($_SESSION["user"])) {
	?>
		<title> Hey <?php echo $_SESSION["user"]["fname"]; ?> ! Start Shopping</title>
	<?php
	} else {
	?>
		<title>Welcome | Start Shopping</title>
	<?php
	}
	?>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link rel="stylesheet" href="bootstrap-icons.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="bootstrap.css" />
</head>


<body style="overflow-x: hidden;">
	<?php require "header2.php"  ?>
	<div class="col-lg-12 col-xl-12 d-none d-lg-block mb-4" id="carsl" style="background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed; margin-left: 1px;">
		<div class="row">
			<div id="carouselExampleIndicators" class="carousel slide carousel-fade col-12 mt-5" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="30000">
						<img src="Carousal/electronics3.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Chanaka Electronics</h5>
							<p class="poster-text text-bg-transparent fs-4">
								"your one-stop shop for the latest in consumer electronics.
								From the newest Electronic and Electrical products to cutting-edge devices"</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics2.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Chanaka Electronics | Online Shop</h5>
							<p class="poster-text text-bg-transparent fs-4">
								"we carry a wide range of products to suit your every need.
								The knowledgeable Administration is dedicated to providing
								top-notch customer service and helping you find the perfect tech solution."</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics1.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Discover the Future with us</h5>
							<p class="poster-text text-bg-transparent fs-4">"we specialize in the latest E-commerce technology.
								Our extensive selection includes every kind of Electronics, Electricals,
								and Spare Parts."</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics4.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Chanaka Electronics Online Store</h5>
							<p class="poster-text text-bg-transparent fs-4">"Chanaka Electronics Online Store is your ultimate destination for the
								latest and greatest in tech gadgets and accessories.
								We cater to tech enthusiasts with a passion for innovation and performance"</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics5.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Roam on the Dream tech land</h5>
							<p class="poster-text text-bg-transparent fs-4">"Stay ahead of the curve with our range of future-ready technology related Products
								We’re constantly updating our inventory with the latest releases and technological advancements,
								so you can always find the most up-to-date products."</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics6.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Where Technology Meets Imagination</h5>
							<p class="poster-text text-bg-transparent fs-4">"Roam and let your imagination soar. Whether you’re upgrading your gadgets, setting up a smart home,
								or simply exploring the latest in tech, Come visit us and turn your tech dreams into reality today!"</p>
						</div>
					</div>
					<div class="carousel-item" data-bs-interval="30000">
						<img src="Carousal/electronics7.jpg" class="d-block rounded-2" height="750px">
						<div class="carousel-caption d-none d-md-block poster-caption1">
							<h5 class="poster-title1 text-bg-transparent">Meet your tech requirement</h5>
							<p class="poster-text text-bg-transparent fs-4">"Chanaka Electronics is designed with families in mind,
								offering a diverse range of products to meet the needs of every member of your household.
								The friendly Administration is here to assist you in finding the best products at the best prices."</p>
						</div>
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>

	<div class="col-6 offset-3 position-relative mb-7 mt-5 rounded" style="background-color: transparent;">
		<div class="d-flex">
			<div class="unlimited-access-title me-3">
				<h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Search more</h6>
				<a href="http://chanakaelectronics.000webhostapp.com/index.php" target="_blank" class="btn btn-bg-transparent text-primary fs-2 fw-semibold lh-sm">Navigate</a>
			</div>
			<div class="unlimited-access-img">
				<img src="images/backgrounds/rocket.png" alt="" class="img-fluid">
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="row">
				<?php

				$category_resultSet = Database::search("SELECT * FROM `category` ORDER BY `c_id` DESC LIMIT 3");
				$category_num = $category_resultSet->num_rows;

				for ($x = 0; $x < $category_num; $x++) {
					$category_data = $category_resultSet->fetch_assoc();
				?>
					<div class="col-12 col-md-6 col-lg-4 col-xs-10 offset-lg-0 offset-1">
						<div class="shop">
							<div class="shop-img">
								<img src="<?php echo $category_data["path"]; ?>" alt="">
							</div>
							<div class="shop-body">
								<h4><?php echo $category_data["name"]; ?><br>Collection</h4>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class="section" id="basicSearchResult">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php
									$product_resultSet = Database::search("SELECT * FROM `product` WHERE `status_id` = '1' ORDER BY `datetime_added` DESC");

									$product_num = $product_resultSet->num_rows;

									for ($z = 0; $z < $product_num; $z++) {
										$product_data = $product_resultSet->fetch_assoc();

									?>
										<div class="product">
											<div class="product-img img-fluid">
												<?php
												$image_resultSet = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $product_data["id"] . "';");
												$image_data = $image_resultSet->fetch_assoc();
												?>
												<img src="<?php echo $image_data["code"]; ?>" alt="">
												<?php

												$start_date = new DateTime($product_data["datetime_added"]);

												$tdate = new DateTime();
												$tz = new DateTimeZone("Asia/Colombo");
												$tdate->setTimezone($tz);

												$end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

												$difference = $end_date->diff($start_date);

												if ($difference->format('%d') >= 7) {
												?>
												<?php
												} else {
												?>
													<div class="product-label">
														<span class="new">NEW</span>
													</div>
												<?php
												}
												?>
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
												<h4 class="product-price">Rs.<?php echo $product_data["price"]; ?>.00</h4>
												<?php
												$Rf_rs = Database::search("SELECT * FROM `feedback`WHERE `product_id`='" . $product_data["id"] . "' ORDER BY `date` DESC");
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
													<?php
													if (isset($_SESSION["user"])) {
														$email = $_SESSION["user"]["email"];

														$watchlist_Resultset = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND `user_email`= '" . $email . "'");
														$watchlist_num = $watchlist_Resultset->num_rows;

														if ($watchlist_num == 1) {
													?>
															<button class="add-to-wishlist" onclick='addWishlist(<?php echo $product_data["id"]; ?>);'>
																<i class="fa fa-heart text-primary" id='heart<?php echo $product_data["id"]; ?>'></i>
																<span class="tooltipp fs-6">Remove</span>
															</button>
														<?php
														} else {
														?>
															<button class="add-to-wishlist" onclick='addWishlist(<?php echo $product_data["id"]; ?>);'>
																<i class="fa fa-heart text-dark" id='heart<?php echo $product_data["id"]; ?>'></i>
																<span class="tooltipp">add to wishlist</span>
															</button>
													<?php
														}
													}

													?>
													<?php
													if (!isset($_SESSION["user"])) {
													} else {
													?>
														<button class="quick-view">
															<a href="<?php echo "SingleProductView.php?id=" . ($product_data["id"]); ?>">
																<i class="fa fa-hand-o-right"></i>
																<span class="tooltipp">See More...</span>
															</a>
														</button>
													<?php
													}
													?>
												</div>
											</div>
											<?php
											if (!isset($_SESSION["user"])) {
											} else {
											?>
												<div class="add-to-cart">
													<button class="add-to-cart-btn" onclick="AddtoCart(<?php echo $product_data['id']; ?>);">add to cart</button>
												</div>
											<?php
											}
											?>
										</div>
									<?php
									}
									?>
									<!-- /product -->
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="newsletter" class="section"></div>

	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title" style="color: black;">Electronic Items</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<?php

							$product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '1' AND `status_id` = '1' ORDER BY `qty` ASC LIMIT 4 OFFSET 0");

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
										<p class="product-category">Electronics</p>
										<h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
										<h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00</h4>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title" style="color: black;">Electrical Items</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<?php

							$product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '2' AND `status_id` = '1' ORDER BY `qty` ASC LIMIT 4 OFFSET 0");

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
										<p class="product-category">Electricals</p>
										<h3 class="product-name"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
										<h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00</h4>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title" style="color: black;">Spare Parts</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<?php

							$product_resultSet = Database::search("SELECT * FROM `product` WHERE `category_id`= '3' AND `status_id` = '1' ORDER BY `qty` ASC LIMIT 4 OFFSET 0");

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
										<h4 class="product-price">Rs. <?php echo $product_data["price"]; ?>.00</h4>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="newsletter" class="section"></div>

	<?php require "footer.php" ?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="script.js"></script>

</body>

</html>