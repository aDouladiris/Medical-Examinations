<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" >
    <title>Σύνδεση Χρήστη</title>

    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/login.css">

    <script src="vendor/font-awesome-custom/font-awesome.js"></script>
    <script src="js/login.js"></script>


</head>
<body>
    <div class="main">

        <form class="login-form" id="login-form" action="login/user_login" method="post" onsubmit="return validateForm()" required>
            
            <div class="row">    
                    <h2>Σύνδεση</h2>
            </div>
            <div class="row"> 
                    <p>Συμπληρώσετε τα στοιχεία σας για να συνδεθείτε με το λογαριασμό σας.</p>
            </div>
            
            <div class="row"> 
                <div class="col-25">
                    <label>Email</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" class="form-control" placeholder="user@domain"> 
                </div>
            </div>

            <div class="row">  
                <div class="col-25">
                    <label>Κωδικός</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
            </div>

            <div class="row">                    
                    <button type="submit" class="btn" style='background-color: #4CAF50; border-radius: 15px;'>
                        <i class='fas fa-sign-in-alt' style='font-size:40px;color:white'></i>
                    </button>                    
            </div>
            <div class="row">                    
                <p>Δεν έχετε λογαριασμό; Δημιουργήστε τώρα πατώντας <a href="register">εδώ</a>.</p>
            </div>

        </form>        

    </div>
</body>
</html>