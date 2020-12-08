<?php
 //$db = mysqli_connect('localhost', 'root', '') or
        //die ('Unable to connect. Check your connection parameters.');
        //mysqli_select_db($db, 'yoruk_media' ) or die(mysqli_error($db));
?>

<?php 

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yoruk_media";
    
    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")

?>