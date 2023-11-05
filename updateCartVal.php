<?php
$id=$_POST["cid"];
$val=$_POST["val"];
require "database.php";

database::iud("UPDATE `cart` set `qty`='".$val."' WHERE `cart`.`id`='".$id."'");

?>