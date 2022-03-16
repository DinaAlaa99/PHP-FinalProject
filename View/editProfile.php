<?php
session_start();
require_once "../vendor/autoload.php";
$mydb = new dbconnection();
if ($_SESSION["id"]) {
    if (isset($_POST['submit'])) {
        $newemail = ($_POST['Email']);
        $oldpassword = ($_POST['oldpassword']);
        $newPassword = ($_POST['newpassword']);
        $userId = $_SESSION["id"];

        
        if ($newemail!="") {
            if (dbconnection::select_user_email($userId, $newemail)) {
                if ($oldpassword!="") {
                    if (dbconnection::select_user_password($userId, $oldpassword)) {
                        if ($newPassword!="") {
                            $user = new user($newemail, $newPassword);
                            dbconnection::update_user($user,$userId);
                        } else {
                            echo "please enter the new password";
                        }
                    }
                } else {
                    echo "please enter your old password";
                }
            }
        }
        else{
            echo "please enter the new email";
        
        }
    }

} else {
    header("Location:paymentPage.php");
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
            <h2>E-mail</h2>
            <input type="email" placeholder="E-mail" name="Email" >
            <h2>Old Password</h2>
            <input type="password" name="oldpassword" placeholder="Password">
            <h2>New Password</h2>
            <input type="password" name="newpassword" placeholder="password">
            <p style="color:grey;width: 350px;">Notice:Password has to be (6-18) ch long, contain at least one lower case, Capital case and a number</p>
            <br><br><br>
            <button type="submit" name="submit">Confirm</button>
        </form>
    </div>


</div>


</body>
</html>