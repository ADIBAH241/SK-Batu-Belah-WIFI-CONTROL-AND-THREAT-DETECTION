<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Notification Sent</title>
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

button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
background:#2b78e4;
color:white;
}
.footer{
margin-top:20px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Notification Sent</h2>
    <p>The notification has been delivered successfully ✅</p>
    <br>
    <button onclick="location.href='admin_dashboard.php'">OK</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
