<?php
	ob_start();
	session_start();
  	include_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}

	// select logged-in users detail
	$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user'];
	$res = mysqli_query($conn, $query);
	$userRow = mysqli_fetch_assoc($res);
	$userID = $userRow['user_id'];

	//select car details
	$getAllCars = "SELECT image, model, available, address, city, zip FROM cars 
				   INNER JOIN offices ON cars.fk_offices_id = offices.offices_id";

	$allCarsResult = mysqli_query($conn, $getAllCars);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cars Locations</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="c_locations.css">
</head>
<body>
	<?php include('navbar.php'); ?>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Car</th>
      <th scope="col">Car Name</th>
      <th scope="col">Available</th>
      <th scope="col">Street</th>
      <th scope="col">City</th>
      <th scope="col">Zip</th>

    </tr>
  </thead>
  <tbody>
    <?php 
				while($carsRow = mysqli_fetch_assoc($allCarsResult)) {
			?>
				<tbody>
					 <td><img src="<?php echo $carsRow ['image']; ?>" alt="media image" style="max-height:70px; max-width:70px;"></td> 
					<td><?php echo $carsRow ['model']; ?></td>
					<td><img src="<?php echo $carsRow ['available']; ?>" alt="media image" style="max-height:30px; max-width:30px;"></td>
					<td><?php echo $carsRow ['address']; ?></td>
					<td><?php echo $carsRow ['city']; ?></td>
					<td><?php echo $carsRow ['zip']; ?></td>
				</tbody>
			<?php
				}
			?>
  </tbody>
</table>


<iframe src="https://www.google.com/maps/d/embed?mid=1Dvq7silghXddNzwvbLYjTjUZI4hCEMPy&hl=en" width="100%" height="480"></iframe>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>