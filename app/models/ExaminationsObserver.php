<?php

class ExaminationsObserver implements SplObserver {

    public $patient_id;
    public $exams_card;
    public $exams_bank;



    // public function __construct($name) {
    //     $this->name = $name;
    // }

   
    public function update(\SplSubject $subject) {        

        $this->exams_bank = $subject->getBankContent();
        $this->exams_card = $subject->getCardContent();




    }





}