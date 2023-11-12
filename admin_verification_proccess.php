<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require 'database.php';

if(isset($_POST["email"])){
    $email = $_POST["email"];

    if (empty($email)){
echo "Please enter your email";
    }else {

        $adminrs = database::s("SELECT * FROM `admin` WHERE `email`='".$email."'");
        $an = $adminrs->num_rows;
        if ($an ==1){

$code = uniqid();
database::iud("UPDATE `admin` SET `verification`='".$code."' WHERE `email` = '".$email."';");

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
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'FiberOptics | Admin Verification Code';
            $bodyContent = '<h1>Your Code is :' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'success';
            } else {
                echo 'success';
            }






        }else{
            echo "You are not a valid user";
        }
        
    }

}




?>