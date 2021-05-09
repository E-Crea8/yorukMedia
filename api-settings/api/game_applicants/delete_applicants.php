<?php 
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    //Set ID to update applicant record
    $getApplicants->id = $data->id;


    //DELETE Applicant Record in Database
    if($getApplicants->deleteApplicants()) {
        echo json_encode(
            array('message' => 'Game Applicant Record Deleted Successfully')
        );

    } else {
        echo json_encode(
            array('message' => 'Game Applicant Record Deleted Successfully')
        );
        
    }

    ?>