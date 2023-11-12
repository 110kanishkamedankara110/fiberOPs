<?php
$mod=$_POST["mod"];
require "database.php";

database::iud("INSERT INTO `model` (`name`) VALUES ('".$mod."'); ");
echo "sucess";


?>