<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}

$email = mysqli_real_escape_string($conn, $_SESSION['email']);

$alert = mysqli_query($conn,"
    SELECT * FROM alerts
    WHERE user_email='$email'
    ORDER BY id DESC
    LIMIT 1
");

$alert_row = ($alert && mysqli_num_rows($alert)>0) ? mysqli_fetch_assoc($alert) : null;
?>

<!DOCTYPE html>
<html>
<head>
<title>Alert Details</title>
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
    <h2>Alert Details</h2>

    <?php if($alert_row){ ?>
        <p><b style="color:red;"><?php echo htmlspecialchars($alert_row['title']); ?></b></p>
        <p><?php echo htmlspecialchars($alert_row['message']); ?></p>
        <p>Please follow school internet policy.</p>
    <?php } else { ?>
        <p>No alert found.</p>
    <?php } ?>

    <br>
    <button onclick="location.href='student_notification.php'">OK</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
