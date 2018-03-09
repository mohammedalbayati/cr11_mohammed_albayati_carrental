
<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users where user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 ?>
 
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome- <?php echo $userRow['first_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style2.css">

  <?php include('navbar.php'); ?>
  <body>

 <div class="header">
  <h2>Our Offices</h2>
</div>

<div class="row">
  <div class="column">
    <div class="card1">
  <img src="https://cdn.pixabay.com/photo/2018/01/31/05/43/web-3120321_960_720.png" alt="John" style="width:100%">
  <h3>VorgartenStraße</h3>
  <p class="title">1020, Wien</p>
 <p><a href="office.php"><button class="b1">More</button></a></p>
</div>
  </div>
  <div class="column" >
    <div class="card1">
  <img src="https://cdn.pixabay.com/photo/2018/01/31/05/43/web-3120321_960_720.png" alt="John" style="width:100%">
  <h3>Schwedenplatz</h3>
  <p class="title">1010, Wien</p>
 <p><a href="office.php"><button class="b1">More</button></a></p>
</div>
  </div>
  <div class="column" >
    <div class="card1">
  <img src="https://cdn.pixabay.com/photo/2018/01/31/05/43/web-3120321_960_720.png" alt="John" style="width:100%">
  <h3>Mariahilfestraße</h3>
  <p class="title">1060, Wien</p>
 <p><a href="office.php"><button class="b1">More</button></a></p>
</div>
  </div>
  <div class="column" >
    <div class="card1">
  <img src="https://cdn.pixabay.com/photo/2018/01/31/05/43/web-3120321_960_720.png" alt="John" style="width:100%">
  <h3>Simmeringstraße</h3>
  <p class="title">1110, Wien</p>
 <p><a href="office.php"><button class="b1">More</button></a></p>
</div>
  </div>
</div>

<div class="d1"></div>


<div class="row r1">
  <div class="column1">
    <center>
    <img src="img/2.png">
    </center>
  </div>
  <div class="column1">
    <center class="ce">
      <div class="columns">
  <ul class="price">
    <li class="header">Dodge Charger</li>
    <li class="grey">€ 140,- / Day</li>
    <li>1 Day</li>
    <li>7 Daies</li>
    <li>14 Daies</li>
    <li class="grey"><a href="office.php" class="button">Book</a></li>
  </ul>
</div>
    </center>
  </div>
</div>
<hr>
<div class="row r1">
  <div class="column1">
    <center class="ce">
      <div class="columns">
  <ul class="price p2">
    <li class="header h2">Lincoln Navigator</li>
    <li class="grey">€ 160,- / Day</li>
    <li>1 Day</li>
    <li>7 Daies</li>
    <li>14 Daies</li>
    <li class="grey"><a href="office.php" class="button">Book</a></li>
  </ul>
</div>
    </center>
  </div>
  <div class="column1">
    <center>
    <img src="img/7.png">
    </center>
  </div>
</div>
<hr>
<div class="row r1">
  <div class="column1">
    <center>
    <img src="img/5.png">
    </center>
  </div>
  <div class="column1">
    <center class="ce">
       <div class="columns">
  <ul class="price p1">
    <li class="header h1">Audi S5</li>
    <li class="grey">€ 120,- / Day</li>
    <li>1 Day</li>
    <li>7 Daies</li>
    <li>14 Daies</li>
    <li class="grey"><a href="office.php" class="button">Book</a></li>
  </ul>
</div>
    </center>
  </div>
</div>

<div class="footer">
  <p>Khaled Ahmad</p>
</div>









   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
<?php ob_end_flush(); ?>