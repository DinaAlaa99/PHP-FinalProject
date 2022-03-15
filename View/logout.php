<?php
session_start();
require_once "../vendor/autoload.php";
$database=new dbconnection();
session_destroy();
if (isset($_COOKIE["remeber_me"])) {
    delete_cookie($_COOKIE["remember_me"]);
}
header("Location:paymentPage.php");
?>