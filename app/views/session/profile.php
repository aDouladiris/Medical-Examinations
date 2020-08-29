<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Συνδεδεμένος Χρήστης</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/indexStyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.js"></script>



    <script src="js/session/profile.js"></script>
    <style>
         .left {
            /* border: none; */
            text-align: center;
            height: 150px;
            width: 700px;

        }

        .right {
            /* border: none; */
            text-align: center;
            height: 300px;
            width: 900px;            
        }

    
        .top {
            /* border: none; */
            text-align: center;
        }

        table {
            margin: 15%;
        }

        iframe {
            float;
        }

        #receipt_table, th, td {
            border: 1px solid black;
            color: white;
        }

        .ui-dialog {
            
            position: absolute;
            box-shadow: 1px 1px 30px 5px;
            background-image: -moz-linear-gradient(0deg, #884d80 0%, #9795f0 0%, #2b5876 0%, #4e4376 100%);
            background-image: -webkit-linear-gradient(0deg, #884d80 0%, #9795f0 0%, #2b5876 0%, #4e4376 100%);
            background-image: -ms-linear-gradient(0deg, #884d80 0%, #9795f0 0%, #2b5876 0%, #4e4376 100%); }
            border-radius: 10px;
            outline: none;
            overflow: hidden;
            margin-top: none;
        }


    </style>


</head>
<body>
    <div class="main" id="main">
        <div class="d-flex flex-row">  

            <div class="container top p-2">
                <h2>Καλώς ήρθες <?php echo $_SESSION["email"]; ?></h2>
            </div>


        </div>

        <div class="d-flex flex-row">

            <div class="d-flex flex-column ">
                <div class="container left p-2">
                    <h3> 
                        Στοιχεία χρήστη.
                    </h3>
                        <?php echo $data['first_name'] ?>
                        <br>
                        <?php echo $data['last_name'] ?>
                        <br>
                        <?php echo $data['email'] ?>                        
                </div>   
                
                <div class="container left p-2">
                    <h3> 
                        Επιστροφή στο μενού
                    </h3>
                    <form action="home">
                        <button type="submit" class="btn">
                        <i class='fa fa-hand-o-left' style='font-size:48px;color:white'></i>
                        </button>
                    </form>
                </div>   
 
            </div>

            <div class="container right p-2">
                <h3> 
                    Ιστορικό.
                </h3>

                <table class="mx-auto">
                    <tr>
                        <td>
                            <button onclick="openHistory()" type="submit" class="btn">
                                <i class='fas fa-book-medical' style='font-size:60px;color:white'></i>
                            </button>
                        </td>
                    </tr>
                </table>


                <div id="dialog" class="mx-auto" title="Ιστορικό Εξετάσεων" style="display: none;">
                    <table style="width:80%" id="receipt_table">
                        <tr>
                            <th>Εξέταση</th>
                            <th>Τιμή</th>
                            <th>Ημερομηνία</th>
                            <th>Ώρα</th>
                            <th>Όνομα Κατόχου</th>
                            <th>Αρ. Κάρτας</th>
                            <th>Λήξη Κάρτας</th>
                            <th>CVV</th>
                            <th>Σύνολο</th>
                        </tr>
                        <?php foreach ($data['exams_card'] as $item){   ?>
                        <tr>
                            <td><?php echo($item['examination']); ?></td>
                            <td><?php echo($item['price']); ?></td>
                            <td><?php echo($item['date']); ?></td>
                            <td><?php echo($item['time']); ?></td>
                            <td><?php echo($item['name']); ?></td>
                            <td><?php echo($item['card_number']); ?></td>
                            <td><?php echo($item['expiration']); ?></td>
                            <td><?php echo($item['cvv']); ?></td>
                            <td><?php echo($item['total']); ?></td>
                        </tr>
                        <?php } ?>
                    </table>

                    <table style="width:80%" id="receipt_table">
                        <tr>
                            <th>Εξέταση</th>
                            <th>Τιμή</th>
                            <th>Ημερομηνία</th>
                            <th>Ώρα</th>
                            <th>Όνομα Τράπεζας</th>
                            <th>Αρ. Λογαριασμού</th>
                            <th>Iban</th>
                            <th>Σύνολο</th>
                        </tr>
                        <?php foreach ($data['exams_bank'] as $item){   ?>
                        <tr>
                            <td><?php echo($item['examination']); ?></td>
                            <td><?php echo($item['price']); ?></td>
                            <td><?php echo($item['date']); ?></td>
                            <td><?php echo($item['time']); ?></td>
                            <td><?php echo($item['bank_name']); ?></td>
                            <td><?php echo($item['account_number']); ?></td>
                            <td><?php echo($item['iban']); ?></td>
                            <td><?php echo($item['total']); ?></td>
                        </tr>
                        <?php } ?>
                    </table>

                </div>

            </div>

        </div>


    </div>


     
</body>
</html>

