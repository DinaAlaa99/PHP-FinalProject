<?php
require_once "vendor/autoload.php";

class login
{
    public static $flag =-1;
    //$_SESSION["id"] = 5;

    ///<!--<?php echo $_SERVER["PHP_SELF"];

    static function check_Login(){
        if (isset($_SESSION["id"])&&is_numeric($_SESSION["id"])){
            echo "done session";
           return true;
         }elseif(isset($_COOKIE["remember_me"])&&is_numeric(dbconnection::select_cookie($_COOKIE["remember_me"]))){
            dbconnection::update_cookie($_COOKIE["remember_me"]);
            $_SESSION["id"] =5;
            echo "done cookeki";
            return true ;

        }else{
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