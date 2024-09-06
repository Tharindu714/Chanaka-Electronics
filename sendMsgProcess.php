<?php

session_start();
include "connection.php";

if (isset($_SESSION["aduser"])) {

    $mail = $_POST["email"];
    $msg = $_POST["f"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

        Database::insUpdelete("INSERT INTO `chat2`(`message`,`datetime`,`status`,`Fromadmin`,`touser`) VALUES
    ('" . $msg . "','" . $date . "','1','chanakaelectro@gmail.com','" . $mail . "')");

        echo ("Message Added Successfully");
}
