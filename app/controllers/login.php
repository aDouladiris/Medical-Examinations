<?php

class Login extends Controller {

    public function index(){

        $this->view('login' );

    }

    public function user_login(){

        if (isset($_POST['email']) && isset($_POST['password']) ){

            $conn = $this->model('dbConnect')->connect();
            $dao = $this->model('Dao', $conn );

            $email = $_POST['email'];
            $password = $_POST['password'];              
            $result = $dao->dbFindUserLogin($email, $password);

            if($result == 1) {

                $_SESSION['email'] = $email; 
                $_SESSION['password'] = $password;
                header('Location: ../home');

             }
             else {
                $error = "Your Login Name or Password is invalid";
                header('Location: ../home');
             }            

        }

    }






}