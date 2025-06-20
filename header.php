<?php

if (isset($_SESSION["user"])) {
    $cart = database::s("SELECT * FROM `cart` WHERE `user_email`='" . $_SESSION["user"]["email"] . "';");
    $cpronr = $cart->num_rows;
} else {
}





?>


<div class="d-flex align-items-baseline text-white bg-orange justify-content-between">
    <div class="bg-orange w-max  text-center p-2" style="min-width: 200px;">
        <span>
            <?php
            if (isset($_SESSION["user"])) { 
                // Use the session variable to get the total number of items in the cart
                $totalItems = isset($_SESSION['cart']['total_items']) ? $_SESSION['cart']['total_items'] : 0; ?>

                <a href="index.php" class="text-decoration-none text-white text-start label1">
                    <?php echo "Welcome" . " " . $_SESSION["user"]["first_name"]; ?>
                </a>
            <?php
            } else {
            ?>
                <a href="Login.php" class="text-white custom-hover"><i class="fa-solid fa-user mr-2  custom-hover"></i>Log In</a> |
                <a href="Login.php" class="text-white custom-hover">Sign Up</a>
            <?php
            }
            ?>
        </span>
        <?php
        if (isset($_SESSION["user"])) {
        ?>
            <span class="text-end label2" onclick="signout();"> | Log Out</span>
        <?php
        }
        ?>
    </div>
    <?php
    if (isset($_SESSION["user"])) {
    ?>
        <div class="w-max p-2">
            <div class="d-flex flex-row-reverse flex-md-row mt-0 ms-auto mb-0 align-items-center">
                <!-- <div class="col-1 col-lg-3 mt-1">
                        <span class="text-start label2" onclick="gotoaddproduct();">Sell</span>
                    </div> -->
                <div class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle m-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                            <li><a class="dropdown-item" href="tranceactionhistory.php">Purchase History</a></li>

                            <!-- <li><a class="dropdown-item" href="massage.php">Message</a></li> -->

                            <!-- <li><a class="dropdown-item" href="sellerproductview.php">My Products</a></li> -->
                            <li><a class="dropdown-item" href="userprofile.php">My Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="myselling.php">My sellings</a></li> -->
                        </ul>
                    </div>

                </div>
                <div onclick="cart();" style="cursor: pointer; width: 50px; " class="mt-0 mt-md-1 mb-lg-0 cticon text-center text-md-end position-relative">
                    <!-- <i class="bi bi-cart-fill text-white fw-bolder fs-4"></i> -->
                    <i class="bi bi-cart3 text-white fw-bolder fs-4"></i>
                    <!-- Add a badge to show the number of items in the cart -->
                    <?php
                    if ($totalItems) {
                    ?>
                        <span class="badge bg-danger rounded-pill position-absolute top-0 translate-middle" id="cartBadge" style="left:65%"> <?php echo $cpronr; ?></span>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>


    <?php
    }
    ?>
</div>