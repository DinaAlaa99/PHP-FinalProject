<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();
if (isset($_POST["submit"])) {
    if (validate::validate_data() == 1) {
        header("Location:login.php");
    } elseif (validate::validate_data() == 0) {
        header("Location:paymentPage.php");
        echo "<div style='background-color: #404F5E'><h1 style='color: white'>user already exists.</h1></div>";
    } elseif (validate::validate_data() == -1) {
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
            <input type="email" placeholder="E-mail" name="email">
            <h2>Password</h2>
            <input type="password" placeholder="Password" name="password">
            <p   style="color:grey;width: 350px;">Notice:Password has to be (6-18) ch long, contain at least one lower case, Capital case and a number</p>
            <h2>Confirm-password</h2>
            <input type="password"  name="confirm" placeholder="Confirm password">
            <h2>Card number</h2>
            <input type="text" placeholder="Credit card" name="creditCard">
            <h2>Expiration date</h2>
            <input type="month" name="date" min="<?php echo (date("Y-m")) ?>" max="<?php echo (date('Y-m', strtotime('+3 years'))) ?>" >
            <br><br><br>
            <button type="submit" name="submit">Confirm</button>
        </form>
        <br>
        <a href="login.php">already have an acount</a>
    </div>
</div>
</body>
</html>