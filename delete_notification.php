<?php
include("db.php");
session_start();
$id = $_GET['id'];

// Delete notification
mysqli_query($conn,"DELETE FROM notifications WHERE id='$id'");

header("Location:delete_success.php");
exit;
?>
