<?php 

class dbConnect {

    private function init(){
        $host = 'localhost';
        $user = 'root';
        $connection = mysqli_connect($host,$user); 

        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        return $connection; 

    }

    public function connect(){
        $host = 'localhost';
        $user = 'applicationAccount';
        $pass = '123';
        $db = 'appRecords';

        try
        {
            if ( $connection = @mysqli_connect($host,$user,$pass,$db) )
            {
                return $connection; 
            }
            elseif ( $connection = $this->init() )
            {
                // Create database
                $sql_createdb = "CREATE DATABASE appRecords";
                if ($connection->query($sql_createdb) === TRUE) {
                    echo "Database created successfully";
                } else {
                    echo "Error creating database: " . $connection->error;
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.patients (
                    patient_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    first_name VARCHAR(30) NOT NULL,
                    last_name VARCHAR(30) NOT NULL,
                    email VARCHAR(70) NOT NULL UNIQUE,
                    password VARCHAR(35) NOT NULL
                )";


                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                //populate table                
                $sql_populateTable = "INSERT INTO appRecords.patients(first_name, last_name, email, password)
                VALUES 
                    ('Alpha','Zita','zita@gmail.com','1'),
                    ('Beta','Htta','htta@gmail.com','1'),
                    ('Gamma','Theta','theta@gmail.com','1'),
                    ('Delta','Giwta','giwta@gmail.com','1'),
                    ('Epsilon','Kappa','kappa@gmail.com','1');
                    ";



                if(mysqli_query($connection, $sql_populateTable)){
                    echo "Table populated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($connection);
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.medical_exams (
                    patient_id INT NOT NULL,
                    examinations VARCHAR(30) NOT NULL,
                    FOREIGN KEY(patient_id) REFERENCES patients(patient_id)
                )";


                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                //populate table                
                $sql_populateTable = "INSERT INTO appRecords.medical_exams (patient_id, examinations)
                VALUES
                    (1, 'eksetash_1'),
                    (1, 'eksetash_2'),
                    (1, 'eksetash_3'),
                    (1, 'eksetash_4'),
                    (1, 'eksetash_5'),
                    (2, 'eksetash_6'),
                    (2, 'eksetash_7'),
                    (2, 'eksetash_8'),
                    (2, 'eksetash_9'),
                    (2, 'eksetash_10'),
                    (3, 'eksetash_11'),
                    (3, 'eksetash_12'),
                    (3, 'eksetash_13'),
                    (3, 'eksetash_14'),
                    (3, 'eksetash_15'),
                    (4, 'eksetash_16'),
                    (4, 'eksetash_17'),
                    (4, 'eksetash_18'),
                    (4, 'eksetash_19'),
                    (4, 'eksetash_20'),
                    (5, 'eksetash_21'),
                    (5, 'eksetash_22'),
                    (5, 'eksetash_23'),
                    (5, 'eksetash_24'),
                    (5, 'eksetash_25')
                    ;";


                if(mysqli_query($connection, $sql_populateTable)){
                    echo "Table populated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($connection);
                }

                // Create user account for login
                $sql_createUser = "CREATE USER 'applicationAccount'@'localhost' IDENTIFIED BY '123'; ";
                if ($connection->query($sql_createUser) === TRUE) {
                    echo "User Account created successfully";
                } else {
                    echo "Error creating User Account: " . $connection->error;
                }

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.medical_exams TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.patients TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }



                // Assign User permissions
                $sql_flush = "FLUSH PRIVILEGES; ";
                if ($connection->query($sql_flush) === TRUE) {
                    echo "Flush successfully";
                } else {
                    echo "Error flushing: " . $connection->error;
                }

                $connection = mysqli_connect($host,$user,$pass,$db);

                return $connection;
            }            
            else
            {                
                throw new Exception('Unable to connect');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        

    }
    
}