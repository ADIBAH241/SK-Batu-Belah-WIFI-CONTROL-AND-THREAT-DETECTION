<?
session_start();

// Check if user role is teacher
if ($_SESSION['role'] != 'teacher') {
        header("Location: ../login.php");
        exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher Dashboard -SKBB</title>
	<link rel="stylesheet" href="../style.css"
</head>
<body>

<h2>Teacher Dashboard</h2>

<p>Welcome, Teacher!</p>

<a href="monitor.php">View Class Monitoring</a><br>
<a href="../logout.php">Logout</a>

</body>
</html>
