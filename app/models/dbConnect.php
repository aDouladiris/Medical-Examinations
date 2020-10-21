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

                // Attempt create table about exams category
                $sql_createTable = "CREATE TABLE appRecords.categories (
                    exam_id INT NOT NULL,
                    examination VARCHAR(30) NOT NULL,
                    price DECIMAL (4, 2) NOT NULL
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
                $sql_createTable = "CREATE TABLE appRecords.receipt_patients (
                    patient_id INT NOT NULL,
                    date VARCHAR(30) NOT NULL,
                    time VARCHAR(30) NOT NULL,
                    timestamp_hash VARCHAR(30) NOT NULL PRIMARY KEY,
                    total VARCHAR(30) NOT NULL,
                    FOREIGN KEY(patient_id) REFERENCES patients(patient_id)
                )";

                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.receipt_card (
                    timestamp_hash VARCHAR(30) NOT NULL,
                    name VARCHAR(30) NOT NULL,
                    card_number VARCHAR(16) NOT NULL,
                    expiration VARCHAR(7) NOT NULL,
                    cvv VARCHAR(3) NOT NULL,
                    FOREIGN KEY(timestamp_hash) REFERENCES receipt_patients(timestamp_hash)
                )";

                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.receipt_bank (
                    timestamp_hash VARCHAR(30) NOT NULL,
                    bank_name VARCHAR(30) NOT NULL,
                    account_number VARCHAR(30) NOT NULL,
                    iban VARCHAR(30) NOT NULL,                    
                    FOREIGN KEY(timestamp_hash) REFERENCES receipt_patients(timestamp_hash)
                )";

                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.receipt_insurance (
                    timestamp_hash VARCHAR(30) NOT NULL,
                    description VARCHAR(100) NOT NULL,        
                    FOREIGN KEY(timestamp_hash) REFERENCES receipt_patients(timestamp_hash)
                )";

                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }

                // Attempt create table query execution
                $sql_createTable = "CREATE TABLE appRecords.receipt_examinations (
                    timestamp_hash VARCHAR(30) NOT NULL,
                    examination VARCHAR(30) NOT NULL,
                    price VARCHAR(30) NOT NULL,
                    FOREIGN KEY(timestamp_hash) REFERENCES receipt_patients(timestamp_hash)
                )";

                if(mysqli_query($connection, $sql_createTable)){
                    echo "Table created successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_createTable. " . mysqli_error($connection);
                }                

                //populate table                
                $sql_populateTable = "INSERT INTO appRecords.categories (exam_id, examination, price)
                VALUES
                    (1, 'Γενική Εξέταση Αίματος', 2.50),
                    (1, 'Αιματοκρίτης', 0.20),
                    (1, 'Έλεγχος αναιμίας Ι', 10.00),
                    (1, 'Δείκτης αιμοπεταλίων', 1.76),
                    (1, 'Έλεγχος θυρεοειδούς ΙΙΙ', 60.00),

                    (2, 'Ακτινογραφία πανοραμική', 20.00),
                    (2, 'Ψηφιακή ακτινογραφία πανοραμική', 20.00),
                    (2, 'Ακτινογραφία θώρακος', 7.50),
                    (2, 'Ακτινογραφία αγκώνος', 7.50),
                    (2, 'Ακτινογραφία κρανίου', 7.50),

                    (3, 'Ειδική Ανοσοσφαιρίνη IgE', 8.00),
                    (3, 'Rast I1 - Μέλισσα', 10.00),
                    (3, 'Rast IX1A* - Εισπνεόμενα1(G3/W1/W6/G6/T8)', 10.00),
                    (3, 'RastMX1A* - Μύκητες1(Μ1/Μ2/Μ3//M5/Μ6)', 12.00),
                    (3, 'Rast E2 - Επιθήλιο σκύλου', 8.00),

                    (4, 'ANCA-C', 5.00),
                    (4, 'Αυστραλιανό Αντιγόνο (HBsAg)', 5.00),
                    (4, 'Strep Test', 5.46),
                    (4, 'Αντισώματα HIV', 4.75),
                    (4, 'Προγεννητικός αιματολογικός έλεγχος', 70.00),

                    (5, 'Αξονική τομογραφία θώρακος', 40.00),
                    (5, 'Αξονική αγγειογραφία θώρακος', 71.00),
                    (5, 'Αξονική τομογραφία άκρου πόδος', 45.00),
                    (5, 'Αξονική τομογραφία γόνατος', 45.00),
                    (5, 'Αξονική τομογραφία ποδοκνημικής', 40.00)
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
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.patients TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }


                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.categories TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.receipt_patients TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.receipt_card TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }
                
                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.receipt_bank TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.receipt_insurance TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
                if ($connection->query($sql_assignPermissions) === TRUE) {
                    echo "Assigning Privs successfully";
                } else {
                    echo "Error Assigning Privs: " . $connection->error;
                }                

                // Assign User permissions
                $sql_assignPermissions = "GRANT SELECT, INSERT, UPDATE ON appRecords.receipt_examinations TO 'applicationAccount'@'localhost' WITH GRANT OPTION; ";
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