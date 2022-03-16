<?php
/*$old_name="aya.txt";
$new_name="tryname.txt";
/*echo "<p><a href=\"download.php?path=aya.txt\"><button>download</button></a></p>";
rename( $old_name, $new_name) ;
echo "<p><a href=\"download.php?path=$new_name\"><button>download2</button></a></p>";
 */
session_start();
//echo "<pre>";
//var_dump($_COOKIE);
//echo "</pre>";
//die;
//if (isset($_SESSION['userId'])) {
//    echo "logged in";
//} else {
//    echo "guest";
//}
//die;
require_once "../vendor/autoload.php";

/*echo "<form method=\"post\" action=\" download.php?path=$new_name\">";
include "../styles/styles.css";

echo "<input type=\"submit\" name=\"button1\"value=\"Button1\" />";*/
?>
<!DOCTYPE html>
<?php include "head.php"?>
<title> Download Page </title>


</head>
<body>
<!--<button><a href="logout.php">logout</a></button>-->

<!---<p><a href="download.php?path=aya.txt"><button>download</button></a></p>-->
<?php

if (isset($_SESSION["id"])) {
//$file_name="product.txt";
    $database = new dbconnection();
    $file_name = dbconnection::get_productName() . ".txt";

//$userCount = 8;
    if (isset($_POST["download"])) {

        echo "in if";
        $database = new dbconnection();
        echo "<br>";
        var_dump($_SESSION["id"]);
        echo "<br>";
        $user_id = $_SESSION["id"];
        $product_id = 1;
        $count = dbconnection::select_count($user_id);

        if ($count < 7) {
            $order_date = new DateTime();
            $order_date = $order_date->format('Y-m-d');
            echo $order_date;
            $count++;
            dbconnection::update_count($count, $user_id);
            //dbconnection::insertOrder($order_date,$user_id);
            // $user_order->setDownloadCount($count_order);
            header("Location:download.php?path=$file_name");
        } else {
            echo "you downloaded 7 times you should pay again";
            //delete token userid
            //delete order userid
            dbconnection::delete_user_from_order_table($user_id);
            dbconnection::delete_user_from_token_table($user_id);
            dbconnection::delete_user($user_id);

        }

    }
    if (isset($_POST["button2"])) {
    }

    /*function button1( $old_name, $new_name) {

rename( $old_name, $new_name) ;
echo"in function";
}*/
} else {
    header("Location:paymentPage.php");
}
?>
<div class="content">
    <div class="left">
        <img src="../images/img2.png" alt="">
        <h1 class = "logo">XYZ</h1>
    </div>
    <div class="right">
        <div class="rightcontainer">
            <form method="post" >
                <input type="submit" name="download"class="button" value="Download" />

            </form><br>
          <form method="get" action="logout.php" >
              <button type="submit" name="logout"class="button">logout</button>

            </form>
<!--            <button><a href="logout.php">logout</a></button>-->

        </div>
    </div>
</div>
</body>