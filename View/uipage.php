<?php
/*$old_name="aya.txt";
$new_name="tryname.txt";
/*echo "<p><a href=\"download.php?path=aya.txt\"><button>download</button></a></p>";
rename( $old_name, $new_name) ;
echo "<p><a href=\"download.php?path=$new_name\"><button>download2</button></a></p>";
*/
require_once ("Vendor/autoload.php");
/*echo "<form method=\"post\" action=\" download.php?path=$new_name\">";
 echo "<input type=\"submit\" name=\"button1\"value=\"Button1\" />";*/
?>
<html>
<head>
<title>Download Files</title>
</head>
<body>
<!---<p><a href="download.php?path=aya.txt"><button>download</button></a></p>-->
<?php
//$old_name="aya.txt";
//$new_name="tryname.txt";
$file_name="product.txt";
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
        header("Location:View/download.php?path=$file_name");
    }
    else
        echo "you downloaded 7 times you should pay again";
}


/*function button1( $old_name, $new_name) {

    rename( $old_name, $new_name) ;
    echo"in function";
}*/

?>
<form method="post" >
    <input type="submit" name="button1"
           class="button" value="button1" />

</form>
</body>
</html>
