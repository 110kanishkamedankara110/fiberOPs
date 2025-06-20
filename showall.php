<?php
session_start();
require "database.php";
// $cat=$_POST["cat"];
$page = $_POST["page"];

$limit = 20;
$ofs = ($page * $limit) - $limit;

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
INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE `status_id`!='2' LIMIT " . $limit . " OFFSET " . $ofs . " ;");

$productsno = database::s("SELECT `product`.`id`,`category`.`name` 
AS `catagory`,`brand`.`name` 
AS `brand`,`model`.`name` 
AS `model`,`title`,`condition`.`condition` 
AS `condition`,`color`.`name` 
AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other` 
FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE `status_id`!='2' ;");

$pnr = $productsno->num_rows;
$nr = $products->num_rows;
$pages = ceil($pnr / $limit);

for ($i = 0; $i < $nr; $i++) {
    $pro = $products->fetch_assoc();
    $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $pro["id"] . "'; ");
    $imgpath = $im->fetch_assoc();
    if (isset($_SESSION["user"])) {
        $wl = database::s("SELECT * FROM `watchlist`  WHERE `product_id`='" . $pro["id"] . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ;");
        $nwl = $wl->num_rows;
    }
?>
    <div class="d-inline-block col-5 col-lg-2  card mt-1 mb-1 ms-1" style="width: 18rem;">
    <div onclick="window.location='singleproductview.php?id=<?php echo $pro['id']; ?>'" class="col-12 item-box p-0 border-none  card shadow shadow-sm rounded  mt-1 mb-1 ms-1">
        <div class="item-img-container rounded overflow-hidden">
            <img src="<?php echo $imgpath["code"]; ?>" class="w-100 h-100 object-fit-cover">
        </div>

        <div class="card-body px-2">
            <?php
            if (isset($_SESSION["user"])) {
                if ($nwl == 1) {
            ?>
                    <button onclick="addwatchlist(<?php echo $pro['id'] ?>)" class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h; ?>" class="far fa-heart h6 mb-0" aria-hidden="true"></i></button>
                <?php
                } else {
                ?>
                    <button onclick="addwatchlist(<?php echo $pro['id'] ?>);" class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h; ?>" class="far fa-heart h6 mb-0 " aria-hidden="true"></i></button>

            <?php
                }
            }
            ?>
            <span class="card-text text-dark text-sm"><?php echo $pro["title"] ?></span><br />
            <span class="card-text text-orange text-sm">Rs. <?php echo $pro["price"] ?> </span><br />
            <?php
            if ($pro["qty"] > 0) {
                $h = "heart" . $pro["id"]
            ?>
                <button onclick="addtocart(<?php echo $pro['id'] ?>,<?php echo $pro['qty'] ?>);" class="btn-outlined">add to cart</button>
            <?php
            } else {
            ?>
                <button style="background-color: black;color: white;" class="btn-outlined" disabled>Out Of Stock</button>

            <?php
            }
            ?>
        </div>
    </div>     
    </div>

   

<?php

}

?>
<div class="col-12 m-3">
    <div class="row">

        <div class="pagination justify-content-center">
            <?php
            if ($page == 1) {
            ?>
                <a href="#" class="d-none">&laquo;</a>
            <?php
            } else {
            ?>
                <a onclick="pagin2(<?php echo $page - 1 ?>)"><i class="bi bi-caret-left-fill"></i></a>
            <?php
            }
            ?>



            <?php
            for ($pn = 1; $pn <= $pages; $pn++) {
                if ($pn == $page) {
            ?>
                    <a onclick="pagin2(<?php echo $pn ?>)" class="active"><?php echo $pn ?></a>
                <?php
                } else {
                ?>
                    <a onclick="pagin2(<?php echo $pn ?>)"><?php echo $pn ?></a>

            <?php
                }
            }
            ?>

            <?php
            if ($page == $pages) {
            ?>
                <a href="#" class="d-none">&raquo;</a>
            <?php
            } else {
            ?>
                <a onclick="pagin2(<?php echo $page + 1 ?>)"><i class="bi bi-caret-right-fill"></i></a>
            <?php
            }
            ?>

        </div>


    </div>
</div>