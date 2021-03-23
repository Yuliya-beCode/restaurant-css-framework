<?php

require_once '../admin/conn.php';

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
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Subject of message </th>
            <th>message</th>
        </tr>


        <?php
        $contacts = mysqli_query($conn, "SELECT * FROM `users`");
        $contacts = mysqli_fetch_all($contacts);
        foreach ($contacts as $contact) {
        ?>


            <tr>
                <td><?= $contact[0] ?></td>
                <td><?= $contact[1] ?></td>
                <td><?= $contact[2] ?></td>
                <td><?= $contact[3] ?></td>
                <td><?= $contact[4] ?></td>
                <td><?= $contact[5] ?></td>
                <td><a style="color: red;" href="delete.php?id=<?=$contact[0] ?>">Delete</a></td>

            </tr>

        <?php
        }

        ?>


    </table>


</body>

</html>