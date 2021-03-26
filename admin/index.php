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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Contact form</title>
</head>

<body>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">Contact form</a>
    <a href='#guestBook'>Guestbook</a>

  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
  </div>

  <div class="col-md-12 text-center">
    <img id="logo" src="logo.png" alt="" width="200px">

  </div>


  <div class="container">
    <div class="row justify-content-center">

      <h1 class="text-center">Contact Form</h1>
      <table class="table-responsive col-md-8  mb-5 text-center ">
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
            <td><a style="color: red;" href="delete.php?id=<?= $contact[0] ?>">Delete</a></td>

          </tr>

        <?php
        }

        ?>


      </table>
    </div>
  </div>

  <div id="guestBook">
    <button onclick="authenticate().then(loadClient)" class="mx-auto d-block btn btn-success">
      authorize 
    </button>

    <button onclick="loadClient()" class="mx-auto d-block btn btn-success">
      load
    </button>
    <div class="container">
      <div class="row justify-content-center">
        <table class="table-responsive col-md-8 mt-3  mb-5 text-center">
          <thead>
            <tr></tr>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>


  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    }
  </script>

  <script src="https://apis.google.com/js/api.js"></script>
  <script src="./guestbook.js"></script>
</body>

</html>