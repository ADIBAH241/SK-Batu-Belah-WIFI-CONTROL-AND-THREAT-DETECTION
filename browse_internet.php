<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Browse Internet</title>
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
width:80%;
padding:12px;
border-radius:20px;
border:1px solid gray;
}

button{
padding:10px 20px;
border-radius:20px;
border:none;
margin:8px;
cursor:pointer;
}

.back{background:#ddd;}
.request{background:#2b78e4;color:white;}

.footer{
position:fixed;
bottom:10px;
width:100%;
text-align:center;
color:black;
}

</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Internet Access</h2>

    <form action="check_access.php" method="POST">
        <p><b>Enter Website URL :</b></p>
        <input type="text" name="website" placeholder="www.example.com" required>
        <br><br>
        <button type="button" class="back" onclick="location.href='student_dashboard.php'">Back</button>
        <button type="submit" class="request">Request Access</button>
    </form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
