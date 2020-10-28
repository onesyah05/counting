<?php

include "config/database.php";

$con = new database();

$data = $con->Login("ifinity_x",123456);

print_r($data);
header("Location: http://counting.gilno.store/");