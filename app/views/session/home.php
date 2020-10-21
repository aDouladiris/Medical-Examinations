<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
    <title>Συνδεδεμένος Χρήστης</title>

    <link rel="stylesheet" href="vendor/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="vendor/font-awesome-custom/font-awesome.js"></script>
    
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/session/home.css">
    <script src="js/session/home.js"></script> 


</head>
<body>
    <div class="main">
        <div class="container">
        
            <div class="text-center">
                <h2>Καλώς ήρθες <?php echo $_SESSION["email"]; ?></h2>
            </div>


            <div class="row">                    
                <div class="col-25">
                    <h3>Διάλεξε τις εξετάσεις σου</h3>
                </div>

                <div class="col-75">
                    <button onclick="openExams()" type="submit" class="btn">
                        <i class='fas fa-microscope'></i>
                    </button> 
                </div>                   
            </div>    


            <div class="row"> 
                <div class="col-25">
                    <h3>Δες το προφίλ σου</h3>
                </div>

                <div class="col-75">
                    <button onclick="profile()" type="submit" class="btn">
                        <i class='fas fa-user-circle'></i>
                    </button>  
                </div>
            </div>


            <div class="row">  
                <div class="col-25">
                    <h3>Αποσύνδεση</h3>
                </div>

                <div class="col-75">
                    <button onclick="logout()" type="submit" class="btn">
                        <i class='fas fa-sign-out-alt'></i>
                    </button> 
                </div>
            </div>

    
        
        </div>            
    </div>

     
</body>
</html>

