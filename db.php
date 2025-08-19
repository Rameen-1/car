<?php
$host = 'localhost';
$db = 'dbuyunzguabg6p';
$user = 'ufgzffdwyusgm';
$pass = 'ifqlkpgc9quz';
 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
 
