<?php
include("db.php");
session_start();
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Confirm Delete</title>
<style>

body{
font-family:Arial;
text-align:center;
background:url("images/wallpaper.png") no-repeat center top;
background-size:auto 100vh;
background-color:#dfeef3;
margin:0;
min-height:100vh;
}

.box{
background:white;
width:400px;
margin:auto;
margin-top:150px;
padding:30px;
border-radius:20px;
}

button{
padding:10px 20px;
border-radius:10px;
border:none;
margin:5px;
cursor:pointer;
}

.confirm{
background:red;
color:white;
}

.cancel{
background:#888;
color:white;
}

.footer{
text-align:center;
margin-top:20px;
color:#000;
}

</style>
</head>
<body>

<div class="box">
<img src="images/logo.png" width="110">
<h3>Are you sure you want to delete this notification?</h3>

<a href="delete_notification.php?id=<?php echo $id; ?>"><button class="confirm">Yes, Delete</button></a>
<form action="teacher_notification.php">
<button class="cancel">Cancel</button>
</form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
