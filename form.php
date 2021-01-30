<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Stripe Prototype Payment</title>
  <meta name="description" content="Stripe prototype payment">
  <meta name="author" content="ip">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="row dv-padding">
    <div class="col-md-8">
        <form class="form-payment" method="post" action="">
                    <div class="row">
                            <div class="col-md-6 card-box">
                                    <h3>Payment Information</h3>
                                    <input type="email" class="form-control" placeholder="Email Address" name="cardemail" name="cardemail" value=""/>
                                    <input type="text" class="form-control" placeholder="Card Holder Name" value="" name="cardname" />
                                    <input type="text" id="cardnumber" class="form-control" placeholder="Credit Card Number" value="" name="cardnumber"/>
                                    <br />    
                                    <div class="card-label">Expiry Month / Year</div> 
                                    <div class="card-info">
                                        <select name="cardmonth" id="month" class="form-control select-sm">
                                            <option value="">Month</option>    
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>   
                                    <div class="card-info">
                                        <select name="cardyear" id="year" class="form-control select-sm">
                                            <option value="">Year</option>    
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>                                            
                                    </div>
                                    
                                    <div class="card-info">
                                        <input type="text" class="form-control" id="input-sm" placeholder="CCV" name="cardccv" value="" />
                                    </div>
                                    <input type='hidden' name='cardamount' value='15000'>
                                    <input type='hidden' name='cardcurrencycode' value='CAD'>
                                    <input type='hidden' name='carditemname' value='Subscription'>
                                    <input type='hidden' name='carditemnumber' value='123456'>
                            </div>
                            <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 order-summary">
                                            <h2>Order Summary</h2>       
                                            <ul>                                             
                                                <li>
                                                   <span class="float-left">Subscription</span>
                                                   <span class="float-right">$150</span>
                                                </li>
                                                <li>
                                                    <br />
                                                </li>    
                                                <li>
                                                    <span class="float-left">Total </span>
                                                    <span class="float-right">$150</span>
                                                </li>  
                                            </ul> 
                                            <div class="border-top"></div>
                                            <br />
                                            <ul class="payment-note">
                                                <li><b>Some friendly notes:</b></li>
                                                <li>Your payment method will be charged $150. </li>
                                            </ul>                             
                                        </div>
                                    </div>
                            </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-md-12 card-bt-cont">
                                <div class="notification"></div>
                                <input type="submit" value="Pay Now" id="submit" class="btn btn-primary float-right card-bt">
                            </div>
                    </div>            
        </form> 
    </div>
</div>
<script src="js/process-payment.js" crossorigin="anonymous"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js'></script>
<script type='text/javascript' src='https://js.stripe.com/v2/'></script>
</body>
</html>