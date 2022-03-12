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

   $user_id=1;
   $product_id=1;

   if(dbconnection::countOrder($user_id)<=7)
    {
        $order_date = new DateTime();
        $order_date=$order_date->format('Y-m-d');
        echo $order_date;
        dbconnection::insertOrder($order_date,$user_id,$product_id);
        // $user_order->setDownloadCount($count_order);
        header("Location:download.php?path=$file_name");
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
