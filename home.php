<?php

session_start();
if (isset($_SESSION["user"])) {
} else {
}





?>
<!DOCTYPE html>
<html>

<head>
    <title>FIBEROPTICSLK | Home</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="recourses\logo.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="stylesheet/storeStyle.css" />
    <link rel="stylesheet" href="stylesheet/newStyles.css" />
    <link rel="stylesheet" href="stylesheet/bootstrap.css" />

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
    <div class="container-fluid p-10 w-100">

        <?php
        require "database.php";
        require "header.php";
        ?>
        

        <div class="w-100 m-0 p-10 p-md-0">

            <div class="row bg-white align-items-center">
                <div class="col-lg-1 ml-0 col-12 logologo offset-lg-1 mb-4 mb-lg-0">
                    <img src="recourses/logo.png" class="w-100 h-100 object-fit-contain" alt="logo">
                </div>
                <div class="col-lg-6 mb-4 col-12">
                    <div class="input-group input-group-lg">
                        <div class="col-12 mb-1 mb-md-0 col-md-6 p-3">
                            <select class="form-select border-none" id="basic_search_select">
                                <option value="0">Select Catagory</option>
                                <?php


                                $result = database::s("SELECT * FROM `category`");
                                $n = $result->num_rows;
                                for ($i = 0; $i < $n; $i++) {
                                    $r = $result->fetch_assoc();

                                ?> <option value="<?php echo $r["id"] ?>"><?php echo $r["name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--Search Field-->
                        <div class="col-12 col-md-6 mb-3 mb-md-0 p-3">
                            <div class="search">
                                <input type="text" class="form-control border-none" id="basic_search_search" placeholder="Search">
                                <button class=" m-0" onclick="basic_search();"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 mb-4 col-lg-2" style="text-align: center;">
                    <a href="advane.php" class="link-secondary link1">Advanced</a>
                </div>
            </div>
        </div>

        <!--slide-->


        <div class="col-12 mb-3 mt-0 d-flex flex-md-row flex-column-reverse align-items-center bg-f5f5f5 justify-content-around">
            <div class="py-5 py-md-1 px-2">
                <h1>Your total <br>FTTX solutions</h1>
                <p>We are committed to bringing the world into a tightly connected network,
                    <br>to drive it towards innovations for sustainability
                </p>
                <a href="https://www.daraz.lk/shop/fiberopticslk/?spm=a2a0e.pdp.seller.1.38daqfQrqfQrtC&itemId=122177738&channelSource=pdp" class="btn" target="_blank">explore now &#8594</a>
            </div>
            <div class="w-md-50 py-0 py-md-5 ">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade " data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active rounded rounded-3 overflow-hidden">
                            <img src="https://img.freepik.com/premium-vector/mega-sale-discount-banner-set-promotion-with-yellow-background_497837-702.jpg" class="d-block w-100 object-fit-cover" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item rounded rounded-3 overflow-hidden">
                            <img src="https://img.freepik.com/premium-vector/asbtract-colorful-sales-background-concept_23-2148392386.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item rounded rounded-3 overflow-hidden">
                            <img src="https://img.freepik.com/free-vector/super-sale-horizontal-banner_52683-59532.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
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

        <!--slide-->
        <div id="proview">
            <div class="row">

                <?php

                $page = 1;

                $limit = 6;
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
INNER JOIN `condition` ON `condition`.`id`=`product`.`condition_id`  WHERE  `status_id`!='2' LIMIT " . $limit . " OFFSET " . $ofs . " ;");

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

                    <div onclick="window.location='singleproductview.php?id=<?php echo $pro['id']; ?>'" class="col-48 p-0 border-none  card shadow shadow-sm rounded  mt-1 mb-1 ms-1">
                        <div class="item-img-container rounded">
                            <img src="<?php echo $imgpath["code"]; ?>" style="width:100%;height: 100%;background-position: center;background-repeat: no-repeat;background-size: contain;">
                        </div>

                        <div class="card-body px-1">
                            <?php
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
                            <span class="card-text text-secondary text-sm"><?php echo $pro["title"] ?></span><br />
                            <span class="card-text text-orange text-sm"><?php echo $pro["price"] ?> </span><br />
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

                <?php

                }

                ?>
                <div class="col-12 mb-3">
                    <div class="row">

                        <div class="pagination justify-content-center">
                            <?php
                            if ($page == 1) {
                            ?>
                                <a href="#" class="d-none">&laquo;</a>
                            <?php
                            } else {
                            ?>
                                <a onclick="pagin2(<?php echo $page - 1 ?>,<?php echo $cat ?>)"><i class="bi bi-caret-left-fill"></i></a>
                            <?php
                            }
                            ?>



                            <?php
                            for ($pn = 1; $pn <= $pages; $pn++) {
                                if ($pn == $page) {
                            ?>
                                    <a onclick="pagin2(<?php echo $pn ?>,<?php echo $cat ?>)" class="active"><?php echo $pn ?></a>
                                <?php
                                } else {
                                ?>
                                    <a onclick="pagin2(<?php echo $pn ?>,<?php echo $cat ?>)"><?php echo $pn ?></a>

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
                                <a onclick="pagin2(<?php echo $page + 1 ?>,<?php echo $cat ?>)"><i class="bi bi-caret-right-fill"></i></a>
                            <?php
                            }
                            ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <?php
        require "footer.php"
        ?>
        <!--footer-->
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>

    </script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>