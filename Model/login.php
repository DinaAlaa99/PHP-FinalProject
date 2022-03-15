<?php
require_once "vendor/autoload.php";

class login
{
    //public static $flag =-1;
    //$_SESSION["id"] = 5;

    ///<!--<?php echo $_SERVER["PHP_SELF"];

    static function check_Login(){

//            echo"cookie";
//            var_dump($_COOKIE);
//            die;
       // echo((dbconnection::select_cookie($_COOKIE["remember_me"]));
        if (isset($_SESSION["userId"])&&is_numeric($_SESSION["userId"])){
            //echo "done session";
           return true;//is_numeric(dbconnection::select_cookie($_COOKIE["remember_me"]))
         }elseif(isset($_COOKIE["remember_me"])){
//            echo"cookie";
//            var_dump($_COOKIE);
//            die;
            //dbconnection::update_cookie($_COOKIE["remember_me"]);
           // echo dbconnection::select_cookie_userId($_COOKIE["remember_me"]);
            $c = $_COOKIE["remember_me"];
            $_SESSION["userId"] =dbconnection::select_cookie_userId($c);
           // echo "done cookeki";
            return true ;

        }else{
            echo "gg";
            return false;
            echo"false";

        }
        //return $flag;

    }
    static  function redirect($url)
{
    ob_start();
    header('Location:' . $url);
    ob_end_flush();
    die();
}


}