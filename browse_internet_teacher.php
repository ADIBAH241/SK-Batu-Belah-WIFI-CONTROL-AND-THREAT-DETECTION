<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Browse Internet (Teacher)</title>
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


input{
width:90%;
max-width:100%;
padding:12px;
border-radius:20px;
border:1px solid gray;
}
button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}
.back{
background:#ddd;
}
.request{
background:#2b78e4;
color:white;
}
.footer{
margin-top:25px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Teacher Internet Access</h2>

    <form action="check_access_teacher.php" method="POST">
        <p><b>Enter Website URL:</b></p>
        <input type="text" name="website" placeholder="youtube.com" required>

        <br><br>

        <button type="button" class="back" onclick="location.href='teacher_dashboard.php'">Back</button>
        <button type="submit" class="request">Request Access</button>
    </form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
