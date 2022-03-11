<?php
session_start();
require_once "vendor/autoload.php";
$mydb = new dbconnection();
//$mydb->insert_user();

//$_SESSION["id"]=5;

//$page="paymentPage";

$check=login::check_Login();

// if there's cookie
if($check)
{
    //echo"echeck remeberme";
    $page="download";


}
else{
   //header("location:index.php?page=paymentPage");
    //require_once "View/paymentPage.php";
    //echo "jhhbhb";
    $page="paymentPage"; 
    
    if(validate::validate_data())
    {
        //require_once "View/login.php"; 
        $page="login"; 
    }
    
    //echo"false index";
}

if (isset($_POST["login"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $user= new user($email,$password);
 $check=dbconnection::select_user($user);
 if($check)
 $page="download";

 //  dbconnection::insert_user($user);
    //var_dump($user);
    //echo "<br>";
    //echo $check;
   // echo "<br>";
    /*dbconnection:: insert_token($user);*/
}
require_once "View/$page.php";



