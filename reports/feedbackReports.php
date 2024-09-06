<!DOCTYPE html>

<html>
<?php

session_start();
require "../connection.php";

if (isset($_SESSION["aduser"])) {

    $rs = Database::search("SELECT * FROM `feedback`
    INNER JOIN `user` ON  `feedback`.`user_email` = `user`.`email`
    INNER JOIN `product` ON  `feedback`.`product_id` = `product`.`id` 
    ORDER BY `feedback`.`date` ASC");

    $num = $rs->num_rows;
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Business Reports | Chanaka Electronics</title>

        <link rel="stylesheet" href="../bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="../style.css" />

        <link rel="icon" href="../resources/logo.png" />

    </head>

    <body class="body" style="background-size: 115%;">
        <div class="container-fluid">
            

            <div class="row">
                <div class="col-12 text-center py-3 d-flex align-items-center justify-content-center" style="background-color:#2b2d42; height: 50px;">
                    <label class="form-label text-light title1 fs-4 fw-bold">Business Reports</label>
                    <i class="bi bi-clipboard-minus fs-4" style="color: white;"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-2 border-0 border-end border-1 border-primary" style="background-color: rgba(43, 45, 66, 0.91);">
                    <nav aria-label="breadcrumb" class="mt-2">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item f4"><a href="../html/index.php" class="text-decoration-none text-light">Dashboard</a></li>
                            <li class="breadcrumb-item f4"><a href="UserReports.php" class="text-decoration-none text-light">User Report</a></li>
                            <li class="breadcrumb-item f4"><a href="userAdreessReport.php" class="text-decoration-none text-light">User Address Report</a></li>
                            <li class="breadcrumb-item f4"><a href="ProductReport.php" class="text-decoration-none text-light">Product Report</a></li>
                            <li class="breadcrumb-item f4"><a href="invoiceReport.php" class="text-decoration-none text-light">Invoice Report</a></li>
                            <li class="breadcrumb-item f4"><a href="RecentReports.php" class="text-decoration-none text-light">Recent Product Report</a></li>
                            <li class="breadcrumb-item f4 active text-primary">Feedback Report</li>
                            <li class="breadcrumb-item f4"><a href="HappycustomerReports.php" class="text-decoration-none text-light">Happy Customers Report</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

                <div class="container mt-3 table-responsive" id="printArea">
                    <h2 class="text-center fw-bold">Feedback Report</h2>

                    <table class="table table-hover mt-5 ">
                        <thead class="fw-bold">
                            <tr>
                                <th>Product Name</th>
                                <th class="text-center">Product Image</th>
                                <th>Reviewed By</th>
                                <th class="text-center">Profile Picture</th>
                                <th>Star Ratings</th>
                                <th>feedback</th>
                                <th>Reviewed Date</th>
                                <th>Authorized Status</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">

                            <?php

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();

                                $img_resultSet = Database::search("SELECT*FROM `image` WHERE `product_id`='" . $data["id"] . "';");
                                $imgdata = $img_resultSet->fetch_assoc();

                                $proimg_resultSet = Database::search("SELECT*FROM `profile_image` WHERE `user_email`='" . $data["email"] . "';");
                                $proimgdata = $proimg_resultSet->fetch_assoc();

                                $Rf_rs1 = Database::search("SELECT * FROM `feedback`WHERE `product_id`='" . $data["id"] . "' ORDER BY `date` DESC");
                                $Rf_num1 = $Rf_rs1->num_rows;
                                $Rf_data1 = $Rf_rs1->fetch_assoc();

                            ?>
                                <tr>
                                    <td><?php echo $data["title"] ?></td>
                                    <td class="text-center">
                                        <?php

                                        if (empty($imgdata["code"])) {
                                        ?>
                                            <img src="../resources/user.png" height="30px">
                                    </td>
                                <?php

                                        } else {
                                ?>
                                    <img src="../<?php echo $imgdata["code"]; ?>" height="30px" class="rounded-circle"></td>
                                <?php

                                        }
                                ?>
                                <td><?php echo $data["fname"]; ?></td>
                                <td class="text-center">
                                    <?php

                                    if (empty($proimgdata["path"])) {
                                    ?>
                                        <img src="../resources/user.png" height="30px">
                                </td>
                            <?php

                                    } else {
                            ?>
                                <img src="../<?php echo $proimgdata["path"]; ?>" height="30px" class="rounded-circle"></td>
                            <?php

                                    }
                            ?>
                            <td>
                                <?php
                                if ($Rf_data1["type"] == 1) {
                                    echo ("1 Stars");
                                } else if ($Rf_data1["type"] == 2) {
                                    echo ("2 Stars");
                                } else if ($Rf_data1["type"] == 3) {
                                    echo ("3 Stars");
                                } else if ($Rf_data1["type"] == 4) {
                                    echo ("4 Stars");
                                } else if ($Rf_data1["type"] == 5) {
                                    echo ("5 Stars");
                                } else {
                                    echo ("None");
                                }
                                ?>
                            </td>
                            <td><?php echo $data["feedback"] ?></td>
                            <td><?php echo $data["date"] ?></td>

                            <td>
                                <?php

                                if ($data["Feed_status"] == 2) {
                                ?>
                                    <span class="text-danger">
                                        <?php
                                        echo ("Unauthorized");
                                        ?>
                                    </span>
                                <?php
                                } else {
                                    ?>
                                    <span class="text-success">
                                        <?php
                                        echo ("Authorized");
                                        ?>
                                    </span>
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


                <div class="d-flex justify-content-end container my-2 col-12">
                    <button class="btn btn-dark  col-md-4 col-lg-2 col-sm-6" onclick="printDiv();"><i class="bi bi-printer-fill me-2"></i>Print Report</button>
                </div>
                <script src="../script.js"></script>
                <script src="../bootstrap.bundle.js"></script>
    </body>

</html>
<?php

} else {
    header("location:html/index.php");
}
?>