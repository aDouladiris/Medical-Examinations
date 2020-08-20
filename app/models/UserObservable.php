<?php

class UserObservable implements \SplSubject{


    private $observers = array();

    private $content;

   
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
        SELECT * 
        FROM patients 
        WHERE email = '$myusername'; ";

        $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


        $this->content = $row;
        $this->notify();
    }


   
    public function getContent() {

       return $this->content;
        
    }

   
    //notify observers(or some of them)
    public function notify() {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }



}