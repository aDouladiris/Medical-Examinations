<?php

class ExaminationsObserver implements SplObserver {

    public $patient_id;
    public $exams;



    // public function __construct($name) {
    //     $this->name = $name;
    // }

   
    public function update(\SplSubject $subject) {        

        $this->exams = $subject->getContent();




    }





}