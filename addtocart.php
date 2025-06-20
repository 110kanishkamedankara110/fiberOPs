<?php
// session_start();

// require "database.php";

// $id=$_POST["id"];
// $qty=$_POST["qty"];
// $user=$_SESSION["user"]["email"];

// $cp=database::s("SELECT * FROM `cart` WHERE  `product_id`='".$id."' AND `user_email`='".$user."'; ");
// $nr=$cp->num_rows;
// if($nr==1){
//     $cart=$cp->fetch_assoc();
//     $val=$cart["qty"]+$qty;
//     $p=database::s("SELECT * FROM `product` WHERE `id`='".$id."'");
//     $pro=$p->fetch_assoc();



//     if($val>$pro["qty"]){
//         $val=$pro["qty"];
//     }
//     database::iud("UPDATE `cart` set `qty`='".$val."' WHERE `cart`.`id`='".$cart["id"]."'");

//     // echo "Product Alredy Added";

// }else{
//     database::iud("INSERT INTO `cart` (`qty`,`product_id`,`user_email`)  VALUES ('".$qty."','".$id."','".$user."')   ;");
//     echo "Sucess";
    
// }



?>
<?php
session_start();

require "database.php";

$id = $_POST["id"];
$qty = $_POST["qty"];
$user = $_SESSION["user"]["email"];

$cp = database::s("SELECT * FROM `cart` WHERE  `product_id`='".$id."' AND `user_email`='".$user."'; ");
$nr = $cp->num_rows;

if ($nr == 1) {
    $cart = $cp->fetch_assoc();
    $val = $cart["qty"] + $qty;
    $p = database::s("SELECT * FROM `product` WHERE `id`='".$id."'");
    $pro = $p->fetch_assoc();

    if ($val > $pro["qty"]) {
        $val = $pro["qty"];
    }

    database::iud("UPDATE `cart` set `qty`='".$val."' WHERE `cart`.`id`='".$cart["id"]."'");

    // Update session variable with the total number of items in the cart
    updateCartSession($user);

    // echo "Product Already Added";
} else {
    database::iud("INSERT INTO `cart` (`qty`,`product_id`,`user_email`)  VALUES ('".$qty."','".$id."','".$user."')   ;");
    echo "Success";

    // Update session variable with the total number of items in the cart
    updateCartSession($user);
}

// Function to update the session variable with the total number of items in the cart
function updateCartSession($user) {
    $cartItems = database::s("SELECT SUM(`qty`) AS total_items FROM `cart` WHERE `user_email`='".$user."'");
    $totalItems = $cartItems->fetch_assoc()['total_items'];

    // Update the session variable with the total number of items in the cart
    $_SESSION['cart']['total_items'] = $totalItems;
}
?>
