<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
    <title>Προφίλ Χρήστη</title>

    <script src="vendor/jquery/js/jquery.min.js"></script>

    <link rel="stylesheet" href="vendor/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="vendor/font-awesome-custom/font-awesome.js"></script>
    

    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css">
    <script src="vendor/jquery-ui/jquery-ui.js"></script> 

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/session/profile.css">
    <script src="js/session/profile.js"></script>


</head>
<body>
    <div class="main">
        <div class="container">

            <div class="text-center">
                <h2>Καλώς ήρθες <?php echo $_SESSION["email"]; ?></h2>
            </div>
            
            <div class="row">
            
                <div class="col-50-left">

                        <div class="text-center info">
                            <h3>Στοιχεία χρήστη</h3>
                        </div>                    
                    

                        <div class="row up">
                            <div class="col-25">
                                <h5>Όνομα:</h5>
                            </div>

                            <div class="col-75">
                                <?php echo $data['first_name'] ?>
                            </div>
                        </div>

                        <div class="row middle">
                            <div class="col-25">
                                <h5>Επώνυμο:</h5>
                            </div>

                            <div class="col-75">
                                <?php echo $data['last_name'] ?>
                            </div>
                        </div>

                        <div class="row down">
                            <div class="col-25">
                                <h5>Email:</h5>
                            </div>

                            <div class="col-75">
                                <?php echo $data['email'] ?>
                            </div>
                        </div>


                    </div>
            

   

                    <div class="col-50-right">
                        
                        <div class="col-50-up">
                            <div>
                                <h3>Ιστορικό Εξετάσεων</h3>
                            </div>

                            <div>
                                <button onclick="openHistory()" type="submit" class="btn">
                                    <i class='fas fa-book-medical' style='font-size:60px;color:white'></i>
                                </button>
                            </div>   
                        </div>


                        <div class="col-50-down">
                            <div>
                                <div>
                                    <h3>Επιστροφή στο μενού</h3>
                                </div>

                                <div>
                                    <button onclick="backToMenu()" type="submit" class="btn">
                                        <i class='fa fa-hand-o-left' style='font-size:48px;color:white'></i>
                                    </button>
                                </div>
                            </div>  
                        </div>

        


      
                        
                    </div>

            </div>

        </div>    

    </div>

<div id="dialog" title="Ιστορικό Εξετάσεων">

            <table id="receipt_table">
                <tr>
                    <th>Εξέταση</th>
                    <th>Τιμή χωρίς ΦΠΑ</th>
                    <th>Ημερομηνία</th>
                    <th>Ώρα</th>
                    <th>Όνομα Κατόχου</th>
                    <th>Αρ. Κάρτας</th>
                    <th>Λήξη Κάρτας</th>
                    <th>CVV</th>
                    <th>Σύνολο συν ΦΠΑ</th>
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

            <br>

            <table id="receipt_table">
                <tr>
                    <th>Εξέταση</th>
                    <th>Τιμή χωρίς ΦΠΑ</th>
                    <th>Ημερομηνία</th>
                    <th>Ώρα</th>
                    <th>Όνομα Τράπεζας</th>
                    <th>Αρ. Λογαριασμού</th>
                    <th>Iban</th>
                    <th>Σύνολο συν ΦΠΑ</th>
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

            <br>

            <table id="receipt_table">
                <tr>
                    <th>Εξέταση</th>
                    <th>Τιμή χωρίς ΦΠΑ</th>
                    <th>Ημερομηνία</th>
                    <th>Ώρα</th>
                    <th>Περιγραφή</th>
                    <th>Σύνολο συν ΦΠΑ</th>
                </tr>
                <?php foreach ($data['exams_insurance'] as $item){   ?>
                <tr>
                    <td><?php echo($item['examination']); ?></td>
                    <td><?php echo($item['price']); ?></td>
                    <td><?php echo($item['date']); ?></td>
                    <td><?php echo($item['time']); ?></td>
                    <td><?php echo($item['description']); ?></td>
                    <td><?php echo($item['total']); ?></td>
                </tr>
                <?php } ?>
            </table>

</div>
     
</body>
</html>

