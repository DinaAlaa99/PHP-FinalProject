<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>XYZ payment</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <center><h1>XYZ</h1></center>
<div class="content">

    <div class="left">
        <img src="images/img2.png" alt="">
    </div>

    <div class="right">
        <form  method="post">
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
            <button type="submit">Confirm</button>
        </form>
    </div>

    
</div>

    
</body>
</html>
