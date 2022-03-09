 <?php
/*$old_name="aya.txt";
$new_name="tryname.txt";
/*echo "<p><a href=\"download.php?path=aya.txt\"><button>download</button></a></p>";
rename( $old_name, $new_name) ;
echo "<p><a href=\"download.php?path=$new_name\"><button>download2</button></a></p>";
*/

/*echo "<form method=\"post\" action=\" download.php?path=$new_name\">";
 echo "<input type=\"submit\" name=\"button1\"value=\"Button1\" />";*/
?>
<html>
<head>
<title>Download Files</title>
</head>
<body>
<!---<p><a href="download.php?path=aya.txt"><button>download</button></a></p>-->
<?php
$old_name="aya.txt";
$new_name="tryname.txt";
if(isset($_POST["button1"])) {
    //button1($old_name, $new_name);
    echo"in if";
    header("Location:download.php?path=$old_name");
}


/*function button1( $old_name, $new_name) {

    rename( $old_name, $new_name) ;
    echo"in function";
}*/

?>
<form method="post" >
    <input type="submit" name="button1"
           class="button" value="button1" />

</form>
</body>
</html>
