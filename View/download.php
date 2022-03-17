<?php
session_start();

require_once "../vendor/autoload.php";
$database = new dbconnection();

if (isset($_GET['path'])) {
//Read the filename
    $filename = $_GET['path'];
//Check the file exists or not
    if (file_exists($filename)) {

//Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Length: ' . filesize($filename));
        header('Pragma: public');
        $old_name = dbconnection::get_productName();
        $new_name = $old_name . rand(1, 10);
        dbconnection::update_productName($new_name);
        rename($old_name . ".txt", $new_name . ".txt");
        //Clear system output buffer
        flush();
        //Read t//he size of the file
        readfile($filename);
        //Terminate from the script
        die();
    } else {
        echo "<div style='background-color: #404F5E '><h1 style='color: white'>File does not exist.</h1></div>";
    }
} else {
    echo "<div style='background-color: #404F5E'><h1 style='color: white'>Filename is not defined.</h1></div>";
}
