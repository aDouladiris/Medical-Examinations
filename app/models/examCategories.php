<?php

class ExamCategories { 


    public function __construct(){
        
    }

    public function getExaminations($dao, $category_index){

        return $dao->getExaminations($category_index);

    }


}    