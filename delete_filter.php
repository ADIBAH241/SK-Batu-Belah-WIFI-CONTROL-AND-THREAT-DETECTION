<?php
include("db.php");
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? '';

if($id != ''){
    $id = (int)$id;
    mysqli_query($conn, "DELETE FROM filters WHERE id=$id");
}

header("Location: view_filters.php");
exit();
?>
