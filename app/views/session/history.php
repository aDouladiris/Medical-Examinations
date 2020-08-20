<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h3> 
            Exams History.
        </h3>
        <!-- <p>Click here to <a href="profile"> User Profile.</p>  
        <p>Click here to <a href="home"> Home.</p>   -->
    </div>   
    <div>
        <?php 
            foreach ($data['exams'] as $item){
                echo $item['examinations'];
                echo "<br>";
            }
        ?>
    </div> 
</body>
</html>