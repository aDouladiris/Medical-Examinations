<?php

class History extends Controller {

    public function index(){        

        if(isset($_SESSION['email'])) {


            $ExaminationsObservable = $this->model('ExaminationsObservable');
            $ExaminationsObserver = $this->model('ExaminationsObserver');
    
            $ExaminationsObservable->attach($ExaminationsObserver);
    
            $ExaminationsObservable->dbRead();


            $this->view('session/history', ['exams' => $ExaminationsObserver->exams ] );
        }





    }






}