<?php
require_once("library/config.php");
$card = array();
$arrKeys = array();

// return strip keys *public and *private keys
if($_POST["action"] == "keys"){
    $arrKeys["sk"] = stripe_skey;
    $arrKeys["pk"] = stripe_pkey;
    echo json_encode($arrKeys);
}
else if($_POST["action"] == "payment"){
    
    // extract form card information
    foreach($_POST["data"] as $rs){
        $card[ $rs["name"] ] = $rs["value"]; // extract data and rename the array keys
    }

    // process stripe payment
    $stripePayment = new StripePayment();
    $stripeResponse = $stripePayment->chargeAmountFromCard($card);    
    
    if(!empty($stripeResponse)){
        echo 1;  // success
    }
    else{
        echo 0; // fail
    }
}
?>