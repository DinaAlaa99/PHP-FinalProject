<?php
class login{
static function check_Login(){
if (isset($_SESSION["sessionid"])&&is_numeric($_SESSION["sessionid"])){
return true;
}/*elseif(isset($_COOKIE["remember_me"])&& $_COOKIE["remember_me"]==correct_token){
$_SESSION["userid"] =5;
return true;*/
// }
else{
return false;
}
}
}