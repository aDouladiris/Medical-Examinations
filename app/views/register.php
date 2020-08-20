<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Εγγραφή</title>
    <link rel="stylesheet" href="css/indexStyle.css">
    <style>
        .register-form {
            text-align: right;
            margin: auto;
            border: 1px solid white;
            width: 35%;
        }
    </style>

    <script>
        function validateForm() {
            var first_name = document.forms["register-form"]["first_name"].value;
            var last_name = document.forms["register-form"]["last_name"].value;
            var email = document.forms["register-form"]["email"].value;
            var password = document.forms["register-form"]["password"].value;
            var confirm_password = document.forms["register-form"]["confirm_password"].value;

            if (first_name == "" || 
                last_name == "" ||
                email == "" ||
                password == "" ||
                confirm_password == ""            
            ) {
                alert("Παρακαλώ να συμπληρώσετε όλα τα πεδία");
                return false;
            }
        }

    </script>
</head>
<body>
    <div class="main">        
        <div class="container">
        <h2>Εγγραφή</h2>
        <p>Συμπληρώσετε τη φόρμα εγγραφής για να δημιουργήσετε ένα λογαριασμό.</p>

        <form class="register-form" id="register-form" action="register/create" method="post" onsubmit="return validateForm()" required>
            <div class="form-group">
                <label>Επώνυμο</label>
                <input type="text" name="first_name" class="form-control" value="">
            </div>    

            <div class="form-group">
                <label>Όνομα</label>
                <input type="text" name="last_name" class="form-control" value="">
            </div>          
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="">
            </div>             

            <div class="form-group">
                <label>Κωδικός</label>
                <input type="password" name="password" class="form-control" value="">
            </div>

            <div class="form-group">
                <label>Επιβεβαίωση Κωδικού</label>
                <input type="password" name="confirm_password" class="form-control" value="">
            </div>

            <div class="form-group">                
                <input type="reset" value="Reset">
                <input type="submit" value="Submit">
            </div>            
        </form>

        <p>Έχετε ήδη λογαριασμό; Συνδεθείτε τώρα πατώντας <a href="login">εδώ</a>.</p>

        </div>
    </div> 
</body>
</html>