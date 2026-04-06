<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}

$email = mysqli_real_escape_string($conn, $_SESSION['email']);

$q = mysqli_query($conn,"
    SELECT 
        IFNULL(SUM(used_mb),0) AS total_mb,
        IFNULL(SUM(active_minutes),0) AS total_minutes,
        SUM(CASE WHEN access_result='Blocked' THEN 1 ELSE 0 END) AS blocked_attempts
    FROM usage_logs
    WHERE user_email='$email'
");

$data = mysqli_fetch_assoc($q);

$total_gb = round(($data['total_mb'] ?? 0) / 1024, 2);
$total_hours = round(($data['total_minutes'] ?? 0) / 60, 2);
$blocked = $data['blocked_attempts'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>WiFi Usage Summary</title>
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
    <div style="text-align:center;">
        <img src="images/logo.png" width="100">
        <h2>WiFi Usage Summary</h2>
    </div>

    <p><b>Data Used Today :</b> <?php echo $total_gb; ?> GB</p>
    <p><b>Active Time :</b> <?php echo $total_hours; ?> Hours</p>
    <p><b>Blocked Attempts :</b> <?php echo $blocked; ?></p>

    <br>
    <div style="text-align:center;">
        <button onclick="location.href='student_dashboard.php'">Return to dashboard</button>
    </div>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
