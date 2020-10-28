<?php
// include file koneksi database
require('../config/database.php');
$con = new database();

// ambil data JSON
$json = file_get_contents("php://input");

// ambil callback signature
$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

// generate signature untuk dicocokkan dengan X-Callback-Signature
$signature = hash_hmac('sha256', $json, 'ChiDC-vOWYU-mCLOG-XN1z0-WpDNr');

// validasi signature
if( $callbackSignature !== $signature ) {
    exit("Invalid Signature"); // signature tidak valid, hentikan proses
}

$data = json_decode($json);
$event = $_SERVER['HTTP_X_CALLBACK_EVENT'];

if( $event == 'payment_status' )
{
    if( $data->status == 'PAID' )
    {
        $merchantRef = $data->reference;
        $con->updateStatusTrx($merchantRef,$data->status);
    }
}

echo json_encode(['success' => true]); // berikan respon yang sesuai

?>