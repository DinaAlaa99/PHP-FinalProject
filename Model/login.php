<?php
require_once "vendor/autoload.php";

class login
{
    public static function check_Login()
    {
        if (isset($_SESSION["id"]) && is_numeric($_SESSION["id"])) {
            return true; //is_numeric(dbconnection::select_cookie($_COOKIE["remember_me"]))
        } elseif (isset($_COOKIE["remember_me"])) {
            $c = $_COOKIE["remember_me"];
            $_SESSION["userId"] = dbconnection::select_cookie_userId($c);
            return true;

        } else {
            return false;
        }
    }
    public static function redirect($url)
    {
        ob_start();
        header('Location:' . $url);
        ob_end_flush();
        die();
    }

}
