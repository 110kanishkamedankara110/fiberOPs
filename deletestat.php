<?php
require "database.php";
$id=$_POST["id"];
$q="DELETE FROM `order_status` WHERE `id`='".$id."'";
database::iud($q);

?>