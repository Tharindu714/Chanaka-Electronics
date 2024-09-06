<?php
require "connection.php";

if(isset($_GET["id"])){

$puid1 = $_GET["id"];

$purchasing_Resultset1 = Database::search("SELECT * FROM `invoice` WHERE `id` = '".$puid1."'");
$purchasing_num1 = $purchasing_Resultset1-> num_rows;
$purchasing_data1 = $purchasing_Resultset1->fetch_assoc();

if($purchasing_num1 == 0){
  echo("Something went wrong Please try again later");
}else{
  Database::insUpdelete("UPDATE `invoice` SET `remove_status` = '2' WHERE `id` = '".$puid1."'");

  echo("success");
}

}else{
  echo("Please select a Product");
}
?>