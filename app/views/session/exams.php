<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="vendor/css/normalize.css">
    <link rel="stylesheet" href="vendor/css/main.css">    
    <link rel="stylesheet" href="vendor/css/jquery.steps.css" >
    <link rel="stylesheet" href="css/indexStyle.css">

    <style> 

            .main {
                height: 1000px;
                padding: 5%;
            }

            .center {
                height: 800px;                
                border: 3px solid yellow;
            }

            .wizard.vertical > .content
            {
                
                min-height: 700px;
                width: 70%;
                margin: auto;

                background: transparent;

                /* border: 1px solid yellow; */

            }



            .title-number {
                display: none;
            }

            .wizard.vertical > .steps > ul > li
            {         
                height: 3em;
                border: 1px solid red;

                line-height: 1em;
                text-align: center;

                list-style-type: none;                
                
            }

            .tabcontrol > .steps > ul > li:hover
            {
                background: #edecec;
                border: 1px solid #bbb;
                padding: 0;
            }

            .wizard.vertical > .steps > ul
            {         
                border: 3px solid red;    
                
                
                height: 9em;            
                
                

                
            }






    </style>

</head>
<body>

<div class="main">

    <div class="container center">

        <form id="wizard" method="POST" class="wizard" enctype="multipart/form-data">
            <!-- STEP 1 -->
            <h1>Insurance</h1>
            <fieldset>
                <legend>Επιλέξτε τον τρόπο χρέωσης</legend>

                <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Eg: aucreative@gmail.com"/>
                </div>
            </fieldset>
            
            <!-- STEP 2 -->
            <h1>Examinations</h1>
            <fieldset>
                <legend>Choose your exams</legend>
                <div class="form-group">
                        
                </div>
            </fieldset>
            
            <!-- STEP 3 -->
            <h1>Payment</h1>
            <fieldset>
                <legend>Choose how to pay</legend>
                <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
            </fieldset>

        </form>

    </div>

</div>      


<script src="vendor/lib/jquery-steps-master/lib/modernizr-2.6.2.min.js"></script>
<script src="vendor/lib/jquery-steps-master/lib/jquery-1.9.1.min.js"></script>
<script src="vendor/lib/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
<script src="vendor/lib/jquery-steps-master/build/jquery.steps.js"></script>

<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>

<script src="vendor/jquery-steps/jquery.steps.js"></script>
<script src="vendor/jquery-steps/jquery.steps.min.js"></script>

<script src="js/main.js"></script>

<!-- <script>
$("#wizard").steps({
    headerTag: "h1",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    labels: {
        previous : 'Previous',
        next : 'Next',
        finish : 'Submit',
        current : ''
    },
    titleTemplate : '<div class="title"><span class="title-text">#title#</span><span class="title-number">0#index#</span></div>',
    onFinished: function (event, currentIndex)
    {
        alert('Sumited');
    }
});
</script> -->


</body>
</html>