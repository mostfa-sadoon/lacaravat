<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://fawaterkstage.com/api/v2/invoiceInitPay',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "payment_method_id": 3,
    "cartTotal": "500",
    "currency": "EGP",
    "customer": {
        "first_name": "eng mohamed ",
        "last_name": "nasser",
        "email": "sadoonmostfa6@gmail.com.com",
        "phone": "01010676962",
        "address": "test address"
    },
    "cartItems": [
        {
            "name": "iphone 11 hallo world",
            "price": "250",
            "quantity": "1"
        },
        {
            "name": "iphone test test ",
            "price": "250",
            "quantity": "1"
        }
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer 0bec2ba2934ae1850980cb98231271309851b83f07c2b77dda'
  ),
));
echo $response = curl_exec($curl);
curl_close($curl);