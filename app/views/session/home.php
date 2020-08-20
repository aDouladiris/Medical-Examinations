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
                        Δες το προφίλ σου.
                    </h3>
                    <form action="profile">
                        <button type="submit" class="btn">
                        <i class="fa fa-gears" style="font-size:48px;color:white"></i>
                        </button>
                    </form>
                </div>    
                
                <div class="container left p-2">
                    <h3> 
                        Αποσύνδεση
                    </h3>
                    <form action="home/logout">
                        <button type="submit" class="btn">
                        <i class='fas fa-sign-out-alt' style='font-size:48px;color:white'></i>
                        </button>
                    </form>
                </div>   
                
            </div>

            <div class="container right p-2">
                <h3> 
                    Επίλεξε τις εξετάσεις σου.
                </h3>

                <form action="exams">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Είδη εξετάσεων</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Επίλεξε...</option>
                            <option value="1">Αιματολογικές</option>
                            <option value="2">Ακτινογραφίες</option>
                            <option value="3">Αλλεργιολογικές εξετάσεις</option>
                            <option value="4">Ανοσολογικές εξετάσεις</option>
                            <option value="5">Αξονικές τομογραφίες</option>
                            <option value="6">Βιοχημικές εξετάσεις</option>
                            <option value="7">Γαστρεντερολογικές εξετάσεις</option>
                            <option value="8">Γυναικολογικές εξετάσεις</option>
                            <option value="9">Εξετάσεις ούρων</option>
                            <option value="10">Καρδιολογικές εξετάσεις</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn">
                        <i class='fas fa-microscope' style='font-size:48px;color:white'></i>
                    </button>

                </form>

                <!-- <p>Click here to <a href="exams" title="Exams"> User Exams.</p> -->
            </div>

        </div>

        <!-- <div class="d-flex flex-row">

            <div class="container bottom p-2">

                <p><a href="home/logout" title="Logout">Αποσύνδεση</p>
            </div>

        </div> -->

    </div>


     
</body>
</html>

