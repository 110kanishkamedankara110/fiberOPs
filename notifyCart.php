<?php
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];

$merchant_secret = 'MjAxODAxODY4ODI2Njc0OTExMDIxMjA4NzgwOTEzNzU0MDkzODQ3'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){

    $location="location".$custon_3;

?>
<script src="script.js"></script>
<script>
    
    saveinvoicecart(<?=$order_idr?>);
   
</script>
<?php

    //TODO: Update your database as payment success

}
?>