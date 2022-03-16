<?php

session_start();
require_once "../vendor/autoload.php";
$database = new dbconnection();
//
//if (isset($_POST["logout"])) {
//    if (isset($_COOKIE["remember_me"])) {
//        dbconnection::delete_cookie($_COOKIE["remember_me"]);
//        unset($_COOKIE["remember_me"]);
setcookie("remember_me", "", -1, '/');
session_unset();
session_destroy();
//
//    }
//}
header("Location:paymentPage.php");
session_destroy();
