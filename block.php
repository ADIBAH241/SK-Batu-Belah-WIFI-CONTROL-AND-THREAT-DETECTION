<?
session_start();
include "../db.php";      // Database connection
include "alert_mail.php"  // Include the mail alert function

// Only admin can access
if ($_SESSION['role'] != 'admin') {
	header("Location: ../login.php");
	exit();
}

// Get device ID from URL
$id = $_GET['id'];

// Get device IP
$result = $conn->query("SELECT ip_address FROM devices WHERE id=$id");
$row = $result->fetch_assoc();
$ip = $row['ip_address'];

// Update Database: mark device as blocked
$conn->query("UPDATE devices SET status='blocked' WHERE id=$id");

// Add IP to Squid block list
file_put_contents("/etc/squid/blocked_ip.txt", $ip. PHP_EOL, FILE_APPEND);

// Restart Squid to apply changes (requires visudo permission)
exec("sudo systemctl restart squid");

// Send email alert to admin
sendAlert('"IP $ip has been blocked in SKBB system.");

// Redirect back to devices page
header("Location: devices.php");
exit();
?>
