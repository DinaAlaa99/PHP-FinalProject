<?php
session_start();
require_once "vendor/autoload.php";
$mydb = new dbconnection();
//$mydb->insert_user();

//$_SESSION["id"]=5;

//$page="paymentPage";

$check = login::check_Login();

// if there's cookie
if ($check) {
    echo "echeck remeberme";
    $page = "download";

} else {
    //header("location:index.php?page=paymentPage");
    //require_once "View/paymentPage.php";
    $page = "paymentPage";
    if(isset($_POST["submit"]))
    {if (validate::validate_data()==1) {
        //require_once "View/login.php";
        $page = "login";
    }
    elseif(validate::validate_data()==0)
    {
        $page="paymentpage";
        echo "user already exists";
    }
    elseif(validate::validate_data()==-1)
    {
        //$page="unsuccessful";
        $page = "paymentpage";
         echo "invalid info";

    }}
}
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new user($email, $password);
    $check = dbconnection::select_user($user);
    if ($check) {
        $page = "download";
    }
    else{
        $page = "login";
    }
 
    echo "<br>";
    echo "<br>";
   
}
require_once "View/$page.php";
