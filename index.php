<?php
session_start();
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}
include('config/componen.php');
include('config/database.php');
$con = new database();
include('header.php');

if(!isset($_GET['page'])){
  include('dashboard.php');
}else{
  if($_GET['page'] == 'payment'){
    include('payment.php');
  }
}

include('footer.php'); 
?>