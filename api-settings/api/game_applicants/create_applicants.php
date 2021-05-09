<?php 
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');

    //include database
    include_once './../../config/database.php';
    include_once './../../modules/game_applicants.php';

    //Instantiate DB $ Connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Game Applicants Post
    $getApplicants = new getApplicants($db);

    //Get raw posted data for game applicants
    $data = json_decode(file_get_contents("php://input"));

    $getApplicants->firstname = $data->firstname;
    $getApplicants->lastname = $data->lastname;
    $getApplicants->email = $data->email;
    $getApplicants->phone = $data->phone;
    $getApplicants->address_of_residence = $data->address_of_residence;
    $getApplicants->city_of_residence = $data->city_of_residence;
    $getApplicants->state_of_residence = $data->state_of_residence;
    $getApplicants->games_no_times = $data->games_no_times;
    $getApplicants->applicants_ref_code = $data->applicants_ref_code;
    $getApplicants->payment_status = $data->payment_status;
    //$getApplicants->date_reg = $data->date_reg;

    //Create Applicant Record in Database
    if($getApplicants->createApplicants()) {
        echo json_encode(
            array('message' => 'Game Applicant Created')
        );

    } else {
        echo json_encode(
            array('message' => 'Game Applicant Not Created')
        );
        
    }

    ?>