<?php

class ExamCategories {

    public $exams_per_category;


    public function __construct($category_index){

          $this->category_index = $category_index;

          require_once '../app/models/dbConnect.php';

          $conn = new dbConnect;
          $conn = $conn->connect();

          $sql = "
          SELECT * 
          FROM categories 
          WHERE exam_id = '$this->category_index'; ";
  
          $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
          $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

          $this->exams_per_category = $row;
        
    }


}    