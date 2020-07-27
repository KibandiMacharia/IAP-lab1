<?php
    session_start();
    /*if(!isset($_SESSION['username'])){//if the user hasn't logged in, take the back to the login page
        header("Location:login.php");
    }*/
    
?>
<html>
    <head>
        <title>Home</title>
        <script type="text/javascript"src="validate.js"></script>
        <script type="text/javascript"src="apikey.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <p>This is a private page</p>

        <a href="logout.php">
            <button class="btn btn-danger" type="submit" value="logout" name="logout">Logout</button>
        </a>

        <hr>
        <p>Here, we will create an API that will allow Users/Developer to order items from external systems</p>
        <hr>
        <p>We now put this feature of allowing users to generate an API key. Click the button to generate the API key</p>

        <button class="btn btn-primary" id="api-key-btn">Generate APi key</button> <br> <br>

        <!---The text area below will hold the APi key-->
        <strong>Your API key:</strong>(Note that if your API key is already in use by already running applications, generating new key will stop the application from functioning) <br>

        <textarea name="api_key" id="api_key" cols="100" rows="2" readonly> <?php echo generateApiKey(); ?> </textarea>

        <h3>Service Description:</h3>
        We have a service/API that allows external applications to order food and also pull all order status by using order id. Let's do it.
        <hr>
    </body>
</html>