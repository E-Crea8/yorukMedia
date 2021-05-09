<?php
    class getApplicants {
        //Database Queries
        private $conn;
        private $table = 'game_applicants';

        //Game Applicants Table Properties
        public $id;
        public $firstname;
        public $lastname;
        public $email;
        public $phone;
        public $address_of_residence;
        public $city_of_residence;
        public $state_of_residence;
        public $games_no_times;
        public $applicants_ref_code;
        public $payment_status;
        public $date_reg;

        //Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        //GET Game Applicants
        public function read () {
            //Create Query
            $query = 'SELECT
            id,
            firstname,
            lastname,
            email,
            phone,
            address_of_residence,
            city_of_residence,
            state_of_residence,
            games_no_times,
            applicants_ref_code,
            payment_status,
            date_reg
        FROM
            ' . $this->table . ' ORDER BY id DESC';

            //Prepare Statement
            $stmt = $this->conn->prepare($query);

            //Execute Query
            $stmt->execute();

            return $stmt;

            
        }

        //GET Single Applicants Data by ID
        public function readSingleApplicant() {
        //Create Query
        $query = 'SELECT
        id,
        firstname,
        lastname,
        email,
        phone,
        address_of_residence,
        city_of_residence,
        state_of_residence,
        games_no_times,
        applicants_ref_code,
        payment_status,
        date_reg
    FROM
        ' . $this->table . ' WHERE id = ?
        LIMIT 0,1';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute Query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set Properties
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];
        $this->phone = $row['phone'];
        $this->address_of_residence = $row['address_of_residence'];
        $this->city_of_residence = $row['city_of_residence'];
        $this->state_of_residence = $row['state_of_residence'];
        $this->games_no_times = $row['games_no_times'];
        $this->applicants_ref_code = $row['applicants_ref_code'];
        $this->payment_status = $row['payment_status'];
        $this->date_reg = $row['date_reg'];
            

        }

        //CREATE Game Applicant Record
        public function createApplicants() {
            //Create Query
            $query = 'INSERT INTO ' . $this->table . '
                SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                phone = :phone,
                address_of_residence = :address_of_residence,
                city_of_residence = :city_of_residence,
                state_of_residence = :state_of_residence,
                games_no_times = :games_no_times,
                applicants_ref_code = :applicants_ref_code,
                payment_status = :payment_status';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address_of_residence = htmlspecialchars(strip_tags($this->address_of_residence));
        $this->city_of_residence = htmlspecialchars(strip_tags($this->city_of_residence));
        $this->state_of_residence = htmlspecialchars(strip_tags($this->state_of_residence));
        $this->games_no_times = htmlspecialchars(strip_tags($this->games_no_times));
        $this->applicants_ref_code = htmlspecialchars(strip_tags($this->applicants_ref_code));
        $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
        //$this->date_reg = htmlspecialchars(strip_tags($this->date_reg));

        //Bind data
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address_of_residence', $this->address_of_residence);
        $stmt->bindParam(':city_of_residence', $this->city_of_residence);
        $stmt->bindParam(':state_of_residence', $this->state_of_residence);
        $stmt->bindParam(':games_no_times', $this->games_no_times);
        $stmt->bindParam(':applicants_ref_code', $this->applicants_ref_code);
        $stmt->bindParam(':payment_status', $this->payment_status);
        //$stmt->bindParam(':date_reg', $this->date_reg);

        //Execute Query
        if($stmt->execute()){
            return true;

        }
        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

        }


        //UPDATE Game Applicants Records
        public function updateApplicants() {
            //Create Query
            $query = 'UPDATE ' . $this->table . '
                SET
                firstname = :firstname,
                lastname = :lastname,
                email = :email,
                phone = :phone,
                address_of_residence = :address_of_residence,
                city_of_residence = :city_of_residence,
                state_of_residence = :state_of_residence,
                games_no_times = :games_no_times,
                applicants_ref_code = :applicants_ref_code,
                payment_status = :payment_status
                WHERE 
                id = :id';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address_of_residence = htmlspecialchars(strip_tags($this->address_of_residence));
        $this->city_of_residence = htmlspecialchars(strip_tags($this->city_of_residence));
        $this->state_of_residence = htmlspecialchars(strip_tags($this->state_of_residence));
        $this->games_no_times = htmlspecialchars(strip_tags($this->games_no_times));
        $this->applicants_ref_code = htmlspecialchars(strip_tags($this->applicants_ref_code));
        $this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Bind data
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address_of_residence', $this->address_of_residence);
        $stmt->bindParam(':city_of_residence', $this->city_of_residence);
        $stmt->bindParam(':state_of_residence', $this->state_of_residence);
        $stmt->bindParam(':games_no_times', $this->games_no_times);
        $stmt->bindParam(':applicants_ref_code', $this->applicants_ref_code);
        $stmt->bindParam(':payment_status', $this->payment_status);
        $stmt->bindParam(':id', $this->id);

        //Execute Query
        if($stmt->execute()){
            return true;

        }
        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

        }


        //DELETE Game Applicants Records
        public function deleteApplicants() {
            //Create Query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //Prepare Statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // //Bind data
        $stmt->bindParam(':id', $this->id);

        //Execute Query
        if($stmt->execute()){
            return true;

        }
        //print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

        }





    }
?>