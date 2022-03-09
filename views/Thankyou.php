
<?php


$email=$_POST['email'];
$password=$_POST['password'];
$cPassword=$_POST['confirm'];
$date=$_POST['date'];
$cardNumber=$_POST['creditCard'];
$date=$_POST['date'];

$isEmailValid=filter_var($email, FILTER_VALIDATE_EMAIL);
$isPwValid=preg_match("/[A-Z]/",$password)
&& preg_match("/[a-z]/",$password)
&& preg_match("/[0-9]/",$password)
&& strlen($password)>8
&& strlen($password)<16;
$isMatching=strcmp($cPassword,$password)== 0;
$isMatching=($cPassword===$password);
$isValidcCard=preg_match("/^[0-9]{16}$/",$cardNumber);
$maxDate = date('Y-m-d', strtotime('+3 years'));
$isValidDate=$date<$maxDate;

$allValid=$isEmailValid && $isMatching && $isPwValid && $isValidcCard && $isValidDate;

if($allValid)
{
  echo("Payment successfull!<br>");
  //open session and save data to session 
  session_start();
  $_SESSION['email']=$email;
  $_SESSION['password']=$password;
  $_SESSION['cardNumber']=$cardNumber;
  //require database handling file
  require_once("../DBhandler.php");
}else {
  echo("Payment unsuccessfull, Data not valid<br>");
}

?>

