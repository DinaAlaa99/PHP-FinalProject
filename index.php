<?php
session_start();
require_once ("vendor/autoload.php");
$mydb = new dbconnection();
//$mydb->insert_user();
//header("location:index.php?page=paymentPage");
//exit();



//$page="paymentPage";

$check=login::check_Login();

// if there's cookie
if($check)
{
   // echo"echeck remeberme";
   $page="download";


}
else{
   //header("location:index.php?page=paymentPage");
    //require_once "View/paymentPage.php";
    //echo "jhhbhb";
    $page="paymentPage"; 
    //header("location:index.php?page=$page");
    
    if(validate::validate_data())
    { //$_SESSION["id"]=5;
        //require_once "View/login.php"; 
        $page="login"; 
        //echo "555";
    }
    
    //echo"false index";
}

if (isset($_POST["login"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $user= new user($email,$password);
 $check=dbconnection::select_user($user);
 if($check)
 
  // if($_SESSION["id"]==58)
 $page="download";

 //  dbconnection::insert_user($user);
    //var_dump($user);

    echo"<br>";
    //echo $check;
    echo"<br>";
    /*dbconnection:: insert_token($user);*/


}
/*if((!isset ($_GET["page"]))||$_GET["page"]!=$page)
{ 
    header("location:index.php?page=$page");
    echo $page;

}*/

require_once("View/$page.php");