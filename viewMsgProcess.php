<?php

session_start();
include "connection.php";

$receiver_email = $_SESSION["aduser"]["email"];
$sender_email = $_GET["e"];

$msg_rs = Database::search("SELECT * FROM `chat` WHERE `fromuser`='" . $sender_email . "' OR `toadmin`='chanakaelectro@gmail.com'");
$msg_num = $msg_rs->num_rows;

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["fromuser"] == $sender_email && $msg_data["toadmin"] == 'chanakaelectro@gmail.com') {

        $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `profile_image` ON
        user.email=profile_image.user_email WHERE `email`='" . $msg_data["fromuser"] . "'");

        $user_data = $user_rs->fetch_assoc();

?>
        <!-- sender -->
        <div class="media w-75">
            <?php
            if (isset($user_data["path"])) {
            ?>
                <img src="<?php echo $user_data["path"]; ?>" width="50px" class="rounded-circle" />
            <?php
            } else {
            ?>
                <img src="resources/user.png" width="50px" class="rounded-circle" />
            <?php
            }
            ?>
            <div class="media-body me-4">
                <div class="rounded py-2 px-3 mb-2" style="background-color: #444444;">
                    <p class="mb-0 fw-bold text-light"><?php echo $msg_data["message"]; ?></p>
                </div>
                <p class="small fw-bold text-light text-end"><?php echo $msg_data["datetime"]; ?></p>
                <p class="invisible" id="rmail"><?php echo $msg_data["fromuser"]; ?></p>
            </div>

        </div>
        <!-- sender -->
<?php
    }
    if ($msg_data["status"] == 0) {
        Database::insUpdelete("UPDATE `chat` SET `status`='1' WHERE `chat_id`='" . $msg_data["chat_id"] . "'");
    }
}
?>

<?php
$msg_rs2 = Database::search("SELECT * FROM `chat2` WHERE `touser`='" . $sender_email . "' OR `Fromadmin`='chanakaelectro@gmail.com'");
$msg_num2 = $msg_rs2->num_rows;

for ($x = 0; $x < $msg_num2; $x++) {
    $msg_data2 = $msg_rs2->fetch_assoc();

    if ($msg_data2["Fromadmin"] == "chanakaelectro@gmail.com" && $msg_data2["touser"] == $sender_email) {
?>
        <!-- receiver -->
        <div class="offset-6 col-6 media text-stat justify-content-end align-items-end">
            <img src="resources/logo.png" width="50px" class="rounded-circle" />
            <div class="media-body">
                <div class="rounded py-2 px-3 mb-2" style="background-color: #075E54;">
                    <p class="mb-0 text-white"><?php echo $msg_data2["message"]; ?></p>
                </div>
                <p class="small fw-bold text-light text-end"><?php echo $msg_data2["datetime"]; ?></p>
            </div>
        </div>
        <!-- receiver -->
<?php
    }
    if ($msg_data["status"] == 0) {
        Database::insUpdelete("UPDATE `chat2` SET `status`='1' WHERE `chat2_id`='" . $msg_data2["chat2_id"] . "'");
    }
}



?>