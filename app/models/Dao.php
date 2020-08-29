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

        //echo $sql;

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

    public function dbInsertReceipt($patient_id, $receipt_date, $receipt_time, $timestamp_hash, $pay_method, $total_payment, $examinations ){

        // populate table                
        $sql_populateTable = "INSERT INTO appRecords.receipt_patients (patient_id, date, time, timestamp_hash, total)
        VALUES
            ('$patient_id', '$receipt_date', '$receipt_time', '$timestamp_hash', '$total_payment')
            ;";

        if(mysqli_query($this->conn, $sql_populateTable)){
            //echo "Table populated successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);
            return;
        }

        if (count($pay_method) > 3){

            $name = $pay_method['username'];
            $card_number = $pay_method['cardNumber'];
            $expiration = $pay_method['MM'] . '-' . $pay_method['YY'];
            $cvv = $pay_method['cvv'];

            $sql_populateTable = "INSERT INTO appRecords.receipt_card (timestamp_hash, name, card_number, expiration, cvv)
            VALUES
                ('$timestamp_hash', '$name', '$card_number', '$expiration', '$cvv' )
                ;";

            if(mysqli_query($this->conn, $sql_populateTable)){
                //echo "Table populated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);    
                return;            
            }
        }
        else {

            $bank_name = $pay_method['bank_name'];
            $acount_number = $pay_method['acount_number'];
            $iban = $pay_method['iban'];

            //populate table                
            $sql_populateTable = "INSERT INTO appRecords.receipt_bank (timestamp_hash, bank_name, account_number, iban )
            VALUES
                ('$timestamp_hash', '$bank_name', '$acount_number', '$iban' )
                ;";

            if(mysqli_query($this->conn, $sql_populateTable)){
                //echo "Table populated successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);
                return;
            }
        }


        foreach ($examinations as $item) {
                $description = $item[1];
                $price = $item[0];

                //populate table, multiple inserts      
                $sql_populateTable = "INSERT INTO appRecords.receipt_examinations (timestamp_hash, examination, price )
                VALUES                    
                        ('$timestamp_hash', '$description', '$price' )
                    ;";

                if(mysqli_query($this->conn, $sql_populateTable)){
                    //echo "Table populated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);
                    return;
                }
        }

        echo "Η εγγραφή καταχωρήθηκε επιτυχώς!";
        

    }



}