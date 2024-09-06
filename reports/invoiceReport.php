<!DOCTYPE html>

<html>
<?php

session_start();
require "../connection.php";

if (isset($_SESSION["aduser"])) {

    $rs = Database::search("SELECT * FROM `invoice`
    INNER JOIN `user` ON  `invoice`.`user_email` = `user`.`email`
    INNER JOIN `product` ON  `invoice`.`product_id` = `product`.`id` 
    ORDER BY `invoice`.`id` ASC");

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
                        <li class="breadcrumb-item f4 active text-primary">Invoice Report</li>
                        <li class="breadcrumb-item f4"><a href="RecentReports.php" class="text-decoration-none text-light">Recent Product Report</a></li>
                        <li class="breadcrumb-item f4"><a href="feedbackReports.php" class="text-decoration-none text-light">Feedback Report</a></li>
                        <li class="breadcrumb-item f4"><a href="HappycustomerReports.php" class="text-decoration-none text-light">Happy Customers Report</a></li>
                    </ol>
                </nav>
            </div>
        </div>

                <div class="container mt-3 table-responsive" id="printArea">
                    <h2 class="text-center fw-bold">Invoice Report</h2>

                    <table class="table table-hover mt-5 ">
                        <thead class="fw-bold">
                            <tr>
                                <th>Order Id</th>
                                <th>Invoice Date</th>
                                <th>total</th>
                                <th>Status</th>
                                <th>QTY</th>
                                <th class="text-center">Product Image</th>
                                <th>Product</th>
                                <th>User Email</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">

                            <?php

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();

                                $img_resultSet = Database::search("SELECT*FROM `image` WHERE `product_id`='" . $data["id"] . "';");
                                $imgdata = $img_resultSet->fetch_assoc();
                                
                            ?>
                                <tr>
                                    <td><?php echo $data["order_id"] ?></td>
                                    <td><?php echo $data["date"] ?></td>
                                    <td><?php echo $data["total"] ?></td>
                                    <td>
                                        <?php
                                        if ($data["d_status"] == 0) {
                                            echo ("Pending");
                                        }else if ($data["d_status"] == 1) {
                                            echo ("Packaging");
                                        }else if ($data["d_status"] == 2) {
                                            echo ("Dispatching");
                                        }else if ($data["d_status"] == 3) {
                                            echo ("Shipping");
                                        }else if ($data["d_status"] == 4) {
                                            echo ("Delivering");
                                        }else if ($data["d_status"] == 5) {
                                            echo ("Completed");
                                        }else {
                                            echo ("None");
                                        }
                                        ?></td>
                                    <td><?php echo $data["iqty"] ?></td>
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
                                    <td><?php echo $data["title"] ?></td>
                                    <td><?php echo $data["user_email"] ?></td>

                                </tr>

                            <?php
                            }

                            ?>


                        </tbody>
                    </table>
                </div>


                <div class="d-flex justify-content-end container my-2 col-12">
                    <button class="btn btn-dark  col-md-2 col-lg-2 col-sm-6" onclick="printDiv();"><i class="bi bi-printer-fill me-2"></i>Print Report</button>
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