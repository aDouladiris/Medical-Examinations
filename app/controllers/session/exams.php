<?php

class Exams extends Controller {

    public function index(){              

        if(isset($_SESSION['email']) && isset($_SESSION['password']) ) {

            $email = $_SESSION['email'];
            $conn = $this->model('dbConnect')->connect();                       
            $dao = $this->model('Dao', $conn );

            if ( isset($_POST['category']) ){
                $exam_category = $_POST['category'][0];

                $examCategories = $this->model('examCategories');

                echo json_encode($examCategories->getExaminations($dao, $exam_category) );

                die();
                                
            }

            $UserObservable = $this->model('UserObservable');
            $UserObserver = $this->model('UserObserver');    
            $UserObservable->attach($UserObserver);    
            $UserObservable->dbRead($dao, $email);

            $conn->close();            

            $this->view('session/exams', ['patient_id' => $UserObserver->patient_id,
                                          'first_name' => $UserObserver->first_name, 
                                          'last_name'  => $UserObserver->last_name,
                                          'email'  => $UserObserver->email                                          
                                          ] );
        }

    }

    public function receipt(){

        if(isset($_SESSION['email']) && isset($_SESSION['password']) ) {


            if(isset($_POST['patient_id']) && 
               isset($_POST['receipt_date']) &&
               isset($_POST['receipt_time']) &&
               isset($_POST['timestamp_hash']) &&
               isset($_POST['pay_method']) &&               
               isset($_POST['total_payment']) &&
               isset($_POST['examinations'])
            ) {                

                $patient_id = $_POST['patient_id'];
                $receipt_date = $_POST['receipt_date'];
                $receipt_time = $_POST['receipt_time'];
                $timestamp_hash = $_POST['timestamp_hash'];
                $pay_method = $_POST['pay_method'];
                $total_payment = $_POST['total_payment'];
                $examinations = $_POST['examinations'];

                $conn = $this->model('dbConnect')->connect();
                $dao = $this->model('Dao', $conn );

                $dao->dbInsertReceipt($patient_id, $receipt_date, $receipt_time, $timestamp_hash, $pay_method, $total_payment, $examinations);

            }
            
            die();

        }

    }









}