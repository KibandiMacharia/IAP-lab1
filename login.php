<?php   
    include_once "DBConnector.php";
    include_once "User.php";

    $con=new DBConnector;

    if(isset($_POST['btn-login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $instance=User::create();//creates an object of the User class
        $instance->setPassword($password);
        $instance->setUsername($username);

        if($instance->isPasswordCorrect()){
            $instance->login();

            $con->closeDatabase();

            $instance->createUserSession();//creates a session
        }else{
            $con->closeDatabase();
            header("Location:login.php");
        }
    }

?>
<html>
    <head>
        <title>Login</title>
        <script type="text/javascript"src="validate.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="content-wrapper" align="center">
		    <div class="col-md-3">
		    <div class="modal-header">
			      <h4 class="modal-title">Login Modal</h4>
            </div>
                
                <form method="post"name="login"action="<?=$_SERVER['PHP_SELF']?>">
                    <label>Username:</label>
                        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
                    <label>Password:</label>
                        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required><h1></h1>
                    <button class="btn btn-primary" type="submit" value="Log In" name="btn-login">Submit</button>
                </form>

                <a href="lab1.php">Don't have an account?</a>
            </div>
        </div>
        
    </body>
</html>