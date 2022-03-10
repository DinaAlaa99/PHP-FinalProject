<?php

use Illuminate\Database\Capsule\Manager as Capsule;


class dbconnection
{
    static $userid;
    static $mycookie;
 function __construct() {
        $Capsule = new Capsule();
        $Capsule->addConnection([
            "driver"=>_driver_,
                "host"=>_host_,
                "database"=>_database_,
                "username"=>_username_,
                "password"=>_password_
            ]);
$Capsule->setAsGlobal();
$Capsule->bootEloquent();}

 static  function insert_user($user)
    {
       //$user->getUserid();
        Capsule::table('user')->insert([
            'email' => $user->getEmail(),
            'password' => $user->getpassword()
        ]);



    }
static  function  select_user($user)
{
    $myemail=$user->getEmail();
    $mypassword=$user->getPassword();
    $users = Capsule::table('user')
        ->select('userid')
        ->where('email', 'like',"$myemail")
        ->where('password','like',"$mypassword")
        ->value("userid");

        //->get();

   //print_r($users);//get my id
    //echo"<br>";
    //echo"$users";
    $userid=$users;

    //echo"<br>";
    if (is_numeric($users)){
        //echo"done";
       header("location:View/download.php");
        echo"done2";
        if (isset($_POST["checkbox"])){
           // $_POST["remember_me"]=true;
           echo "kkkkk";
            dbconnection:: insert_token($users);
            echo "kkkkk";
        }
        //echo"cookie";
      //  echo $_COOKIE["remember_me"];
     // require_once("View/download.php");
    }
    else
    {
        echo"please enter the right password or email";
    }
}
static function insert_token($userid){
     $val=sha1(mt_rand(1, 90000) . 'SALT');
     setcookie("remember_me",$val,2147483647);
    Capsule::table('token')->insert([
        'remember_me' => "$val",
        'userid' => "$userid"
    ]);

}
static function select_cookie($cookie){

    $cookie_id = Capsule::table('token')
        ->select('userid')
        ->where('remember_me', 'like',"$cookie")
        ->value("userid");
    return $cookie_id;
}
static function update_cookie($cookie){
    $val=sha1(mt_rand(1, 90000) . 'SALT');
    setcookie("remember_me",$val,2147483647);
    $affected = Capsule::table('token')
        ->where('remember_me', $cookie)
        ->update(['remember_me' => "$val"]);
}

}
