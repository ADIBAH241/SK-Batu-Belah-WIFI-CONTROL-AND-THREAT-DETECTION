<?
session_start();
include "../db.php";

if ($_SESSION['role'] != 'admin') {
	header("Location: ../login.php");
	exit();
}

$id = $_GET['id'];
$conn->query("UPDATE devices SET status='active' WHERE id=$id");

header("Location: devices.php");
exit();
?>
