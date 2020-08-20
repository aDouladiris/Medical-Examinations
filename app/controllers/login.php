<?php

class Login extends Controller {

    public function index(){

        $this->view('login' );

    }

    public function user_login(){

        if (isset($_POST['email']) && isset($_POST['password']) ){

            $conn = $this->model('dbConnect')->connect();

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);


            $sql = "SELECT * FROM patients WHERE email = '$email' and password = '$password'";

            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
            $count = mysqli_num_rows($result);



            if($count == 1) {

                $_SESSION['email'] = $row['email']; 
                $_SESSION['password'] = $row['password'];
                
             
                header('Location: ../home');

             }
             else {
                $error = "Your Login Name or Password is invalid";
             }            

        }

    }






}