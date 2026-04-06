<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Dashboard</title>

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


.container{
width:100%;
height:100vh;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
}

.logo{
width:100px;
margin-bottom:10px;
}

.menu{
display:flex;
flex-direction:column;
gap:18px;
align-items:center;
}

.menu button{
width:250px;
padding:12px;
border-radius:25px;
border:1px solid black;
background:white;
cursor:pointer;
transition:0.3s;
font-size:14px;
}

.menu button:hover{
background:#2b78e4;
color:white;
transform:scale(1.05);
}

.logout{
background:#d9534f !important;
color:white;
border:none !important;
}

.footer{
position:absolute;
bottom:10px;
width:100%;
text-align:center;
font-size:14px;
color:black;
}
</style>
</head>
<body>

<div class="container">
<div class="box">

<img src="images/logo.png" class="logo">

<h2>👋 Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>

<div class="menu">
    <button onclick="location.href='browse_internet_teacher.php'">Browse Internet</button>
    <button onclick="location.href='manage_network.php'">Manage Network Settings</button>
    <button onclick="location.href='monitor_student.php'">Monitor Student Activity</button>
    <button onclick="location.href='view_notification.php'">View Notifications</button>
    <button class="logout" onclick="location.href='logout.php'">Logout</button>
</div>

</div>
</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
