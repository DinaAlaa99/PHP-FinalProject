<?php

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";
session_start();
require_once "vendor/autoload.php";
$mydb = new dbconnection();
//$mydb->insert_user();
//$_SESSION["id"]=5;
//$page="paymentPage";
//echo"check_login";

$check = login::check_Login();
//echo "after_check";
//var_dump($check);
// if there's cookie
//echo"beforecheck";
if ($check) {
    //echo"aftercheck";
    // echo "echeck remeberme";
    // $page = "uipage";
    header("Location:View/uipage.php");

} else {
    //header("location:index.php?page=paymentPage");
    //require_once "View/paymentPage.php";
    // $page = "paymentPage";
    //echo "else";
    header("Location:View/paymentPage.php");

//    if (isset($_POST["submit"])) {
    //        if (validate::validate_data() == 1) {
    //            //require_once "View/login.php";
    //            //$page = "login";
    //            header("Location:View/login.php");
    //
    //
    //        } elseif (validate::validate_data() == 0) {
    //            //$page="paymentpage";
    //            header("Location:View/paymentpage.php");
    //
    //
    //            echo "user already exists";
    //        } elseif (validate::validate_data() == -1) {
    //            //$page="unsuccessful";
    //            // $page = "paymentpage";
    //            header("Location:View/paymentpage.php");
    //
    //            echo "invalid info";
    //
    //        }
    //    }
}
//if (isset($_POST["login"])) {
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//    $user = new user($email, $password);
//    $check = dbconnection::select_user($user);
//    if ($check) {
//        //$page = "uipage";
//        header("Location:View/uipage.php");
//
//    } else {
//        // $page = "login";
//        header("Location:View/login.php");
//        echo "email or password is invalid";
//    }
//
//
//    echo "<br>";
//    echo "<br>";
//
//}
//require_once "View/$page.php";
