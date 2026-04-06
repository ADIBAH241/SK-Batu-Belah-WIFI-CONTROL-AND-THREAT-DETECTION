<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}
$site = $_SESSION['last_site'] ?? 'Website';
?>

<!DOCTYPE html>
<html>
<head>
<title>Access Granted</title>
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

button{
padding:10px 20px;
border-radius:20px;
border:none;
background:#2b78e4;
color:white;
cursor:pointer;
}

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
    <h2>Access Granted</h2>
    <p><b><?php echo htmlspecialchars($site); ?></b> is allowed ✅</p>
    <p>You may continue browsing</p>

    <br>
    <button onclick="location.href='browse_internet.php'">Continue</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
