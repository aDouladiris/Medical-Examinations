<?php

class Register extends Controller {

    public function index(){

        $this->view('register' );

    }

    public function create(){

        if (isset($_POST['first_name']) &&
            isset($_POST['last_name']) &&
            isset($_POST['email']) && 
            isset($_POST['password']) && 
            isset($_POST['confirm_password'])
            ){            

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                if ($password == $confirm_password){

                    $this->dao = $this->model('Dao', $this->model('dbConnect')->connect() );

                    $register = $this->dao->create("patients" , $first_name, $last_name, $email, $password);

                    if ($register){
                        echo '<script type="text/javascript">
                            alert("Ο λογαριασμός σας δημιουργήθηκε με επιτυχία!");
                            window.location.replace("../login");
                            </script>';
                    }
                    
                }

            }







    }






}