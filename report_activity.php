<?php
include("db.php");
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$reporter_name = $_SESSION['name'] ?? 'Teacher';

if(isset($_POST['submit'])){
    $issue = mysqli_real_escape_string($conn, $_POST['issue']);

    mysqli_query($conn,"
        INSERT INTO support(reporter_name,issue,status)
        VALUES('$reporter_name','$issue','Pending')
    ");

    header("Location: report_success.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Report Suspicious Activity</title>
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
width:450px;
margin:auto;
margin-top:100px;
padding:30px;
border-radius:20px;
text-align:left;
}

textarea{
width:100%;
height:100px;
padding:10px;
border-radius:10px;
}

button{
padding:10px 20px;
border:none;
border-radius:10px;
cursor:pointer;
margin:5px;
}

.submit{background:#2b78e4;color:white;}
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
    <div style="text-align:center;">
        <img src="images/logo.png" width="100">
        <h2>Report Suspicious Activity</h2>
    </div>

    <form method="POST">
        <p><b>Issue Description:</b></p>
        <textarea name="issue" required placeholder="Describe the suspicious activity"></textarea>

        <br><br>
        <div style="text-align:center;">
            <button class="submit" name="submit">Submit Report</button>
        </div>
    </form>

    <br>
    <div style="text-align:center;">
        <button class="back" onclick="window.location.href='monitor_student.php'">Back</button>
    </div>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
