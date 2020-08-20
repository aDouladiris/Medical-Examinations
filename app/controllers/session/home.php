<?php

class Home extends Controller {

    public function index(){        

        if(isset($_SESSION['email'])) {


            $this->view('session/home');
        }

    }

    public function logout(){

        session_unset();
        session_destroy();

        header('Location: ../');
        

    }




}