<?php
require_once "vendor/autoload.php";

class validate{
    static function validate_data(){
if(isset($_POST['submit'])){
$email = ($_POST['email']);
var_dump($email);
$password = ($_POST['password']);
$cPassword = ($_POST['confirm']);
$date = ($_POST['date']);
$cardNumber = ($_POST['creditCard']);
$date =($_POST['date']);




$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$isPwValid = preg_match("/[A-Z]/", $password)
&& preg_match("/[a-z]/", $password)
&& preg_match("/[0-9]/", $password)
&& strlen($password) > 8
&& strlen($password) < 16;
$isMatching = strcmp($cPassword, $password) == 0;
$isMatching = ($cPassword === $password);
$isValidcCard = preg_match("/^[0-9]{16}$/", $cardNumber);
$maxDate = date('Y-m-d', strtotime('+3 years'));
$isValidDate = $date < $maxDate;
$allValid=1;

//x$allValid = $isEmailValid && $isMatching && $isPwValid && $isValidcCard && $isValidDate;

if ($allValid) {
    $user = new user($email, $password);
    var_dump($user);
    
    //open session and save data to session
    session_start();
    dbconnection::sign_up($user);
    echo"rowan el sbab";
   // require_once "View/login.php";

   ///header("location:http://localhost/PHP-FINALPROJECT/finalProject/View/login.php");
        // exit; 
    return true;


    //require_once ("View/login.php");
    //$_SESSION['email'] = $email;
    //$_SESSION['password'] = $password;
    //$_SESSION['cardNumber'] = $cardNumber;
    //require database handling file
    //require_once "../DBhandler.php";
    
} else {
   return false;
    // require_once "unsuccessful.php";
}

}
}
}
?>
