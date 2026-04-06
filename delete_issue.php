<?php
include("db.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM support WHERE id=$id");

header("Location:delete_success.php");
?>
