<?php
require "database.php";
$c = $_POST["c"];
$b = $_POST["b"];
$m = $_POST["m"];
$t = $_POST["t"];
$co = $_POST["co"];
$col = $_POST["col"];
$qty = (int)$_POST["qty"];
$p = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$desc = $_POST["desc"];
$img0 = $_FILES["img0"];
$count=$_POST["count"];


session_start();




$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

// $useremail =$_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"] ;

// echo $c."<br/>";
// echo $b."<br/>";
// echo $m."<br/>";
// echo $t."<br/>";
// echo $co."<br/>";
// echo $col."<br/>";
// echo $qty."<br/>";
// echo $p."<br/>";
// echo $dwc."<br/>";
// echo $doc."<br/>";
// echo $img["name"]."<br/>";

if ($c == "Select Chatagory") {
    echo "Plese Select a Chatagory";
} else if ($b == "Select Brand") {
    echo "Plese Select a Brand";
} else if ($m == "Select Model") {
    echo "Plese Select a Model";
} else if (empty($t)) {
    echo "Enter Product Title";
} else if (strlen($t) >= 100) {
    echo "Title must be less Than 100 Charactors";
} else if (empty($qty)) {
    echo "Plese Add The Quantity";
} else if (!is_int($qty)) {
    echo "Invalid Quantity";
} else if ($qty == 0 || $qty == "e") {
    echo "Plese Add The Quantity";
} else if (empty($p)) {
    echo "plese Enter Your Price";
} else if (!is_int($p)) {
    echo "Invalid Deliver Price";
} else if (empty($dwc)) {
    echo "Enter Deliver Cost";
} else if (!is_int($dwc)) {
    echo "Plese Enter Valid Price";
} else if (empty($doc)) {
    echo "Enter Deliver Cost";
} else if (!is_int($doc)) {
    echo "Invalid Deliver Price";
} else if (empty($desc)) {
    echo "Enter Product Description";
} else {
   
        
        
        $allowimgext=array("image/jpg","image/jpeg","image/png","image/svg");
        // $fileext=pathinfo($img["name"],PATHINFO_EXTENSION);
        
        // if (!in_array($fileext,$allowimgext)){
        //     echo"plese Select Valid Image";
        // }else{
        //     echo $img["name"];
        // }
        

        if (!isset($img0)){
            echo"Insert A Image";
        }else{
            $ext=$img0["type"];
            
            if(!in_array($ext,$allowimgext)){
                echo "Plese Select Valid Image";
            }else{
                database::iud("INSERT INTO product (`category_id`,`model_id`,`brand_id`,`title`,`color_id`,`price`,`qty`,`description`,`condition_id`,`date_time_added`,`delivery_fee_colombo`,`delivery_fee_other`)  VALUES
                ('".$c."','".$m."','".$b."','".$t."','".$col."','".$p."','".$qty."','".$desc."','".$co."','".$date."','".$dwc."','".$doc."') ;");
                $last_id=database::$dbms->insert_id;
                

                // move_uploaded_file($img0["tmp_name"],$code);
                // database::iud("INSERT INTO `images` (`code`,`product_id`)  VALUES ('".$code."','".$last_id."') ;");
                for ($x=0;$x<$count;$x++){
                    $code="productimages//".uniqid().$_FILES["img".$x]["name"];
                    move_uploaded_file($_FILES["img".$x]["tmp_name"],$code);
                    // $coade2="productimages//".uniqid().$_FILES["img".$x]["name"];
                    database::iud("INSERT INTO `images` (`code`,`product_id`)  VALUES ('".$code."','".$last_id."') ;");
                }

                // for($i=1;$i<=2;$i++){
                    
                //     if(isset($_FILES["img".$i])){
                //         $code2="productimages//".uniqid().$_FILES["img".$i]["name"];
                //         move_uploaded_file($_FILES["img".$i]["tmp_name"],$code2);
                //         database::iud("INSERT INTO `images` (`code`,`product_id`)  VALUES ('".$code2."','".$last_id."') ;");
                       
                //     }
                // }
                


                echo "sucess";  
            
            }
        }




        


        
        
        
        
        
        
        
        
        
        
        
        
         

}
