<?php
session_start();
if (isset($_SESSION["user"])) {
    require "database.php";
    $cart = database::s("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["user"]["email"] . "';");
    $cpronr = $cart->num_rows;
    $totprice = 0;
    $totship = 0;

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>FIBEROPTICSLK | cart</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="./Stylesheet/newStyles.css">
        <link rel="stylesheet" href="bootstrap.css" />
       <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <?php
        require "loading.php";
        ?>
        <div class="">
            <?php
            require "header.php";
            require('TopNav.php');
            ?>
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb mb-0">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
            <div class="row px-0 px-lg-3">
                <div class="col-12 rounded mb-lg-5">
                    <div class="row mb-3">
                        <div class="col-lg-6 col-12">
                            <label class="form-label fs-4 mb-0">Your cart <i class="bi bi-cart3 "></i> </label>
                        </div>
                        <!-- <div class="col-lg-6 col-12">
                            <div class="row justify-content-between justify-content-md-end flex-column flex-md-row gap-lg0 gap-2">
                                <div class="col-12 col-lg-6 mb-0">
                                    <input type="text" class="form-control mb-0" id="search" placeholder="Search in Cart" />
                                </div>
                                <div class="col-12 col-lg-2 mb-0">
                                <button class="w-lg-auto w-100 btn btn-outline-primary m-0" style="background-color: white;color:purple;border:solid purple 0.1px" onmouseover="this.style.color='white';this.style.backgroundColor='purple';this.style.border='solid white 0.1px'" onmouseout="this.style.color='purple';this.style.backgroundColor='white';this.style.border='solid purple 0.1px'" onclick="searchcart();">Search</button>
                                </div>
                            </div> 
                        </div> -->

                    </div>
                    <div class="row">


                        <?php

                        if ($cpronr == 0) {
                        ?>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bolder">You Have no items in your basket.</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="index.php" class="btn btn-primary" style="background-color: purple;border:white">Start Shopping</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-11 col-lg-9" id="show">
                                <?php
                                for ($i = 0; $i < $cpronr; $i++) {
                                    $pro = $cart->fetch_assoc();
                                    $products = database::s("SELECT `product`.`id`,`product`.`category_id`,`category`.`name` 
                                AS `catagory`,`brand`.`name` 
                                AS `brand`,`model`.`name` 
                                AS `model`,`title`,`condition`.`condition` 
                                AS `condition`,`color`.`name` 
                                AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description`
                                FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
                                
                                INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
                                INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
                                INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
                                INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id` 
                                INNER JOIN `user` WHERE `product`.`id`='" . $pro["product_id"] . "'  ;");

                                    $wlpro = $products->fetch_assoc();
                                    $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $wlpro["id"] . "'; ");
                                    $imgpath = $im->fetch_assoc();
                                    $ul = database::s("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["user"]["email"] . "';");
                                    $uadres = $ul->fetch_assoc();
                                    if ($uadres) {
                                        if ($uadres["location_id"] == '9') {
                                            $shipping = $wlpro["delivery_fee_colombo"];
                                        } else {
                                            $shipping = $wlpro["delivery_fee_other"];
                                        }
                                    } else {
                                        $shipping = $wlpro["delivery_fee_other"];
                                    }

                                    $totprice = $totprice + $wlpro["price"] * $pro["qty"];
                                    $totship = $totship + $shipping;
                                ?>
                                        <div class="row justify-content-center position-relative overflow-hidden p-2 border border-1 mb-3">
                                            <div class="col-md-2 col-4 item-img-container position-relative px-0 overflow-hidden" onmouseover="pop(<?php echo $pro['product_id']; ?>)" onmouseout="pop2(<?php echo $pro['product_id']; ?>)">
                                                <div class="position-absolute w-100 h-100">
                                                    <div class="tol rounded p-2 d-none" id="pop<?php echo $pro["product_id"]; ?>">
                                                        <h6 class="text-white small"><?php echo $wlpro["title"] ?></h6>
                                                        <span class="text-white small">Brand: <?php echo $wlpro["brand"] ?></span><br />
                                                        <span class="text-white small">Model: <?php echo $wlpro["model"] ?></span><br />
                                                        <span class="text-white small">Color: <?php echo $wlpro["color"] ?></span><br /><br />
                                                        <span class="text-white small"><?php echo $wlpro["description"] ?></span>
                                                    </div>
                                                </div>
                                                    <img src="<?php echo $imgpath["code"] ?>" class="img-fluid rounded-start h-100 w-100 object-fit-cover" />
                                            </div>

                                            <div class="col-lg-8 col-md-4 col-8">
                                                <div>
                                                    <h5 class="card-title mb-3"><?php echo $wlpro["title"] ?></h5>
                                                    <span class="text-black-50 small">Color : <?php echo $wlpro["color"] ?> </span>&nbsp;
                                                    &nbsp; <span class=" text-black-50 small">Condition : <?php echo $wlpro["condition"] ?></span>
                                                    <br />
                                                    <span class="text-black-50 small mb-0">Price :</span> &nbsp;
                                                    &nbsp; <span class="fw-bold text-black small mb-0">Rs. <?php echo number_format($wlpro["price"]) ?></span>
                                                    <br />
                                                    <span class=" text-black-50 small mb-0">Qty : </span>
                                                    <!-- <input disabled id="qty<?php echo $wlpro['id'] ?>" type="text" value="<?php echo $pro["qty"] ?>" class="rounded mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cartqty" /> -->
                                                    <input id="qty<?php echo $pro['id'] ?>" type="number" onchange="updateCartVal('<?= $pro['id'] ?>')" class="small rounded border-none px-3 cartqty" value="<?= $pro["qty"] ?>" min="1" max="<?php echo $wlpro["qty"] ?>" />
                                                    <br />
                                                    <span class="small text-black-50 mb-0">Delivery Fee :</span> &nbsp;
                                                    &nbsp; <span class="small text-black mb-0">Rs.<?php echo number_format($shipping); ?></span>
                                                    <br>
                                                    <span class="text-black-50 small">Seller : </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-12">
                                                <a class="btn btn-outline-success mb-md-2 m-0" href="singleproductview.php?id=<?php echo $pro["product_id"]; ?>">Pay For This</a>
                                            </div>
                                            <button class=" position-absolute top-0 w-auto" onclick="removecart(<?php echo $pro['id'] ?>)" style="right:0.5rem"><i class="fa-solid fa-xmark"></i></button>
                                            <div class="col-md-12 mt-2 mb-0">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <span class="fw-bold text-black-50 small">Requested total <i class="bi bi-exclamation-circle"></i></span>
                                                    </div> 
                                                    <div class="col-6 col-md-6 text-end">
                                                        <span class=" fs-6">Rs. <?php echo number_format(($wlpro["price"] * $pro["qty"]) + $shipping); ?> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            


                                <?php





                                }
                                ?>

                            </div>
                        <?php
                        }
                        ?>





<?php
if($totprice>=5000){
    $totship=0;
}

?>


                        <div class="col-12 col-lg-3 p-4 shadow shadow-sm" id="sum">
                            <div class="row">
                                <div class=" col-12">
                                    <label class="form-label fs-5 fw-bold">
                                        Summary
                                    </label>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="fs-6 fw-bold"> Items (<?php echo $cpronr ?>) </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold ">Rs. <?php echo number_format($totprice) ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="fs-6 fw-bold"> Shipping </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold ">Rs.<?php echo number_format($totship) ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="fs-5 fw-bold"> Total </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fs-5 fw-bold ">Rs.<?php echo number_format($totprice + $totship) ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3 d-grid mb-3">
                                        <button class="btn btn-primary fs-6 fw-bold" onclick="checkout();" style="background-color: purple;border:white">CHECKOUT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



















                
            </div>
        </div>

        <?php
                require "footer.php"
                ?>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>
<?php
} else {
    header("location:Login.php");
}
