<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'student'){
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['email'];
$email_safe = mysqli_real_escape_string($conn, $user_email);

$result = mysqli_query($conn, "
    SELECT * FROM notifications
    WHERE recipient_email='$email_safe'
    ORDER BY id DESC
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Notifications</title>
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

table{
width:100%;
border-collapse:collapse;
margin-top:15px;
}
th, td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}
th{
background:#f2f2f2;
}
button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
background:#ddd;
margin-top:15px;
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
    <h2>Student Notifications</h2>

    <?php if(mysqli_num_rows($result) > 0){ ?>
    <table>
        <tr>
            <th>No.</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
        <?php $no=1; while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['message']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p>No notifications available.</p>
    <?php } ?>

    <button onclick="location.href='student_dashboard.php'">Back</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
