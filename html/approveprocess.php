<?php

require "connection.php";

if (isset($_GET["fid"])) {

    $fid = $_GET["fid"];

        Database::insUpdelete("UPDATE `feedback` SET `Feed_status`= '1' WHERE `feedback`.`feed_id`='" . $fid . "'");
        echo ("Approved");

} else {
    echo ("Something went wrong.");
}
