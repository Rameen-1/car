<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Booking Confirmed!</h1>
</header>
<div class="container">
<?php
$car_id = $_POST['car_id'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];
 
$stmt = $conn->prepare("INSERT INTO bookings (car_id, user_name, user_email, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $car_id, $user_name, $user_email, $start, $end);
$stmt->execute();
 
echo "<p>Thank you, $user_name! Your car has been booked from $start to $end.</p>";
?>
</div>
</body>
</html>
 
