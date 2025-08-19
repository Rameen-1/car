<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Car</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Book Your Car</h1>
</header>
<div class="container">
<?php
$car_id = $_GET['car_id'];
$start = $_GET['start'];
$end = $_GET['end'];
 
$car = $conn->query("SELECT * FROM cars WHERE id=$car_id")->fetch_assoc();
?>
<form action="confirm.php" method="post">
    <input type="hidden" name="car_id" value="<?= $car_id ?>">
    <input type="hidden" name="start_date" value="<?= $start ?>">
    <input type="hidden" name="end_date" value="<?= $end ?>">
 
    <h3><?= $car['brand'] ?> - <?= $car['model'] ?></h3>
    <p><?= $car['description'] ?></p>
    <label>Your Name:</label>
    <input type="text" name="user_name" required>
 
    <label>Email:</label>
    <input type="email" name="user_email" required>
 
    <button type="submit">Confirm Booking</button>
</form>
</div>
</body>
</html>
 
