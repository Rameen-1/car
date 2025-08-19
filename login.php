<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>User Login</h1>
</header>
<div class="container">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
 
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "<p style='color:green;'>Login successful! <a href='index.php'>Go to homepage</a></p>";
        } else {
            echo "<p style='color:red;'>Invalid password.</p>";
        }
    } else {
        echo "<p style='color:red;'>No account found with this email.</p>";
    }
}
?>
<form method="post">
    <label>Email:</label>
    <input type="email" name="email" required>
 
    <label>Password:</label>
    <input type="password" name="password" required>
 
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="signup.php">Sign up</a></p>
</div>
</body>
</html>
 
