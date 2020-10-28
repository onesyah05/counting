<?php
session_start();

include('../config/database.php');

$con = new database();
$data = $con->Login($_POST['username'],$_POST['password']);

if($data != null){
    $_SESSION['username'] = $data[0]['username'];
    $_SESSION['id'] = $data[0]['id'];
    $_SESSION['nama'] = $data[0]['nama'];

    header("Location: ../index.php");
    exit;
}else{
    header("Location: ../login.php");
    exit;
}

?>
