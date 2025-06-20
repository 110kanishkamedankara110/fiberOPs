<?php
session_start();
if (isset($_SESSION["user"])) {



    require "database.php";

    $user = $_SESSION["user"]["email"];

    $products = database::s("SELECT `cart`.`user_email`,`cart`.`qty`,`product`.`price`,`title`,`delivery_fee_colombo`,`delivery_fee_other` FROM `cart` INNER JOIN `product` ON `product`.`id`=`cart`.`product_id` WHERE `cart`.`user_email`='" . $user . "'");

    $userad = database::s("SELECT * FROM `user_has_address` WHERE `user_email` ='" . $user . "';  ");

    $nnr = $userad->num_rows;
    $cartit = $products->num_rows;
    if ($nnr >= 1) {
        $city = $userad->fetch_assoc();

        $totpri = 0;
        $totship = 0;
        $itum = "";
$currency="LKR";
        for ($i = 0; $i < $cartit; $i++) {
            $it = $products->fetch_assoc();
            $totpri = $totpri + $it["price"] * $it["qty"];
            if ($city["location_id"] == "9") {
                $totship = $totship + $it["delivery_fee_colombo"];
            } else {
                $totship = $totship + $it["delivery_fee_other"];
            }
            $itum = $itum . $it["title"] . ",";
        }

        if($totpri>=5000){
            $totship=0;
        }

        $lasttotpri = $totship + $totpri;
        $cityname = database::s("SELECT * FROM `location` 
        INNER JOIN `city` ON `location`.`city_id`=`city`.`id` WHERE `location`.`id`='" . $city["location_id"] . "';");

        $orderID = uniqid();
        $ci = $cityname->fetch_assoc();
        $usercity = $ci["name"];
        $fname = $_SESSION["user"]["first_name"];
        $lname = $_SESSION["user"]["last_name"];
        $email = $_SESSION["user"]["email"];
        $mobile = $_SESSION["user"]["mobile"];
        $address = $city["line1"] . " " . $city["line2"];
        $merchant_id="223521";
        $secret="MjAxODAxODY4ODI2Njc0OTExMDIxMjA4NzgwOTEzNzU0MDkzODQ3";
        $hash=strtoupper(
            md5(
                $merchant_id . 
                $orderID . 
                number_format($lasttotpri, 2, '.', '') . 
                $currency .  
                strtoupper(md5($secret)) 
            ) 
        );
        echo "{" . '"' . "orderid" . '"' . ":" . '"' . $orderID . '"' . "," .
            '"' . "city" . '"' . ":" . '"' . $usercity . '"' . "," .
            '"' . "items" . '"' . ":" . '"' . $itum . '"' . "," .
            '"' . "totpri" . '"' . ":" . '"' . $lasttotpri . '"' . "," .
            '"' . "fname" . '"' . ":" . '"' . $fname . '"' . "," .
            '"' . "lname" . '"' . ":" . '"' . $lname . '"' . "," .
            '"' . "email" . '"' . ":" . '"' . $email . '"' . "," .
            '"' . "hash" . '"' . ":" . '"' . $hash . '"' . "," .
            '"' . "mobile" . '"' . ":" . '"' . $mobile . '"' . "," .
            '"' . "address" . '"' . ":" . '"' . $address . '"'


            . "}";
    } else {
        echo "2";
    }
} else {



    echo "1";
}
