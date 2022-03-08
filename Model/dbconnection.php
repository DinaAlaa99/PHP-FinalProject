<?php

use Illuminate\Database\Capsule\Manager as Capsule;


class dbconnection
{
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

 static  function insert_user()
    {
       //$user->getUserid();
        Capsule::table('user')->insert([
            'email' => 'kayla@example.com',
            'password' => sha1(123456)
        ]);



    }
static  function  select_user($user)
{
    $users = Capsule::table('user')
        ->select('email', 'password')
        ->where('email', '=','$user->email')
        ->where ('password', '=', sha1($user->password))
        ->get();
}

}
