<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<div class="content">
    <div class="left">
        <img src="images/img2.png" alt="">
        <h1 class = "logo">XYZ</h1> 
    </div>


    <div class="right">
        <div class="login">
        <form  method="post">
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
