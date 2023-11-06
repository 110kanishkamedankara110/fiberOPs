<div style="background-color: green;" class="row bg-dark text-white">
    <div style="background-color: blue;" class="col-12 align-self-start p-2">
        <span>
            <?php
            if (isset($_SESSION["user"])) { ?>

                <a href="home.php" class="text-decoration-none text-white text-start label1">
                    <?php echo "Welcome" . " " . $_SESSION["user"]["first_name"]; ?>
                </a>
            <?php
            } else {
            ?>
                <a href="index.php" class="text-white">Sign In</a>
            <?php
            }
            ?>
        </span>
        <?php
        if (isset($_SESSION["user"])) {
        ?>
            <span class="text-start label2" onclick="signout();"> | Sign Out</span>
        <?php
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION["user"])) {
    ?>
        <div class="col-12">
            <div class="row flex-row-reverse flex-md-row mt-0 ms-auto mb-0 align-items-end">
                <!-- <div class="col-1 col-lg-3 mt-1">
                        <span class="text-start label2" onclick="gotoaddproduct();">Sell</span>
                    </div> -->
                <div class="col-10 col-md-11 col-lg-8 text-end">
                     <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle m-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                            <li><a class="dropdown-item" href="tranceactionhistory.php">Purchase History</a></li>

                <!-- <li><a class="dropdown-item" href="massage.php">Message</a></li> -->

                <!-- <li><a class="dropdown-item" href="sellerproductview.php">My Products</a></li> -->
                <!-- <li><a class="dropdown-item" href="userprofile.php">My Profile</a></li> -->
                <!-- <li><a class="dropdown-item" href="myselling.php">My sellings</a></li> -->
                </ul>
                    </div>

            </div>
            <div onclick="cart();" style="cursor: pointer;" class=" col-2 col-md-1 mt-0 mt-md-1 mb-lg-0 cticon text-center text-md-end">
                <!-- <i class="bi bi-cart-fill text-white fw-bolder fs-4"></i> -->
                <i class="bi bi-cart3 text-white fw-bolder fs-4"></i>
            </div>
        </div>
</div>


<?php
    }
?>
</div>