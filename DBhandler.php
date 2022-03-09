<?php


//get all the data from the session array
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$encryptedPw=sha1($password);
$_SESSION['password']=$encryptedPw;//for security reasons ,overwritten the pw in sess. to the enc. version
$cardNumber=$_SESSION['cardNumber'];


require_once("config.php");
require "vendor/autoload.php";

//starting the DB link
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
    $capsule->addConnection([
    "driver" => "mysql",
    "host" =>__HOST__,
    "database" => __DB__,
    "username" => __USER__,
    "password" => __PASS__
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


////////////////////////////


  //inserting email and encrypted pw to database
  Capsule::table('user')->insert(
    ['email' => $email,  'password'=> $encryptedPw]

  );
  //getting the auto generated user id from the DB
  $userId=Capsule::table('user')->where('email','=',$email)->value('userid');
  
 //inserting date of payment and setting download count to 0 &user id 
  Capsule::table('order')->insert(
    ['date' => date('Y-m-d'), 'download-count'=>0 ,'user_id'=>$userId] //'productid'=> 5

  );
?>