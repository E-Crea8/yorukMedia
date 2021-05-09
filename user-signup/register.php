<?php
$errors = [];

// Database Connection
include('./../inc/dbcon.php');

// SIGN UP USER
if (isset($_POST['btn-register'])) {
    // if (empty($_POST['firstname'])) {
    //     $errors['firstname'] = 'First name required!';
    // }
    // if (empty($_POST['lastname'])) {
    //     $errors['lastname'] = 'Last name required!';
    // }
    // if (empty($_POST['username'])) {
    //     $errors['username'] = 'Username required!';
    // }
    // if (empty($_POST['password'])) {
    //     $errors['password'] = 'Password required!';
    // }
    // if (isset($_POST['password']) && $_POST['password'] !== $_POST['c_password']) {
    //     $errors['c_password'] = 'Password do not match!';
    // }
    // if (empty($_POST['phone_no'])) {
    //     $errors['phone_no'] = 'Phone number required!';
    // }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 
    $address_of_residence = $_POST['address_of_residence'];
    $city_of_residence = $_POST['city_of_residence'];
    $state_of_residence = $_POST['state_of_residence'];
    $games_no_times = $_POST['games_no_times'];
	
    $token = bin2hex(random_bytes(20)); // generate unique token

					//Generate Local Time
					date_default_timezone_set('Africa/Lagos');
					$regDate = date('M d, Y h:ia', time());


    // Check if email already exists
    $checkEmailSql = "SELECT * FROM game_applicants WHERE email='$email' LIMIT 1";
    global $dbc;
    $result = mysqli_query($dbc, $checkEmailSql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = " Sorry, the email is already taken!";
        
    }

    if (count($errors) === 0) {
		

                    // Query
                    $sql = "INSERT INTO game_applicants (firstname, lastname, email, phone, address_of_residence, city_of_residence, state_of_residence, games_no_times, applicants_ref_code, payment_status)
                     VALUES ('$firstname', '$lastname', '$email', '$phone', '$address_of_residence', '$city_of_residence', '$state_of_residence', '$games_no_times', '$token', '0')";
                    $appHistorySql = "INSERT INTO app_history (user, action) 
                    VALUES ('$email', 'Registered on the app')";
                    
                    // Create mysql query
                    global $dbc;
                    $sqlQuery = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
                    $sqlQuery2 = mysqli_query($dbc, $appHistorySql) or die(mysqli_error($dbc));
					
					// TO DO: send verification email to user
						//sendVerificationEmail($email, $token);
                    
                    if(!$sqlQuery || !$sqlQuery2){
                        die("MySQL query failed!" . mysqli_error($dbc));
                    } 
					else{
                        // echo "<script>alert('You have successfully registered. Kindly click OK to proceed!'); window.location='./../app-home'</script>";
                        echo "<script>
                        $('#signup-form').on('submit', function(e){
                            $('#confirmModal').modal('show');
                            e.preventDefault();
                          });
                   </script>";                    }		
		
		
		
    }
}


?>