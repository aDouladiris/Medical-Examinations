<?php

class ExaminationsObserver implements SplObserver {

    //public $patient_id;
    public $exams_card;
    public $exams_bank;
    public $exams_insurance;


   
    public function update(\SplSubject $subject) {        

        $this->exams_bank = $subject->getBankContent();
        $this->exams_card = $subject->getCardContent();
        $this->exams_insurance = $subject->getInsuranceContent();




    }





}