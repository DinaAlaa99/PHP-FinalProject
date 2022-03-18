<?php
session_start();
require_once "../vendor/autoload.php";
?>
<!DOCTYPE html>
<?php include "head.php"?>
<title> Download Page </title>
</head>
<body>
<?php
if (isset($_SESSION["id"])) {
    $database = new dbconnection();
    $file_name = dbconnection::get_productName() . ".txt";
    if (isset($_POST["download"])) {
        $database = new dbconnection();
        $user_id = $_SESSION["id"];
        $product_id = 1;
        $count = dbconnection::select_count($user_id);
        if ($count < _download_count) {
            $order_date = new DateTime();
            $order_date = $order_date->format('Y-m-d');
            echo $order_date;
            $count++;
            dbconnection::update_count($count, $user_id);
            header("Location:download.php?path=$file_name");
        } else {
            echo "<div style='background-color: #404F5E'><h1 style='color: blue'>you downloaded 7 times you should pay again.</h1></div>";
            dbconnection::delete_user_from_order_table($user_id);
            dbconnection::delete_user_from_token_table($user_id);
            dbconnection::delete_user($user_id);
            setcookie("remember_me", "", -1, '/');
            session_unset();
            session_destroy();
        }
    }
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
<<<<<<< HEAD

            </form><br>
              <form method="get" action="editProfile.php" >
              <button type="submit" name="Edit Profile"class="button">Edit Profile</button>

=======
            </form><br>
              <form method="get" action="editProfile.php" >
              <button type="submit" name="Edit Profile"class="button">Edit Profile</button>
>>>>>>> origin/css
            </form>
        </div>
    </div>
</div>
</body>