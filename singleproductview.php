<?php
session_start();



if (isset($_GET["id"])) {
    $id = $_GET["id"];
    require "database.php";
    $pro = database::s("SELECT `product`.`id`,`category`.`name` 
    AS `catagory`,`brand`.`name` 
    AS `brand`,`model`.`name` 
    AS `model`,`title`,`condition`.`condition` 
    AS `condition`,`color`.`name` 
    AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description` 
    FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
    
    INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
    INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
    INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
    INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE product.`id`='" . $id . "'; ");
    $prodet = $pro->fetch_assoc();

    if (isset($_SESSION["user"])) {
        $wl = database::s("SELECT * FROM `watchlist`  WHERE `product_id`='" . $id . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ;");
        $nwl = $wl->num_rows;
    }

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>FIBEROPTICSLK Productview</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <link rel="stylesheet" href="./stylesheet/storeStyle.css" />
        <link rel="stylesheet" href="./stylesheet/newStyles.css" />
        <!-- <link rel="stylesheet" href="stylesheet/bootstrap.css" /> -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <!--New Bootstrap V5-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <meta charset="utf-8">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap"
            rel="stylesheet">

        <link rel="icon" href="images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!--ROBOTO FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100;1,400;1,900&display=swap"
            rel="stylesheet">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>
        <?php
        require "loading.php";
        ?>
        <div class="w-100 bg-white">
            <?php
            require "header.php";
            ?>
            <div class="w-100 m-0 p-10 p-md-0">

                <?php
                require('TopNav.php');
                ?>
            </div>
            <!-- <div class="w-lg-75 w-100 mx-auto my-2">
                <nav>
                    <ol class=" d-flex flex-wrap mb-1 list-unstyled rounded">
                        <li class="breadcrumb-item ">
                            <a href="index.php" class="text-secondary"> Home </a>
                        </li>

                        <li class="breadcrumb-item active">
                            <a class="text-decoration-none text-black-50" href="#"> Single View</a>
                        </li>
                    </ol>
                </nav>
            </div> -->
            <div class="w-100 ">

                <div class="col-12 col-md-10 mx-auto mt-0 singleproduct bg-white rounded rounded-lg">

                    <div class="row align-items-start py-0">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <?php
                                $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $id . "'; ");
                                if (isset($_SESSION["user"])) {


                                    $userad = database::s("SELECT * FROM `user_has_address` INNER JOIN `location` ON `location`.`id`=`user_has_address`.`location_id` INNER JOIN `city` ON `location`.`city_id`=`city`.`id` WHERE `user_email` ='" . $_SESSION["user"]["email"] . "';  ");
                                    $city = $userad->fetch_assoc();
                                }
                                $nr = $im->num_rows;
                                for ($i = 0; $i < $nr; $i++) {
                                    $img = $im->fetch_assoc();
                                    ?>

                                    <div class="col-12 mt-1 mb-1 imim bg-f5f5f5"
                                        style="background-image: url('<?php echo $img["code"] ?>');"
                                        onclick="bm('<?php echo $img['code'] ?>');"></div>

                                    <?php
                                }

                                ?>
                            </div>
                        </div>
                        <div class="col-lg-5 order-2 order-lg-1 d-none d-lg-block">
                            <div class="d-flex flex-column align-items-center  bg-f5f5f5 p-3">
                                <div id="bm" class="col-12 mt-1 mb-1 imimim"
                                    style="background-image: url('<?php echo $img["code"] ?>');"></div>
                            </div>
                        </div>
                        <div class="col-lg-5 order-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label  mt-0 mb-0 fs-2"><?php echo $prodet["title"] ?></label>
                                        </div>
                                        <!-- <div class="col-12 mt-0 fs-5 ">
                                                    <span class="badge badge-sucess">
                                                        <i class="bi bi-star-fill text-warning"></i>&nbsp;<label class="text-black-50"> 4.5 Stars </label>&nbsp;
                                                        <label class="text-black-50">35 Ratings And 45 Reviews</label>
                                                    </span>
                                                </div> -->
                                        <div class="col-12">

                                            <?php
                                            if(isset($city)){
                                                if ($city["location_id"] == "Colombo") {
                                                    $shipping = $prodet["delivery_fee_colombo"];
                                                } else {
                                                    $shipping = $prodet["delivery_fee_other"];
                                                }
                                            }else{
                                                $shipping = $prodet["delivery_fee_other"];

                                            }
                                            
                                            ?>
                                            <label class="mt-0 fs-5  text-orange ">Rs.
                                                <?php echo number_format($prodet["price"]) . " </br> Shipping : " . number_format($shipping) ?></label>&nbsp;&nbsp;
                                        </div>

                                        <hr class="my-2" />
                                        <div class="col-12">
                                            <label class="text-black fs-6 ">
                                                <b>Warranty : </b>6 months warranty
                                            </label><br />
                                            <label class="text-black fs-6 ">
                                                <b>Return Policy : </b>1 months Return
                                            </label><br />
                                            <label class="text-dark fs-6 mb-0">
                                                <b>In Stock : </b><?php echo $prodet["qty"] ?> Items left
                                            </label><br />
                                            <hr class="my-2" />

                                            <label class="text-secondary small mb-2">
                                                <?php
                                                $res = database::s("SELECT * FROM `admin`");
                                                $em = ($res->fetch_assoc())["email"];
                                                ?>

                                            </label>
                                            <!-- <a class="mt-2 btn btn-secondary" href="">
                                                        Contact Seller
                                                    </a> -->
                                        </div>
                                        <!-- <div class="col-12">
                                                    <div class="row"> -->
                                        <!-- <div class="rounded border border-1 border-warning mt-1">
                                                            <div class="row">
                                                                <div class="col-md-2 col-sm-2">
                                                                    <img src="single product view\pricetag.png" />

                                                                </div>
                                                                <div class="col-md-10 col-sm-10">
                                                                    <label style="font-size: 12px;">
                                                                        Stand a chance to het instant 5% discount by using VISA
                                                                    </label> 
                                                                </div>
                                                            </div>
                                                        </div> -->
                                        <!-- 
                                                    </div>
                                                </div> -->
                                        <!-- <div class="col-12 mb-3"> -->
                                        <!-- <div class="row" style="margin-top:15px">
                                                        <div class="col-md-6" style="margin-top: 15px;">
                                                            <label class="fs-6 mt-1 fw-bold ">Color Options</label><br />
                                                            <button class="btn btn-primary">Black</button>
                                                            <button class="btn btn-primary">Gold</button>
                                                            <button class="btn btn-primary">Blue</button>
                                                        </div>
                                                    </div> -->
                                        <!-- </div> -->


                                        <div class="col-12">
                                            <div class="row justify-content-start">
                                                <div class="col-lg-3 col-12">
                                                    <div
                                                        class="position-relative d-flex align-items-center productqty overflow-hidden float-start rounded border-none">
                                                        <span class=" m-0 small">Qty: </span>
                                                        <input disabled style="outline: none;"
                                                            class="w-100 border-0 m-0 fs-6 fw-bold bg-white" type="text"
                                                            value="1" id="qty<?php echo $id ?>" />
                                                        <div class="position-absolute qty-buttons">
                                                            <div class=" border-none d-flex flex-column align-items-center qty-inc"
                                                                onclick="up(<?php echo $prodet['qty'] ?>,<?php echo $id ?>);">
                                                                <i class="bi bi-chevron-compact-up m-0"></i>
                                                            </div>
                                                            <div class=" border-none d-flex flex-column align-items-center qty-dec"
                                                                onclick="down(<?php echo $id ?>);">
                                                                <i class="bi bi-chevron-compact-down m-0"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-8">
                                                    <div
                                                        class="row align-items-center justify-content-lg-start justify-content-center">
                                                        <!-- Buy Button -->
                                                        <?php
                                                        if ($prodet["qty"] == 0) {
                                                            ?>
                                                            <div class="col-5 col-lg-4">
                                                                <button disabled class="btn btn-outlined d-block"
                                                                    type="submit">Out Of Stock</button>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button class=" btn bg-orange w-50 d-block mb-0"
                                                                id="payhere-payment" onclick="paynow(<?php echo $id ?>)"
                                                                type="submit">Buy now</button>
                                                            <?php
                                                        }
                                                        ?>
                                                        <!-- Add To Cart -->
                                                        <?php
                                                        if (isset($_SESSION["user"])) {
                                                            ?>
                                                            <button class="w-25 btn btn-outlined mb-0 d-block"
                                                                onclick="addtocart(<?php echo $id ?>,<?php echo $prodet['qty'] ?>)"><i
                                                                    class="bi bi-cart3 text-dark fw-bolder"></i></button>
                                                            <?php
                                                        }
                                                        ?>

                                                        <div class="w-15 text-center">
                                                            <?php
                                                            if ($prodet["qty"] == 0) {
                                                            } else {
                                                                ?>
                                                                <?php
                                                                if (isset($_SESSION["user"])) {
                                                                    $h = "heart" . $id;
                                                                    if ($nwl == 1) {
                                                                        ?>
                                                                        <a onclick="addwatchlist(<?php echo $id ?>);"
                                                                            class="text-orange mt-1 fs-4"><i id="<?php echo $h; ?>"
                                                                                class="bi bi-heart-fill text-orange bg-orange"></i></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a onclick="addwatchlist(<?php echo $id ?>);"
                                                                            class="text-orange mt-1 fs-4"
                                                                            style="background-color: white;"><i id="<?php echo $h; ?>"
                                                                                class="bi bi-heart text-orange"></i></a>
                                                                        <?php
                                                                    }
                                                                }

                                                                ?>
                                                                <?php
                                                            }


                                                            ?>

                                                        </div>


                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <a href="./HelpAndcCntact.php" class="text-xs text-left text-secondary my-2">Ask
                                            seller a question <i class="fa-regular fa-message"></i></a>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="row d-block me-0 ms-0 mt-4 mb-3 ">
                        <div class="col-md-6">
                            <span class="fs-3">Related Items</span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <?php
                        $simpro = database::s("SELECT `product`.`id`,`category`.`name` 
                        AS `catagory`,`brand`.`name` 
                        AS `brand`,`model`.`name` 
                        AS `model`,`title`,`condition`.`condition` 
                        AS `condition`,`color`.`name` 
                        AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description` 
                        FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 
                       
                        INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
                        INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
                        INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
                        INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE `brand`.`name`='" . $prodet["brand"] . "' AND product.`id`!='" . $id . "' LIMIT 5 ; ");
                        $sn = $simpro->num_rows;
                        for ($f = 0; $f < $sn; $f++) {
                            $sp = $simpro->fetch_assoc();
                            $pim = database::s("SELECT * FROM `images` WHERE `product_id`='" . $sp["id"] . "'; ");
                            $spimg = $pim->fetch_assoc();

                            if (isset($_SESSION["user"])) {
                                $wl2 = database::s("SELECT * FROM `watchlist`  WHERE `product_id`='" . $sp["id"] . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ;");
                                $nwl2 = $wl2->num_rows;
                                $h2 = "heart" . $sp["id"];
                            }

                            ?>
                            <div
                                class="col-md-6 col-12 item-box p-0 border-none  card shadow shadow-sm rounded  mt-1 mb-1 ms-1">
                                <div class="item-img-container rounded overflow-hidden">
                                    <img src="<?php echo $spimg["code"]; ?>" class="card-img-top w-100 h-100 object-fit-cover">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-0"><?php echo $sp["title"] ?></h5>
                                    <label for="qty" class="text-secondary small">Qty <?php echo $sp["qty"] ?></label>
                                    <p class="card-text text-orange mb-0">Rs.<?php echo number_format($sp["price"]) ?></p>
                                    <?php
                                    if (isset($_SESSION["user"])) {
                                    }
                                    if ($sp["qty"] == 0) {
                                        ?>
                                        <div class="d-flex align-items-center">
                                            <a class="btn bg-orange btn-sm m-0 disabled w-75">Buy Now</a>
                                            <a class="btn btn-outlined btn-sm m-0 disabled w-25"><i
                                                    class="bi bi-cart3 text-dark fw-bolder"></i></a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="d-flex gap-1 align-items-center">
                                            <a href="singleproductview.php?id=<?php echo $sp["id"]; ?>"
                                                class="btn bg-orange btn-sm m-0 w-75">Buy Now</a>
                                            <a class="btn btn-outlined btn-sm m-0 w-25"
                                                onclick="addtocart(<?php echo $sp['id'] ?>,1)"><i
                                                    class="bi bi-cart3 text-dark fw-bolder"></i></a>
                                        </div>

                                        <?php
                                        if (isset($_SESSION["user"])) {
                                            if ($nwl2 == 1) {
                                                ?>
                                                <button onclick="addwatchlist(<?php echo $sp['id'] ?>);"
                                                    class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h2; ?>"
                                                        class="far fa-heart h6 mb-0 " aria-hidden="true"></i></button>

                                                <?php
                                            } else {
                                                ?>
                                                <button onclick="addwatchlist(<?php echo $sp['id'] ?>);"
                                                    class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h2; ?>"
                                                        class="far fa-heart h6 mb-0 " aria-hidden="true"></i></button>
                                                <?php
                                            }
                                        }
                                    }



                                    ?>
                                </div>

                            </div>

                            <?php
                        }






                        ?>



                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-block me-0 ms-0 mt-4 mb-3 ">
                        <div class="col-md-6">
                            <span class="fs-3 mb-1">Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 bg-white p-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label fs-5 fw-bold">Brand</label>
                                </div>
                                <div class="col-10">
                                    <label class="form-label"><?php echo $prodet["brand"] ?></label>
                                </div>

                            </div>
                        </div>
                        <hr class="bg-f5f5f5">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label">Model</label>
                                </div>
                                <div class="col-10">
                                    <label class="form-label"><?php echo $prodet["model"] ?></label>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row  align-items-start">
                                <div class="col-2">
                                    <label class="form-label">Description</label>
                                </div>
                                <div class="col-10">
                                    <textarea disabled cols="50" rows="10"
                                        class="bg-white border-none"><?php echo $prodet["description"] ?></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>





            </div>
            <div class="col-12">
                <div class="row d-block me-0 ms-1 mb-3 mt-4">
                    <div class="col-md-6 ">
                        <span class="fs-3">Feedbacks...</span>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="row g-1">

                    <?php
                    $feedbackrs = database::s("SELECT * FROM `feedback` INNER JOIN `user` ON `user`.`email`=`feedback`.`user_email`  WHERE `product_id`='" . $id . "'");
                    $feeds = $feedbackrs->num_rows;

                    if ($feeds == 0) {
                        ?>
                        <div class="col-12">
                            <label class="form-label ms-3 text-center">There No Feedback to view</label>
                        </div>

                        <?php
                    } else {
                        for ($a = 0; $a < $feeds; $a++) {
                            $res = $feedbackrs->fetch_assoc();
                            ?>
                            <div class="col-12 col-lg-3 border border-2 mx-1 rounded border-danger">
                                <div class="row">
                                    <div class="col-12">
                                        <span
                                            class="fs-5 fw-bold text-primary"><?php echo $res["first_name"] . " " . $res["last_name"] ?></span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fs-6  fw-light text-black"><?php echo $res["feed"] ?>.</span>
                                    </div>
                                    <div class="col-12 text-end ">
                                        <span class="fs-6 text-info"><?php echo $res["date"] ?></span>
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

        </div>
        </div>
        </div>
        <?php
        require "footer.php";
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
    header("location:index.php");
}
?>