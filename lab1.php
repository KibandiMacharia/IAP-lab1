<?php
include_once "DBConnector.php";
include_once "User.php";

$connection=new DBConnector;

  if(isset($_POST['btn-save'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $city=$_POST['city_name'];
    $uName=$_POST['username'];
    $pas=$_POST['password'];
    $utc=$_POST['utc_timestamp'];
    $tmz_offset=$_POST['time_zone_offset'];

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $final_file_name = $_FILES['fileToUpload']['tmp_name'];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    

    //create a User object
    $user=new User($first_name,$last_name,$city,$uName,$pas);

    if(!$user->validateForm()){
      $user->createFormErrorSessions();
      header("Refresh:0");
      die();
    }else{
      if ($fileUpload->fileWasSelected()) {
          
        if ($fileUpload->fileTypeisCorrect()) {
          
          if ($fileUpload->fileSizeIsCorrect()) {
            
            if (!($fileUpload->fileAlreadyExists())) {
              $res = $user->save();
            $fileUpload->uploadFile();

            if ($res) {
              echo "Save operation was successful";
            }else{
              echo "An error occurred";
            }
            }else{
                echo "FILE EXISTS"."<br>";
            }
          }else{
            echo "PICK A SMALLER SIZE"."<br>";
          }
        }else{
          echo "INCORRECT TYPE"."<br>";
        }


      }else{
        echo "NO FILE DETECTED"."<br>";}
    }

    $uploads=new FileUploader;

    $res=$user->save();

    $file_upload_response=$uploader->uploadFile();

    if(!$res){//save result
      echo "Data not saved";
    }else{
      echo "Data saved";
    }
    $connection->closeDatabase();
  }
?>

<html>
  <head>
    <title>Register</title>
    <link type="text/css" rel="stylesheet"href="marembesho.css">
    <script type="text/javascript" src="validate.js"></script>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript"src="timezone.js"></script>

  </head>
  <body>

  <div class="content-wrapper" align="center">
		    <div class="col-md-3">
		    <div class="modal-header">
			      <h4 class="modal-title">Register Modal</h4>
        </div>

      <form class="needs-validation" novalidate name="registrationForm"id="user_form" method="post"
        onsubmit="return validateForm()"action="<? $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
        <div>
          <?php
            session_start();
            if(!empty($_SESSION['form_errors'])){
              echo "".$_SESSION['form_errors'];
              unset($_SESSION['form_errors']);
            }
          ?>
        </div>
    
            <label for="first_name">First name</label>
            <input type="text" class="form-control" id="first_name" placeholder="First name" required>
          
            <label for="last_name">Last name</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last name" required>
          
            <label for="validationTooltip03">City</label>
            <input type="text" class="form-control" id="city_name" placeholder="City" required>
            <div class="invalid-tooltip">
              Please select a valid city.
            </div>

            <label for="user_name">User Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="username">@</span>
              </div>
              <input type="text" class="form-control" id="username" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
            </div>
          
            <input type="hidden" class="form-control" id="utc_timestamp" name="utc_timestamp"value="">
          
          <input type="hidden" class="form-control" id="time_zone_offset"name="time_zone_offset" value="">
          
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required><h1></h1>
          
            <button class="btn btn-primary" type="submit" id="btn-save">Submit form</button><h1></h1>
          
        <div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileToUpload"name="imageFile"><h1></h1>
                <label class="custom-file-label" for="customFile">Choose file</label><h1></h1>
            </div>

            <h1></h1><button class="btn btn-primary" type="submit" id="btn-upload">Submit Image</button><h1></h1>
            
        </div>
        <a href="login.php">already have an account?</a>
      
      </form>
      
    
  </body>
</html>     
       

