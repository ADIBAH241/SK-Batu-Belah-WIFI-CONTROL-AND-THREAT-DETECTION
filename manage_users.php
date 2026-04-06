<?php

// Show PHP errors (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Only admin allowed
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
header("Location: login.php");
exit();
}

// Database connection
include("db.php");

// Check connection
if(!$conn){
die("Database connection failed: " . mysqli_connect_error());
}

// Get users
$result = mysqli_query($conn,"SELECT * FROM users");

if(!$result){
die("Query Error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Users</title>

<style>

body{
    font-family:Arial;
    text-align:center;
    margin:0;
    min-height:100vh;
    background-image:url("images/walpaperr.png");
    background-repeat:no-repeat;
    background-position:center top;
    background-size:100% 100%;
}


.box{
width:400px;
margin:auto;
margin-top:150px;
padding:30px;
border-radius:20px;
}


table{
margin:auto;
border-collapse:collapse;
background:white;
margin-top:20px;
}

td,th{
padding:12px;
border:1px solid gray;
}

.edit{
background:#2b78e4;
color:white;
border:none;
padding:6px 12px;
border-radius:10px;
cursor:pointer;
}

.delete{
background:red;
color:white;
border:none;
padding:6px 12px;
border-radius:10px;
cursor:pointer;
}

.add{
background:#2b78e4;
color:white;
padding:10px 20px;
border-radius:20px;
border:none;
cursor:pointer;
}

.back{
margin-top:10px;
padding:8px 15px;
border-radius:20px;
border:none;
background:#ddd;
cursor:pointer;
}

.footer{
margin-top:40px;
font-size:14px;
}

</style>

</head>

<body>

<img src="images/logo.png" width="110">

<h2>Manage Users</h2>

<table>

<tr>
<th>Name</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['role']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>

<a href="edit_user.php?id=<?php echo $row['id']; ?>">
<button class="edit">Edit</button>
</a>

<a href="delete_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this user?')">
<button class="delete">Delete</button>
</a>

</td>

</tr>

<?php
}
?>

</table>

<br>

<a href="add_user.php">
<button class="add">Add New User</button>
</a>

<br><br>

<a href="admin_dashboard.php">
<button class="back">Back to Dashboard</button>
</a>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>

</html>
