<?php
session_start();
require_once "../vendor/autoload.php";
$database = new dbconnection();
setcookie("remember_me", "", -1, '/');
session_unset();
session_destroy();
header("Location:paymentPage.php");
