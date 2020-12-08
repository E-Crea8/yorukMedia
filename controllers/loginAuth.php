<?php
   
    // Database db
    include('./includes/dbcon.php');


    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

    if(isset($_POST['login'])) {
        $username_signin        = $_POST['username_signin'];
        $password_signin     = $_POST['password_signin'];
        
        //SET COOKIE
        //if(!empty($_POST["remember"])) {
           // setcookie ("username_signin",$_POST["username_signin"],time()+ 3600);
            //setcookie ("password_signin",$_POST["password_signin"],time()+ 3600);
            //echo "Cookies Set Successfully";
        //} else {
          //  setcookie("username_signin","");
            //setcookie("password_signin","");
            //echo "Cookies Not Set";
       // }        
        
        // clean data 
        $username = filter_var($username_signin, FILTER_SANITIZE_STRING);
        $pswd = mysqli_real_escape_string($db, $password_signin);



        // Query if email exists in db
        $sql = "SELECT * FROM login_table WHERE username = '{$username_signin}' ";
        $query = mysqli_query($db, $sql);
        $rowCount = mysqli_num_rows($query);


                // Query if email exists in db
                $sql3 = "SELECT * FROM login_table WHERE username = '{$username_signin}' ";
                $query3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_array($query3);
                $passwordDB = $row3['password'];
        
                // Verify password
                $password = password_verify($pswd, $passwordDB);


        // Query if password exists in db
        $sql2 = "SELECT * FROM login_table WHERE password = '{$passwordDB}' ";
        $query2 = mysqli_query($db, $sql2);
        $passwordCheck = mysqli_num_rows($query2);
        //$passwordConfirm = $passwordCheck[''];

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($db));
        }

        if(!empty($username_signin) && !empty($password_signin)){
            if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
                        Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                    </div>';
            }
            // Check if username exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        Username is incorrect!
                    </div>';
            } 
            elseif($passwordCheck <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        Password is incorrect!
                    </div>';
            } 
            
            else {
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
                    $password     = $row['password'];
                    $is_active     = $row['active_status']; 
                }

                // Allow only verified administrator
                if($is_active == '1') {
                    if($username_signin == $username && $password_signin == $password) {
                        if($username_signin == $username && $password_signin == $password) {
						
						session_start();
						$_SESSION['id'] = $user_id;
						$user = $username;
						date_default_timezone_set('Africa/Lagos');
						$date = date('M d, Y h:ia', time());
						
						
			            echo "<script>alert('Welcome back ".$username."! Click OK to go to your dashboard.'); window.location='app/dashboard'</script>";
						
					//$submit_query = "INSERT INTO user_history (date,action,user)VALUES('$date','Logged In','$user')";
					
					// Create mysql query
				   $sqlQuery = mysqli_query($db, $submit_query);

						

                    } 
					
                } 
            
					else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                Either username or password is incorrect!
                            </div>';
                    }
					                    } 
				else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            Your account is inactive. Contact the super administrator!
                        </div>';
                }


            }

        } 
        


		
		
		
		
		
		
		else {
            if(empty($username_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                           Username or email not provided.
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                           Password not provided.
                        </div>";
            }            
        }
	}
    

?>