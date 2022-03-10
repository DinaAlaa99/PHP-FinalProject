<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class dbconnection
{
    static $userid;
    static $mycookie;
    public function __construct()
    {
        $Capsule = new Capsule();
        $Capsule->addConnection([
            "driver" => _driver_,
            "host" => _host_,
            "database" => _database_,
            "username" => _username_,
            "password" => _password_,
        ]);
        $Capsule->setAsGlobal();
        $Capsule->bootEloquent();}

    public static function insert_user($user)
    {
        //$user->getUserid();
        Capsule::table('user')->insert([
            'email' => $user->getEmail(),
            'password' => $user->getpassword(),
        ]);

    }
    public static function select_user($user)
    {
        $myemail = $user->getEmail();
        $mypassword = $user->getPassword();
        $users = Capsule::table('user')
            ->select('userid')
            ->where('email', 'like', "$myemail")
            ->where('password', 'like', "$mypassword")
            ->value("userid");

        //->get();

        //print_r($users);//get my id
        //echo "<br>";
        //echo "$users";
        $userid = $users;

        echo "<br>";
        if (is_numeric($users)) {
            if (isset($_POST["checkbox"])) {
                // $_POST["remember_me"]=true;
                dbconnection::insert_token($users);
            }
            //echo"cookie";
            //  echo $_COOKIE["remember_me"];
            //require_once("View/download.php");
            return true;
           // header("Location: View/download.php");
        } else {
            echo "please enter the right password or email";
            return false;
        }
    }
    public static function insert_token($userid)
    {
        $val = sha1(mt_rand(1, 90000) . 'SALT');
        setcookie("remember_me", $val, 2147483647);
        Capsule::table('token')->insert([
            'remember_me' => "$val",
            'userid' => "$userid",
        ]);

    }
    public static function select_cookie($cookie)
    {

        $cookie_id = Capsule::table('token')
            ->select('userid')
            ->where('remember_me', 'like', "$cookie")
            ->value("userid");
        return $cookie_id;
    }
    public static function update_cookie($cookie)
    {
        $val = sha1(mt_rand(1, 90000) . 'SALT');
        setcookie("remember_me", $val, 2147483647);
        $affected = Capsule::table('token')
            ->where('remember_me', $cookie)
            ->update(['remember_me' => "$val"]);
    }
//inserting email and encrypted pw to database
    public static function sign_up($user)
    {   $myemail = $user->getEmail();
        $mypassword = $user->getPassword();
        $userId=$user-> getUser_id();

        Capsule::table('user')->insert(
            ['email' => $myemail, 'password' => $mypassword]

        );
//getting the auto generated user id from the DB
        $userId = Capsule::table('user')->where('email', '=', $myemail)->value('userid');

//inserting date of payment and setting download count to 0 &user id

        Capsule::table('order')->insert(
            ['date' => date('Y-m-d'), 'download-count' => 0, 'user_id' => $userId]//'productid'=> 5

        );}

   


    /*static  function insert_user_test()
{
//$user->getUserid();
Capsule::table('user')->insert([
'email' => "Dina@yahoo.com",
'password' => sha1(123456)
]);

}*/
}
