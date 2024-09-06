<?php

session_start();
include "connection.php";

if (isset($_SESSION["user"])) {

    $mail = $_SESSION["user"]["email"];
    $msg = $_POST["f"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

        Database::insUpdelete("INSERT INTO `chat`(`message`,`datetime`,`status`,`toadmin`,`fromuser`) VALUES
    ('" . $msg . "','" . $date . "','0','chanakaelectro@gmail.com','" . $mail . "')");

        echo ("Message Added Successfully");
}
