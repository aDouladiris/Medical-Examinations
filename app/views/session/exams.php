<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    
      


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="vendor/css/main.css">    
    <link rel="stylesheet" href="vendor/css/jquery.steps.css" >
    <link rel="stylesheet" href="css/indexStyle.css">

    <!-- <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.js"> -->

    <style> 

            .main {
                height: 1000px;
                padding: 5%;
            }

            .rounded-lg {
            border-radius: 1rem;
            }

            .nav-pills .nav-link {
            color: #555;
            }

            .nav-pills .nav-link.active {
            color: #fff;
            }
            
            /* .container {
                border: none;
                color: white;
                text-align: none;
                margin: 0;
                
            } */

            /* .center {
                height: 800px;                
                border: 3px solid yellow;
            } */

            .wizard.vertical > .content
            {
                
                min-height: 700px;
                width: 70%;
                margin: auto;

                background: transparent;

                

                /* border: 1px solid yellow; */

            }



            .wizard.vertical > .steps > ul > li
            {
                line-height: 1em;
                text-align: center;

                list-style-type: none;   
                
                height: 25%;
                    
                
            }

            .tabcontrol > .steps > ul > li:hover
            {
                
                border: 1px solid #bbb;
                padding: 0;
            }

            .wizard.vertical > .steps > ul
            {         
                border: 3px solid red;
                height: 9em;            
                
                
            }

            .wizard > .steps a,
            .wizard > .steps a:hover,
            .wizard > .steps a:active
            {
                border: none;                
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 16px;
                width: 80%;
            }

            .wizard > .steps .current a,
            .wizard > .steps .current a:hover,
            .wizard > .steps .current a:active
            {
                background-color: #0275d8;
               
                border: none;                
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 16px;
                width: 80%;
            }

            .wizard > .steps .done a,
            .wizard > .steps .done a:hover,
            .wizard > .steps .done a:active
            {
                background-color: #0275d8;

                border: none;                
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 16px;
                width: 80%;

            }

            .wizard > .actions a,
            .wizard > .actions a:hover,
            .wizard > .actions a:active
            {
                background-color: #0275d8;

                border: none;                
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 16px;
            }

            .title-number {
                display: none;
            }


            fieldset {
                
            }



            #insurance-cover {                
                font-size: 150%;
                

                width: 50%;                                      
            }

            label {
                vertical-align: top;

                
            }

            .input-group {
                
            }

            tr {
                border: 1px solid white;
            }

            td {
                border: 1px solid white;
                width: 50%;
            }

            #test {
                border: 1px solid white;
            }

            .receipt {
                border: 1px solid white;
                /* height: 91%; */
            }

            .customer-id {
                border: 1px solid white;
                height: 33%;
            }

            .selected-examinations {
                border: 1px solid black;
                height: 54%;
            }

            .total-values {
                border: 1px solid black;
                height: 13%;
            }

            #left-table {
                text-align: left;
            }

            #right-table {
                text-align: right;
            }

            #left-col {
                width: 35%;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            #inputGroupSelect01 {
                width: 50%; 
                height: 40px;
                border: 1px solid #bbb;
            }

            .special {
                text-align: left;
                font-size: 20px;
            }

            .selected-examinations {
                overflow: auto ;
                height:280px;
            }


            #total-table tr th {
                width: 70%;
                text-align: right;
                font-size: 15px;
                padding-right: 2%;
            }

            .nav-item {
                list-style:none;
            }

            .row, .col-lg-7 {
                height: 90%;
            }
 
            label {
                width: 100%;
                text-align: left;
            }

            dl, dt {
                text-align: left;
                /* border: 1px solid #bbb; */
                
            }

            dd {
                margin-left: 0;
                text-align: left;
            }

            .form-check {
                font-size: 20px;
                
                /* margin: 0 50% 1% 10%; */

                padding-left: 40%;
                
            }

            .form-check-input {
                height: 60%;
                width: 60%;
                
                
            }

            input[type="radio"]{
                margin: 1% 0 0 -5%;
            }

            .col-lg-7 {
                border: 1px solid white;
            }



    </style>

</head>
<body>

<div class="main">

    <div class="container center">

        <form id="wizard" action="exams/test" method="POST" class="wizard" enctype="multipart/form-data">

            <!-- STEP 0 -->
            <h1>Ασφάλιση</h1>
            <fieldset data-role="controlgroup" data-type="horizontal">
                <legend>Επιλέξτε τον τρόπο χρέωσης</legend>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="charge_type" id="private" value="private" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Ιδιώτης
                    </label>                
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="charge_type" id="insurance" value="insurance">
                    <label class="form-check-label" for="exampleRadios2">
                        Ασφαλιστική
                    </label>
                </div>
                
            </fieldset>
            
            <!-- STEP 1 -->
            <h1>Εξετάσεις</h1>

            <fieldset>            
                <legend>Επιλέξτε τις εξετάσεις που επιθυμείτε</legend>
                <div class="form-group " id="container_header">
                    <select class="selectpicker show-tick mdb-select colorful-select dropdown-primary md-form" data-width="100%" onchange="fetchExams()" id="inputGroupSelect01" name="category">
                        <option selected>Κατηγορία εξετάσεων...</option>
                        <option value="1">Αιματολογικές</option>
                        <option value="2">Ακτινογραφίες</option>
                        <option value="3">Αλλεργιολογικές εξετάσεις</option>
                        <option value="4">Ανοσολογικές εξετάσεις</option>
                        <option value="5">Αξονικές τομογραφίες</option>
                    </select>
                </div>   
                <div class="form-group">
                    <select class="selectpicker show-tick mdb-select colorful-select dropdown-primary md-form" data-width="100%" id="category" name="category" form="wizard" multiple title="Είδη εξετάσεων...">
                    </select>
                </div>               

            </fieldset>
            
            <!-- STEP 3 -->
            <h1>Απόδειξη</h1>
            <fieldset>
                <legend>Εμφάνιση της απόδειξής σας</legend>
                <div class="receipt">
                    <div class="customer-id">
                        <table style="width:100%" id="receipt_table">
                            <td>
                            <table style="width:100%" id="left-table">
                                <tr>
                                    <th colspan="2" style="text-align: left;">Στοιχεία πελάτη</th>
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
                            <table style="width:100%; empty-cells: show;" id="right-table">
                                <tr>
                                    <th style="text-align: right;">Ημερομηνία</th>                            
                                </tr>
                                <tr>
                                    <td id="data-date"></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right;"> Ώρα</th>                            
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
                        <table id="tb_receipts" style="width:100%"></table>
                    </div>

                    <div class="total-values">
                        <table style="width:100%" id="total-table">
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
                <legend>Επιλέξτε τον τρόπο που επιθυμείτε να πληρώσετε</legend>
                <div class="form-group" id="payment">                
                </div>
            </fieldset>

        </form>

    </div>

</div>      

<script src="vendor/lib/jquery-steps-master/lib/modernizr-2.6.2.min.js"></script>
<!-- <script src="vendor/lib/jquery-steps-master/lib/jquery-1.9.1.min.js"></script> -->
<script src="vendor/lib/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
<script src="vendor/lib/jquery-steps-master/build/jquery.steps.js"></script>

<script src="vendor/jquery-steps/jquery.steps.js"></script>
<script src="vendor/jquery-steps/jquery.steps.min.js"></script>

<link rel="stylesheet" href="vendor/inputpicker/src/jquery.inputpicker.css" />
<script src="vendor/inputpicker/src/jquery.inputpicker.js"></script>

<script type="text/javascript" src="vendor/jquery-ui/jquery-ui.min.js"></script>

<script src="js/main.js"></script>

<!-- <script>




</script> -->


</body>
</html>