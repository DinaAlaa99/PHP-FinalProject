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
    public static function select_userId($user)
    {
        // var_dump($user);
        $myemail = $user->getEmail();
        $id = Capsule::table('user')
            ->select('userid')
            ->where('email', 'like', "$myemail")
            ->value("userid");

        var_dump($id);

        return $id;

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

        //echo "<br>";=========
        if (is_numeric($users)) {
            if (isset($_POST["checkbox"])) {
                // $_POST["remember_me"]=true;
                dbconnection::insert_token($users); ////////
            }
            //echo"cookie";
            //  echo $_COOKIE["remember_me"];
            //require_once("View/download.php");
            return true;
            // header("Location: View/download.php");
        } else {
            //echo "please enter the right password or email";
            return false;
        }
    }
    public static function select_user_email($userId,$email)
    {

        $id = Capsule::table('user')
            ->select('userid')
            ->where('email', 'like', "$email")
            ->value("userid");
        
        //echo $id;
        //die;
        if($userId==$id)
        {
            return true;
        }
        else if(is_numeric($id)) //there is a user with the same email
        {
            return false;
        }
        else{
            return true;
        }

      
    }
    
    public static function select_user_password($userId,$oldpassword)
    {

        $password = Capsule::table('user')
            ->select('password')
            ->where('userid', '=', $userId)
            ->value("password");
        
   

        if (strcmp($password,sha1($oldpassword)) == 0) {
             return true;
        }
        else 
        { 
            echo "you entered a wrong password";
        }
    }
    public static function update_user($user,$userId)
    {
        
    
        $affected = Capsule::table('user')
        ->where('userid', $userId)
        ->update(['email' => $user->getEmail(),
                  'password' => $user->getpassword()]);
       
        if($affected)
        {
            echo "data updated successfully";
        }
    
    }
    public static function delete_user_from_token_table($userId)
    {
        $deleted = Capsule::table('token')->where('userid', '=', $userId)->delete();
        echo "deleted";

    }
    public static function delete_user_from_order_table($userId)
    {
        $deleted = Capsule::table('order')->where('user_id', '=', $userId)->delete();
        echo "deleted";

    }
    public static function delete_user($userId)
    {
        $deleted = Capsule::table('user')->where('userid', '=', $userId)->delete();
        echo "deleted";

    }
    public static function insert_token($userid)
    {
        $val = sha1(mt_rand(1, 90000) . 'SALT');
        //$val=4;
        setcookie("remember_me", $val, time() + 3600, '/');
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
    public static function select_cookie_userId($cookie)
    {
        $user_id = Capsule::table('token')
            ->select('userid')
            ->where('remember_me', 'like', "$cookie")
            ->get();
        return $user_id;
    }
    public static function update_cookie($cookie)
    {
        $val = sha1(mt_rand(1, 90000) . 'SALT');
        setcookie("remember_me", $val, 2147483647, '/');
        $affected = Capsule::table('token')
            ->where('remember_me', $cookie)
            ->update(['remember_me' => "$val"]);
    }
//inserting email and encrypted pw to database
    public static function sign_up($user)
    {$myemail = $user->getEmail();
        $mypassword = $user->getPassword();
        $userId = $user->getUser_id();

        Capsule::table('user')->insert(
            ['email' => $myemail, 'password' => $mypassword]

        );
//getting the auto generated user id from the DB
        $userId = Capsule::table('user')->where('email', '=', $myemail)->value('userid');

        //Capsule::firstOrCreate(['productid' => 1]);

//inserting date of payment and setting download count to 0 &user id

        Capsule::table('order')->insert(
            ['date' => date('Y-m-d'), 'download-count' => 0, 'user_id' => $userId, 'productid' => 1]

        );

    }

    /*static  function insert_user_test()
    {
    //$user->getUserid();
    Capsule::table('user')->insert([
    'email' => "Dina@yahoo.com",
    'password' => sha1(123456)
    ]);

    }*/

    public static function insertOrder($order_date, $user_id)
    {
        Capsule::table('order')->insert([
            'date' => "$order_date",
            'user_id' => "$user_id",
            'productid' => 1,

        ]);
    }
    public static function countOrder($user_id)
    {

        $orders = Capsule::table('order')
            ->select('user_id')
            ->where('user_id', '=', "$user_id")->count();
        echo $orders;
        return $orders;
    }
    public static function select_count($userid)
    {

        $count = Capsule::table('order')
            ->select('download-count')
            ->where('user_id', '=', "$userid")
            ->value("download-count");
        //$count++;
        return $count;
    }
    public static function update_count($count, $userid)
    {

        $affected = Capsule::table('order')
            ->where('user_id', '=', "$userid")
            ->update(['download-count' => "$count"]);
    }
    public static function select_rememberme()
    {

    }
    public static function delete_cookie($cookie)
    {
        $deleted = Capsule::table('token')->where('remember_me', '=', $cookie)->delete();
        echo "deleted";

    }

    public static function get_productName()
    {
        $product_id = 1;
        $old_name = Capsule::table('product')
            ->select('download-file')
            ->where('productid', '=', "$product_id")
            ->value("download-file");
        echo $old_name;
        return $old_name;

    }
    public static function update_productName($new_name)
    {
        $product_id = 1;
        $affected = Capsule::table('product')
            ->where('productid', '=', "$product_id")
            ->update(['download-file' => "$new_name"]);
        echo $new_name;
    }

}
