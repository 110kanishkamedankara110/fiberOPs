<?php
$bra=$_POST["bra"];
require "database.php";

database::iud("INSERT INTO `brand` (`name`) VALUES ('".$bra."'); ");
echo "sucess";


?>