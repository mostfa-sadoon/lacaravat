<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://fawaterkstage.com/api/v2/getPaymentmethods',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer {API KEY}'
  ),
));

echo $response = curl_exec($curl);
curl_close($curl); 