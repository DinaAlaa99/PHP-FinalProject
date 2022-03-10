<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
</head>
<body>
<form method="post">
    <div class="imgcontainer">
        <!--<img src="img_avatar2.png"
             alt="Avatar"
             class="avatar">-->
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username"  name="email" required> <br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required> <br>

        <button type="submit" name="login">Login</button> <br>
        <label>
            <input type="checkbox" checked="checked" name="checkbox"> Remember me
        </label>
    </div>

</form>


</body>
</html>
