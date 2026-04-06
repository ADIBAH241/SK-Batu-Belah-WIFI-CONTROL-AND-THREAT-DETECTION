<?php
session_start();
include "../db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
	header("Location: ../login.php");
	exit();
}

// REGISTER DEVICE
if(isset($_POST['register'])){
	$name = $_POST['device_name'];
	$mac = $_POST['mac_address'];
	$ip = $_POST['ip_address'];
	$owner = $_POST['owner'];

	$stmt = $conn->prepare("INSERT INTO devices (device_name,mac_address,ip_address,owner) VALUES (?,?,?,?, 'actve')");
        $stmt->bind_param("ssss",$name,$mac,$ip,$owner);

	if($stmt->execute()){
		echo "<p stle='color:green;'>Device Registered Successfully</p>";
	} else {
		echo "<p style='color:red;'>Error registering device</p>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Devices - SKBB</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Register New Device</h2>

<form method="POST">
	Device Name: <input name="device_name" required><br><br>
	MAC Address: <input name="mac_address" required><br><br>
	IP Address: <input name="ip_address" required><br><br>
	Owner: <input name="owner" required><br><br>
	<button name="register">Register Device</button>
</form>

<hr>

<h2>Registered Devices</h2>

<?php
$result = $conn->query("SELECT * FROM devices");

while($row = $result->fetch_assoc()){
	echo "<b>".$row['device_name']."</b> | ";
	echo $row['ip_address']." | ";
	echo "Status: ".$row['status'];

	if($row['status'] == 'active'){
		echo " | <a href='block.php?id=".$row['id']."'>Block</a>";
	} else {
		echo " | <a href='unblock.php?id=".$row['id']."'>Unblock</a>";
	}

	echo "<br><br>";
}
?>
