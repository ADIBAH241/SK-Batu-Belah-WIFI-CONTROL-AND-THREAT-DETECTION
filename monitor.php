<?php
session_start
include "../db.php";

if ($_SESSION['role'] != 'teacher') {
	header("Location: ../login.php");
	exit();
}

$result = $conn->query("SELECT device_name,ip_address,status FROM devices");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Moitoring</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Class Monitoring View</h2>

<table>
<tr>
	<th>Device</th>
	<th>IP</th>
	<th>Status</th>
</tr>

<?php while($row=$result->fetch_assoc()){ ?>
<tr>
	<td><?php echo $row['device_name']; ?></td>
	<td><?php echo $row['ip_address']; ?></td>
	<td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
