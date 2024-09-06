<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chatapp | Chanaka Electronics</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/logo.png" />
</head>

<body style="background-image:url('resources/0a755a111030c39fca13d9fa38931f20.jpg');">

    <div class="container-fluid">
        <div class="row">

            <?php include "connection.php";
            session_start();
            if (isset($_SESSION["aduser"])) {
                $mail = $_SESSION["aduser"]["email"];
            ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 py-5 px-4">
                    <div class="row overflow-hidden shadow rounded">
                        <div class="col-12 col-lg-5 px-0">
                            <div class="bg-transparent">
                                <div class="bg-transparent px-4 py-2">
                                    <div class="col-12">
                                        <h5 class="mb-0 py-1 fw-bold" style="color: #075E54;">Chatapp</h5>
                                    </div>
                                    <div class="col-12">

                                        <?php

                                        $msg_rs = Database::search("SELECT DISTINCT * FROM `chat` WHERE `toadmin`='chanakaelectro@gmail.com' ORDER BY `datetime` DESC");
                                        $msg_num = $msg_rs->num_rows;

                                        ?>

                                        <!--  -->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Received</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sent</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="message_box" id="message_box">

                                                    <?php

                                                    for ($x = 0; $x < $msg_num; $x++) {
                                                        $msg_data = $msg_rs->fetch_assoc();

                                                        $sender = $msg_data["fromuser"];

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $sender . "'");

                                                        $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $sender . "'");

                                                        $user_data = $user_rs->fetch_assoc();
                                                        $img_data = $img_rs->fetch_assoc();

                                                        if ($msg_data["status"] == 0) {
                                                    ?>
                                                            <div class="list-group rounded-0" onclick="viewMessage('<?php echo $sender; ?>');">
                                                                <a href="#" class="list-group-item list-group-item-action text-white rounded-5 mt-2" style="background-color: #075E54;">

                                                                    <div class="media">

                                                                        <?php
                                                                        if (isset($img_data["path"])) {
                                                                        ?>
                                                                            <img src="<?php echo $img_data["path"]; ?>" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <img src="resources/user.png" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <div class="me-4">
                                                                            <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                                <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                                <small class="small fw-bold"><?php echo $msg_data["datetime"]; ?></small>

                                                                            </div>
                                                                            <p class="mb-0"><?php echo $msg_data["message"]; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </a>

                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="list-group rounded-0" onclick="viewMessage('<?php echo $sender; ?>');">
                                                            <a href="#" class="list-group-item list-group-item-action text-white rounded-5 mt-2" style="background-color: transparent;">

                                                                    <div class="media">

                                                                        <?php
                                                                        if (isset($img_data["path"])) {
                                                                        ?>
                                                                            <img src="<?php echo $img_data["path"]; ?>" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <img src="resources/user.png" width="50px" class="rounded-circle">
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <div class="me-4">
                                                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                                                <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                                <small class="small fw-bold"><?php echo $msg_data["datetime"]; ?></small>

                                                                            </div>
                                                                            <p class="mb-0 text-light"><?php echo $msg_data["message"]; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </a>

                                                            </div>
                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                                <div class="message_box" id="message_box">

                                                    <?php

                                                    $msg_rs2 = Database::search("SELECT DISTINCT * FROM `chat2` WHERE `Fromadmin` = 'chanakaelectro@gmail.com' ORDER BY `datetime` DESC");
                                                    $msg_num2 = $msg_rs2->num_rows;

                                                    for ($y = 0; $y < $msg_num2; $y++) {
                                                        $msg_data2 = $msg_rs2->fetch_assoc();

                                                        $receiver = $msg_data2["touser"];


                                                    ?>

                                                        <div class="list-group rounded-0" onclick="viewMessage('<?php echo $receiver; ?>');">
                                                            <a href="#" class="list-group-item list-group-item-action text-black rounded-0" style="background-color: #075E54;">
                                                                <div class="media">
                                                                        <img src="resources/user.png" width="50px" class="rounded-circle">

                                                                    <div class="me-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                            <h6 class="mb-0 fw-bold"> me</h6>
                                                                            <small class="small fw-bold"><?php echo $msg_data2["datetime"]; ?></small>

                                                                        </div>
                                                                        <p class="mb-0"><?php echo $msg_data2["message"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                        </div>

                                                    <?php
                                                    }

                                                    ?>

                                                </div>

                                            </div>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-7 px-0">
                            <div class="row px-4 py-5 text-white chat_box" id="chat_box">

                                <!-- view area -->


                            </div>
                            <!-- txt -->
                            <div class="col-12 px-1">
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded border-0 py-1 text-light" style="background-color: #444444; height: 45px;" placeholder="Type a message ..." id="msg_txt" />
                                        <button class="btn fs-3" style="height: 45px;" onclick="SEndAdminMsg('<?php echo $receiver; ?>');"><i class="bi bi-send-fill fs-2" style="color: #075E54;"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- txt -->
                        </div>

                    </div>
                </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php
            } else {
                header("location:html/index.php");
            }
?>