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

    //GET ID
    $getApplicants->id = isset($_GET['id']) ? $_GET['id'] : die();

    //GET Applicant Data
    $getApplicants->readSingleApplicant();

    //Create Single Applicant Data Array
    $getApplicants_arr = array(
        'id' => $getApplicants->id,
        'firstname' => $getApplicants->firstname,
        'lastname' => $getApplicants->lastname,
        'email' => $getApplicants->email,
        'phone' => $getApplicants->phone,
        'address_of_residence' => $getApplicants->address_of_residence,
        'city_of_residence' => $getApplicants->city_of_residence,
        'state_of_residence' => $getApplicants->state_of_residence,
        'games_no_times' => $getApplicants->games_no_times,
        'applicants_ref_code' => $getApplicants->applicants_ref_code,
        'payment_status' => $getApplicants->payment_status,
        'date_reg' => $getApplicants->date_reg             
    );

    //Make JSON
    print_r(json_encode($getApplicants_arr));


    ?>