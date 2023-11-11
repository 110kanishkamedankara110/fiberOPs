<?php

session_start();
require "database.php";
if (isset($_SESSION["admin"])) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>FIBEROPTICSLK | User Profile</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="recourses\logo.svg" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>

    <body style="overflow-x: hidden;" class="bg-light p-0">
        <?php
        require "loading.php";
        ?>
        <div class="container-fluid p-0">
            <div class="row align-items-start">
                <!--head-->
    	        <?php
                    require('sidemenu.php');
                ?>
                <div class="col-12 col-md-9 px-" >
                    <div class="row" style="background-color: purple;">
                        <div class="col-5">
                            <div class="row p-2 align-items-center">
                                <?php
                                $user = database::s("SELECT * FROM `admin` WHERE `email`='" . $_SESSION["admin"]["email"] . "'; ");
                                $userimg = $user->fetch_assoc();

                                ?>
                                <div class="col-md-1 col-6 mt-1 mb-1 p-0 aspect-ratio-square rounded-circle overflow-hidden">
                                    <img class="w-100 h-100 object-fit-cover" src="recourses\demoProfileImg.jpg" />
                                </div>
                                <?php
                                ?>

                                <div class="col-md-10 col-12 m-0 p-0">
                                    <div>
                                        <div class="text-white">
                                            <span class="fw-bold"><?php echo $_SESSION["admin"]["f_name"] . " " . $_SESSION["admin"]["l_name"] ?></span>
                                        </div>
                                        <div>
                                            <span class="text-white"><?php echo $_SESSION["admin"]["email"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-7">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <h3 class="text-white ">My Products</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <nav class="bg-white py-1 px-2">
                        <ol class=" d-flex flex-wrap m-0 list-unstyled rounded">
                            <li class="breadcrumb-item m-0"> <a href="adminpannel.php" class="m-0">Admin Pannel</a>
                            </li>

                            <li class="breadcrumb-item active m-0">
                                <a class="text-decoration-none text-black-50 m-0" href="#">My Products</a>
                            </li>
                        </ol>
                    </nav>
                        <!--head-->
                <div class="col-12">
                    <div class="row align-items-start justify-content-between">
                        <!--sortings-->
                        <div class="col-10 mx-auto  col-lg-3 mt-3  rounded bg-white border" style="border: solid purple">
                            <div class="row">
                                <div class="col-10 mt-3 fs-5">

                                    <div class="col-12 text-center">
                                        <label class="form-label fw-bold fs-4 mb-0">Filters</label>
                                    </div>

                                    <!-- <div class="row">
                                                <div class="col-10">
                                                    <input type="text" id="s" class=" form-control" placeholder="Search" />
                                                </div>
                                                <div class="col-1">
                                                    <label class="form-label fs-4 "><i class="bi bi-search"></i></label>
                                                </div>
                                            </div> -->
                                    <div class="input-group align-items-baseline justify-content-center my-3">
                                        <div class="form-outline w-75">
                                            <input id="s" type="search" id="form1" class="form-control m-0" />
                                        </div>
                                        <button id="search-button" type="button" class="btn btn-primary m-0" onclick="addfilters();">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>


                                    <label class="form-label fw-bold mb-1 small">Active Time</label>

                                    <div class="col-12">
                                        <hr width="80%" class="mt-0 mb-2" />
                                    </div>
                                    <div class="col-12" style="font-size: 14px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="n">
                                            <label class="form-check-label" for="n">
                                                New to Old
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="o">
                                            <label class="form-check-label" for="o">
                                                Old to New
                                            </label>
                                        </div>
                                    </div>

                                    <label class="form-label fw-bold small mt-3">By Quentity</label>

                                    <div class="col-12">
                                        <hr width="80%" class="mt-0 mb-2" />
                                    </div>
                                    <div class="col-12" style="font-size: 14px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="l">
                                            <label class="form-check-label " for="l">
                                                Low to Heigh
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="flexRadioDefault" id="h">
                                            <label class="form-check-label " for="h">
                                                Heigh to Low
                                            </label>
                                        </div>
                                    </div>


                                    <label class="form-label small fw-bold mt-3">By Condition</label>

                                    <div class="col-12">
                                        <hr width="80%" class="mt-0 mb-2" />
                                    </div>
                                    <div class="col-12 " style="font-size: 14px;">
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="flexRadioDefault2" id="u">
                                            <label class="form-check-label" for="u">
                                                Used
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="flexRadioDefault2" id="bn">
                                            <label class="form-check-label " for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class=" col-12 mt-3  btn btn-success mb-1" onclick="addfilters();">Search</button>
                                        <button class="col-12 my-1 btn btn-primary" style="background-color: purple;" onclick="clr();">Clear Filters</button>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <!--sortings-->

                        <!--product-->
                        <div class="col-10 col-lg-9 bg-light mx-auto">
                            <div class="row mt-0">

                                    <div class="row align-items-center justify-content-start flex-wrap g-2" id="prodiv">
                                        <?php

                                        $pronum = database::s("SELECT * FROM `product` ");
                                        $n = $pronum->num_rows;
                                        $results_per_page = 6;
                                        $pages = ceil($n / $results_per_page);

                                        if (!isset($_GET["page"])) {
                                            $pageno = 1;
                                        } else {
                                            $pageno = $_GET["page"];
                                        }

                                        $page_first_result = ($pageno * $results_per_page) - 6;
                                        $product = database::s("SELECT * FROM `product`   LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ; ");
                                        $psrn = $product->num_rows;

                                        for ($p = 0; $p < $psrn; $p++) {
                                            $item = $product->fetch_assoc();
                                            $img2 = database::s("SELECT * FROM `images` WHERE `product_id`='" . $item["id"] . "'; ");
                                            $imglink = $img2->fetch_assoc();
                                        ?>

                                            <?php

                                            ?>
                                            <div class="card mb-2 col-6 col-md-4 col-lg-3 mx-1  ">
                                            <div class="form-check form-switch mb-0">
                                                                <?php
                                                                if ($item["status_id"] == "2") {
                                                                ?>
                                                                <label style="font-size: 12px;" class="form-check-label tw-bold" for="<?php echo "flexSwitchCheckDefault" . $p ?>" id="<?php echo "lab" . $p ?>">Make Your Product Active</label>
                                                                    <input checked class="form-check-input" type="checkbox" role="switch" id="<?php echo "flexSwitchCheckDefault" . $p ?>" onchange="changestatus(<?php echo $item['id'] ?>,'<?php echo 'flexSwitchCheckDefault' . $p ?>','<?php echo 'lab' . $p ?>')">
                                                                    
                                                                <?php
                                                                } else {
                                                                ?>
                                                                     <label style="font-size: 12px;" class="form-check-label tw-bold" for="<?php echo "flexSwitchCheckDefault" . $p ?>" id="<?php echo "lab" . $p ?>">Make Your Product Deactive</label>
                                                                    <input class="form-check-input" type="checkbox" role="switch" id="<?php echo "flexSwitchCheckDefault" . $p ?>" onchange="changestatus(<?php echo $item['id'] ?>,'<?php echo 'flexSwitchCheckDefault' . $p ?>','<?php echo 'lab' . $p ?>')  ">
                                                                <?php
                                                                }

                                                                ?>


                                                            </div>
                                                <div class="row justify-content-around m-0">
                                                    <div class="col-md-4 mt-4 aspect-ratio-square">
                                                        <img src="<?php echo $imglink["code"] ?>" class="w-100 h-100 object-fit-cover">
                                                    </div>
                                                    <div class="col-md-7 text-left p-0">
                                                        <div class="card-body m-0 p-0">
                                                            <h6 class="card-title mb-1"><?php echo $item["title"] ?></h6>
                                                            <span class="card-text text-primary small"><?php echo "Rs " . $item["price"] ?></span><br />
                                                            <span class="card-text text-success"><?php echo $item["qty"] . " Items Left" ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 m-0">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-12 ">
                                                                        <a href="updateproduct.php?id=<?php echo $item["id"] ?>" class="btn btn-success d-grid" style="font-size: 12px;">Update Product</a>

                                                                    </div>
                                                                    <!-- <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                                                        <a class="btn btn-danger d-grid" style="font-size: 12px;" onclick="deletemodel(<?php echo $item['id'] ?>);">Delete Product</a>

                                                                    </div> -->
                                                                </div>
                                                            </div>
                                            </div>

                                        <?php
                                        }


                                        ?>







                                    </div>
                                
                            </div>

                        </div>

                        <!--product-->
                    </div>
                </div>
                  <!--pagination-->
                  <div class="col-12 mb-3">
                    <div class="row">

                        <div class="pagination justify-content-center">
                            <?php
                            if ($pageno == 1) {
                            ?>
                                <a href="#" class="d-none">&laquo;</a>
                            <?php
                            } else {
                            ?>
                                <a href="sellerproductview.php?page=<?php echo $pageno - 1 ?>"><i class="bi bi-caret-left-fill"></i></a>
                            <?php
                            }
                            ?>



                            <?php
                            for ($pn = 1; $pn <= $pages; $pn++) {
                                if ($pn == $pageno) {
                            ?>
                                    <a href="sellerproductview.php?page=<?php echo $pn ?>" class="active"><?php echo $pn ?></a>
                                <?php
                                } else {
                                ?>
                                    <a href="sellerproductview.php?page=<?php echo $pn ?>"><?php echo $pn ?></a>

                            <?php
                                }
                            }
                            ?>

                            <?php
                            if ($pageno == $pages) {
                            ?>
                                <a href="#" class="d-none">&raquo;</a>
                            <?php
                            } else {
                            ?>
                                <a href="sellerproductview.php?page=<?php echo $pageno + 1 ?>"><i class="bi bi-caret-right-fill"></i></a>
                            <?php
                            }
                            ?>

                        </div>


                    </div>
                </div>
                <!--pagination-->

                </div>

            







              
                <!--model-->
                <div class="modal fade" id="deletemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are You Shure To Delete This Product
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="delbut">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--model-->
                <!--footer-->
                <?php
                require "footer.php";

                ?>
                <!--footer-->
            </div>
        </div>


























        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    </body>

    </html>
<?php



} else {
    header("location:index.php");
}












?>
<?php



















?>