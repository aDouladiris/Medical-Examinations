<?php

class Profile extends Controller {

    public function index(){        

        if(isset($_SESSION['email'])) {


            $UserObservable = $this->model('UserObservable');
            $UserObserver = $this->model('UserObserver');
    
            $UserObservable->attach($UserObserver);
    
            $UserObservable->dbRead();

            $ExaminationsObservable = $this->model('ExaminationsObservable');
            $ExaminationsObserver = $this->model('ExaminationsObserver');
    
            $ExaminationsObservable->attach($ExaminationsObserver);
    
            $ExaminationsObservable->dbRead();


            $this->view('session/profile', ['first_name' => $UserObserver->first_name, 
                                            'last_name'  => $UserObserver->last_name,
                                            'email'  => $UserObserver->email,
                                            'exams' => $ExaminationsObserver->exams ] );
        }





    }




}