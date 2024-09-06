<?php
$query = "SELECT * FROM `product`";

for ($x = 0; $x < $cart_num; $x++) {
    $cart_data = $cart_rs->fetch_assoc();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
    $product_data = $product_rs->fetch_assoc();

    $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $cart_data["product_id"] . "'");
    $image_data = $image_rs->fetch_assoc();

    $total = $total + ($product_data["price"] * $cart_data["qty"]);

    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $cart_data["user_email"] . "'");
    $seller_data = $seller_rs->fetch_assoc();
    $seller = $seller_data["fname"] . " " . $seller_data["lname"];

    $start_date = new DateTime($product_data["datetime_added"]);
    $tdate = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $tdate->setTimezone($tz);
    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));
    $difference = $end_date->diff($start_date);
}
