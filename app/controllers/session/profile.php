<?php

class Profile extends Controller {

    public function index(){        

        if(isset($_SESSION['email'])) {

            $email = $_SESSION['email'];
            $conn = $this->model('dbConnect')->connect(); 
            $dao = $this->model('Dao', $conn );


            $UserObservable = $this->model('UserObservable');
            $UserObserver = $this->model('UserObserver');    
            $UserObservable->attach($UserObserver);    
            $UserObservable->dbRead($dao, $email);


            $ExaminationsObservable = $this->model('ExaminationsObservable');
            $ExaminationsObserver = $this->model('ExaminationsObserver');    
            $ExaminationsObservable->attach($ExaminationsObserver);    
            $ExaminationsObservable->dbRead($dao, $email);


            $conn->close();

            $this->view('session/profile', ['first_name' => $UserObserver->first_name, 
                                            'last_name'  => $UserObserver->last_name,
                                            'email'  => $UserObserver->email,
                                            'exams_bank' => $ExaminationsObserver->exams_bank,
                                            'exams_card' => $ExaminationsObserver->exams_card,
                                            'exams_insurance' => $ExaminationsObserver->exams_insurance,] );
        }





    }




}