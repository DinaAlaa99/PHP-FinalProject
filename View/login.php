<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<!--<link rel="stylesheet" href="styles/styles.css">-->
</head>
<body>
<center><h1>XYZ</h1></center>
<form  method="post">

    

    <div class="right">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter your email"  name="email" required> <br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter your Password" name="password" required> <br>

        <button type="submit" name="login">Login</button> <br>
        <label>
            <input type="checkbox" checked="checked" name="checkbox"> Remember me
        </label>
    </div>

</form>


</body>
</html>
