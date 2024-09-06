<!DOCTYPE html>

<html>
<?php

session_start();
require "../connection.php";

if (isset($_SESSION["aduser"])) {

    $email = $_SESSION["aduser"]["email"];

    $rs = Database::search("SELECT * FROM `product`
    INNER JOIN `status` ON `product`.`status_id` = `status`.`s_id`
    INNER JOIN `admin` ON  `product`.`admin_email` = `admin`.`email` 
    INNER JOIN `category` ON `product`.`category_id` = `category`.`c_id`
    ORDER BY `product`.`id` ASC");

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
                        <li class="breadcrumb-item f4 active text-primary">Product Report</li>
                        <li class="breadcrumb-item f4"><a href="invoiceReport.php" class="text-decoration-none text-light">Invoice Report</a></li>
                        <li class="breadcrumb-item f4"><a href="RecentReports.php" class="text-decoration-none text-light">Recent Product Report</a></li>
                        <li class="breadcrumb-item f4"><a href="feedbackReports.php" class="text-decoration-none text-light">Feedback Report</a></li>
                        <li class="breadcrumb-item f4"><a href="HappycustomerReports.php" class="text-decoration-none text-light">Happy Customers Report</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center fw-bold">Product Report</h2>

            <div class="table-responsive">
                <table class="table table-hover mt-5">
                    <thead class="fw-bold">
                        <tr>
                            <th>Id</th>
                            <th class="text-center">Product Image</th>
                            <th>Title</th>
                            <th>Price (Rs.)</th>
                            <th>QTY</th>
                            <th>Category</th>
                            <th class="text-center">Category Image</th>
                            <th>Seller</th>
                            <th>Status</th>
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
                            <td><?php echo $data["id"] ?></td>
                            <td class="text-center">
                                <?php if (empty($imgdata["code"])) { ?>
                                    <img src="../resources/-F7T.png" height="30px">
                                <?php } else { ?>
                                    <img src="../<?php echo $imgdata["code"]; ?>" height="30px" class="rounded-circle">
                                <?php } ?>
                            </td>
                            <td><?php echo $data["title"] ?></td>
                            <td><?php echo $data["price"] ?></td>
                            <td><?php echo $data["qty"] ?></td>
                            <td><?php echo $data["name"] ?></td>
                            <td class="text-center">
                                <?php if (empty($data["path"])) { ?>
                                    <img src="../resources/-F7T.png" height="30px">
                                <?php } else { ?>
                                    <img src="../<?php echo $data["path"]; ?>" height="30px" class="rounded-circle">
                                <?php } ?>
                            </td>
                            <td><?php echo $data["admin_email"] ?></td>
                            <td><?php echo $data["s_name"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end container my-2 col-12">
                    <button class="btn btn-dark  col-md-2 col-lg-2 col-sm-6" onclick="printDiv();"><i class="bi bi-printer-fill me-2"></i>Print Report</button>
                </div>
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