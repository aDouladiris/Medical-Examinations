<?php

require_once 'AbstractObservable.php';

class ExaminationsObservable extends AbstractObservable {


    protected $observers = array();

    protected $content_bank;
    protected $content_card;  
    protected $content_insurance;   
   
    //set breakouts news
    public function dbRead($dao, $email) {

        $row = $dao->getHistoricalExaminations($email);

        $this->content_bank = $row[0];
        $this->content_card = $row[1];
        $this->content_insurance = $row[2];

        $this->notify();
    }


   
    public function getBankContent() {

       return $this->content_bank;
        
    }

    public function getCardContent() {

        return $this->content_card;
         
     }

     public function getInsuranceContent() {

        return $this->content_insurance;
         
     }


}