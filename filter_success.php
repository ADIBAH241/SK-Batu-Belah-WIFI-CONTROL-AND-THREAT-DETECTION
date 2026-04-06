<?php
session_start();
include("session_check.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Filter Update Confirmation</title>

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
background:#2b78e4;
color:white;
padding:10px 20px;
border:none;
border-radius:20px;
}

.footer{
position:fixed;
bottom:0;
width:100%;
background:rgba(255,255,255,0.8);
padding:10px;
}

</style>

</head>
<body>

<div class="box">

<img src="images/logo.png" width="110">

<h2>Status Update</h2>

<p>Filter update successfully ✅</p>

    <br>
    <button onclick="location.href='admin_dashboard.php'">Return to Dashboard</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
