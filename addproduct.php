<?php
session_start();
if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>FIBEROPTICSLK | AddProducts</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="recourses\logo.svg" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body class="bg-light">
        <?php
        require "loading.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <h3 class="h3 text-center my-3" style="color: purple;">Product Listing</h3>
                <!--addproduct-->
                <div id="addproductbox" class="px-5">
                    <!--heading-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="adminpannel.php">Admin Panel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Listiong</li>
                        </ol>
                    </nav>

                    <!--heading-->

                    <!--category,brand,model-->

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Select Product Catagory</label>
                                    </div>
                                    <div class="col-12 mb-3">

                                        <select class="form-select" id="ca">
                                            <option>Select Chatagory</option>
                                            <?php
                                            require "database.php";
                                            $result = database::s("SELECT * FROM `category`");
                                            $n = $result->num_rows;
                                            for ($i = 0; $i < $n; $i++) {
                                                $r = $result->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $r["id"] ?>"><?php echo $r["name"] ?></option>



                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Select Product Brand</label>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="form-select" id="br">
                                            <option>Select Brand</option>
                                            <?php

                                            $resbrand = database::s("SELECT * FROM `brand`");
                                            $nr = $resbrand->num_rows;
                                            for ($x = 0; $x < $nr; $x++) {
                                                $resb = $resbrand->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $resb["id"] ?>"><?php echo $resb["name"] ?></option>



                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Select Product Model</label>
                                    </div>
                                    <div class="col-12 mb-3">

                                        <select class="form-select" id="mo">
                                            <option>Select Model</option>
                                            <?php

                                            $resmodel = database::s("SELECT * FROM `model`");
                                            $nm = $resmodel->num_rows;
                                            for ($z = 0; $z < $nm; $z++) {
                                                $resm = $resmodel->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $resm["id"] ?>"><?php echo $resm["name"] ?></option>



                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                    <!--category,brand,model-->

                    <hr class="hrbreak1" />

                    <!--title-->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12 ">
                                <label class="form-label">Add a Title To Your Product</label>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control " id="ti" />
                            </div>
                        </div>
                    </div>



                    <!--title-->

                    <hr class="hrbreak1" />

                    <!--condition,color,qty-->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Select Product Condition</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select mb-2" id="con">
                                            <?php

                                            $resmodel = database::s("SELECT * FROM `condition`");
                                            $nm = $resmodel->num_rows;
                                            for ($z = 0; $z < $nm; $z++) {
                                                $resm = $resmodel->fetch_assoc();
                                            ?>
                                                <option value="<?= $resm["id"] ?>"><?= $resm["condition"] ?></option>


                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>


                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Select Product Color</label>
                                    </div>
                                    <div class="col-12">


                                        <select class="form-select" id="col">
                                            <?php

                                            $resmodel = database::s("SELECT * FROM `color`");
                                            $nm = $resmodel->num_rows;
                                            for ($z = 0; $z < $nm; $z++) {
                                                $resm = $resmodel->fetch_assoc();
                                            ?>
                                                <option value="<?= $resm["id"] ?>"><?= $resm["name"] ?></option>


                                            <?php
                                            }
                                            ?>
                                        </select>




                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Add Product Quantity</label>

                                    </div>
                                    <div class="col-12">
                                        <input type="number" class="form-control" value="0" min="0" id="qty">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--condition,color,qty-->
                    <hr class="hrbreak1" />

                    <!--cost,payment-->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label ">Cost Per Item</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" id="cost" aria-label="Amount (to the nearest rupee)">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-12">
                                        <lable class="form-label ">Approved Payment Method</lable>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="pm1 col-2 offset-2"></div>
                                            <div class="pm2 col-2"></div>
                                            <div class="pm3 col-2"></div>
                                            <div class="pm4 col-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cost,payment-->
                    <hr class="hrbreak1" />
                    <!--delivery cost-->
                    <div class="col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label ">Delivery Cost</label>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-3">
                                <label class="form-label my-1">Delivery Cost Within Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input id="dwc" type="text" class="form-control" aria-label="Amount (to the nearest rupee)">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label "></label>
                            </div>
                            <div class="col-12 offset-lg-1 col-lg-3 mt-lg-4">
                                <label class="form-lablle">Delivery Cost Out Of Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7 mt-lg-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input id="doc" type="text" class="form-control" aria-label="Amount (to the nearest rupee)">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--delivery cost-->
                    <hr class="hrbreak1" />

                    <!--product description-->
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label ">Product Description</label>
                            </div>
                            <div class="col-12">
                                <textarea id="des" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--product description-->
                    <hr class="hrbreak1" />
                    <!--product image-->
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label class="form-label ">Add Product Image</label>
                            </div>
                            <label id="iii" class=" text-center col-lg-12">
                                <img class="productimg "  id="prev" src="recourses\add product page resources\addproductimg.svg" />
                            </label>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mx-auto text-center col-lg-6" id="imd">
                                        <input multiple type="file" accept="image/*" class="d-none" id="imguploader" enctype="multipart/form-data" />
                                        <label for="imguploader" class="btn btn-primary" onclick="changeimage();">Upload</label>
                                    </div>
                                    <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                <button class="btn btn-primary">Upload</button>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product image-->
                    <hr class="hrbreak1" />
                    <!--notice-->
                    <!-- <div class="col-12 mb-3">
                        <lable class="form-label lbl1">Notice....</lable><br />
                        <lable class="form-label">We are Taking 5% of the product price from ecery product as a service charge.</lable>
                    </div> -->
                    <!--notice-->

                    <!--save button-->
                    <!-- <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                        <a href="updateproduct.php" class="btn btn-dark searchbutton">Update Product</a>
                    </div> -->
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                        <button class="btn btn-success searchbutton" onclick="addproduct();">Add Product</button>
                    </div>

                    <!--save button-->



                </div>
                <!--addproduct-->





            </div>
        </div>

        <!--footer-->
        <?php
        require "footer.php";
        ?>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>

    </body>

    </html>
<?php

} else {
    header("location:login.php");
}




?>