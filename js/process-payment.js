jQuery(document).ready(function(){
    jQuery(".form-payment").validate({
        rules: {
            cardemail: {
                required: true,
                email: true
            },
            cardname: "required",
            cardnumber: "required",
            cardmonth: { required: true },
            cardyear: { required: true },
            cardccv: "required"
        },

        messages: {
            cardemail: "Valid email address",
            cardname: "Card holder's name",
            cardnumber: "Credit card number",
            cardmonth: "Month required",
            cardyear: "Year required",
            cardccv: "CCV required"
        },

        submitHandler: function() {
            var path = "payment.php";
            var key;
            jQuery.ajax({
                url: path,
                type: 'POST',
                dataType: "json", 
                async: false,
                data : {'action' : 'keys'},
                success: function (data){
                    key = data.pk;
                }
            });

            if(key != undefined)
            stripePay(path);
            
		}
    }); 

    function stripePay(path){
        let carddata = jQuery(".form-payment").serializeArray();  
        jQuery.ajax({
            url: path,
            type: 'POST',
            data : {'action' : 'payment', 'data' : carddata},
            beforeSend: function() {
                jQuery(".card-bt-cont").append("<img src='images/loader.gif' style='float: right;' />");
                jQuery(".card-bt").hide();
            },
            complete: function(){
                jQuery(".card-bt-cont img").hide();
                jQuery(".card-bt").show();
            },
            success: function (response){
                if(response != 1){
                    jQuery(".notification").append('<b>Payment Failed</b>').css({'color' : '#A90E0E'});
                }else{
                    jQuery(".notification").append('<b>Payment Success</b>').css({'color' : '#45722E'});
                }
            }
        });
    }
});      