<?php
session_start();
require "database.php";
if (isset($_SESSION["admin"])) {

?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FIBEROPTICSLK | Admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="recourses\logo.svg" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="act();" class="bgbg bg-f5f5f5" style="margin: 0;">

        <?php
        require "loading.php";
        ?>

        <div class="container-fluid">
            <div class="row align-items-start justify-content-between">

                <?php
                require('sidemenu.php');
                ?>

                <div class="col-12 col-md-9">
                    <?php
                    $start_date = new DateTime("2021-10-01 00:00:00");

                    $tdate = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $tdate->setTimezone($tz);

                    $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));


                    $difference = $endDate->diff($start_date);


                    ?>

                    <div class="row">
                        <div class="col-12 mt-3 mb-3 text-white">
                            <h2 class="fw-bold">Dashboard</h2>
                        </div>
                        <div class="col-12 bg-white">
                            <div class="row">
                                <div class="col-12 col-lg-4 ">
                                    <label class="fs-6 fw-bold text-dark">Total Active Time</label>
                                </div>

                                <div class="col-12 col-lg-8 text-white" id="timetime">
                                    <label class="fs-6 fw-bold"><?php echo $difference->format("%y") . " Y " . $difference->format("%m") . " M " . $difference->format("%d") . " Days " . $difference->format("%H") . " Hours " . $difference->format("%i") . " Min " . $difference->format("%s") . " Sec " ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12">
                            <div class="row g-1 flex-wrap">

                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">
                                        <?php
                                        $today = date("Y-m-d");
                                        $thismonth = date("Y-m");
                                        $invoice = database::s("SELECT * FROM `invoice` ;");
                                        $in = $invoice->num_rows;

                                        $a = "0";
                                        $dayqty = "0";
                                        $monthqty = "0";
                                        $month = "0";
                                        $totqty = "0";
                                        for ($i = 0; $i < $in; $i++) {
                                            $ir = $invoice->fetch_assoc();
                                            $id = $ir["date"];
                                            $splitsate = explode(" ", $id);
                                            $invdate = $splitsate["0"];
                                            $totqty = $totqty + $ir["qty"];
                                            if ($invdate == $today) {
                                                $a = $a + $ir["total"];
                                                $dayqty = $dayqty + $ir["qty"];
                                            }
                                            $invmonth = explode("-", $invdate);

                                            if ($invmonth["0"] . "-" . $invmonth["1"] == $thismonth) {
                                                $month = $month + $ir["total"];
                                                $monthqty = $monthqty + $ir["qty"];
                                            }
                                        }


                                        ?>
                                        <div class="col-12 bg-primary text-white text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold mb-0">Daily Earnings</span>
                                            <hr>
                                            <br />

                                            <span class="fs-6 ">Rs. <?php echo $a ?> .00</span>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">

                                        <div class="col-12 bg-white text-black text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold">Monthly Earnings</span>
                                            <hr>
                                            <br />
                                            <span class="fs-6 ">Rs. <?php echo $month; ?> .00</span>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">

                                        <div class="col-12 bg-dark text-white text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold">Today Sellings</span>
                                            <hr>
                                            <br />
                                            <span class="fs-6 "><?php echo $dayqty; ?> Item</span>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">

                                        <div class="col-12 bg-secondary text-white text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold">Monthly Sellings</span>
                                            <hr>
                                            <br />
                                            <span class="fs-6 "><?php echo $monthqty ?> Items</span>
                                        </div>

                                    </div>
                                </div>




                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">

                                        <div class="col-12 bg-success text-white text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold">Total Sellings</span>
                                            <hr>
                                            <br />
                                            <span class="fs-6 "><?php echo $totqty ?> Items</span>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-4 px-1 dash-card">
                                    <div class="row g-1">
                                        <?php

                                        $custo = database::s("SELECT * FROM `user` ;");
                                        $users = $custo->num_rows;
                                        ?>
                                        <div class="col-12 bg-danger text-white text-center rounded hover" style="height: 150px;">

                                            <br />
                                            <span class="fs-5 fw-bold">Total Engagements</span>
                                            <hr>
                                            <br />
                                            <span class="fs-6 "><?php echo $users ?> Members</span>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12">
                            <hr>
                        </div>

                        <?php
                        $freeq = database::s("SELECT `product_id`,COUNT(`id`) AS `value` FROM `invoice` WHERE `date` LIKE '" . "%" . $today . "%" . "' GROUP BY `product_id` ORDER BY `value` DESC LIMIT 1 ; ");
                        $freqnum = $freeq->num_rows;
                        if ($freqnum == 0) {
                        } else {
                            for ($z = 0; $z < $freqnum; $z++) {
                                $frow = $freeq->fetch_assoc();
                                $product = database::s("SELECT * FROM `product` WHERE `id`='" . $frow["product_id"] . "' ;");
                                $prorow = $product->fetch_assoc();
                                $image = database::s("SELECT * FROM `images` WHERE `product_id`='" . $frow["product_id"] . "'; ");
                                $imgrow = $image->fetch_assoc();
                            }

                        ?>
                            <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold">Mostly Sold Item</label>
                                    </div>
                                    <div class="col-12">
                                        <img class="img-fluid rounded-top" src="<?php echo $imgrow["code"] ?>" alt="">
                                        <hr>
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class="fs-5 fw-bold"><?php echo $prorow["title"] ?></span>
                                        <br>
                                        <span class="fs-6"><?php echo $frow["value"] ?> Items</span>
                                        <br>
                                        <span class="fs-6">Rs. <?php echo $prorow["price"] ?> .00</span>
                                    </div>
                                    <div class="col-12">
                                        <div class="fristplace"></div>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                                <div class="row g-1">
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold">Mostly Famouse Seller</label>
                                    </div>
                                    <div class="col-12 text-center">
                                        <img class="img-fluid rounded-top" src="<?php echo $prorow["image"] ?>" style="height: 250px; margin-left: 80managepx;" alt="">
                                        <hr>
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class="fs-5 fw-bold"><?php echo $prorow["first_name"] . " " . $prorow["last_name"] ?></span>
                                        <br>
                                        <span class="fs-6"><?php echo $prorow["email"] ?></span>
                                        <br>
                                        <span class="fs-6"><?php echo $prorow["mobile"] ?></span>
                                    </div>
                                    <div class="col-12">
                                        <div class="fristplace"></div>
                                    </div>
                                </div>
                            </div> -->
                        <?php
                        }
                        ?>

                    </div>
                </div>


            </div>

        </div>

        <?php require "footer.php"; ?>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "adminsignin.php";
    </script>
<?php
}


?>