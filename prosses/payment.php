<?php
session_start();
include('../config/database.php');


$apiKey = '3ZAbaxDMaFmNmXppJ2M86C40C63jnv5tN2CIKetV';
$privateKey = 'ChiDC-vOWYU-mCLOG-XN1z0-WpDNr';
$merchantCode = 'T1098';
$merchantRef = '';
$amount = $_POST['ongkir'] + ($_POST['amount'] *$_POST['jumlah']);

$data = [
  'method'            => $_POST['metode'],
  'merchant_ref'      => $merchantRef,
  'amount'            => $amount,
  'customer_name'     => $_POST['name'],
  'customer_email'    => $_POST['email'],
  'customer_phone'    => $_POST['hp'],
  'order_items'       => [
    [
      'sku'       => $_POST['kd_produk'],
      'name'      => $_POST['name_produk'],
      'price'     => $amount,
      'quantity'  => 1
    ]
  ],
  'callback_url'      => '',
  'return_url'        => 'http://counting.gilno.store/callback/',
  'expired_time'      => (time()+(2*60*60)), // 2 jam
  'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
];


    $ch = curl_init();
    curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
    curl_setopt($ch,CURLOPT_URL,"https://payment.tripay.co.id/api/transaction/create");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer ".$apiKey
    ));
    curl_setopt($ch,CURLOPT_FAILONERROR,false);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));


    $output = curl_exec($ch); 
    curl_close($ch);
    
    $response= json_decode($output,true);

    if($response['success'] == true){
        $conn = new database();

        $hasil = $conn->createTrx($response['data']['reference'],$response['data']['payment_method'],$response['data']['customer_name'],$response['data']['customer_email'],$response['data']['customer_phone'],$response['data']['amount'],$response['data']['fee'],$response['data']['is_customer_fee'],$response['data']['amount_received'],$response['data']['pay_code'],$response['data']['status'],$response['data']['expired_time'],$response['data']['order_items'],$_SESSION['id'],$_SESSION['id'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'));

        echo "<br>";

        echo $response['instructions'];

        foreach ($response['data']['instructions']['steps'] as $key) {
            echo $key. "<br>";
        }
    }


