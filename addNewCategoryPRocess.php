<?php
session_start();

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["email"]) && isset($_POST["name"])) {
  if ($_SESSION["aduser"]["email"] == $_POST["email"]) {

    $cname = $_POST["name"];
    $umail = $_POST["email"];

    $category_rs = Database::search("SELECT * FROM `category` WHERE `name` LIKE '%" . $cname . "%'");
    $category_num = $category_rs->num_rows;

    if ($category_num == 0) {

      $code = uniqid();

      Database::insUpdelete("UPDATE `admin` SET `verification_code` = '" . $code . "' WHERE `email` = '" . $umail . "'");

      //Email Code

      $mail = new PHPMailer;
      $mail->IsSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'tharibro2211@gmail.com';
      $mail->Password = 'osproabgubeizhym';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->setFrom('tharibro2211@gmail.com', 'Admin has asked to add a new Category');
      $mail->addReplyTo('tharibro2211@gmail.com', 'Chanaka Electronics Admin category Verification Permission');
      $mail->addAddress($umail);
      $mail->isHTML(true);
      $mail->Subject = 'Admin has asked to add a new Category';
      $bodyContent = '<h2 style="color:blue;">Before Add the new Category You need to verify your self with given code. Your code is ' . $code . '</h2>';
      $mail->Body    = $bodyContent;

      if ($mail->send()) {
        echo "success";
      } else {
        echo 'Verification code sending failed';
      }
      //Email Code


    } else {

      echo ("This Category Already Exists");
    }
  } else {

    echo ("Invalid User");
  }
} else {

  echo ("Something Missing");
}
