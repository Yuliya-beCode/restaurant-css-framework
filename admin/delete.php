<?php

require_once '../admin/conn.php';

$id = $_GET['id'];


mysqli_query($conn, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

header("Location:index.php");
exit();


?>

