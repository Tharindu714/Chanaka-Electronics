<!doctype html>
<html lang="en">
<?php
session_start();
require "connection.php";

if (isset($_SESSION["aduser"])) {

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Chanaka Electronics</title>
    <link rel="shortcut icon" type="image/png" href="../images/logos/logo.png" />
    <link rel="stylesheet" href="../css/styles.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="../css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  </head>

  <body class="overflow-x-hidden">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.php" class="text-nowrap logo-img">
              <img src="../images/logos/logo2.png" width="230" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="" style="background-color: #2B2D42;">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-3"></i>
                <span class="hide-menu text-light">Main Page</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="./index.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu text-light">Dashboard</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu text-light">TO DOs</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="../sellingHistory.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-package text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Selling History</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../manageAllUsers.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-id-badge text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Manage Users</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../manageProducts.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-briefcase text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Manage Products</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../myProducts.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-paper-bag text-light"></i>
                  </span>
                  <span class="hide-menu text-light">My Product</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../addProduct.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-drag-drop text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Add New Product</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../recent.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-calendar text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Recent Product</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../removedInv.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-archive text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Past Invoices</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="https://chanakaelectronics.000webhostapp.com/adminSign.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-world text-light"></i>
                  </span>
                  <span class="hide-menu text-light">Handle Portfolio Site</span>
                </a>
              </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
              <div class="d-flex">
                <div class="unlimited-access-title me-3">
                  <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Search more</h6>
                  <a href="http://chanakaelectronics.000webhostapp.com/index.php" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Navigate</a>
                </div>
                <div class="unlimited-access-img">
                  <img src="../images/backgrounds/rocket.png" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>

            </ul>
            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="./AllCharts.php" class="btn btn-dark"> <i class="ti ti-chart-donut"></i> Charts</a>&nbsp;
                <a href="../reports/UserReports.php" class="btn btn-dark"> <i class="ti ti-receipt"></i> Reports</a>


                <li class="nav-item dropdown">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../images/logos/logo.png" alt="" width="35" height="35" class="rounded-circle">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="message-body">
                      <a href="../messages.php" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-message-chatbot fs-6"></i>
                        <p class="mb-0 fs-3">Chatapp</p>
                      </a>
                      <a href="../home.php" class="d-flex align-items-center gap-2 dropdown-item">
                        <i class="ti ti-list-check fs-6"></i>
                        <p class="mb-0 fs-3">Online Store</p>
                      </a>
                      <a href="" onclick="ADsignout();" class="btn btn-outline-primary mx-3 mt-2 d-block">Sign Out</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
          <!--  Row 1 -->

          <div class="row">
            <div class="col-lg-6 col-6 align-items-lg-stretch">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93);">
                  <h5 class="card-title mb-9 fw-semibold text-light fs-4">Today's Buyer &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                  </h5>

                  <div class="row align-items-center">
                    <?php

                    $today = date("Y-m-d");
                    $thismonth = date("m");
                    $thisyear = date("Y");

                    $a = "0";
                    $b = "0";
                    $c = "0";
                    $e = "0";
                    $f = "0";

                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                    $invoice_num = $invoice_rs->num_rows;

                    for ($x = 0; $x < $invoice_num; $x++) {
                      $invoice_data = $invoice_rs->fetch_assoc();

                      $f = $f + $invoice_data["iqty"]; //total qty

                      $d = $invoice_data["date"];
                      $splitDate = explode(" ", $d); //separate date time
                      $pdate = $splitDate[0]; //sold date

                      if ($pdate == $today) {
                        $a = $a + $invoice_data["total"];
                        $c = $c + $invoice_data["iqty"];
                      }

                      $splitMonth = explode("-", $pdate); //separate year,month & date
                      $pyear = $splitMonth[0]; // year
                      $pmonth = $splitMonth[1]; // month

                      if ($pyear == $thisyear) {
                        if ($pmonth == $thismonth) {
                          $b = $b  + $invoice_data["total"];
                          $e = $e  + $invoice_data["iqty"];
                        }
                      }
                    }

                    $freq_rs = Database::search("SELECT `total`,`iqty`,`user_email`,`product_id`,COUNT(`product_id`) AS `value_occurance`
                  FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id`,`user_email`,`iqty`,`total` ORDER BY
                  `value_occurance` DESC LIMIT 1");
                    $freq_num = $freq_rs->num_rows;

                    if ($freq_num > 0) {
                      $freq_data = $freq_rs->fetch_assoc();

                      $product_Rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $freq_data["product_id"] . "'");
                      $product_data = $product_Rs->fetch_assoc();

                      $proimg_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $freq_data["user_email"] . "'");
                      $proimg_num = $proimg_rs->num_rows;
                      $pro_data = $proimg_rs->fetch_assoc();

                      $user_rs1 = Database::search("SELECT * FROM `user` WHERE `email` = '" . $freq_data["user_email"] . "'");
                      $user_Data = $user_rs1->fetch_assoc();

                      $qty_rs = Database::search("SELECT SUM(`iqty`) AS `qty_total` FROM `invoice` WHERE `product_id` = '" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                      $qty_data = $qty_rs->fetch_assoc();


                    ?>
                      <div class="col-6">
                        <h4 class="fw-semibold mb-3 text-primary"><?php echo $user_Data["fname"] . " " . $user_Data["lname"]; ?></h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-light me-1 fs-3 mb-0"><?php echo $qty_data["qty_total"]; ?> x</p>
                          <p class="fs-3 mb-0 text-warning">Rs. <?php echo $product_data["price"]; ?>.00</p>

                        </div>
                      </div>
                    <?php
                    } else {
                    ?>
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3 text-danger">No Buyer Yet </h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-light me-1 fs-3 mb-0">0 x</p>
                          <p class="fs-3 mb-0 text-warning">00</p>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="col-6">
                      <div class="d-flex justify-content-center">
                        <?php
                        if (!empty($proimg_num)) {
                        ?>
                          <img class="img-fluid rounded-circle mx-auto mb-0" src="../<?php echo $pro_data["path"]; ?>" style="width: 100px; height: 100px;">
                        <?php
                        } else {
                        ?>
                          <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/nrtGQr.jpg" style="width: 100px; height: 100px;">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6  col-6 align-items-lg-stretch">
              <div class="card overflow-hidden">
                <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93);">
                  <h5 class="card-title mb-9 fw-semibold text-light fs-4">Today's Product &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                    <i class="bi bi-star-fill text-warning fs-5"></i>
                  </h5>

                  <div class="row align-items-center">
                    <?php

                    $today = date("Y-m-d");
                    $thismonth = date("m");
                    $thisyear = date("Y");

                    $a = "0";
                    $b = "0";
                    $c = "0";
                    $e = "0";
                    $f = "0";

                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                    $invoice_num = $invoice_rs->num_rows;

                    for ($x = 0; $x < $invoice_num; $x++) {
                      $invoice_data = $invoice_rs->fetch_assoc();

                      $f = $f + $invoice_data["iqty"]; //total qty

                      $d = $invoice_data["date"];
                      $splitDate = explode(" ", $d); //separate date time
                      $pdate = $splitDate[0]; //sold date

                      if ($pdate == $today) {
                        $a = $a + $invoice_data["total"];
                        $c = $c + $invoice_data["iqty"];
                      }

                      $splitMonth = explode("-", $pdate); //separate year,month & date
                      $pyear = $splitMonth[0]; // year
                      $pmonth = $splitMonth[1]; // month

                      if ($pyear == $thisyear) {
                        if ($pmonth == $thismonth) {
                          $b = $b  + $invoice_data["total"];
                          $e = $e  + $invoice_data["iqty"];
                        }
                      }
                    }

                    $freq_rs = Database::search("SELECT `total`,`iqty`,`user_email`,`product_id`,COUNT(`product_id`) AS `value_occurance`
                  FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id`,`user_email`,`iqty`,`total` ORDER BY
                  `value_occurance` DESC LIMIT 1");
                    $freq_num = $freq_rs->num_rows;

                    if ($freq_num > 0) {
                      $freq_data = $freq_rs->fetch_assoc();

                      $product_Rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $freq_data["product_id"] . "'");
                      $product_data = $product_Rs->fetch_assoc();

                      $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $freq_data["product_id"] . "'");
                      $image_num = $image_rs->num_rows;
                      $image_data = $image_rs->fetch_assoc();

                      $qty_rs = Database::search("SELECT SUM(`iqty`) AS `qty_total` FROM `invoice` WHERE `product_id` = '" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                      $qty_data = $qty_rs->fetch_assoc();


                    ?>
                      <div class="col-6">
                        <h4 class="fw-semibold mb-3 text-primary"><?php echo $product_data["title"]; ?></h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-light me-1 fs-3 mb-0"><?php echo $qty_data["qty_total"]; ?> x</p>
                          <p class="fs-3 mb-0 text-warning">Rs. <?php echo $product_data["price"]; ?>.00</p>

                        </div>
                      </div>
                    <?php
                    } else {
                    ?>
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3 text-danger">No Recent Product Yet </h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-light me-1 fs-3 mb-0">0 x</p>
                          <p class="fs-3 mb-0 text-warning">00</p>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="col-6">
                      <div class="d-flex justify-content-center">
                        <?php
                        if (!empty($image_num)) {
                        ?>
                          <img class="img-fluid rounded-circle mx-auto mb-0" src="../<?php echo $image_data["code"]; ?>" style="width: 100px; height: 100px;">
                        <?php
                        } else {
                        ?>
                          <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/nrtGQr.jpg" style="width: 100px; height: 100px;">
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="card w-100" style="background-color: rgba(43, 45, 66, 0.93);">
                <div class="card-body p-4">
                  <div class="mb-4">
                    <h5 class="card-title fw-semibold text-light">Recent Transactions</h5>
                  </div>
                  <ul class="timeline-widget mb-0 position-relative mb-n5">
                    <?php
                    $product_resultSet = Database::search("SELECT `date`,`title`,`total` FROM `invoice`
                  INNER JOIN `product` ON `product`.`id`= `invoice`.`product_id` ORDER BY `date` DESC LIMIT 5");

                    $product_num = $product_resultSet->num_rows;

                    for ($z = 0; $z < $product_num; $z++) {
                      $product_data = $product_resultSet->fetch_assoc();

                    ?>
                      <li class="timeline-item d-flex position-relative overflow-hidden">
                        <div class="timeline-time text-light flex-shrink-0 text-end"><?php echo $product_data["date"]; ?></div>
                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                          <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                          <span class="timeline-badge-border d-block flex-shrink-0"></span>
                        </div>
                        <div class="timeline-desc fs-3 text-info mt-n1"><?php echo $product_data["title"]; ?> <span class="text-light fw-bold">Rs. <?php echo $product_data["total"]; ?>.00</span> </div>
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="card w-100" style="background-color: rgba(43, 45, 66, 0.93);">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4 text-light">Approve Feedback</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Feedback</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Date</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Type</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Product</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Status</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $fproduct_resultSet = Database::search("SELECT * FROM `feedback`
                         INNER JOIN `product` ON `product`.`id`= `feedback`.`product_id`
                         INNER JOIN `user` ON `user`.`email`= `feedback`.`user_email` WHERE `Feed_status` = '2' ORDER BY `feedback`.`feed_id` ASC");

                        $fproduct_num = $fproduct_resultSet->num_rows;

                        for ($z = 0; $z < $fproduct_num; $z++) {
                          $fproduct_data = $fproduct_resultSet->fetch_assoc();

                        ?>
                          <tr>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 text-primary"><?php echo $fproduct_data["feedback"]; ?></h6>
                              <span class="text-light fw-bold"><?php echo $fproduct_data["fname"] ?> <?php echo $fproduct_data["lname"] ?></span>

                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal text-light"><?php echo $fproduct_data["date"]; ?></p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                <?php
                                if ($fproduct_data["type"] == 5) {
                                ?>
                                  <span class="badge bg-success rounded-3 fw-semibold">5 Stars</span>
                                <?php
                                }
                                ?>

                                <?php
                                if ($fproduct_data["type"] == 4) {
                                ?>
                                  <span class="badge bg-primary rounded-3 fw-semibold">4 Stars</span>
                                <?php
                                }
                                ?>

                                <?php
                                if ($fproduct_data["type"] == 3) {
                                ?>
                                  <span class="badge bg-info rounded-3 fw-semibold">3 Stars</span>
                                <?php
                                }
                                ?>

                                <?php
                                if ($fproduct_data["type"] == 2) {
                                ?>
                                  <span class="badge bg-warning rounded-3 fw-semibold">2 Stars</span>
                                <?php
                                }
                                ?>

                                <?php
                                if ($fproduct_data["type"] == 1) {
                                ?>
                                  <span class="badge bg-danger rounded-3 fw-semibold">1 Stars</span>
                                <?php
                                }
                                ?>

                              </div>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-warning"><?php echo $fproduct_data["title"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <button id="UB<?php echo $fproduct_data["feed_id"]; ?>" class="bg-transparent border border-0" onclick="approve('<?php echo $fproduct_data['feed_id']; ?>');"><img src="../images/backgrounds/check-mark-transparent-gif-13.png" width="40"></button>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                </div>
              </div>
            </div>
            <div class="col-lg-12 d-flex align-items-stretch">
              <div class="card w-100" style="background-color: rgba(43, 45, 66, 0.93);">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4 text-light">Manage Products - NutShell</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Image</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Product</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Price</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Avaliable QTY</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Added On</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Status</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $mproduct_resultSet = Database::search("SELECT * FROM `product` ORDER BY `product`.`id` ASC LIMIT 4");

                        $mproduct_num = $mproduct_resultSet->num_rows;

                        for ($z = 0; $z < $mproduct_num; $z++) {
                          $mproduct_data = $mproduct_resultSet->fetch_assoc();

                        ?>
                          <tr>
                            <td class="border-bottom-0">
                              <?php
                              $product_img_rs = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $mproduct_data["id"] . "';");
                              $product_img_data = $product_img_rs->fetch_assoc();
                              ?>
                              <img src="../<?php echo $product_img_data["code"]; ?>" style="height: 50px; margin-left: 30px;" />
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal text-light"><?php echo $mproduct_data["title"]; ?></p>
                            </td>

                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-primary"><?php echo $mproduct_data["price"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-light"><?php echo $mproduct_data["qty"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-warning"><?php echo $mproduct_data["datetime_added"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <?php
                              if ($mproduct_data["status_id"] == 1) {
                              ?>
                                <button id="pb<?php echo $mproduct_data["id"]; ?>" class="bg-transparent border border-0" onclick="blockProduct('<?php echo $mproduct_data['id']; ?>');"><img src="../images/backgrounds/check-mark-transparent-gif-13.png" width="40"></button>
                              <?php
                              } else {
                              ?>
                                <button id="pb<?php echo $mproduct_data["id"]; ?>" class="bg-transparent border border-0" onclick="blockProduct('<?php echo $mproduct_data['id']; ?>');"><img src="../img/sad.ico" width="40"></button>
                              <?php

                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <h5 class="card-title fw-semibold mb-4 text-light">Manage Users - NutShell</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Profile</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Email</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">First name</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Mobile</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Joined On</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Status</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $user_resultSet = Database::search("SELECT * FROM `user`LIMIT 4");

                        $user_num = $user_resultSet->num_rows;

                        for ($z = 0; $z < $user_num; $z++) {
                          $user_data = $user_resultSet->fetch_assoc();

                        ?>
                          <tr>
                            <td class="border-bottom-0">
                              <?php
                              $user_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $user_data["email"] . "';");
                              $user_img_num = $user_img_rs->num_rows;
                              $user_img_data = $user_img_rs->fetch_assoc();
                              if ($user_img_num == 1) {
                              ?>
                                <img src="../<?php echo $user_img_data["path"]; ?>" style="height: 50px; margin-left: 30px;" />
                              <?php
                              } else {
                              ?>
                                <img src="../resources/user.png" style="height: 50px; margin-left: 30px;" />
                              <?php
                              }
                              ?>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal text-light"><?php echo $user_data["email"]; ?></p>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-primary"><?php echo $user_data["fname"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-light"><?php echo $user_data["mobile"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-warning"><?php echo $user_data["join_date"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <?php
                              if ($user_data["status"] == 0) {
                              ?>
                                <button id="UB<?php echo $user_data['email']; ?>" class="bg-transparent border border-0" onclick="blockUser('<?php echo $user_data['email']; ?>');"><img src="../images/backgrounds/check-mark-transparent-gif-13.png" width="40"></button>
                              <?php
                              } else {
                              ?>
                                <button id="UB<?php echo $user_data['email']; ?>" class="bg-transparent border border-0" onclick="blockUser('<?php echo $user_data['email']; ?>');"><img src="../images/backgrounds/uncheck-mark-transparent-gif-13.png" width="40"></button>
                              <?php

                              }
                              ?>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <h5 class="card-title fw-semibold mb-4 text-light">View Admins</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Email</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">First name</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Last name</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-light">Last Verification Code</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $user_resultSet = Database::search("SELECT * FROM `admin`");

                        $user_num = $user_resultSet->num_rows;

                        for ($z = 0; $z < $user_num; $z++) {
                          $user_data = $user_resultSet->fetch_assoc();

                        ?>
                          <tr>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal text-light"><?php echo $user_data["email"]; ?></p>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-primary"><?php echo $user_data["fname"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-primary"><?php echo $user_data["lname"]; ?></h6>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0 fs-4 text-warning"><?php echo $user_data["verification_code"]; ?></h6>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
      function ADsignout() {
        var request = new XMLHttpRequest();

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            var text5 = request.responseText;
            if (text5 == "success") {
              window.location.reload();
            } else {
              alert(text5);
            }
          }
        };

        request.open("GET", "../adSignOut.php", true);
        request.send();
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../libs/jquery/dist/jquery.min.js"></script>
    <script src="../libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebarmenu.js"></script>
    <script src="../js/app.min.js"></script>
    <script src="../libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../libs/simplebar/dist/simplebar.js"></script>
    <script src="../js/dashboard.js"></script>
  </body>

</html>

<?php
} else {
  header("location:../adminSignin.php");
}
?>