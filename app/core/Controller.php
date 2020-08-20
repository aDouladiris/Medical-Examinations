<?php

class Controller {



    public function model($model, $params=' '){

        require_once '../app/models/'. $model .'.php';

        if ($params != ' '){
            return new $model($params);
        }
        else {
            return new $model();
        }        

    }

    

    public function view($view, $data = [] ){       

        require_once '../app/views/' . $view . '.php';

    }

    
}