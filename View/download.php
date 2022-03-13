<?php
require_once "../vendor/autoload.php";

$database=new dbconnection();
if(isset($_GET['path']))
{
//Read the filename
    $filename = $_GET['path'];
//Check the file exists or not
    if(file_exists($filename)) {

//Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');
        readfile($filename);
     $old_name=dbconnection::get_productName();
        //$old_name="product.txt";
        //$new_name="aya.txt";


        $old_name=dbconnection::get_productName();
        // echo  $old_name;
        // $old_name=explode(".",$old_name);
        $new_name=$old_name.rand(1,100000);
        dbconnection::update_productName($new_name);
        // echo  $new_name;
        rename( $old_name.".txt", $new_name.".txt") ;
        $new_name=$new_name.".txt";
//Clear system output buffer
        flush();

//Read the size of the file
        readfile($filename);
//Terminate from the script
        die();
    }
    else{
        echo "File does not exist.";
    }
}
else
    echo "Filename is not defined."
?>
