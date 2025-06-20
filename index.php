<?php
require "database.php";
$cpronr = 0;
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>FIBEROPTICSLK | Home</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <meta charset="utf-8">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--ROBOTO FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100;1,400;1,900&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class=" py-10 w-100">
 <?php
            require('loading.php');
            ?>
        <?php

        require "header.php";
        ?>


        <div class="w-100 m-0 p-10 p-md-0">

            <?php
            require('TopNav.php');
            ?>
        </div>

        <!--slide-->


        <div class="col-12 d-flex flex-md-row flex-column-reverse align-items-stretch bg-f5f5f5 justify-content-around px-md-5 py-3 gap-3">
            <!-- <div class="py-5 py-md-1 px-2">
                <h1>Your total <br>FTTX solutions</h1>
                <p>We are committed to bringing the world into a tightly connected network,
                    <br>to drive it towards innovations for sustainability
                </p>

            </div> -->
            <div class="col-md-3 col-12 bg-white rounded-3 p-3">
                <h6>Categories</h6>
                <?php


                $result = database::s("SELECT * FROM `category`");
                $n = $result->num_rows;
                for ($i = 0; $i < $n; $i++) {
                    $r = $result->fetch_assoc();

                ?> <p style="cursor: pointer;" class="mb-0 custom-hover" onclick='catLoad(<?php echo $r["id"] ?>)'><i class="fa-solid fa-caret-right" > </i>  <?php echo $r["name"]; ?></p></br>
                <?php
                }
                ?>

            </div>
            <div class="col-md-9 col-12 mx-auto">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade w-100 rounded-xl" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner w-100" style="max-height: 350px;">
                        <div class="carousel-item active rounded rounded-3 overflow-hidden relative" style="max-height: 350px;">
                            <img src="https://icms-image.slatic.net/images/ims-web/84d7c08e-bf32-4014-9046-48594b6f36db.webp?scm=1003.4.icms-zebra-100031632-2885430.OTHER_6502839463_7755450" class="w-100 h-100 object-fit-cover" alt="..." style="max-height: 350px;">
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div> -->
                        </div>
                        <div class="carousel-item rounded rounded-3 overflow-hidden relative" style="max-height: 350px;">
                            <img src="https://icms-image.slatic.net/images/ims-web/be2d7db4-b8da-43f1-bc9b-0dc3a31734dd.webp?scm=1003.4.icms-zebra-100031632-2885430.OTHER_6502839464_7755450" class="w-100 h-100 object-fit-cover" alt="..." style="max-height: 350px;">
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div> -->
                        </div>
                        <div class="carousel-item rounded rounded-3 overflow-hidden relative" style="max-height: 350px;">
                            <img src="https://icms-image.slatic.net/images/ims-web/2f3d875d-3ffc-42b6-a701-f78ff6667b23.webp?scm=1003.4.icms-zebra-100031632-2885430.OTHER_6502839456_7755450_1200x1200.jpg" class=" w-100 h-100 object-fit-cover" alt="..." style="max-height: 350px;">
                            <!-- <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div> -->
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        <!-- <div class="pt-1 pb-1 px-1 bg-f5f5f5">
            <div class="d-flex align-items-center justify-content-between bg-white p-2 ">
                <h6 class="text-orange mb-0">On Sale Now</h6>
                <a href="" class="px-2 bg-white py-2 border-orange fs-6 text-dark" style="font-size: 12px !important;">SHOW MORE</a>
            </div>
        </div> -->

        <!--slide-->
        <div id="proview">
            <div class="row align-items-center justify-content-center mx-auto" style="row-gap: 10px;box-sizing: border-box;">

                <?php

                $page = 1;

                $limit = 20;
                $ofs = ($page * $limit) - $limit;
                //                 $products = database::s("SELECT `product`.`id`,`category_id`,`category`.`name` 
                // AS `catagory`,`brand`.`name` 
                // AS `brand`,`model`.`name` 
                // AS `model`,`title`,`condition`.`condition` 
                // AS `condition`,`color`.`name` 
                // AS `color`,`qty`,`price`,`delivery_fee_colombo`,`delivery_fee_other`,`description` 
                // FROM `product` INNER JOIN `category` ON `product`.`category_id`=`category`.`id` 

                // INNER JOIN `model` ON `product`.`model_id`=`model`.`id` 
                // INNER JOIN `brand` ON `brand`.`id`=`product`.`brand_id` 
                // INNER JOIN `color` ON `color`.`id`=`product`.`color_id` 
                // INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE  `status_id`!='2' LIMIT " . $limit . " OFFSET " . $ofs . " ;");


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
 INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE  `status_id`!='2';");



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
INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE  `status_id`!='2' ;");

                $pnr = $productsno->num_rows;
                $nr = $products->num_rows;
                $pages = ceil($pnr / $limit);   

                for ($i = 0; $i < $nr; $i++) {
                    $pro = $products->fetch_assoc();
                    $im = database::s("SELECT * FROM `images` WHERE `product_id`='" . $pro["id"] . "'; ");
                    $imgpath = $im->fetch_assoc();
                    $nwl = 0;
                    if (isset($_SESSION["user"])) {
                        $wl = database::s("SELECT * FROM `watchlist`  WHERE `product_id`='" . $pro["id"] . "' AND `user_email`='" . $_SESSION["user"]["email"] . "' ;");
                        $nwl = $wl->num_rows;
                    }
                ?>

                    <div onclick="window.location='singleproductview.php?id=<?php echo $pro['id']; ?>'" class="col-12 m-3 item-box p-0 border-none  card shadow shadow-sm rounded  mt-1 mb-1 ms-1">
                        <div class="item-img-container rounded overflow-hidden">
                            <img src="<?php echo $imgpath["code"]; ?>" class="w-100 h-100 object-fit-cover">
                        </div>

                        <div class="card-body px-2">
                            <?php
                            $h = "heart" . $pro["id"];
                            if ($nwl == 1) {
                            ?>
                                <button onclick="addwatchlist(<?php echo $pro['id'] ?>);" class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h; ?>" class="far fa-heart h6 mb-0" aria-hidden="true"></i></button>
                            <?php
                            } else {
                            ?>
                                <button onclick="addwatchlist(<?php echo $pro['id'] ?>);" class="text-danger mt-1 fs-4 fav-icon p-1 rounded-circle"><i id="<?php echo $h; ?>" class="far fa-heart h6 mb-0 " aria-hidden="true"></i></button>

                            <?php
                            }
                            ?>
                            <span class="card-text text-dark text-sm h-25" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $pro["title"] ?></span><br />
                            <span class="card-text text-orange text-sm">Rs: <?php echo number_format($pro["price"])?> </span><br />
                            <?php
                            if ($pro["qty"] > 0) {

                            ?>
                                <button onclick="addtocart(<?php echo $pro['id'] ?>,<?php echo $pro['qty'] ?>);" class="btn-outlined">Add to Cart</button>
                            <?php
                            } else {
                            ?>
                                <button style="background-color: black;color: white;" class="btn-outlined" disabled>Out Of Stock</button>

                            <?php
                            }
                            ?>
                        </div>
                    </div>

                <?php

                }

                ?>
                <!-- <div class="col-12 m-3">
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
                </div> -->
            </div>
        </div>

    </div>
    <!--footer-->
    <?php
    require "footer.php"
    ?>
    <!--footer-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>

    </script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js" ></script>

</body>

</html> 