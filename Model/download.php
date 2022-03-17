<?php

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

//Clear system output buffer
        flush();
        $old_name="aya.txt";
        $new_name="tryname.txt";
//Read the size of the file
        readfile($filename);
       rename( $old_name, $new_name) ;
//Terminate from the script
        die();
    }
    else{
        echo "<div style='background-color: #404F5E'><h1 style='color: white'>File does not exist.</h1></div>";
    }
}
else
    echo "<div style='background-color: #404F5E'><h1 style='color: white'>Filename is not defined.</h1></div>";
?>
