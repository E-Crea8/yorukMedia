<?php
//Start Session Here
include ('./session.php');

//Database Connection
include ('./../includes/dbcon.php');

//Create function to fetch user details
function getUserName(){
    global $connection;
    
    $user_query = "SELECT * FROM login_table WHERE user_id='$id_session'";
    $sqlQuery = mysqli_query($connection, $user_query);

    $row=mysqli_fetch_array($sqlQuery);
    $userRefCode = $row['user_ref_code'];

}

function logout(){
    global $connection;
    $logoutQuery = "SELECT * FROM login_table WHERE id='$id_session'";
    $doLogoutQuery = mysqli_query($connection, $logoutQuery);
    $row=mysqli_fetch_array($doLogoutQuery);
    $getUser = $row['username'];

    date_default_timezone_set('Africa/Lagos');
    $date = date('M d, Y h:ia', time());

    session_start();
    session_destroy();

    //Insert Logout Action By User to app history database
    $insertLogoutHistoryQuery = "INSERT INTO app_history (date, action, user) VALUES ('$date', '$getUser Logged Out', '$getUser')";

    $doInsertLogoutHistoryQuery = mysqli_query($connection, $insertLogoutHistoryQuery);

    //Perform Logout Action
    if(!$doInsertLogoutHistoryQuery){
        die("MySQL Query Failed" . mysqli_error($connection));

    }
    else{
        header('location:./app-home');

    }

    

}

?>