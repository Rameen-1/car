<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Find Your Rental Car</h1>
</header>
<div class="container">
    <form action="search.php" method="get">
        <label>Pickup Location:</label>
        <input type="text" name="location" required>
 
        <label>Start Date:</label>
        <input type="date" name="start_date" required>
 
        <label>Return Date:</label>
        <input type="date" name="end_date" required>
 
        <button type="submit">Search Cars</button>
    </form>
</div>
</body>
</html>
 
