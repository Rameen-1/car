<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Create an Account</h1>
</header>
<div class="container">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
 
    $check = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($check->num_rows > 0) {
        echo "<p style='color:red;'>Email already exists.</p>";
    } else {
        $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
        echo "<p style='color:green;'>Signup successful! <a href='login.php'>Login here</a></p>";
    }
}
?>
<form method="post">
    <label>Name:</label>
    <input type="text" name="name" required>
 
    <label>Email:</label>
    <input type="email" name="email" required>
 
    <label>Password:</label>
    <input type="password" name="password" required>
 
    <button type="submit">Sign Up</button>
</form>
</div>
</body>
</html>
 
