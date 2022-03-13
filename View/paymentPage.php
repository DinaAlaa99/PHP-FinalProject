<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();
if (isset($_POST["submit"])) {
    if (validate::validate_data() == 1) {
        //require_once "View/login.php";
        //$page = "login";
        header("Location:login.php");


    } elseif (validate::validate_data() == 0) {
        //$page="paymentpage";
        header("Location:paymentpage.php");


        echo "user already exists";
    } elseif (validate::validate_data() == -1) {
        //$page="unsuccessful";
        // $page = "paymentpage";
        header("Location:paymentpage.php");

        echo "invalid info";

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>XYZ payment</title>
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>E-mail</h2>
            <input type="email" placeholder="E-mail" name="email">
            <h2>Password</h2>
            <input type="password" placeholder="Password" name="password">
            <p   style="color:grey;width: 350px;">Notice:Password has to be (6-18) ch long, contain at least one lower case, Capital case and a number</p>
            <h2>Confirm-password</h2>
            <input type="password"  name="confirm" placeholder="Confirm password">
            <h2>Card number</h2>
            <input type="text" placeholder="Credit card" name="creditCard">
            <h2>Expiration date</h2>
            <input type="month" name="date" min="<?php echo(date("Y-m")) ?>" max="<?php echo(date('Y-m', strtotime('+3 years')))?>" >
            <br><br><br>
            <button type="submit" name="submit">Confirm</button>
        </form>
    </div>

    
</div>

    
</body>
</html>
