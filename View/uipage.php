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
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<!---<p><a href="download.php?path=aya.txt"><button>download</button></a></p>-->
<?php

//$file_name="product.txt";
$file_name=dbconnection::get_productName().".txt";

if(isset($_POST["download"])) {
    echo"in if";
    $database=new dbconnection();

   echo "<br>";
var_dump($_SESSION["id"]);
echo "<br>";
   $user_id= $_SESSION["id"] ;
  
   $product_id=1;
   $count=dbconnection::select_count($user_id);
   if($count <20)
    {
        $order_date = new DateTime();
        $order_date=$order_date->format('Y-m-d');
        echo $order_date;
        $count++;


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
<!--<form method="post" >
    <input type="submit" name="button1"
           class="button" value="button1" />-->

</form>
<div class="content">
    <div class="left">
        <img src="images/img2.png" alt="">
        <h1 class = "logo">XYZ</h1>
    </div>
    <div class="right">
        <div class="rightcontainer">
            <form method="post" >
                <input type="submit" name="download"class="button" value="Download" />

            </form><br>
            <form method="post" >
                <input type="submit" name="logout"class="button" value="Logout" />

            </form>
        </div>
    </div>
</div>
</body>
</html>
