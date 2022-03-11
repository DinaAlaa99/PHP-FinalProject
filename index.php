<?php
require_once ("vendor/autoload.php");
$mydb = new dbconnection();
//$mydb->insert_user();

require_once ("View/login.php");

//$_SESSION["id"]=5;


//$current_url = "View/";



$check=login::check_Login();

// if there's cookie
if($check)
{
    echo"echeck remeberme";
    header("Location: View/download.php");
}
else{
   // header("Location:View/paymentPage.php");
    //die();
    echo "jhhbhb";
    require_once "View/paymentPage.php";
    // login::redirect($current_url.'paymentPage.php');
   //header("location:http://localhost/PHP-FINALPROJECT/finalProject/View/paymentPage.php");
   //exit();
 

   if( validate::validate_data())
   {
   require_once "View/login.php";}
   else 
   require_once "View/unsuccessful.php";


if (isset($_POST["login"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $user= new user($email,$password);
    $check=dbconnection::select_user($user);

 //  dbconnection::insert_user($user);
    //var_dump($user);

    echo"<br>";
    //echo $check;
    echo"<br>";
    /*dbconnection:: insert_token($user);*/
}
}