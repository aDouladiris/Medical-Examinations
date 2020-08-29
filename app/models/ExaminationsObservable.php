<?php

class ExaminationsObservable implements \SplSubject{


    private $observers = array();

    private $content_bank;
    private $content_card;
   
    public function __construct() {

    }

    //add observer
    public function attach(\SplObserver $observer) {
        $this->observers[] = $observer;
    }
   
    //remove observer
    public function detach(\SplObserver $observer) {
       
        $key = array_search($observer,$this->observers, true);
        if($key){
            unset($this->observers[$key]);
        }
    }
   
    //set breakouts news
    public function dbRead() {

        require_once '../app/models/dbConnect.php';

        //$conn = $this->model('dbConnect')->connect();

        $conn = new dbConnect;
        $conn = $conn->connect();


        $myusername = 'htta@gmail.com';
        $mypassword = '1';


        //$sql = "SELECT * FROM patients WHERE email = '$myusername' and password = '$mypassword'";

        $sql = "
        SELECT date, time, examination, price, bank_name, account_number, iban, total
        FROM patients
        LEFT JOIN receipt_patients 
        ON patients.patient_id=receipt_patients.patient_id
        LEFT JOIN receipt_bank 
        ON receipt_patients.timestamp_hash=receipt_bank.timestamp_hash        
        LEFT JOIN receipt_card 
        ON receipt_patients.timestamp_hash=receipt_card.timestamp_hash        
        LEFT JOIN receipt_examinations 
        ON receipt_patients.timestamp_hash=receipt_examinations.timestamp_hash
        WHERE receipt_bank.timestamp_hash IS NOT NULL AND patients.email = 'htta@gmail.com'
        GROUP BY examination
        ;";

        $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $this->content_bank = $row;

        $sql = "
        SELECT date, time, examination, price, name, card_number, expiration, cvv, total
        FROM patients
        LEFT JOIN receipt_patients 
        ON patients.patient_id=receipt_patients.patient_id
        LEFT JOIN receipt_bank 
        ON receipt_patients.timestamp_hash=receipt_bank.timestamp_hash        
        LEFT JOIN receipt_card 
        ON receipt_patients.timestamp_hash=receipt_card.timestamp_hash        
        LEFT JOIN receipt_examinations 
        ON receipt_patients.timestamp_hash=receipt_examinations.timestamp_hash
        WHERE receipt_card.timestamp_hash IS NOT NULL AND patients.email = 'htta@gmail.com'
        GROUP BY examination
        ;";

        $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $this->content_card = $row;



        $this->notify();
    }


   
    public function getBankContent() {

       return $this->content_bank;
        
    }

    public function getCardContent() {

        return $this->content_card;
         
     }

   
    //notify observers(or some of them)
    public function notify() {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }



}