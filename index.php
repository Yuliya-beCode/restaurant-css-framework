
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Confirmation</title>
</head>
<body>
  
<div class="col-md-12 text-center mt-3">

<a class="btn btn-primary btn-sm" href="./index.html" role="button">Go Back</a>

</div>

<div class="col-md-12 text-center mt-3 mb-3">
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
} else echo '</br>' . 'Perfect' . '</br>';

$sql = "INSERT INTO `users` (inputFirstName, inputLastName, inputEmail, subject, message) 
VALUES('$inputFirstName', '$inputLastName', '$inputEmail', '$subject', '$message')";


if ($conn->query($sql)) {
    echo "New record has been created successfully. Thanks a lot for your feedback!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>

</div>

<footer class="container-fluid">

<div class="d-flex justify-content-center">
  <img id="card" src="pictures/Only kids.gif" alt="">

</div>
</div>
</footer>

<!--/footer-->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>


</body>
</html>
