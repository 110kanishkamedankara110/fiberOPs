
<div class="row bg-white align-items-center">
    <div class="col-lg-1 ml-0 col-12 logologo offset-lg-1 mb-1 mt-1 mb-lg-0">
        <a href="index.php"><img src="recourses/logo.png" class="w-100 h-100 object-fit-contain" alt="logo"></a>
    </div>
    <div class="col-lg-6 mb-0 mb-md-0 col-12">
        <div class="input-group input-group-lg">
            
            <!--Search Field-->
            <div class="col-12 mb-0 mb-md-0 p-3">
                <div class="search border border-1 border-secondary rounded-lg">
                    <input type="text" class="form-control border-none" id="basic_search_search" placeholder="Search">
                    <button class=" m-0" onclick="basic_search();"><i class="fa fa-search"></i></button>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 mb-4 mb-md-0 col-lg-2" style="text-align: center;">
        <!-- <a href="advane.php" class="link-secondary link1">Advanced</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="link-secondary link1 bg-transparent" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-filter mr-1"></i>Filter
        </button>
    </div>
    <div class="col-12 mb-4 mb-md-0 col-lg-2" style="text-align: center;">
        <a href="/HelpAndcCntact.php" type="button" class="text-orange link1 bg-transparent">
        <i class="fa-solid fa-phone mr-1"></i>Contact
        </a>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Advanced Search Options</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- ADVANCED SEARCH FORM CONTENT -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 mt-3 mb-2">
                                    <input type="text" id="k" class="form-control fw-bold" placeholder="Type Keyword To Search">
                                </div>
                                <!-- <div class="col-12 col-lg-2 mt-3 mb-2">
                                                    <button class="btn btn-primary sb1 " onclick="advsearch('1');">Search</button>
                                                </div> -->
                                <div class="col-12">
                                    <hr class="border border-primary border-3" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-12 mb-3">
                                            <select id="c" class="form-select">
                                                <option value="0">Select Category</option>
                                                <?php
                                                $cat = database::s("SELECT * FROM `category`;");
                                                $catn = $cat->num_rows;
                                                for ($i = 0; $i < $catn; $i++) {
                                                    $catagory = $cat->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $catagory["id"] ?>"><?php echo $catagory["name"] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <select id="b" class="form-select">
                                                <option value="0">Select Brand</option>
                                                <?php
                                                $bra = database::s("SELECT * FROM `brand`;");
                                                $bran = $bra->num_rows;
                                                for ($i = 0; $i < $bran; $i++) {
                                                    $brand = $bra->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand["id"] ?>"><?php echo $brand["name"] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-12 mb-3">
                                            <select id="m" class="form-select">
                                                <option value="0">Select Model</option>
                                                <?php
                                                $mod = database::s("SELECT * FROM `model`;");
                                                $modn = $mod->num_rows;
                                                for ($i = 0; $i < $modn; $i++) {
                                                    $model = $mod->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model["id"] ?>"><?php echo $model["name"] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="d-none col-lg-6 col-12 mb-3">
                                            <select id="con" class="form-select">
                                                <option value="0">Select Condition</option>
                                                <?php
                                                $con = database::s("SELECT * FROM `condition`;");
                                                $conn = $con->num_rows;
                                                for ($i = 0; $i < $conn; $i++) {
                                                    $condition = $con->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $condition["id"] ?>"><?php echo $condition["condition"] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="d-none col-lg-6 col-12 mb-3">
                                            <select id="colo" class="form-select">
                                                <option value="0">Select color</option>
                                                <?php
                                                $col = database::s("SELECT * FROM `color`;");
                                                $coln = $col->num_rows;
                                                for ($i = 0; $i < $coln; $i++) {
                                                    $color = $col->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $color["id"] ?>"><?php echo $color["name"] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <input id="pf" type="text" class="form-control" placeholder="Price From" />
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <input id="pt" type="text" class="form-control" placeholder="Price To" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn bg-orange sb1 " onclick="advsearch('1');">Search</button>
                    <!-- <button type="button" class="btn bg-orange">Apply changes</button> -->
                </div>
            </div>
        </div>
    </div>
</div>