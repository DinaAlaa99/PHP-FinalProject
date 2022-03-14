<?php
/*$old_name="aya.txt";
$new_name="tryname.txt";
/*echo "<p><a href=\"download.php?path=aya.txt\"><button>download</button></a></p>";
rename( $old_name, $new_name) ;
echo "<p><a href=\"download.php?path=$new_name\"><button>download2</button></a></p>";
*/
session_start();
require_once "../vendor/autoload.php";

/*echo "<form method=\"post\" action=\" download.php?path=$new_name\">";
include "../styles/styles.css";

 echo "<input type=\"submit\" name=\"button1\"value=\"Button1\" />";*/
?>
<html>
<head>
<title>Download Files</title>
    <style>
        center{
            font-size: x-large;
        }
        body{
            background-color: rgb(234, 245, 241);
        }
        .content{

            display: flex;
            margin: 0 auto;
            width :80%

        }
        h2,h1{
            color: rgb(112, 112, 243);
            margin-bottom: 5px;
        }
        .left{
            max-width: 50%;
            float: left;
        }


        .right{
            padding-left: 30%;
            align-items: center;
            justify-content: center;
            width: 50%;
            float: right;
            padding-bottom: 20px;

        }
        input{
            font-size: larger;
            width: 350px;
            height: 40px;
            border-radius: 5px;
        }
        .logo{
            text-align: center;
        }

        button{
            font-size: larger;
            border-radius: 7px;
            height: 40px;
            width: 350px;
            color: whitesmoke;
            background-color:rgb(112, 112, 243);
            border: none;
        }
        button:hover{
            background-color:darkblue;
        }

        img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
<!---<p><a href="download.php?path=aya.txt"><button>download</button></a></p>-->
<?php
//$old_name="aya.txt";
//$new_name="tryname.txt";
$file_name="product.txt";
//$userCount = 8;
if(isset($_POST["button1"])) {

    //button1($old_name, $new_name);
    echo"in if";
    $database=new dbconnection();
    //$count_order=0;


   // $user_order=new order($order_date);
   echo "hhhhhhhhhhhhhhh<br>";
var_dump($_SESSION["id"]);
echo "<br>";
   $user_id= $_SESSION["id"] ;
  
   $product_id=1;
   $count=dbconnection::select_count($user_id);
   if($count <7)
    {
        $order_date = new DateTime();
        $order_date=$order_date->format('Y-m-d');
        echo $order_date;
        $count++;
        dbconnection::update_count($count,$user_id);
        //dbconnection::insertOrder($order_date,$user_id);
        // $user_order->setDownloadCount($count_order);
        header("Location:download.php?path=$file_name");
    }
    else
        echo "you downloaded 7 times you should pay again";
}
if(isset($_POST["button2"])){

}


/*function button1( $old_name, $new_name) {

    rename( $old_name, $new_name) ;
    echo"in function";
}*/

?>
<?php
$database=new dbconnection();
$user_id= $_SESSION["id"] ;
$product_id=1;
$count=dbconnection::select_count($user_id);
if ($count < 7) {
    $order_date = new DateTime();
    $order_date=$order_date->format('Y-m-d');
    //echo $order_date;
    $count++;
    dbconnection::update_count($count,$user_id);
    ?>
<a href="<?php echo "download.php?path=$file_name";?>">download</a>
<?php } else { ?>
<h2>you exceeded ur no of downloads</h2>
<?php } ?>
<!--<form method="post" >-->
<!--    <input type="submit" name="button1"-->
<!--           class="button" value="download" />-->
<!--</form>-->
<!--<form method="post" >-->
<!--    <input type="submit" name="button2"-->
<!--           class="button" value="logout" />-->
<!--</form>-->
</body>
</html>
