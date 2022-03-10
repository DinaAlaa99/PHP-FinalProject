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

 static  function insert_user($user)
    {
       //$user->getUserid();
        Capsule::table('user')->insert([
            'email' => $user->getUserid(),
            'password' => sha1($user->getpassword())
        ]);



    }
static  function  select_user($user)
{
    $myemail=$user->getEmail();
    $users = Capsule::table('user')
        ->select('userid')
        ->where('email', 'like',"$myemail")->value("userid");
        //->get();

   print_r($users);
    //var_dump($users);
    if ($users){
        return true;
    }
    else
    {
        return false;//redirect on first page tell him there is a problem
    }
}
    static function insertOrder($order_date,$user_id,$product_id)
    {

        Capsule::table('order')->insert([
            'date' =>"$order_date",
            'user_id'=>"$user_id",
            'productid'=>"$product_id"

        ]);
    }
    static function  countOrder($user_id)
    {

        $orders = Capsule::table('order')
            ->select('user_id')
            ->where('user_id', '=',"$user_id")->count();
        echo $orders;
        return $orders;
    }

}
