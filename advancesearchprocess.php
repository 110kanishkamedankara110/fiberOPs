<?php


require "database.php";
if ($_POST["k"] != "") {
    $key = $_POST["k"];
    $catagory = $_POST["c"];
    $brand = $_POST["b"];
    $model = $_POST["m"];
    $condition = $_POST["con"];
    $color = $_POST["colo"];
    if ($_POST["pf"] != "") {
        if (is_numeric($_POST["pf"])) {
            $pricefrom = $_POST["pf"];
        } else {
            echo "Invalid Price From";
            $pricefrom = "";
        }
    } else {
        $pricefrom = "";
    }
    if ($_POST["pt"] != "") {
        if (is_numeric($_POST["pt"])) {
            $priceto = $_POST["pt"];
        } else {
            echo "Invalid Price To";
            $priceto = "";
        }
    } else {
        $priceto = "";
    }

    if ($catagory != "0") {
        $keyword = "%" . $key . "%";
       
       
    

        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND `category_id`='" . $catagory . "' AND  `status_id`!='2'; ");
        
    } 
    if ($brand != "0") {
      
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND `brand_id`='" . $brand . "' AND  `status_id`!='2'  ; ");
    } 
    if ($model != 0) {
        $keyword = "%" . $key . "%";
       
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND  `model_id`='" . $model . "' AND  `status_id`!='2' ; ");
    }
    if ($condition != 0) {
        $keyword = "%" . $key . "%";
       
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND `condition_id`='" . $condition . "'  AND  `status_id`!='2' ; ");
    } 
    if ($color != 0) {
        $keyword = "%" . $key . "%";
      
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND `color_id`='" . $color . "'AND  `status_id`!='2'; ");
    }
    if ($pricefrom != "" && $priceto == "") {
        $keyword = "%" . $key . "%";
       
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND `price`>'" . $pricefrom . "'AND  `status_id`!='2'; ");
    } else if ($priceto != "" && $pricefrom == "") {
        $keyword = "%" . $key . "%";
       

        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword .  "' AND `price`<'" . $priceto . "'AND  `status_id`!='2'; ");
    } else if ($pricefrom != "" && $priceto != "") {

        $keyword = "%" . $key . "%";
      
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword .  "' AND `price` BETWEEN '" . $pricefrom . "' AND '" . $priceto . "'AND  `status_id`!='2'; ");
    }

    

    if($pricefrom=="" && $priceto=="" && $catagory=="0"&& $brand=="0"&& $model=="0"&& $condition=="0" && $color=="0"){
        
        $keyword = "%" . $key . "%";
   
        $productrs = database::s("SELECT * FROM `product` WHERE `description` LIKE '" . $keyword . "' AND  `status_id`!='2'; ");
    }







    $pronr = $productrs->num_rows;
    for ($i = 0; $i < $pronr; $i++) {
        $r = $productrs->fetch_assoc();
        $img = database::s("SELECT * FROM `images` WHERE `product_id`='" . $r["id"] . "';");
        $url = $img->fetch_assoc();
        // echo $r["title"];
?>
        <div class="card mb-3 col-10 col-md-5 mt-3 m-1" style="display:inline-block;">
            <div class="row g-0">
                <div class="col-md-3 mt-4">
                    <img src="<?php echo $url["code"] ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-9 ">

                    <div class="card-body m-1">
                        <h5 class="card-title fw-bold"><?php echo $r["title"] ?></h5>
                        <span class="card-text fw-bol text-primary">Rs.<?php echo number_format($r["price"]) ?></span><br />
                        <span class="card-text fw-bol text-success">Items Left <?php echo $r["qty"] ?></span>
                        <div class="form-check form-switch mb-3">



                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="#" class="btn btn-success d-grid" style="font-size: 12px;" onclick="addtocart2(<?php echo $r['id'] ?>,<?php echo $r['qty'] ?>);">Add To Cart</a>

                                </div>
                                <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                    <a href="singleproductview.php?id=<?php echo $r["id"]; ?>" class="btn btn-danger d-grid" style="font-size: 12px;">Buy Now</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php

    } 
} else {
    echo "You Must enter a Keyword to search"; 
}
