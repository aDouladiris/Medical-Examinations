<?php

class Dao {

    private $conn;

    public function __construct($db_connection){

        $this->conn = $db_connection;       
        
    }

    public function create($table, $first_name, $last_name, $email, $password){

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

    public function dbFindUserLogin($email, $password){ 

        $sql = "SELECT * FROM patients WHERE email = '$email' and password = '$password'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // Close connection
        $this->conn->close();

        return $count;

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
            $this->conn->close();
            return;
        }

        if (gettype($pay_method) == 'string'){

            $sql_populateTable = "INSERT INTO appRecords.receipt_insurance (timestamp_hash, description)
            VALUES
                ('$timestamp_hash', '$pay_method' )
                ;";

            if(mysqli_query($this->conn, $sql_populateTable)){
                //echo "Table populated successfully.";
                
            } else{
                echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);  
                $this->conn->close();
                return;            
            }
        }
        else if (count($pay_method) > 3){

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
                $this->conn->close();
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
                $this->conn->close();
                return;
            }
        }


        foreach ($examinations as $item) {
                $description = $item[1];
                $price = $item[0]; // . " Ευρώ";

                //populate table, multiple inserts      
                $sql_populateTable = "INSERT INTO appRecords.receipt_examinations (timestamp_hash, examination, price )
                VALUES                    
                        ('$timestamp_hash', '$description', '$price' )
                    ;";

                if(mysqli_query($this->conn, $sql_populateTable)){
                    //echo "Table populated successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql_populateTable. " . mysqli_error($this->conn);
                    $this->conn->close();
                    return;
                }
        }

        echo "Η εγγραφή καταχωρήθηκε επιτυχώς!";

        // Close connection
        $this->conn->close();
        

    }


    public function getExaminations($category_index){

        $sql = "
        SELECT * 
        FROM categories 
        WHERE exam_id = '$category_index'; ";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $row;

    }

    public function getHistoricalExaminations($email){

        $returning_row = array();

        $sql = "
        SELECT date, time, examination, price, bank_name, account_number, iban, total
        FROM patients
        LEFT JOIN receipt_patients 
        ON patients.patient_id=receipt_patients.patient_id
        LEFT JOIN receipt_bank 
        ON receipt_patients.timestamp_hash=receipt_bank.timestamp_hash        
        LEFT JOIN receipt_examinations 
        ON receipt_patients.timestamp_hash=receipt_examinations.timestamp_hash
        WHERE receipt_bank.timestamp_hash IS NOT NULL AND patients.email = '$email'
        ORDER BY date DESC, time DESC;
        ;";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $returning_row[0] = $row;

        $sql = "
        SELECT date, time, examination, price, name, card_number, expiration, cvv, total
        FROM patients
        LEFT JOIN receipt_patients 
        ON patients.patient_id=receipt_patients.patient_id        
        LEFT JOIN receipt_card 
        ON receipt_patients.timestamp_hash=receipt_card.timestamp_hash        
        LEFT JOIN receipt_examinations 
        ON receipt_patients.timestamp_hash=receipt_examinations.timestamp_hash
        WHERE receipt_card.timestamp_hash IS NOT NULL AND patients.email = '$email'
        ORDER BY date DESC, time DESC;
        ;";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $returning_row[1] = $row;

        $sql = "
        SELECT date, time, examination, price, description, total
        FROM patients
        LEFT JOIN receipt_patients 
        ON patients.patient_id=receipt_patients.patient_id
        LEFT JOIN receipt_insurance 
        ON receipt_patients.timestamp_hash=receipt_insurance.timestamp_hash
        LEFT JOIN receipt_examinations 
        ON receipt_patients.timestamp_hash=receipt_examinations.timestamp_hash
        WHERE receipt_insurance.timestamp_hash IS NOT NULL AND patients.email = '$email'
        ORDER BY date DESC, time DESC;
        ;";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $returning_row[2] = $row;

        return $returning_row;

    }

    public function getPatientInfo($email){

        $sql = "
        SELECT * 
        FROM patients 
        WHERE email = '$email'; ";

        $result = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $row;
    }



}