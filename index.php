<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) {
 
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
 
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
 
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
 
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
 
  // if there's no error, continue to login
  if (!$error) {
   
 
   $res=mysqli_query($conn, "SELECT user_id, first_name, last_name, user_pass FROM users WHERE user_email='$email'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['user_pass']==$pass ) {
    $_SESSION['user'] = $row['user_id'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
   
  }
 
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login & Registration System</title>
  <link rel="stylesheet" type="text/css" href="style2.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #76878b">
  <a class="navbar-brand" href="#">Car Renta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <input class="form-control mr-sm-2" name="email" type="search" placeholder="Email" aria-label="Search" value="<?php echo $email; ?>">
      <span class="text-danger"><?php echo $emailError; ?></span>
      <input class="form-control mr-sm-2" name="pass" type="password" placeholder="Password" aria-label="Search">
      <span class="text-danger"><?php echo $passError; ?></span>
      <button class="btn btn-outline-success my-2 my-sm-0" name="btn-login" type="submit">Login</button>
    </form>
  </div>
</nav>

             
  <?php
    if (isset($errMSG)) {
        echo $errMSG; ?>
    <?php
   }
   ?>
   <?php
 ob_start();
 session_start(); // start a new session or continues the previous

 include_once 'dbconnect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $first_name = trim($_POST['first_name']);
  $first_name = strip_tags($first_name);
  $first_name = htmlspecialchars($first_name);

  $last_name = trim($_POST['last_name']);
  $last_name = strip_tags($last_name);
  $last_name = htmlspecialchars($last_name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($first_name)) {
   $error = true;
   $first_nameError = "Please enter your first name.";
  } else if (strlen($first_name) < 3) {
   $error = true;
   $first_nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
   $error = true;
   $first_nameError = "Name must contain alphabets and space.";
  }

   // basic name validation
  if (empty($last_name)) {
   $error = true;
   $lasr_nameError = "Please enter your last name.";
  } else if (strlen($last_name) < 3) {
   $error = true;
   $last_nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
   $error = true;
   $last_nameError = "Name must contain alphabets and space.";
  }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT user_email FROM users WHERE user_email='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using SHA256();
  $password = $pass;

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(first_name,last_name,user_email,user_pass) VALUES('$first_name','$last_name','$email','$password')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($first_name);
    unset($last_name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }


 }
 ?>
   <div class="card" style="background-image: url(https://image.freepik.com/free-photo/crop-bumper_1194-6289.jpg); background-repeat: no-repeat; ">
      <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="signup">
  <div class="container1">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>First Name</b></label>
    <input type="text" name="first_name" class="in" placeholder="Enter Your First Name" maxlength="50" value="<?php echo $first_name ?>" />
    <span class="text-danger"><?php echo $first_nameError; ?></span>

    <label for="email"><b>Last Name</b></label>
    <input type="text" name="last_name" class="in" placeholder="Enter Your Last Name" maxlength="50" value="<?php echo $last_name ?>" />
      <span class="text-danger"><?php echo $last_nameError; ?></span>

    <label for="email"><b>Email</b></label>
    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
      <span class="text-danger"><?php echo $emailError; ?></span>

    <label for="psw"><b>Password</b></label>
    <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $pass ?>" />
      <span class="text-danger"><?php echo $passError; ?></span>
    
    <div class="clearfix">
      <button type="submit" class="signupbtn butt" name="btn-signup">Sign Up</button>
      <p id="err"><?php echo $errMSG; ?></p>
    </div>
  </div>
  </div>
</form>
</div>
<iframe src="https://www.google.com/maps/d/embed?mid=1wzzNa4AKQwTni9tHZ5LLoeikkYsfOBvi&hl=en" width="100%" height="480"></iframe>



  







 
           
           
             
        
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>