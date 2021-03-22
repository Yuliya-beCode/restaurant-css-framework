<?php

require_once 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact form</title>
</head>


<body>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Subject of message </th>
            <th>message</th>
        </tr>


        <tr>
            <td></td>
        </tr>
    </table>

    <pre>
        <?php
        $contacts = mysqli_query($conn, "SELECT * FROM `users`");
        $contacts = mysqli_fetch_all($contacts);
        print_r($contacts)
        ?>
</pre>
</body>

</html>