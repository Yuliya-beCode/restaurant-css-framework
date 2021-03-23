
<?php


$user = 'admin';
$password = '';
$db = 'register-bd';
$host = 'localhost';
$port = 3306;


$conn = new mysqli($host, $user, $password, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else echo '</br>' . '' . '</br>';



?>
