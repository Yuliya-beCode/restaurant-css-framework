
<?php

//first name
$inputFirstName = $_POST['inputFirstName'];

//last name
$inputLastName = $_POST['inputLastName'];


//email
$inputEmail = $_POST['email'];

//subject
$subject = $_POST['subject'];

//message
$message = $_POST['message'];


echo $inputFirstName . "</br>";
echo $inputLastName . "</br>";
echo $inputEmail . "</br>";
echo $subject . "</br>";
echo $message . "</br>";



if (mb_strlen($inputFirstName) < 2 || mb_strlen($inputFirstName) > 20) {
    echo "Error: please check the leangth of your first name";
    exit();
} else if (mb_strlen($inputLastName) < 2 || mb_strlen($inputLastName) > 20) {
    echo "Error: please check the leangth of your last name";
    exit();
} else if (mb_strlen($inputEmail) < 2) {
    echo "Error: please check the leangth of your email";
    exit();
} else if (mb_strlen($subject) < 1) {
    echo "Error: please check the leangth of your subject";
    exit();
} else if (mb_strlen($message) < 1) {
    echo "Error: please check the leangth of your message";
    exit();
}


$user = 'admin';
$password = '';
$db = 'register-bd';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect($link, $host, $user, $password, $db, $port);
$conn = new mysqli($host, $user, $password, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else echo '</br>' . 'perfect' . '</br>';

$sql = "INSERT INTO `users` (inputFirstName, inputLastName, inputEmail, subject, message) 
VALUES('$inputFirstName', '$inputLastName', '$inputEmail', '$subject', '$message')";

if ($conn->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>