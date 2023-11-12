<?php

require "database.php";

$products = database::s("SELECT `product`.`id`,`category_id`,`category`.`name` 
AS `catagory`,`brand`.`name` 
AS `brand`,`model`.`name` 
AS `model`,`title`,`condition`.`condition` 
AS `condition`,`color`.`name` 
AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description` 
FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
 
INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE  `status_id`!='2' LIMIT 5;");


$nr = $products->num_rows;
$productsArray = [];
for ($i = 0; $i < $nr; $i++) {
    $row = $products->fetch_assoc();
    $product = new stdClass();
    $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $row["id"] . "'; ");
    $imgpath = $im->fetch_assoc();
    $product->title = $row["title"];
    $product->price = $row["price"];
    $product->description = $row["description"];
    $product->image =$imgpath["code"];
    $product->id = $row["id"];

    $productsArray[$i] = $product;
}

echo json_encode($productsArray);
