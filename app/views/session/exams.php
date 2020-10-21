<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
    <title>Μενού Εξετάσεων</title>

    <script src="vendor/jquery/js/jquery.min.js"></script>

    <link rel="stylesheet" href="vendor/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <script src="vendor/bootstrap-4.5.2-dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="vendor/bootstrap-select-1.13.14/dist/css/bootstrap-select.css" />
    <script src="vendor/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="vendor/jquery-steps/css/normalize.css">
    <link rel="stylesheet" href="vendor/jquery-steps/css/main.css">    
    <link rel="stylesheet" href="vendor/jquery-steps/css/jquery.steps.css" >

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/session/exams.css">



</head>
<body>

<div class="main">

    <div class="container center" >

        <form id="wizard" action="exams/test" method="POST" class="wizard" enctype="multipart/form-data">

            <!-- STEP 0 -->

            <h1>Ασφάλιση</h1>

            <fieldset data-role="controlgroup">

            <legend>Επιλέξτε τον τρόπο χρέωσης</legend>



                <div class="row form-check"> 
                
                    <div class="col-25">
                        <label class="form-check-label" for="private">
                            Ιδιώτης
                        </label>  
                    </div>

                    <div class="col-75">
                        <input class="form-check-input" type="radio" name="charge_type" id="private" value="private" checked>
                    </div>

                </div>

                <div class="row form-check"> 
                
                    <div class="col-25">
                        <label class="form-check-label" for="insurance">
                            Ασφαλιστική
                        </label>
                    </div>

                    <div class="col-75">
                        <input class="form-check-input" type="radio" name="charge_type" id="insurance" value="insurance">
                    </div>

                </div>

                
            </fieldset>
            
            <!-- STEP 1 -->
            <h1>Εξετάσεις</h1>

            <fieldset>            
                <legend>Επιλέξτε τις εξετάσεις που επιθυμείτε</legend>
                <div class="form-group " id="container_header">

                        <select class="selectpicker mobile show-tick mdb-select colorful-select dropdown-primary" data-width="100%" onchange="fetchExams()" id="inputGroupSelect01" name="category">
                            <option selected>Κατηγορία εξετάσεων...</option>
                            <option value="1">Αιματολογικές</option>
                            <option value="2">Ακτινογραφίες</option>
                            <option value="3">Αλλεργιολογικές εξετάσεις</option>
                            <option value="4">Ανοσολογικές εξετάσεις</option>
                            <option value="5">Αξονικές τομογραφίες</option>
                        </select>                    

                </div>   

                <div class="form-group">

                        <select class="selectpicker mobile show-tick mdb-select colorful-select dropdown-primary" data-width="100%" id="category" name="category" form="wizard" multiple title="Είδη εξετάσεων...">
                        </select>

                </div>               

            </fieldset>
            
            <!-- STEP 3 -->
            <h1>Απόδειξη</h1>
            <fieldset id="receipt">
                <legend>Εμφάνιση της απόδειξής σας</legend>
                <div class="receipt">
                    <div class="customer-id">
                        <table id="receipt_table">
                            <td>
                            <table id="left-table">
                                <tr>
                                    <th id="left-col" colspan="2">Στοιχεία πελάτη</th>
                                </tr>
                                <tr>
                                    <td id="left-col">Id:</td>
                                    <td id="patient_id"><?php echo $data['patient_id']; ?></td>
                                </tr>
                                <tr>
                                    <td id="left-col">Επώνυμο:</td>
                                    <td><?php echo $data['last_name']; ?></td>
                                </tr>
                                <tr>
                                    <td id="left-col">Όνομα:</td>
                                    <td><?php echo $data['first_name']; ?></td>
                                </tr>
                                <tr>
                                    <td id="left-col">Ηλ. Διεύθυνση:</td>
                                    <td><?php echo $data['email']; ?></td>
                                </tr>     
                                <tr>
                                    <th colspan="2" id="left-col">Εξετάσεις</th>                                    
                                </tr>                         
                            </table>
                            </td>

                            <td>
                            <table id="right-table">
                                <tr>
                                    <th>Ημερομηνία</th>                            
                                </tr>
                                <tr>
                                    <td id="data-date"></td>
                                </tr>
                                <tr>
                                    <th> Ώρα</th>                            
                                </tr>
                                <tr>
                                <td id="data-time"></td>
                                </tr>         
                                <tr>
                                    <td>Διαγνωστικό Κέντρο Alpha</td>
                                </tr>  
                                <tr>
                                    <th>Τιμή χωρίς ΦΠΑ</th>
                                </tr>                                                
                            </table>  
                            </td>
                        </table>
                    </div>

                    <div class="selected-examinations">                    
                        <table id="tb_receipts"></table>
                    </div>

                    <div class="total-values">
                        <table id="total-table">
                            <tr>
                                <th>Ακαθάριστο</th><td id="total-calculated-values"></td>
                            </tr>    
                            <tr>
                                <th>Φ.Π.Α 24%</th><td id="total-tax"></td>
                            </tr> 
                            <tr>
                                <th>ΣΥΝΟΛΟ</th><td id="total-calculated-values-after-tax"></td>
                            </tr>                                             
                        </table> 
                    </div>
                            
                </div>
            </fieldset>

            <!-- STEP 4 -->
            <h1>Πληρωμή</h1>
            <fieldset>            
                <legend id="legend-label">Επιλέξτε τον τρόπο που επιθυμείτε να πληρώσετε</legend>
                <div class="form-group" id="payment">                
                </div>
            </fieldset>

        </form>

    </div>

</div>      

<script src="vendor/lib/jquery-steps-master/lib/modernizr-2.6.2.min.js"></script>
<script src="vendor/lib/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
<script src="vendor/lib/jquery-steps-master/build/jquery.steps.js"></script>

<!-- <script src="vendor/jquery-steps/jquery.steps.js"></script>
<script src="vendor/jquery-steps/jquery.steps.min.js"></script> -->

<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="js/session/exams.js"></script>

</body>
</html>