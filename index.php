<?php
require_once ("vendor/autoload.php");
$mydb = new dbconnection();
//$mydb->insert_user();


//$_SESSION["id"]=5;



$check=login::check_Login();

// if there's cookie
if($check)
{
    echo"echeck remeberme";
    header("Location: View/download.php");


}
else{
    //header("Location:View//paymentPage.php");
    require_once "View/paymentPage.php";
    echo "jhhbhb";
    validate::validate_data();
    
    echo"false index";}

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
