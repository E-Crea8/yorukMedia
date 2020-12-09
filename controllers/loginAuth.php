<?php
   
    // Database connection
    include('./includes/dbcon.php');




    global $wrongPwdErr, $loginSuccess, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

    if(isset($_POST['login'])) {
        $username_signin        = $_POST['username_signin'];
        $password_signin     = $_POST['password_signin'];

        // clean data 
        $user_username = filter_var($username_signin, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection, $password_signin);

        // Query if username exists in db
        $sql = "SELECT * FROM  login_table WHERE username = '{$username_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($connection));
        }

        //Check password must not be less than 6, contains at least one special character, lowercase, uppercase and a digit
        if(!empty($username_signin) && !empty($password_signin)){
            if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 6 to 20 characters long, contains at least one special character, lowercase, uppercase and a digit.
                    </div>';
            }
            // Check if username exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        User account does not exist.
                    </div>';
            } else {
                //Set Remember Me Cookie
                if(!empty($_POST["remember"])) {
                    setcookie ("username_signin", $username_signin, time()+ (10 * 365 * 24 * 60 * 60));  
                    setcookie ("password_signin",	$password_signin,	time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie ("username_signin",""); 
                    setcookie ("password_signin","");
                }


                // Fetch user data and store in php session
                while($row = mysqli_fetch_array($query)) {
                    $user_id       = $row['id'];
                    $username         = $row['username'];
                    $pass_word     = $row['password'];
                    $is_active     = $row['active_status'];                 }

                // Verify password
                $password = password_verify($password_signin, $pass_word);

                // Allow only verified user
                if($is_active == '1') {
                    if($username_signin == $username && $password_signin == $password) {
                        $loginSuccess = '<div class="alert alert-success">
                                Logging in...
                            </div>';
                            header( "refresh:5;url=./app/dashboard" );
                       //header("Location: ./app/dashboard");
                       
                       $_SESSION['id'] = $user_id;
                       $_SESSION['user'] = $username;
                       //$_SESSION['lastname'] = $lastname;
                       //$_SESSION['email'] = $email;
                       //$_SESSION['mobilenumber'] = $mobilenumber;
                       //$_SESSION['token'] = $token;

                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Either username or password is incorrect.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Account verification is required for login.
                        </div>';
                }

            }

        } else {
            if(empty($email_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Username not provided!
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Password not provided!
                        </div>";
            }            
        }

    }
    
    

?>