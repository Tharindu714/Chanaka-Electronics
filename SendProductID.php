<?php

session_start();

require "connection.php";

$email = $_SESSION["aduser"]["email"];
$product_ID = $_GET["id"];

$product_Resultset = 
Database::search("SELECT * FROM `product` 
WHERE `id` ='".$product_ID."' 
AND `admin_email`='".$email."';");

$product_num = $product_Resultset->num_rows;

if($product_num == 1){

  $product_data = $product_Resultset->fetch_assoc();
  $_SESSION["product"] = $product_data;
  echo("success");

}else{
  echo "Something Went Wrong";
}
?>