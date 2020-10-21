<?php

class UserObserver implements SplObserver {

    public $patient_id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;

   
    public function update(\SplSubject $subject) {        

        $content = $subject->getUserContent();

        $this->patient_id = $content['patient_id'];
        $this->first_name = $content['first_name'];
        $this->last_name = $content['last_name'];
        $this->email = $content['email'];
        $this->password = $content['password'];


    }





}