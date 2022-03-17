<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();
if (!isset($_SESSION["id"])) {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = new user($email, $password);
        $check = dbconnection::select_user($user);
        if ($check) {
            //$page = "uipage";
            $userid = dbconnection::select_userId($user);
            $_SESSION["id"] = $userid;
            header("Location:uipage.php");
        } else {
            echo "<div style='background-color: #404F5E'><h1 style='color: white'>email or password is invalid.</h1></div>";
            header("Location:login.php");

        }
    }} else {
    header("Location:uipage.php");
}

?>
<!DOCTYPE html>
<?php include "head.php"?>
<title> Login Page </title>
</head>
<body>
<div class="content">
    <div class="left">
        <img src="../images/img2.png" alt="">
        <h1 class = "logo">XYZ</h1>
    </div>
    <div class="right">
        <div class="login">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
             <h2>E-mail</h2>
            <input type="email" placeholder="E-mail" name="email">
            <h2>Password</h2>
            <input type="password" placeholder="Password" name="password">
             <br><br><br>
            <button type="submit" name="login">login</button>
            <br><br>
            <input type="checkbox" checked="checked" name="checkbox" style="width:10px;height:10px">
            <label>Remember me</label>

        </form>
        </div>
    </div>

</div>
</body>
</html>