<?php
require_once ("vendor/autoload.php");
$mydb = new dbconnection();
//$mydb->insert_user();
require_once "view/login.php";


if (isset($_POST["login"])) {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $user= new user($email,$password);
    //echo"<br>tttttttttttttttttttt";
//var_dump($user);
    //echo"<br>tttttttttttttttttttt";


    if (isset($_POST["checkbox"])){
        $_POST["remember_me"]=true;
    }
 $check=dbconnection::select_user($user);
    echo"<br>";
    //echo $check;
    echo"<br>";
}