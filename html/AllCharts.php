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
        <title>Admin Panel | Chart Page</title>
        <link rel="shortcut icon" type="image/png" href="../images/logos/logo.png" />
        <link rel="stylesheet" href="../css/styles.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="../css/slick.css" />
        <link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />
        <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />
        <link rel="stylesheet" href="../style.css">
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    </head>

    <body class="overflow-x-hidden body " style="background-color: rgba(43, 45, 66, 0.91);">

        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header" style="background-color: #2b2d42">
                <div class="col-12" style="background-color: #2b2d42; height: 30px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fw-bold my-1"><a href="index.php">Back to Dashboard</a></li>
                            <li class="breadcrumb-item active text-light f4 my-1" aria-current="page">All Charts</li>
                        </ol>
                    </nav>
                </div>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="col-12 align-content-lg-stretch">
                    <div class="card overflow-hidden">
                        <div class="card-body p-2 align-content-center justify-content-center text-center" style="background-color: rgba(40, 48, 76, 1); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                            <span class="card-title mb-12 fw-semibold text-light fs-5">VARIOUS CHARTS || MOST SELLING PRODUCT</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/doughnut.png" style="width: 100px; height: 100px;" title="Doughnut Chart" onclick='window.location = "../doughnet/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/piechart.png" style="width: 100px; height: 100px;" title="Pie Chart" onclick='window.location = "../pie/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/barchart.png" style="width: 100px; height: 100px;" title="Bar Chart" onclick='window.location = "../bar/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/linechart.png" style="width: 100px; height: 100px;" title="Line Chart" onclick='window.location = "../line/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/poler.png" style="width: 100px; height: 100px;" title="Poler Chart" onclick='window.location = "../polear/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/radar-chart.webp" style="width: 100px; height: 100px;" title="Radar Chart" onclick='window.location = "../radar/MostSoldProduct.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 align-content-lg-stretch">
                    <div class="card overflow-hidden">
                        <div class="card-body p-2 align-content-center justify-content-center text-center" style="background-color: rgba(40, 48, 76, 1); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                            <span class="mb-12 fw-semibold text-light fs-5">VARIOUS CHARTS || MOST FAMOUS BUYER</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/doughnut.png" style="width: 100px; height: 100px;" title="Doughnut Chart" onclick='window.location = "../doughnet/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/piechart.png" style="width: 100px; height: 100px;" title="Pie Chart" onclick='window.location = "../pie/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/barchart.png" style="width: 100px; height: 100px;" title="Bar Chart" onclick='window.location = "../bar/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/linechart.png" style="width: 100px; height: 100px;" title="Line Chart" onclick='window.location = "../line/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/poler.png" style="width: 100px; height: 100px;" title="Poler Chart" onclick='window.location = "../polear/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/radar-chart.webp" style="width: 100px; height: 100px;" title="Radar Chart" onclick='window.location = "../radar/MostFamBuyer.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 align-content-lg-stretch">
                    <div class="card overflow-hidden">
                        <div class="card-body p-2 align-content-center justify-content-center text-center" style="background-color: rgba(40, 48, 76, 1); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                            <span class="mb-12 fw-semibold text-light fs-5">VARIOUS CHARTS || MOST REVIEWED PRODUCT</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/doughnut.png" style="width: 100px; height: 100px;" title="Doughnut Chart"  onclick='window.location = "../doughnet/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/piechart.png" style="width: 100px; height: 100px;" title="Pie Chart" onclick='window.location = "../pie/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/barchart.png" style="width: 100px; height: 100px;" title="Bar Chart" onclick='window.location = "../bar/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/linechart.png" style="width: 100px; height: 100px;" title="Line Chart" onclick='window.location = "../line/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/poler.png" style="width: 100px; height: 100px;" title="Poler Chart" onclick='window.location = "../polear/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/radar-chart.webp" style="width: 100px; height: 100px;" title="Radar Chart" onclick='window.location = "../radar/MostReviewed.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 align-content-lg-stretch">
                    <div class="card overflow-hidden">
                        <div class="card-body p-2 align-content-center justify-content-center text-center" style="background-color: rgba(40, 48, 76, 1); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                            <span class="mb-12 fw-semibold text-light fs-5">VARIOUS CHARTS || HIGHLY RECOMMANDED PRODUCT</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/doughnut.png" style="width: 100px; height: 100px;" title="Doughnut Chart" onclick='window.location = "../doughnet/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/piechart.png" style="width: 100px; height: 100px;" title="Pie Chart" onclick='window.location = "../pie/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/barchart.png" style="width: 100px; height: 100px;" title="Bar Chart" onclick='window.location = "../bar/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/linechart.png" style="width: 100px; height: 100px;" title="Line Chart" onclick='window.location = "../line/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/poler.png" style="width: 100px; height: 100px;" title="Poler Chart" onclick='window.location = "../polear/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/radar-chart.webp" style="width: 100px; height: 100px;" title="Radar Chart" onclick='window.location = "../radar/MostRECreview.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 align-content-lg-stretch">
                    <div class="card overflow-hidden">
                        <div class="card-body p-2 align-content-center justify-content-center text-center" style="background-color: rgba(40, 48, 76, 1);box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                            <span class="mb-12 fw-semibold text-light fs-5">VARIOUS CHARTS || CUSTOMER PREFERANCES</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/doughnut.png" style="width: 100px; height: 100px;" title="Doughnut Chart" onclick='window.location = "../doughnet/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/piechart.png" style="width: 100px; height: 100px;" title="Pie Chart" onclick='window.location = "../pie/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/barchart.png" style="width: 100px; height: 100px;" title="Bar Chart" onclick='window.location = "../bar/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/linechart.png" style="width: 100px; height: 100px;" title="Line Chart" onclick='window.location = "../line/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/poler.png" style="width: 100px; height: 100px;" title="Poler Chart" onclick='window.location = "../polear/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4 align-items-lg-stretch">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4" style="background-color: rgba(43, 45, 66, 0.93); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center">
                                            <img class="img-fluid rounded-circle mx-auto mb-0" src="../resources/radar-chart.webp" style="width: 100px; height: 100px;" title="Radar Chart"onclick='window.location = "../radar/mostWishlist.php"'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    header("location:html/index.php");
}
?>