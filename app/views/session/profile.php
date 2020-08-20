<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Συνδεδεμένος Χρήστης</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/indexStyle.css">
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

        .fa-microscope {
            margin-top: 20px;
        }


        /* .bottom {
            border: none;
            text-align: left;
            font-size: 110%;
        } */
    
        .top {
            /* border: none; */
            text-align: center;
        }

    </style>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>
<body>
    <div class="main">
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
                    history.
                </h3>

                <?php 
                    foreach ($data['exams'] as $item){
                        echo $item['examinations'];
                        echo "<br>";
                    }
                ?>

            </div>

        </div>


    </div>


     
</body>
</html>

