<?php
//Database Connection
include('../inc/dbcon.php');

//Add User Session
include('../session.php');
confirm_logged_in();

$id_session = $_SESSION['user_id'];



global $dbc;
$logoutQuery = "SELECT * FROM users WHERE user_id='$id_session'";
$doLogoutQuery = mysqli_query($dbc, $logoutQuery);
$row=mysqli_fetch_array($doLogoutQuery);
$getUserEmail = $row['email'];
$getUsername = $row['username'];

date_default_timezone_set('Africa/Lagos');
$date = date('M d, Y h:ia', time());

session_start();
session_destroy();

//Insert Logout Action By User to app history database
$insertLogoutHistoryQuery = "INSERT INTO app_history (user, action, date) VALUES ('$getUserEmail', '$getUsername logged out', 'Null')";

$doInsertLogoutHistoryQuery = mysqli_query($dbc, $insertLogoutHistoryQuery);

//Perform Logout Action
if(!$doInsertLogoutHistoryQuery){
    die("MySQL Query Failed" . mysqli_error($dbc));

}
else{
    header('location:./../app-home');

}

?>