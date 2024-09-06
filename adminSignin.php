<!DOCTYPE html>
<?php
include "connection.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Chanaka Electronics Admin Login </title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />

</head>

<body class="body2">

    <div class="container-fluid vh-100 d-flex justify-content-center align-content-center" style="background-color: rgba(0, 0, 0, 0.10);">
        <div class="row d-flex align-content-center justify-content-center">

            <div class="col-lg-6 mx-3 d-lg-block logo"></div>

            <div class="col-10 col-lg-5">
                <div class="row g-2 d-flex justify-content-center  mx-2 rounded-4" style="background-color: rgba(43, 45, 66, 0.93);">

                    <div class="col-12 d-flex justify-content-center">
                        <p class="title02">Admin SignIn</p>
                    </div>

                    <div class="col-10">
                        <label class="form-label f1" style="color: white;">Enter Your Email</label>
                        <input type="email" class="form-control" placeholder="Enter Valid Email Address" id="e" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;" />
                    </div>


                    <div class="col-10  d-grid mt-2">
                        <button class="btn f2" style="background-color: #0073e6; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset; " onclick="adminVerification();">Send Verification Code</button>
                    </div>

                    <div class="col-10 d-grid mt-2 mb-4">
                        <button class="btn f2"style="background-color: rgba(43, 45, 66, 0.68); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;"  onclick="window.location='index.php'">Back to Customer login</button>
                    </div>
                </div>
            </div>


            <!-- modal -->
            <div class="modal" tabindex="-1" id="veriFicationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: rgba(43, 45, 66, 0.93);">
                            <h5 class="modal-title text-light fw-bold">Admin Verification</h5>
                            <button type="button" class="btn-close border border-2 border-primary text-light" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3 col-10 offset-1">
                            <label class="form-label fw-bold f1 text-dark">Enter Your Verification Code</label>
                            <input type="text" class="form-control " id="vCode">
                        </div>
                        <div class="modal-footer" style="background-color: rgba(43, 45, 66, 0.93);">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: rgba(209, 0, 36, 0.81); box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">Close</button>
                            <button type="button" class="btn btn-primary" style="background-color: #0073e6; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

            <!-- footer -->
            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2024 chanakaElectronics.com || All Right Reserved</p>
            </div>
            <!-- footer -->
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>


</html>