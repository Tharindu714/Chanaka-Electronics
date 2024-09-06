<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

  <title>E - Invoice | Chanaka Electroinics</title>

  <link rel="icon" href="resources/logo.png" />

</head>

<body class="container-fluid" style="overflow-x: hidden;">

<?php
require "connection.php";
session_start();
include "header.php";
if (isset($_SESSION["user"])) {
  $umail = $_SESSION["user"]["email"];
  $oid = $_GET["id"];

?>


    <div class="container-fluid">
      <div class="row">

        <div class="col-12">
          <hr />
        </div>

        <div class="col-12 btn-toolbar justify-content-end">
          <button class="btn btn-dark me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
          <button class="btn btn-danger me-2" onclick="pdfInvoice();"><i class="bi bi-filetype-pdf"></i> Export as a PDF</button>
        </div>

        <div class="col-12">
          <hr />
        </div>

        <div class="col-12" id="page">
          <div class="row">
            <div class="col-6">
              <div class="ms-5 invoiceheader-IMG"></div>
            </div>

            <div class="col-6">
              <div class="row">
                <div class="col-12 text-primary text-decoration-underline text-end">
                  <h2 class="text-primary">Chanaka Electronics</h2>
                </div>
                <div class="col-12 fw-bold text-end">
                  <span>Chanaka Electronics, Bandarawela</span><br />
                  <span>+94 77 8200 344</span><br />
                  <span>chanakaelectro@gmail.com</span><br />
                </div>
              </div>
            </div>

            <div class="col-12">
              <hr class="border border-1 border-primary" />
            </div>

            <div class="col-12 mb-4">
              <div class="row">
                <div class="col-6">
                  <h5 class="fw-bold text-dark">INVOICE TO : </h5>
                  <?php
                  $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ");
                  $address_data = $address_rs->fetch_assoc();
                  ?>
                  <h2 class="text-primary"><?php echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"]; ?></h2>
                  <span><?php echo $address_data["line1"] . ", " . $address_data["line2"]; ?></span><br />
                  <span><b><?php echo $umail; ?></b></span>
                </div>
                <?php
                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                $invoice_data = $invoice_rs->fetch_assoc();

                ?>

                <div class="col-6 text-end mt-4">
                  <h1 class="text-primary">INVOICE <?php echo $invoice_data["id"]; ?></h1>
                  <span class="fw-bold">Date & Time of Invoice :</span><br />
                  <span><?php echo $invoice_data["date"]; ?></span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr class="border border-1 border-secondary">
                    <th>#</th>
                    <th>Order Id & Product</th>
                    <th class="text-end">Unit Price</th>
                    <th class="text-end">QTY</th>
                    <th class="text-end">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr style="height:72px;">
                    <td class="bg-primary text-white fs-3 fw-bold"><?php echo $invoice_data["id"]; ?></td>
                    <td>
                      <span class="fw-bold text-primary text-decoration-underline p-2"><?php echo $oid ?></span><br />

                      <?php
                      $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data["product_id"] . "' ");
                      $product_data = $product_rs->fetch_assoc();
                      ?>

                      <span class="fw-bold text-primary fs-4 p-2"><?php echo $product_data["title"]; ?></span>
                    </td>
                    <td class="fw-bold fs-3 text-end pt-4 bg-secondary text-white">Rs. <?php echo $product_data["price"]; ?> .00</td>
                    <td class="fw-bold fs-3 text-end pt-4"><?php echo $invoice_data["iqty"]; ?></td>
                    <td class="fw-bold fs-3 text-end pt-4 bg-secondary text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                  </tr>
                </tbody>
                <tfoot>
                  <?php
                  $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $address_data["city_id"] . "'");
                  $city_data = $city_rs->fetch_assoc();

                  if ($city_data["district_id"] == 1) {
                    $delivery = $product_data["delivery_fee_colombo"];
                  } else {
                    $delivery = $product_data["delivery_fee_other"];
                  }
                  $t = $invoice_data["total"];
                  $g = $t - $delivery;
                  ?>
                  <tr>
                    <td colspan="3" class="border-0"></td>
                    <td class="fs-3 text-start fw-bold">SUBTOTAL <b class="text-primary">(ඔබ මෙම මුදල දැනටමත් ගෙවා අවසන්)</b></td>
                    <td class="fs-3 text-end text-primary">Rs. <b><?php echo $g; ?> .00</b></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="border-0"></td>
                    <td class="fs-3 text-start fw-bold ">Delivery fee <b class="text-danger">(ඔබ මෙම ගාස්තුව කූරියර් සේවාව සදහා ගෙවිය යුතුයි)</b></td>
                    <td class="fs-3 text-end text-danger">Rs. <b><?php echo $delivery; ?> .00</b></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="border-0"></td>
                    <td class="fs-3 text-start fw-bold">GRANDTOTAL <b class="text-success">(එවිට මේ භාණ්ඩය මිලදී ගැනීම සදහා මුළු වියදම වන්නේ.. )</b></td>
                    <td class="fs-3 text-end text-success">Rs. <b><?php echo $t; ?> .00</b></td>
                  </tr>
                </tfoot>
              </table>
            </div>

            <div class="col-4 text-center">
              <h2 class="fs1 fw-bold text-primary">Thank you!</h2>
            </div>

            <div class="col-12 border-start border-5 border-primary mt-3 mb-3 rounded" style="background-color: #e7f2ff;">
              <div class="row">
                <div class="col-12 mt-3 mb-3">
                  <span class="form-label fw-bold fs-2 text-primary">  NOTICE :</span><br />
                  <span class="form-label fs-3 fw-bold">  මේ භාණ්ඩය සදහා අදාල කූරියර් ගාස්තුව නිසි පරිදි ගෙවා ලබා ගන්න.</span>
                </div>
              </div>
            </div>

            <div class="col-12">
              <hr class="border border-1 border-primary" />
            </div>

            <div class="col-12 text-center mb-1">
              <label class="form-label fs-5 text-black-50 fw-bold">
                Invoice was created on a computer and is Valid without the signature and seal.
              </label>
            </div>

          </div>
        </div>

      <?php
    }
      ?>


      </div>

    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

  </body>

</html>