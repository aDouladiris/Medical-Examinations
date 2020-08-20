<?php

class Dao {

    private $conn;

    static $email;
    static $password;

    public function __construct($db_connection){

        $this->conn = $db_connection;       
        
    }

    public function create($table , $first_name, $last_name, $email, $password){

        $sql = "INSERT INTO " .$table. " (first_name, last_name, email, password) 
              VALUES ('$first_name', '$last_name', '$email', '$password') ";


        $db_create = mysqli_query($this->conn, $sql) 
        or die(mysqli_error($this->conn) . PHP_EOL . 
                '<script type="text/javascript">
                    alert("Ωχ! Κάτι πήγε στραβά!");
                </script>' . PHP_EOL . header( "Refresh:5; url = ../register")            
            );        
       

        // Close connection
        $this->conn->close();

        if ($db_create){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function dbReadUserLogin($email, $password){

        Dao::$email = $email;
        Dao::$password = $password;

        $email = mysqli_real_escape_string($this->conn, $email );
        $password = mysqli_real_escape_string($this->conn, $password );

        $sql = "SELECT * FROM patients WHERE email = '$email' and password = '$password'";

        echo $sql;

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        return $count;

    }

    public function dbReadUser(){

        $sql = "
        SELECT * 
        FROM patients 
        WHERE email = '$email'; ";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;

    }

    public function dbReadExams(){

        $sql = "
        SELECT examinations 
        FROM medical_exams 
        LEFT JOIN patients 
        ON patients.patient_id=medical_exams.patient_id 
        WHERE patients.email = '$email'; 
        ";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $row;

    }


    // public function login( $table , $email='mlpa@go.com', $password='12345'){

    //     $sql = "INSERT INTO " .$table. " (first_name, last_name, email, password) 
    //           VALUES ('" .$first_name. "', 'Beta2', 'mlpa11@go.com', '123456') ";


    //     $db_create = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

    //     // Close connection
    //     $this->conn->close();
    // }



                    // $conn = mysqli_connect("localhost", "root", "", "myDB");
 
                // // Check connection
                // if ($conn->connect_error) {
                //     die("Connection failed: " . $conn->connect_error);
                // }

                // // Create database
                // $sql = "CREATE DATABASE myDB";
                // if ($conn->query($sql) === TRUE) {
                //     echo "Database created successfully";
                // } else {
                //     echo "Error creating database: " . $conn->error;
                // }

                // // Delete database
                // $sql = "DROP DATABASE myDB";
                // if ($conn->query($sql) === TRUE) {
                //     echo "Database deleted successfully";
                // } else {
                //     echo "Error deleting database: " . $conn->error;
                // }

                
                 
                // Attempt create table query execution
                // $sql = "CREATE TABLE persons(
                //     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                //     first_name VARCHAR(30) NOT NULL,
                //     last_name VARCHAR(30) NOT NULL,
                //     email VARCHAR(70) NOT NULL UNIQUE
                // )";

                // if(mysqli_query($conn, $sql)){
                //     echo "Table created successfully.";
                // } else{
                //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                // }
                 
                // // Close connection
                // $conn->close();


}