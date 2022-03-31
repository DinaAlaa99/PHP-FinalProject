<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();
$flag=isset($_SESSION['flag'])?($_SESSION['flag']):100;
$redify=isset($_SESSION['redify'])?($_SESSION['redify']):100;
//$redify=$_SESSION['redify'];

//$error=100;
if (isset($_POST["submit"])) {

    if (validate::validate_data() == 1) {
        header("Location:login.php");

    } elseif (validate::validate_data() == 0) {
        header("Location:paymentPage.php");
        

        echo "user already exists";
    } elseif (validate::validate_data() == -1) {
        echo "invalid info";
        header("Location:paymentPage.php");

    }

}
?>
    <?php include "head.php"?>
    <title>XYZ </title>

</head>
<body>

<div class="content">

   <div class="left">
        <img src="../images/img2.png" alt="">
        <h1 class = "logo">XYZ</h1>
    </div>

    <div class="right">

    
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
            <h2>E-mail</h2>

            <?php
            //$error=100;
            if($redify==2 )
            {
                echo('<input style="border: red solid 3px;" type="email" placeholder="E-mail" name="email">');
            }
            else{
                echo('<input type="email" placeholder="E-mail" name="email" value=""> ');

            }
            ?>

<h2>Password</h2>


            <?php
            if($redify==3 )
            {

                echo('<input style="border: red solid 3px;" type="password" placeholder="Password" name="password">');
            }
            else{
                echo('<input type="password" placeholder="Password" name="password">');

            }
            ?>



            
            
            
            <p   style="color:grey;width: 350px;">Notice:Password has to be (6-18) ch long, contain at least one lower case, Capital case and a number</p>
            <h2>Confirm-password</h2>
            <?php
            
            if($redify==4 )
            {

                echo('<input style="border: red solid 3px;" type="password"  name="confirm" placeholder="Confirm password">');
            }
            else{
                echo('<input  type="password"  name="confirm" placeholder="Confirm password">');

            }
            ?>
            
            <h2>Card number</h2>
            <?php
            if($redify==5 )
            {

                echo('<input  style="border: red solid 3px;" type="text" placeholder="Credit card" name="creditCard">');
            }
            else{
                echo('<input  type="text" placeholder="Credit card" name="creditCard">');

            }
            ?>
            <h2>Expiration date</h2>
            <?php
            if($redify==6 )
            {

                echo('<input style="border: red solid 3px;" type="month" name="date" min="<?php echo (date("Y-m")) ?>" >');
            }
            else{
                echo('<input type="month" name="date" min="<?php echo (date("Y-m")) ');

            }
            ?>
            
            <br><br><br>
            <button type="submit" name="submit">Confirm</button>
        </form>
        <br>
        <a href="login.php">already have an acount</a>
    </div>


</div>

</body>

</html>