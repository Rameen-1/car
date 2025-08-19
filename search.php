<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Available Cars</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Available Rental Cars</h1>
</header>
<div class="container">
 
<?php
// Get search values
$location = isset($_GET['location']) ? trim($_GET['location']) : '';
$start = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end = isset($_GET['end_date']) ? $_GET['end_date'] : '';
 
// Escape location to prevent SQL injection
$location_escaped = $conn->real_escape_string($location);
 
// Debug output
echo "<p><strong>Debug Info:</strong></p>";
echo "<p>Search Location: " . htmlspecialchars($location) . "</p>";
echo "<p>Start Date: " . htmlspecialchars($start) . "</p>";
echo "<p>End Date: " . htmlspecialchars($end) . "</p>";
 
// SQL query (case-insensitive search)
$sql = "SELECT * FROM cars WHERE LOWER(location) LIKE LOWER('%$location_escaped%')";
echo "<p>SQL Query: $sql</p>"; // Debug
 
$result = $conn->query($sql);
 
if ($result && $result->num_rows > 0) {
    while($car = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='images/{$car['image']}' width='100%' alt='Car Image'><br>";
        echo "<h3>{$car['brand']} - {$car['model']}</h3>";
        echo "<p>{$car['description']}</p>";
        echo "<p>Price per day: <strong>\${$car['price']}</strong></p>";
        echo "<a href='book.php?car_id={$car['id']}&start=$start&end=$end'><button>Book Now</button></a>";
        echo "</div>";
    }
} else {
    echo "<p style='color:red;'>🚫 No cars found for your search.</p>";
    echo "<p>Tip: Make sure the location matches cars in your database like 'Dubai' or 'Abu Dhabi'.</p>";
}
?>
</div>
</body>
</html>
 
