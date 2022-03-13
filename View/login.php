<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new user($email, $password);
    $check = dbconnection::select_user($user);
    if ($check) {
        //$page = "uipage";
        header("Location:uipage.php");

    } else {
        // $page = "login";
        echo "email or password is invalid";
    }


    echo "<br>";
    echo "<br>";

}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<link rel="stylesheet" href="styles/styles.css">
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

<div class="content">
    <div class="left">
        <img src="images/img2.png" alt="">
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

        <label class="remember me">
            <input type="checkbox" checked="checked" name="checkbox"> Remember me
        </label>
        </form>
        </div>
    </div>

</div>


</body>
</html>
