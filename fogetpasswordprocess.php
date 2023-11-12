<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require 'database.php';


if (isset($_POST["email"])) {
    if (empty($_POST["email"])) {
        echo "Enter Your Email";
    } else {
        $res = database::s("SELECT * FROM user WHERE `email`='" . $_POST["email"] . "';");
        $nr = $res->num_rows;
        if ($nr == 1) {
            $uni = uniqid();
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pixbin110@gmail.com';
            $mail->Password = 'omxhjrbqytxombpq';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('pixbin110@gmail.com', 'FiberOptics');
            $mail->addReplyTo('NO reply');
            $mail->addAddress($_POST["email"]);
            $mail->isHTML(true);
            $mail->Subject = 'Fogot Password';
            $bodyContent = '<h1>' . $uni . '</h1>';
            $bodyContent .= '<p>Your Verification Code</p>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent.';
            }







            database::iud("UPDATE user SET `verification_code`='" . $uni . "' WHERE `email`='" . $_POST["email"] . "';");
        } else {
            echo ("User Not Found");
        }
    }
} else {
    echo "Email Not Found";
}
