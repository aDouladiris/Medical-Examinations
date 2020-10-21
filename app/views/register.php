<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
    <title>Εγγραφή Χρήστη</title>

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/register.css">

    <script src="vendor/font-awesome-custom/font-awesome.js"></script>
    <script src="js/register.js"></script>

</head>
<body>
    <div class="main">        
        <div class="container">
        
        <form class="register-form" id="register-form" action="register/create" method="post" onsubmit="return validateForm()" required>
 
 
            <div class="text-center">    
                    <h2>Εγγραφή</h2>
                    <p>Συμπληρώσετε τη φόρμα εγγραφής για να δημιουργήσετε ένα λογαριασμό.</p>
            </div>
            
            <div class="row"> 
                <div class="col-25">
                    <label>Επώνυμο</label>                    
                </div>
                <div class="col-75">
                    <input type="text" name="last_name" class="form-control" value="">                    
                </div>
            </div>

            <div class="row">  
                <div class="col-25">
                    <label>Όνομα</label>
                </div>
                <div class="col-75">
                    <input type="text" name="first_name" class="form-control" value="">
                </div>
            </div>

            <div class="row">                    
                <div class="col-25">
                    <label>Email</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" class="form-control" value="">
                </div>
            </div>

            <div class="row">                    
                <div class="col-25">
                    <label>Νέος Κωδικός</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" class="form-control" value="">
                </div>
            </div>

            <div class="row">                    
                <div class="col-25">
                    <label>Κωδικός Επιβεβαίωσης</label>
                </div>
                <div class="col-75">
                    <input type="password" name="confirm_password" class="form-control" value="">
                </div>
            </div>

            <div class="row">                    
                <div class="col-25-button">
                    <button type="reset" class="btn" id="reset">
                        <i class='fas fa-undo-alt'></i>
                    </button>
                </div>
                <div class="col-75-button">
                    <button type="submit" class="btn" id="save">
                        <i class='far fa-save'></i>
                    </button>
                </div>
            </div>

            <div class="row">                    
                <p>Έχετε ήδη λογαριασμό; Συνδεθείτε τώρα πατώντας <a href="login">εδώ</a>.</p>
            </div>
        
        </form>

        

        </div>
    </div> 
</body>
</html>