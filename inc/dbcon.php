<?php
 $dbc = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($dbc, 'yoruk_media' ) or die(mysqli_error($dbc));
?>