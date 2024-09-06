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
	<link type="text/css" rel="stylesheet" href="bootstrap-icons.css" />

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
	<div classs="vh-100 w-100 ">
		<div class="">
			<div class="col-12">
				<header>
					<!-- TOP HEADER -->
					<div id="top-header">
						<div class="container">
							<ul class="header-links pull-left">
								<li><a href="tel:+94778200344"><i class="fa fa-phone"></i> 0778200344</a></li>
								<li><a href="mailto:chanakaelectro@gmail.com"><i class="fa fa-envelope-o"></i> chanakaelectro@gmail.com</a></li>
								<li><a href="https://maps.app.goo.gl/1fM9BCFsGSyPkZDT8"><i class="fa fa-map-marker"></i>Visit Us</a></li>
							</ul>

							<ul class="header-links pull-right">
								<li><a href="https://www.linkedin.com/in/chanaka-sanjeewa-175aa728b"><i class="fa fa-linkedin-square"></i> linkedin</a></li>
								<li><a href="https://www.facebook.com/50Bandarawela?mibextid=2JQ9oc"><i class="fa fa-facebook-official"></i> facebook</a></li>
								<li><a href="https://wa.me/message/CBYLNI2IKXKII1"><i class="fa fa-whatsapp"></i> whatsapp</a></li>
								<li><a href="https://instagram.com/chanaka.sanjeewa?igshid=MzRlODBiNWFlZA=="><i class="fa fa-instagram"></i> instagram</a></li>
								<li><a href="https://youtube.com/@chanakaElectro?si=ob-OIXZGP6odFKTe"><i class="fa fa-youtube"></i> youtube</a></li>
								<?php
								if (isset($_SESSION["user"])) {
									$data = $_SESSION["user"];

								?>
									<li><a href="userprofile.php"><i class="fa fa-user-o"></i> <?php echo $data["fname"]; ?>'s Profile</a></li>
									<li><a href="" onclick="signout();"><i class="fa fa-sign-out"></i> SignOut</a></li>
								<?php
								} else {
								?>
									<li><a href="index.php"><i class="fa fa-user-o"></i> Log In</a></li>
								<?php
								}
								?>
						</div>
					</div>
					</ul>

					<!-- MAIN HEADER -->
					<div id="header">
						<!-- container -->
						<div class="container">
							<!-- row -->
							<div class="row">
								<!-- LOGO -->
								<div class="col-md-3 clearfix">
									<div class="header-ctn">
										<!-- Purchasing History -->
										<div class="dropdown" style="cursor: pointer;">
											<?php
											require "connection.php";
											if (!isset($_SESSION["user"]["email"])) {
											} else {
											?>
												<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-credit-card"></i>
													<?php
													$p_rs = Database::search("SELECT * FROM `invoice`
									            INNER JOIN `user` ON invoice.user_email=user.email WHERE `user_email`= '" . $_SESSION["user"]["email"] . "' AND `remove_status` ='1'");
													$p_num = $p_rs->num_rows;
													?>
													<span>My Orders</span>
													<div class="qty"><?php echo $p_num; ?></div>
												</a>
											<?php
											}
											?>
											<div class="cart-dropdown">
												<div class="cart-list">
													<?php

													for ($x = 0; $x < $p_num; $x++) {
														$p_data = $p_rs->fetch_assoc();

														$product_rs = Database::search("SELECT* FROM `product` WHERE `id`='" . $p_data["product_id"] . "'");
														$product_data = $product_rs->fetch_assoc();

														$image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $p_data["product_id"] . "'");
														$image_data = $image_rs->fetch_assoc();

													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="<?php echo $image_data['code']; ?>" />
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="#"><?php echo $product_data["title"] ?></a></h3>
																<h4 class="product-price"><span class="qty">1x</span>Rs. <?php echo $product_data["price"]; ?>.00</h4>
															</div>
														</div>
													<?php
													}
													?>
												</div>
												<div class="cart-btns" style="display: flex; justify-content: center;">
													<a href="home.php">Home</a>
													<a href="purchasingHistory.php">View Purchasing History <i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
										<!-- /Purchasing History -->

										<!-- Chat -->
										<div class="dropdown" style="cursor: pointer;">
											<?php

											if (!isset($_SESSION["user"]["email"])) {
											} else {
												$send_rs = Database::search("SELECT * FROM `chat2`
												INNER JOIN `user` ON chat2.touser=user.email
												WHERE `touser`= '" . $_SESSION["user"]["email"] . "'");
												$send_num = $send_rs->num_rows;

												$rec_rs = Database::search("SELECT * FROM `chat`
												INNER JOIN `user` ON chat.fromuser=user.email
												WHERE `fromuser`= '" . $_SESSION["user"]["email"] . "'
												AND `toadmin` = 'chanakaelectro@gmail.com'");
												$rec_num = $rec_rs->num_rows;
											?>
												<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-comment"></i>
													<span>Chat Admin</span>
													<div class="qty"><?php echo $send_num; ?></div>
												</a>
											<?php
											}
											?>
											<div class="cart-dropdown" style="background-image: url('resources/peakpx.jpg');">
												<div class="cart-list" style="overflow-x: hidden;">
												<?php
													for ($x = 0; $x < $rec_num; $x++) {
														$rec_data = $rec_rs->fetch_assoc();
													?>
														<div class="product-widget">
															<div class="product-body">
																<div class="col-12">
																	<div class="row">
																		<div class="col-10 rounded-4" style="background-color: #075E54; width:90%;">
																			<div class="row">
																				<div class="col-10 offset-1 pt-3">
																					<span class="text-white fw-bold fs-5"><?php echo $rec_data["message"]; ?></span>
																				</div>
																				<div class="col-10 offset-1 text-end pb-2">
																					<span class="text-light fs-6"><?php echo $rec_data["datetime"]; ?></span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php
													}
													?>

													<?php
													for ($x = 0; $x < $send_num; $x++) {
														$send_data = $send_rs->fetch_assoc();
													?>
														<div class="product-widget">
															<div class="product-body">
																<!-- received -->
																<div class="col-12">
																	<div class="row">
																		<div class="col-10 rounded-4" style="background-color: #444444; width:90%; margin-left:-60px;">
																			<div class="row">
																				<div class="col-10 offset-1 pt-3">
																					<span class="text-white fw-bold fs-5"><?php echo $send_data["message"]; ?></span>
																				</div>
																				<div class="col-10 offset-1 text-start pb-2">
																					<span class="text-light fs-6"><?php echo $send_data["datetime"]; ?></span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- received -->
															</div>
														</div>
													<?php
													}
													?>

												</div>
												<div class="cart-btns" style="display: flex; justify-content: center;">
													<a href="home.php">Cancel</a>
													<a onclick="contactAdmin('<?php echo $_SESSION['user']['email']; ?>');">Leave Quick Text<i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
										<!-- /Chat -->
									</div>
								</div>

								<!-- msg modal -->
								<div class="modal" tabindex="-1" id="contactAdmin">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header" style="background-color: #075E54;">
												<h5 class="modal-title title1 text-uppercase fw-bold fs-4" style="color: #ffffff;">Administrator | Chanaka Electronics</h5>
												<button type="button" class="btn-close text-light border border-2 border-warning" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-footer" style="background-image: url('resources/0a755a111030c39fca13d9fa38931f20.jpg');">
												<div class="col-12 ">
													<div class="row">
														<div class="col-10">
															<input type="text" class="form-control text-light border border-0 py-2" style="background-color: #444444;" id="msgtxt" placeholder="Chat with admin......" />
														</div>
														<div class="col-2 d-grid">
															<button type="button" class="btn" onclick="SEndAdminMsg1('<?php echo $_SESSION['user']['email']; ?>');"><i class="bi bi-send-fill fs-2" style="color: #075E54;"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- msg modal -->

								<div class="col-md-6">
									<div class="header-search">

										<select class="input-select" id="basic_search_select" style="max-width: 150px;">
											<option value="0">All Categories</option>
											<?php
											$category_resultSet = Database::search("SELECT * FROM `category`");
											$category_num = $category_resultSet->num_rows;

											for ($x = 0; $x < $category_num; $x++) {
												$category_data = $category_resultSet->fetch_assoc();

											?>
												<option value="<?php echo $category_data["c_id"]; ?>"><?php echo $category_data["name"]; ?></option>
											<?php
											}

											?>
										</select>
										<input class="input" type="text" aria-label="Text input with dropdown button" placeholder="Search here" id="basic_search_txt">
										<button class="search-btn" onclick="basicSearch();">Search</button>
									</div>
								</div>


								<!-- ACCOUNT -->
								<div class="col-md-3 clearfix">
									<div class="header-ctn">

										<!-- Wishlist -->
										<div class="dropdown" style="cursor: pointer;">
											<?php
											if (!isset($_SESSION["user"]["email"])) {
											?>
											<?php
											} else {
											?>
												<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-heart"></i>
													<?php
													$w_rs = Database::search("SELECT * FROM `wishlist`
									            INNER JOIN `user` ON wishlist.user_email=user.email WHERE `user_email`= '" . $_SESSION["user"]["email"] . "' ");
													$w_num = $w_rs->num_rows;
													?>
													<span>Your Wishlist</span>
													<div class="qty"><?php echo $w_num; ?></div>
												</a>
											<?php
											}
											?>
											<div class="cart-dropdown">
												<div class="cart-list">
													<?php
													for ($x = 0; $x < $w_num; $x++) {
														$w_data = $w_rs->fetch_assoc();

														$product_rs = Database::search("SELECT* FROM `product` WHERE `id`='" . $w_data["product_id"] . "'");
														$product_data = $product_rs->fetch_assoc();

														$image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $w_data["product_id"] . "'");
														$image_data = $image_rs->fetch_assoc();

													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="<?php echo $image_data['code']; ?>" />
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="#"><?php echo $product_data["title"] ?></a></h3>
																<h4 class="product-price"><span class="qty">1x</span>Rs. <?php echo $product_data["price"]; ?>.00</h4>
															</div>
														</div>
													<?php
													}
													?>
												</div>
												<div class="cart-btns" style="display: flex; justify-content: center;">
													<a href="home.php">Home</a>
													<a href="wishlist.php">View Wishlist <i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
										<!-- /Wishlist -->

										<!-- Cart -->
										<div class="dropdown" style="cursor: pointer;">
											<?php
											if (!isset($_SESSION["user"]["email"])) {
											} else {
											?>
												<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
													<i class="fa fa-shopping-cart"></i>
													<?php

													$c_rs = Database::search("SELECT * FROM `cart`
									            INNER JOIN `user` ON cart.user_email=user.email WHERE `user_email`= '" . $data["email"] . "' ");
													$c_num = $c_rs->num_rows;
													?>
													<span>Your Cart</span>
													<div class="qty"><?php echo $c_num; ?></div>
												</a>
											<?php
											}
											?>
											<div class="cart-dropdown">
												<div class="cart-list">
													<?php
													for ($y = 0; $y < $c_num; $y++) {
														$c_data = $c_rs->fetch_assoc();

														$product_rs1 = Database::search("SELECT* FROM `product` WHERE `id`='" . $c_data["product_id"] . "'");
														$product_data1 = $product_rs1->fetch_assoc();

														$image_rs1 = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $c_data["product_id"] . "'");
														$image_data1 = $image_rs1->fetch_assoc();

													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="<?php echo $image_data1['code']; ?>" alt="">
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="#"><?php echo $product_data1["title"] ?></a></h3>
																<h4 class="product-price"><span class="qty">1x</span>Rs. <?php echo $product_data1["price"]; ?>.00</h4>
															</div>
														</div>
													<?php
													}

													?>
												</div>
												<div class="cart-btns" style="display: flex; justify-content: center;">
													<a href="cart.php">View Cart</a>
													<a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
												</div>
											</div>
										</div>
										<!-- /Cart -->
									</div>
								</div>
								<!-- /ACCOUNT -->
							</div>
							<!-- row -->
						</div>
						<!-- container -->
					</div>
					<!-- /MAIN HEADER -->
				</header>

				<!-- NAVIGATION -->
			</div>
		</div>

	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<Script src="script.js"></Script>
	<Script src="bootstrap.bundle.js"></Script>


</body>

</html>