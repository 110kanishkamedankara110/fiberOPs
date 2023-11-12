<?php
$col=$_POST["col"];
require "database.php";

database::iud("INSERT INTO `color` (`name`) VALUES ('".$col."'); ");
echo "sucess";


?>