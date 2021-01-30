<?php
require_once("stripe-php-master/init.php");
require_once("config.php");

use \Stripe\Stripe;
use \Stripe\Customer;
use \Stripe\ApiOperations\Create;
use \Stripe\Charge;
use \Stripe\Token;

class StripePayment{
    private $apiKey;
    private $stripeService;

    public function __construct(){
        $this->apiKey = stripe_skey;
        $this->stripeService = new \Stripe\Stripe();
        $this->stripeService->setVerifySslCerts(false);
        $this->stripeService->setApiKey($this->apiKey);
    }

    public function addCustomer($customerDetails){
        $customer = new Customer();
        $customerDetails = $customer->create($customerDetails);
        return $customerDetails;
    }

    public function addSource($customerDetails){
        $source = new Source();
        $sourceDetails = $source->create($customerDetails);
        return $sourceDetails;
    }

    public function chargeCustomer($customerDetails){  
        $charge = new Charge();
        $chargeresult = $charge->create($customerDetails);
        return $chargeresult;
    }

    public function createToken($cardDetails){
        $customerDetails = array('card' => array( 
                                 'number' => $cardDetails['cardnumber'],
                                 'exp_month' => $cardDetails['cardmonth'],
                                 'exp_year' => $cardDetails['cardyear'],
                                 'cvc' => $cardDetails['cardccv'])
                              );      
        
        $token = new Token();
        $tokenDetails = $token->create($customerDetails);
        return $tokenDetails;
    }

    public function chargeAmountFromCard($cardDetails){  
        
        $tokenDetials = $this->createToken($cardDetails);

        $customerDetails = array(
            'email' => $cardDetails['cardemail'],
            'source' => $tokenDetials['id'] 
        );

        $customerResult = $this->addCustomer($customerDetails);
        
        $chargeDetails = array(
            'customer' => $customerResult->id, 
            'amount' => $cardDetails['cardamount'],
            'currency' => $cardDetails['cardcurrencycode'],
            'description' => $cardDetails['carditemname']);

        $customerResult = $this->chargeCustomer($chargeDetails);
        return $customerResult['id']; 
    }
}
?>