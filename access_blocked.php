<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}
$site = $_SESSION['last_site'] ?? 'Unknown site';
$reason = $_SESSION['last_reason'] ?? 'Blocked by school policy';
?>
<!DOCTYPE html>
<html>
<head>
<title>Access Blocked</title>
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
width:450px;
margin:auto;
margin-top:120px;
padding:30px;
border-radius:20px;
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
    <h2>Access Blocked</h2>
    <p><b><?php echo htmlspecialchars($site); ?></b> is blocked by school policy ❌</p>
    <p><b>Reason :</b> <?php echo htmlspecialchars($reason); ?></p>

    <br>
    <button onclick="location.href='student_dashboard.php'">Return to dashboard</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
