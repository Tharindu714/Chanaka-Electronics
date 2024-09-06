<?php
require "connection.php";

if (isset($_GET["id"])) {
  $invoice_id = $_GET["id"];

  $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `id` = '" . $invoice_id . "'");
  $invoice_num = $invoice_rs->num_rows;

  if ($invoice_num == 1) {

    $invoice_data = $invoice_rs->fetch_assoc();

    $title_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_data["product_id"] . "'");
    $title_data = $title_rs->fetch_assoc();

    $customer_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $invoice_data["user_email"] . "'");
    $customer_data = $customer_rs->fetch_assoc();
    $customer = $customer_data["fname"] . " " . $customer_data["lname"];

?>
    <div class="row mt-3 mb-3">

      <div class="col-2 col-md-1 col-lg-1 text-md-end text-center">
        <label class="form-label fs-6 fw-bold text-white mt-1 mb-1"><?php echo $invoice_data["id"]; ?></label>
      </div>
      <div class="col-3 col-md-4 col-lg-4 text-md-end text-center rounded-start" style="background-color: #343a40;">
        <label class="form-label fs-6 fw-bold mt-1 mb-1" style="color:#0073e6;"><?php echo $title_data["title"]; ?></label>
      </div>
      <div class="col-3 col-lg-2 d-none d-lg-block bg-dark text-end">
                <label class="form-label fs-6 fw-bold text-white mt-1 mb-1"><?php echo $customer; ?></label>
      </div>
      <div class="col-3 col-md-3 col-lg-2 text-md-end text-center" style="background-color: #343a40;">
                <label class="form-label fs-6 fw-bold mt-1 mb-1" style="color:#0073e6;">Rs.<?php echo $invoice_data["total"]; ?>.00</label>
      </div>
      <div class="col-2 col-md-2 col-lg-1 text-md-end text-center bg-dark">
                <label class="form-label fs-6 fw-bold text-white mt-1 mb-1"><?php echo $invoice_data["iqty"]; ?></label>
      </div>
      <div class="col-lg-2 col-3 bg-transparent">
        <?php
        if ($invoice_data["d_status"] == 0) {
        ?>
          <button class="btn bg-black border border-2 border-light fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle" title="Pending Confirmation" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-check-circle-fill text-light fs-4"></i>
          </button>
        <?php

        } else if ($invoice_data["d_status"] == 1) {
        ?>
          <button class="btn bg-black border border-2 border-danger fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle" title="Packaging" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-box-seam-fill text-danger fs-4"></i>
          </button>
        <?php
        } else if ($invoice_data["d_status"] == 2) {
        ?>
          <button class="btn bg-black border border-2 border-warning fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle" title="Dispatching" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-airplane-engines-fill text-warning fs-4"></i>
          </button>
        <?php
        } else if ($invoice_data["d_status"] == 3) {
        ?>
          <button class="btn bg-black border border-2 border-primary fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle" title="Shipping Status" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-truck text-primary fs-4"></i>
          </button>
        <?php
        } else if ($invoice_data["d_status"] == 4) {
        ?>
          <button class="btn bg-black border border-2 border-info fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle" title="Delivering" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-patch-check-fill text-info fs-4"></i>
          </button>
        <?php
        } else if ($invoice_data["d_status"] == 5) {
        ?>
          <button class="btn bg-black border border-2 border-success fw-bold mt-1 mb-1 text-uppercase fs-4 rounded-circle disabled" title="Completed" id="btn<?php echo $invoice_data["id"]; ?>" onclick="changeInvStatus('<?php echo $invoice_data['id']; ?>');"><i class="bi bi-emoji-laughing text-success fs-4"></i>
          </button>
        <?php
        }

        ?>
      </div>
    </div>
<?php

  } else {
    echo ("invalid Invoice ID");
  }
}
?>