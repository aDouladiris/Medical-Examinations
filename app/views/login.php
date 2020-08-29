<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Σύνδεση</title>
    <link rel="stylesheet" href="css/indexStyle.css">
    <style>
        .login-form {
            text-align: center;
            margin: auto;
            border: 1px solid white;
            width: 35%;
        }
    </style>

</head>
<body>
    <div class="main">        
        <div class="container">
        <h2>Σύνδεση</h2>
        <p>Συμπληρώσετε τα στοιχεία σας για να συνδεθείτε με το λογαριασμό σας.</p>

        <form class="login-form" id="login-form" action="login/user_login" method="post" required>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="htta@gmail.com">
            </div>    

            <div class="form-group">
                <label>Κωδικός</label>
                <input type="password" name="password" class="form-control" value="1">
            </div>

            <div class="form-group">
                <input type="submit" value="Login">
            </div>

        </form>

        <p>Δεν έχετε λογαριασμό; Δημιουργήστε τώρα πατώντας <a href="register">εδώ</a>.</p>

        </div>
    </div> 
</body>
</html>