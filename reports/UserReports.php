<!DOCTYPE html>

<html>
<?php

session_start();
require "../connection.php";

if (isset($_SESSION["aduser"])) {

    $email = $_SESSION["aduser"]["email"];
    $rs =  Database::search("SELECT * FROM `user` INNER JOIN `gender` ON `user`.`gender_id` = `gender`.`id`
    ORDER BY `user`.`join_date` ASC");

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

    <body class="bodyreport" style="background-size: 115%;">
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
                        <li class="breadcrumb-item f4 active text-primary">User Report</li>
                        <li class="breadcrumb-item f4"><a href="userAdreessReport.php" class="text-decoration-none text-light">User Address Report</a></li>
                        <li class="breadcrumb-item f4"><a href="ProductReport.php" class="text-decoration-none text-light">Product Report</a></li>
                        <li class="breadcrumb-item f4"><a href="invoiceReport.php" class="text-decoration-none text-light">Invoice Report</a></li>
                        <li class="breadcrumb-item f4"><a href="RecentReports.php" class="text-decoration-none text-light">Recent Product Report</a></li>
                        <li class="breadcrumb-item f4"><a href="feedbackReports.php" class="text-decoration-none text-light">Feedback Report</a></li>
                        <li class="breadcrumb-item f4"><a href="HappycustomerReports.php" class="text-decoration-none text-light">Happy Customers Report</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12" id="printArea">
                <h2 class="text-center fw-bold">User Report</h2>
                <div class="table-responsive">
                    <table class="table table-hover mt-5">
                        <thead class="fw-bold">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th class="text-center">Profile Image</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">
                            <?php
                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                                $img_resultSet = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $data["email"] . "';");
                                $imgdata = $img_resultSet->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo $data["fname"] ?></td>
                                    <td><?php echo $data["lname"] ?></td>
                                    <td><?php echo $data["email"] ?></td>
                                    <td><?php echo $data["mobile"] ?></td>
                                    <td><?php echo $data["gender_name"] ?></td>
                                    <td><?php echo ($data["status"] == 1) ? "Active" : "Inactive"; ?></td>
                                    <td class="text-center">
                                        <?php if (empty($imgdata["path"])) { ?>
                                            <img src="../resources/user.png" height="30px">
                                        <?php } else { ?>
                                            <img src="../<?php echo $imgdata["path"]; ?>" height="30px" class="rounded-circle">
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-dark col-md-4 col-lg-2 col-sm-6" onclick="printDiv();"><i class="bi bi-printer-fill me-2"></i>Print Report</button>
            </div>
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