<?php 
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //include database
    include_once './../../config/database.php';
    include_once './../../modules/game_applicants.php';

    //Instantiate DB $ Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Applicants Post
    $getApplicants = new getApplicants($db);

    //Applicant Registration Query
    $result = $getApplicants->read();

    //Get Row Count
    $num = $result->rowCount();

    // Check if there's any applicants
    if($num > 0) {
        //Get Applicants Array
        $getApplicants_arr  = array();
        $getApplicants_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $getApplicants_item = array(
                'id' => $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'address_of_residence' => $address_of_residence,
                'city_of_residence' => $city_of_residence,
                'state_of_residence' => $state_of_residence,
                'games_no_times' => $games_no_times,
                'applicants_ref_code' => $applicants_ref_code,
                'payment_status' => $payment_status,
                'date_reg' => $date_reg,                
            );

            //Push to "data"
            array_push($getApplicants_arr['data'], $getApplicants_item);

        }

        //Turn to JSON and Output array
        echo json_encode($getApplicants_arr);

    } else {
        //No applicants registered in table
        echo json_encode(
            array('message' => 'No Applicants Found')
        );
    }

?>