<?php

class App {


    //default controller
    protected $controller = 'home';
    //default method
    protected $method = 'index';

    protected $params = [];


    public function __construct(){
        $url = $this->parseUrl();

        //$url_controller = $url[0];

        if(isset($url[0])){
            //If succeed, $this->controller will acquire the value of $url[0]. If not, its value is the default home.

            session_start();

            if(isset($_SESSION['email'])) {            

                if (file_exists('../app/controllers/session/' . $url[0] . '.php') ){
                    $this->controller = $url[0];
                    unset($url[0]);  
                } 
                
            }

            elseif(file_exists('../app/controllers/' . $url[0] . '.php')){

                $this->controller = $url[0];
                unset($url[0]);
            }
            
        }


        if(isset($_SESSION['email'])) {

            require_once '../app/controllers/session/' . $this->controller . '.php';            
        }
        else{
            require_once '../app/controllers/' . $this->controller . '.php';
        }

        // echo "<br>";
        // echo 'contr: ';
        // print_r($this->controller);
        // echo "<br>";        

        $this->controller = new $this->controller;

        // echo "<br>";
        // echo 'contr: ';
        // print_r($this->controller);
        // echo "<br>";

        if(isset($url[1])){
            if(method_exists( $this->controller, $url[1])){

                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseUrl(){

        if(isset($_GET['url'])){

            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));


        }    }



}