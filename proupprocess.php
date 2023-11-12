<?php
require "database.php";
$cat=$_POST["c"];
$bra=$_POST["b"];
$mod=$_POST["m"];

$t = $_POST["t"];

$con=$_POST["co"];

$col=$_POST["col"];

$proid = $_POST["pro"];

$qty = (int)$_POST["qty"];

$pri=$_POST["p"];

$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$desc = $_POST["desc"];



if (isset($_FILES["img0"])) {
    $allowimgext = array("image/jpg", "image/jpeg", "image/png", "image/svg");
    
    $img0 = $_FILES["img0"];
    $ext = $img0["type"];

    if (!in_array($ext, $allowimgext)) {
        echo "Plese Select Valid Image";
    } else {






        
        $proimg = database::s("SELECT * FROM `images` WHERE  `product_id`='" . $proid . "' ;");
        $imgnr = $proimg->num_rows;
        for ($v = 0; $v < $imgnr; $v++) {
            
            $co = $proimg->fetch_assoc();
            unlink($co["code"]);
        }
    }



    database::iud("DELETE  FROM `images` WHERE `product_id`='" . $proid . "'; ");

    $code = "productimages//" . uniqid() . $img0["name"];

    move_uploaded_file($img0["tmp_name"], $code);
    database::iud("INSERT INTO `images` (`code`,`product_id`)  VALUES ('" . $code . "','" . $proid . "') ;");
  
    for ($i = 1; $i <= 2; $i++) {

        if (isset($_FILES["img" . $i])) {
            $code2 = "productimages//" . uniqid() . $_FILES["img" . $i]["name"];
            move_uploaded_file($_FILES["img" . $i]["tmp_name"], $code2);
            database::iud("INSERT INTO `images` (`code`,`product_id`)  VALUES ('" . $code2 . "','" . $proid . "') ;");
        }
    }
}









$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");
$state = 2;
$useremail = "110kqnishkamedankara110@gmail.com";



if (empty($t)) {
    echo "Enter Product Title";
} else if (strlen($t) >= 100) {
    echo "Title must be less Than 100 Charactors";
} else if (empty($qty)) {
    echo "Plese Add The Quantity";
} else if (!is_int($qty)) {
    echo "Invalid Quantity";
} else if ($qty == 0 || $qty == "e") {
    echo "Plese Add The Quantity";
} else if (empty($dwc)) {
    echo "Enter Deliver Cost";
} else if (!is_int($dwc)) {
    echo "Plese Enter Valid Price";
} else if (empty($doc)) {
    echo "Enter Deliver Cost";
} else if (empty($pri)){
    echo "Enter Price";

} else if (!is_int($doc)) {
    echo "Invalid Deliver Price";
} else if (empty($desc)) {
    echo "Enter Product Description";
} else {



    database::iud("UPDATE `product` 
    SET `title`='" . $t . "',`qty`='" . $qty . "',`description`='" . $desc . "'
    ,`delivery_fee_colombo`='" . $dwc . "',`delivery_fee_other`='" . $doc . "',
     `price`='".$pri."',`color_id`='".$col."',`model_id`='".$mod."'
     ,`brand_id`='".$bra."',`category_id`='".$cat."',`condition_id`='".$con."'
    
     WHERE `id`='" . $proid . "'; ");








    echo "sucess";
}
