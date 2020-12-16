<?php

require('inc/dbcon.php');
require('session.php');
if (isset($_POST['login'])) {


  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $hashPassword = md5($password);
if ($hashPassword == ''){
     ?>    <script type="text/javascript">
                alert("Password is missing!");
                window.location = "app-home";
                </script>
        <?php
}else{
//create some sql statement             
        $checkUserSql = "SELECT * FROM users WHERE email='$email' AND password = '$hashPassword'";
        $result = $dbc->query($checkUserSql);

        if ($result){
        //get the number of results based in the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $result->num_rows > 0) {
            //Set Remember Me Cookie
            if(!empty($_POST["remember"])) {
            setcookie ("email", $email, time()+ (10 * 365 * 24 * 60 * 60));  
            setcookie ("password",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
            } else {
            setcookie ("email",""); 
            setcookie ("password","");
            }


                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['user_id']  = $found_user['user_id']; 
                $_SESSION['firstname'] = $found_user['firstname']; 
                $_SESSION['lastname']  =  $found_user['lastname'];  
                $_SESSION['email']  =  $found_user['email'];
                $_SESSION['password']  =  $found_user['password'];
                $_SESSION['username']  =  $found_user['username'];
                $_SESSION['user_ref_code']  =  $found_user['user_ref_code'];
                $_SESSION['active_status']  =  $found_user['active_status']; 
                $user = $_SESSION['email'];

        //this part is the verification if admin or user ka
        if ($email == $_SESSION['email'] && $hashPassword == $_SESSION['password']){
          $userLoginHistory = "INSERT INTO app_history (id,user,action,date)VALUES(Null,'$user','Logged In',Null)";
          mysqli_query($dbc,$userLoginHistory)or die ('Error in adding User Action to Database');
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert(" Welcome <?php echo  $_SESSION['firstname']; ?>!");
                      window.location = "app/dashboard";
                  </script>
             <?php        
           
        }elseif ($_SESSION['active_status']!='1'){
           
            ?>    <script type="text/javascript">
                     //then it will show user is not active
                     alert("Your account is inactive. Contact the administrator.");
                     window.location = "app-home";
                 </script>
            <?php        
          
       }
            } else {
            //IF user is not active
              ?>
                <script type="text/javascript">
                alert("Username or Password is not correct. ");
                window.location = "app-home";
                </script>
              <?php

            }

         } else {
                 # code...
        echo "Error: " . $sql . "<br>" . $dbc->error;
        }
        
    }       
} 
 $dbc->close();
?>