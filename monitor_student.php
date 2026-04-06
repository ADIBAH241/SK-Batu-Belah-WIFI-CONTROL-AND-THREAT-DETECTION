<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$students = mysqli_query($conn,"
    SELECT u.name, u.email, u.status,
           (
             SELECT website FROM usage_logs 
             WHERE user_email=u.email 
             ORDER BY id DESC LIMIT 1
           ) AS latest_site,
           (
             SELECT access_result FROM usage_logs 
             WHERE user_email=u.email 
             ORDER BY id DESC LIMIT 1
           ) AS latest_result
    FROM users u
    WHERE u.role='Student'
    ORDER BY u.id DESC
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Network Activity</title>
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
margin-top:20px;
}

td,th{
padding:10px;
border:1px solid gray;
text-align:center;
}

button{
padding:10px 20px;
border-radius:20px;
border:none;
cursor:pointer;
margin:5px;
}

.blocked{background:#2b78e4;color:white;}
.report{background:orange;color:white;}
.back{background:#888;color:white;}

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
    <h2>Student Network Activity</h2>

    <table>
        <tr>
            <th>Student Name</th>
            <th>Status</th>
            <th>Latest Site</th>
            <th>Latest Result</th>
            <th>Action</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($students)){ ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo htmlspecialchars($row['latest_site'] ?? '-'); ?></td>
            <td><?php echo htmlspecialchars($row['latest_result'] ?? '-'); ?></td>
            <td>
                <button class="blocked" onclick="location.href='view_blocked_sites.php'">View Blocked Sites</button>
                <button class="report" onclick="location.href='report_activity.php'">Report Suspicious Activity</button>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <button class="back" onclick="location.href='teacher_dashboard.php'">Back</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
