<div class="col-md-3 col-12" id="sideMenu">
                    <div class="row">

                        <div class="align-items-start bg-dark col-12 text-center">
                            <div class="row g-1">
                                <button class="col-12 text-white bg-transparent fs-4 mb-0 d-none d-lg-block text-right" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></button>
                                <div class="col-12 mt-2">
                                    <h5 class="text-white"><?php echo $_SESSION["admin"]["f_name"] . " " . $_SESSION["admin"]["l_name"] ?></h5>
                                    <hr class="border border-1 border-white" />
                                </div>
                                <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column text-left">
                                        <a style="font-family: 'Quicksand';" class="nav-link active fs-6" aria-current="page" href="#">Dashboard</a>
                                        <a style="font-family: 'Quicksand';" class="nav-link fs-6" href="manageusers.php">Manage Users</a>
                                        <a style="font-family: 'Quicksand';" class="nav-link fs-6" href="manageproduct.php">Manage Products</a>
                                        <a style="font-family: 'Quicksand';" class="nav-link fs-6"  href="sellerproductview.php">Products</a>
                                        <a style="font-family: 'Quicksand';" class="nav-link fs-6"  href="myselling.php">Sold</a>

                                 
                                        <p style="font-family: 'Quicksand';" style="cursor: pointer !important;"  onclick="gotoaddproduct();" class="nav-link fs-6" href="">Add Products</p>
                                        
                                      
                                    </nav>
                                </div>
                                <div class="col-12 mt-3">
                                    <hr class="border border-1 border-white" />
                                    <h4 class="text-white">Selling History</h4>
                                    <hr class="border border-1 border-white" />
                                </div>
                                <div class="col-12 mt-3 d-grid">
                                    <label class="form-label text-white fw-bold">From Date</label>
                                    <input id="fromdate" class="form-control" type="date" />
                                    <label class="form-label text-white mt-2">To Date</label>
                                    <input id="todate" class="form-control " type="date" />
                                    <a class="btn btn-primary mt-2" id="historylink" onclick="dailysellings();">View Sellings</a>
                                    <!-- <hr class="border border-1 border-white" />
                                    <h4 class="text-white" style="cursor:pointer" onclick="dailysellings()" >Daily Sellings</h4> -->
                                    <hr class="border border-1 border-white" />
                                    <button class="btn btn-danger" onclick="window.location='adminsignout.php'">Sign Out</button>
                                    <hr class="border border-1 border-white" />
                                </div>
                            </div>
                        </div>

                    </div>
                </div>