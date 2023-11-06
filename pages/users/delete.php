<?php
require_once("../../includes/db.php");

if (!isset($_GET['id'])) {
    header("Location: view.php");
}

$id = $_GET['id'];

$sql = "DELETE FROM `users` WHERE `user_id`=$id";
if(mysqli_query($conn,$sql)){
    header("Location: view.php");
}
?>
