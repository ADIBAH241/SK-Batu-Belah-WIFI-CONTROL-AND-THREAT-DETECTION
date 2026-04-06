<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "skbbuser", "Skbb@1234!", "skbb_wifi");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

