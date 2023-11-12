<?php
session_start();
if (isset($_SESSION["admin"])) {
    require "database.php";
    $cart = database::s("SELECT `product`.`id`,`product`.
    `title`,`invoice`.`date`,`invoice`.`id` 
    AS `inid`,`product_id`,`invoice`.`qty` 
    AS `invqty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description`,`invoice`.`user_email` 
    AS `uemail` ,`total`  
    FROM `invoice` 
    INNER JOIN 
    `product` ON `product`.`id`=`invoice`.`product_id`  ORDER BY `date` DESC;");
    $cpronr = $cart->num_rows;
    $totprice = 0;
    $totship = 0;

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>FIBEROPTICSLK | Sellings</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="recourses\logo.svg" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body class="bg-light">
        <?php
        require "loading.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"> <a href="adminpannel.php">Admin Panel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sellings</li>
                    </ol>
                </nav>

                <div class="col-12 bg-light">
                    <div class="row align-items-start">
                        <label class="form-label fs-4">Sellings</label>
                        <hr>

                        <?php

                        if ($cpronr == 0) {
                        ?>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bolder">You Have no Sold Items.</label>
                                    </div>

                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-11 col-lg-9 px-lg-5 px-md-1" id="show">
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < $cpronr; $i++) {

                                        $pro = $cart->fetch_assoc();
                                        $products = database::s("SELECT `product`.`id`,`invoice`.`id` 
                                        AS `inv_id`,`product`.`category_id`,`category`.`name` 
                                AS `catagory`,`mobile`,`brand`.`name` 
                                AS `brand`,`model`.`name` 
                                AS `model`,`title`,`condition`.`condition` 
                                AS `condition`,`color`.`name` 
                                AS `color`,`invoice`.`qty` AS `invqty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description`,`first_name`,`last_name`,`invoice`.`user_email` AS `uemail` ,`total` 
                                FROM `invoice` INNER JOIN `product` ON `invoice`.`product_id`=`product`.`id` 
                                INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
                                INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
                                INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
                                INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
                                INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id` 
                                INNER JOIN `user` ON `user`.`email`=`invoice`.`user_email` WHERE `invoice`.`id`='" . $pro["inid"] . "'  ;");

                                        $wlpro = $products->fetch_assoc();
                                        $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $wlpro["id"] . "'; ");
                                        $imgpath = $im->fetch_assoc();
                                        $ul = database::s("SELECT * FROM `user_has_address`  WHERE `user_email`='" . $pro["uemail"]  . "';");
                                        $uadres = $ul->fetch_assoc();
                                        if ($uadres["location_id"] == '9') {
                                            $shipping = $wlpro["delivery_fee_colombo"];
                                        } else {
                                            $shipping = $wlpro["delivery_fee_other"];
                                        }
                                        $totprice = $totprice + $wlpro["total"];
                                        $cq = "SELECT `city`.`name` AS `city`,`district`.`name` 
                                        AS `destrict`,`province`.`name` AS `province`,`postalcode` FROM `location` 
                                        INNER JOIN `city` ON `city`.`id`=`location`.`city_id` 
                                        INNER JOIN `district` ON `district`.`id`=`location`.`district_id` 
                                        INNER JOIN `province` ON `province`.`id`=`location`.`province_id` WHERE `location`.`id`='" . $uadres["location_id"] . "'";
                                        $locres = database::s($cq)->fetch_assoc();
                                    ?>

                                        <div class="card mb-3 col-12 py-3 shadow shadow-sm">
                                            <div class=" row g-0 align-items-center">
                                                <div class="col-md-12 mt-1 mb-0">
                                                    <span class="fw-bold text-black-50 small mb-0">Buyer : </span>
                                                    <span class="small mb-0"><?php echo $wlpro["first_name"] . " " . $wlpro["last_name"] ?> </span>
                                                    <hr class="my-1" />
                                                </div>
                                                <div class="col-md-2 position-relative" onmouseover="pop(<?php echo $pro['inid']; ?>)" onmouseout="pop2(<?php echo $pro['inid']; ?>)">
                                                    <div class="pa col-12">
                                                        <div class="tol rounded col-12 p-2 d-none" id="pop<?php echo $pro["inid"]; ?>">
                                                            <h3 class="text-white"><?php echo $pro["uemail"] ?></h3>
                                                            <span class="text-white">Address: <?php echo $uadres["line1"] . " " . $uadres["line2"] ?></span><br />
                                                            <span class="text-white">city: <?php echo $locres["city"] ?></span><br />
                                                            <span class="text-white">District: <?php echo $locres["destrict"] ?></span><br />
                                                            <span class="text-white">province: <?php echo $locres["province"] ?></span><br />
                                                            <span class="text-white">Postal Code: <?php echo $locres["postalcode"] ?></span><br />

                                                            <span class="text-white">Mobile: <?php echo $wlpro["mobile"] ?></span><br />

                                                            <span class="text-white">Date: <?php echo $pro["date"] ?></span><br />


                                                        </div>
                                                    </div>
                                                    <img src="<?php echo $imgpath["code"] ?>" class="w-100 h-100 object-fit-cover" />
                                                </div>

                                                <div class="col-md-5 py-0">
                                                    <div class="card-body">
                                                        <h3 class="card-title mb-0"><?php echo $wlpro["title"] ?></h3>
                                                        <span class="fw-bold text-black-50 " style="font-size: 12px;">Colour : <?php echo $wlpro["color"] ?> </span>&nbsp;
                                                        &nbsp; <span class="fw-bold text-black-50 " style="font-size: 12px;">Condition : <?php echo $wlpro["condition"] ?></span>
                                                        <br />
                                                        <span class=" text-black-50 small">Price :</span> &nbsp;
                                                        &nbsp; <span class="text-black small">Rs. <?php echo $wlpro["price"] ?></span>
                                                        <br />
                                                        <span class="fw-bold text-black-50 small">Order Status :</span>


                                                        <?php
                                                        $q = "SELECT * FROM `order_status` WHERE `invoice_id`='" . $wlpro["inv_id"] . "' ORDER BY `time` DESC";
                                                        $resst = database::s($q);
                                                        $numst = $resst->num_rows;
                                                        if ($numst != 0) {

                                                            for ($j = 0; $j < $numst; $j++) {
                                                                $rowstat = $resst->fetch_assoc();
                                                        ?>
                                                                &nbsp;<br /> <span class="fw-bold text-black my-0"><?= $rowstat["status"] ?></span> &nbsp; &nbsp; &nbsp;
                                                                <span class="fw-bold text-black my-0"><?= $rowstat["time"] ?><span class="btn btn-danger my-0 btn-sm" onclick="statusDelete('<?= $rowstat['id'] ?>')">Delete</span>
                                                                    <br />
                                                                <?php
                                                            }
                                                        } else {
                                                                ?>
                                                                &nbsp; <span class="small text-black">Processing</span>
                                                            <?php
                                                        }
                                                            ?>

                                                            <div class="col-12 col-lg-12 position-relative" id="imd">
                                                                <input placeholder="Order Status" type="text" value="" class="form-control mb-0" id="stat<?= $wlpro['inv_id'] ?>" />

                                                                <button class="btn btn-primary btn-sm my-0 position-absolute end-0 top-0 mt-1" onclick="addOrderStatus('<?= $wlpro['inv_id'] ?>');">Add</button>
                                                            </div>

                                                            <div class="input-group input-group-sm my-3">
                                                                <span class="input-group-text" id="inputGroup-sizing-sm">Quentity : </span>
                                                                <input disabled type="text" id="qty<?php echo $wlpro['id'] ?>" class="form-control" value="<?php echo $pro["invqty"] ?>" >
                                                            </div>
                                                            <!-- <input disabled  type="text"  class="rounded mt-3 input input-sm  fs-4 small px-3 cartqty" /> -->

                                                            <span class=" text-black-50 small">Delivery Fee :</span> &nbsp;
                                                            &nbsp; <span class="small text-black">Rs.<?php echo $shipping; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4">

                                                </div>
                                                <hr class="my-1" />
                                                <div class="col-md-12 ">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">

                                                            <span class="fw-bold text-black-50 fs-5">Requested total <i class="bi bi-exclamation-circle"></i></span>


                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class=" fs-5">Rs. <?php echo ($pro["total"]); ?> </span>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    <?php





                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>








                        <div class="col-12 col-lg-3 bg-white px-3 py-5 shadow shadow-sm" id="sum">
                            <div class="row">
                                <label class="form-label fs-4 ">
                                    Summary
                                </label>
                                <hr />


                                <div class="row ">
                                    <div class="col-6 text-left">
                                        <span class="fs-6 fw-bold"> Items : </span>
                                    </div>
                                    <!-- <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold ">Rs. <?php echo $totprice ?> </span>
                                            </div> -->
                                    <div class="col-6 text-right">
                                        <span class="fs-6 fw-bold"> <?php echo $cpronr ?></span>
                                    </div>

                                </div>

                                <!-- <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <span class="fs-6 fw-bold"> Shipping </span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold ">Rs.<?php echo $totship ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr /> -->

                                <div class="row">
                                    <div class="col-6">
                                        <span class="fs-6 fw-bold"> Total Sales</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold ">Rs.<?php echo $totprice ?> </span>
                                    </div>
                                </div>

                                <!-- <div class="col-12 mt-3 d-grid mb-3">
                                        <button class="btn btn-primary fs-5 fw-bold" onclick="checkout();" style="background-color: purple;border:white">CHECKOUT</button>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



















            <?php
            require "footer.php"
            ?>
        </div>
        </div>


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
