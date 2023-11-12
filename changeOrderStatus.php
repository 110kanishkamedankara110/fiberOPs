<?php
require "database.php";
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$id=$_POST["id"];
$status=$_POST["status"];

if(empty($status)){
 
    echo "Enter Status";

}else{
    database::iud("INSERT INTO `order_status` (`status`,`invoice_id`,`time`) VALUES ('".$status."','".$id."','".$date."')");
}
?>