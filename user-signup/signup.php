<?php
// include('./register.php');

?>

<?php
// $errors = [];

/*Attention : 
I have a more indepth course on paystack integration where I built projects using paystack like:
1. Donation application
2. User subscription etc 
CONTACT Me now if you want it: thelordofapps@gmail.com
*/

// if (isset($_POST['payNow'])) {

//   $firstname = $_POST['firstname'];
//   $lastname = $_POST['lastname'];
//   $email = $_POST['email'];
//   $phone = $_POST['phone']; 
//   $address_of_residence = $_POST['address_of_residence'];
//   $city_of_residence = $_POST['city_of_residence'];
//   $state_of_residence = $_POST['state_of_residence'];
//   $games_no_times = $_POST['games_no_times'];

// $gameAmount = 1000;
// $overallAmount = $games_no_times * $gameAmount;
// //Sanitize form inputs from harmful data
//  $sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);
 
//  //Collect form data into regular post variables
//  $firstname = $sanitizer['firstname'];
//  $lastname = $sanitizer['lastname'];
//  $email = $sanitizer['email'];
//  $phone = $sanitizer['phone'];
//  $address_of_residence = $sanitizer['address_of_residence'];
//  $city_of_residence = $sanitizer['city_of_residence'];
//  $state_of_residence = $sanitizer['state_of_residence'];
//  $games_no_times = $sanitizer['games_no_times'];
//  $product_name = "Moment of Truth Game Show Payment";

// // if(empty($first_name) || empty($last_name) || empty($phone) || empty($email)){
// // header("Location: verify-email.php");
// // }else{
//  session_start();
// $_SESSION['firstname'] =  $firstname;
// $_SESSION['lastname'] =  $lastname;
// $_SESSION['email']  = $email;
// $_SESSION['phone']  = $phone;
// $_SESSION['address_of_residence']  = $address_of_residence;
// $_SESSION['city_of_residence']  = $city_of_residence;
// $_SESSION['state_of_residence']  = $state_of_residence;
// $_SESSION['games_no_times']  = $games_no_times;
// $_SESSION['product_name']  = $product_name;
// $_SESSION['price']  = $overallAmount;

// echo $firstname;
// //echo $email;

// // }
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous"><!------ Include the above in your HEAD tag ---------->
    
    <title>Yu-rok media - Sign Up</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
    *{
        font-family: 'Quicksand', sans-serif;
    }
    img {width:100%;}

    .bg-yurok{
        background: #A01F62;
    }
    .btn-yurok{
        background: #A01F62;
        color: #ffffff;
    }
    
    </style>
</head>
<body>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-yurok text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                        <img src="./../assets/img/logo2.fw.png" style="width:80%">
                        <h3 class="py-3">Register Here</h3>
                        <p>Welcome to Yu-Rock Media where everybody gets a chance to play the moment of truth game and win.</p>
                        <p>Signup now to increase your chance of wining.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>

                <!-- Form Started -->
                <form name="signup" id="signupForm" method="post">
                <!-- <?php if (count($errors) > 0): ?>
				  <div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php foreach ($errors as $error): ?>
					<li>
					  <?php echo $error; ?>
					</li>
					<?php endforeach;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				  </div>

				<?php endif;?> -->


                <div id="error">
                <!-- error will be showen here ! -->
                </div>    
                           
         <!-- First Form Row -->
                <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="firstName" name="firstname" placeholder="First Name" class="form-control" type="text" required>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Last Name" required>
                        </div>
                      </div>

                      <!-- Second Form Row -->
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input id="email" name="email" placeholder="Email" class="form-control" type="email" required>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        </div>
                      </div>

                      <!-- Third Form Row with Fieldset-->
                    <fieldset>
                        <legend>Address Information</legend>
                        <div class="form-row">
                        <div class="form-group col-md-12">
                                  <textarea id="residenceAddress" name="address_of_residence" cols="40" rows="3" class="form-control" placeholder="Address" required></textarea>
                        </div>
                    </div>

                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="residenceCity" name="city_of_residence" placeholder="City" class="form-control" required="required" type="text">
                        </div>
                        <div class="form-group col-md-6">
                                  
                                  <select id="residenceState" name="state_of_residence" class="form-control">
                                  <option disabled selected>--Select State--</option>
                                <option value="Abia">Abia</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Akwa Ibom">Akwa Ibom</option>
                                <option value="Anambra">Anambra</option>
                                <option value="Bauchi">Bauchi</option>
                                <option value="Bayelsa">Bayelsa</option>
                                <option value="Benue">Benue</option>
                                <option value="Borno">Borno</option>
                                <option value="Cross Rive">Cross River</option>
                                <option value="Delta">Delta</option>
                                <option value="Ebonyi">Ebonyi</option>
                                <option value="Edo">Edo</option>
                                <option value="Ekiti">Ekiti</option>
                                <option value="Enugu">Enugu</option>
                                <option value="FCT">Federal Capital Territory</option>
                                <option value="Gombe">Gombe</option>
                                <option value="Imo">Imo</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Kano">Kano</option>
                                <option value="Katsina">Katsina</option>
                                <option value="Kebbi">Kebbi</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Kwara">Kwara</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Nasarawa">Nasarawa</option>
                                <option value="Niger">Niger</option>
                                <option value="Ogun">Ogun</option>
                                <option value="Ondo">Ondo</option>
                                <option value="Osun">Osun</option>
                                <option value="Oyo">Oyo</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Rivers">Rivers</option>
                                <option value="Sokoto">Sokoto</option>
                                <option value="Taraba">Taraba</option>
                                <option value="Yobe">Yobe</option>
                                <option value="Zamfara">Zamfara</option>
                              </select>
                        </div>
                        </div>

                    </fieldset>

                      <!-- Fourth Form Row -->
                      <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                          <input id="gamesTimes" name="games_no_times" class="form-control" type="number" placeholder="Select no. of times you would like to play the game" required>
                        </div>
                        <!-- <div class="form-group col-md-6">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        </div> -->
                      </div>


                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="agree"  required>
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                              </div>
                    
                          </div>
                    </div>
                    
                    <div class="form-row">
                    <button type="button" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" name="btn-register" class="btn btn-lg btn-yurok" style="width: 100%;"> Submit </button> 
                        <!-- <button type="button" name="payNow" onclick="payPageWithPaystack()" class="btn btn-lg btn-yurok" style="width: 100%;">Submit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- PayPal Modal -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Are you sure you want to submit the following details?

                <!-- We display the details entered by the user here -->
                <table class="table" method="POST">
                <form name="user_payment">
                <input type="text" id="fname2" name="firstname">
                <input type="text" id="lname2" name="lastname">
                <input type="text" id="phones2" name="phone">
                <input type="text" id="rc2" name="residence_city">
                </form>
                <?php 
                
                ?>



                    <tr>
                        <th>First Name</th>
                        <td id="fname"></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td id="lname"></td>

                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="phones"></td>
                        
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="emails"></td>
                        <input type="text" id="emails2" name="email">
                    </tr>
                    <tr>
                        <th>Residence Address</th>
                        <td id="ra"></td>
                        <input type="text" id="ra2" name="residence_address">
                    </tr>
                    <tr>
                        <th>Residence City</th>
                        <td id="rc"></td>
                    </tr>
                    <tr>
                        <th>Residence State</th>
                        <td id="rs"></td>
                        <input type="text" id="rs2" name="residence_state">
                    </tr>
                    <tr>
                        <th>No. of times you want to play the game</th>
                        <td id="gnot"></td>
                        <input type="text" id="gnot2" name="games_no_times">
                    </tr>
                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Submit</a>
            </div>
        </div>
    </div>
</div>


<!-- JavaScripts -->
<!-- PayStack API Script -->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_e5c825c90146ca7e568c5526ec7e51289b9bab50',
      email: '<?php echo $email; ?>',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script> -->

<script>
$('#submitBtn').click(function() {
     /* when the button in the form, display the entered values in the modal */
     
     $('#fname').text($('#firstName').val());
     $('#fname2').val($('#firstName').val());
     $('#lname').text($('#lastName').val());
     $('#lname2').val($('#lastName').val());
     $('#emails').text($('#email').val());
     $('#emails2').val($('#email').val());
     $('#phones').text($('#phone').val());
     $('#phones2').val($('#phone').val());
     $('#ra').text($('#residenceAddress').val());
     $('#ra2').val($('#residenceAddress').val());
     $('#rc').text($('#residenceCity').val());
     $('#rc2').val($('#residenceCity').val());
     $('#rs').text($('#residenceState').val());
     $('#rs2').val($('#residenceState').val());
     $('#gnot').text($('#gamesTimes').val());
     $('#gnot2').val($('#gamesTimes').val());
});

$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    alert('submitting');
    $('#signupForm').submit();
});
</script>

</body>
</html>