<?php

require_once 'AbstractObservable.php';

class UserObservable extends AbstractObservable {


    protected $observers = array();

    protected $content_user;


   
    //set breakouts news
    public function dbRead($dao, $email) {

        $this->content_user = $dao->getPatientInfo($email);
        $this->notify();
    }

   
    public function getUserContent() {

       return $this->content_user;
        
    }

   




}