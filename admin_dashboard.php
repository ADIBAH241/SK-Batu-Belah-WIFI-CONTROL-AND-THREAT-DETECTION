<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

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

.container{
width:420px;
margin:auto;
margin-top:90px;
background:rgba(255,255,255,0.2)
padding:30px;
border-radius:20px;
}


.box-wide{
background:white;
width:min(94vw, 900px);
margin:auto;
margin-top:60px;
padding:30px;
border-radius:20px;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.menu{
display:grid;
grid-template-columns: 1fr 1fr 1fr;
gap:20px;
margin-top:30px;
}

button{
padding:15px;
border-radius:25px;
border:1px solid black;
background:white;
color:black;
cursor:pointer;
transition:0.3s;
}

/* 🔥 HOVER EFFECT */
button:hover{
background:#2b78e4;
color:white;
transform:scale(1.05);
}

.center{
margin-top:20px;
}

/* 🔴 logout merah */
.logout{
background:#d9534f;
color:white;
border:none;
}

.footer{
position:fixed;
bottom:0;
width:100%;
text-align:center;
font-size:14px;
}

</style>
</head>

<body>

<div class="container">

<img src="images/logo.png" width="110">

<h2>👋 Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>

<div class="menu">

<button onclick="location.href='manage_users.php'">Manage Users</button>

<button onclick="location.href='configure_filter.php'">Configure Filter</button>

<button onclick="location.href='monitor_traffic.php'">Monitor Network</button>

<button onclick="location.href='generate_reports.php'">Generate Reports</button>

<button onclick="location.href='admin_approval.php'">Approval Requests</button>

<button onclick="location.href='admin_support_view.php'">Support Issues</button>

</div>

<div class="center">
<button onclick="location.href='send_notification.php'">Send Notification</button>
</div>

<br>

<button class="logout" onclick="location.href='logout.php'">Logout</button>

</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>

</body>
</html>
