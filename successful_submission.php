<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$teacher_name = $_SESSION['name'];
$rules = $_SESSION['pending_rules'] ?? [];
$website_request = $_SESSION['pending_website_request'] ?? '';

$request_text = '';

if(!empty($rules)){
    $request_text = implode(", ", $rules);
}

if(in_array("Submit Website Request to Admin", $rules) && $website_request != ''){
    $request_text .= " | Website details: " . $website_request;
}

if($request_text != ''){
    $teacher_safe = mysqli_real_escape_string($conn, $teacher_name);
    $request_safe = mysqli_real_escape_string($conn, $request_text);

    mysqli_query($conn, "
        INSERT INTO approvals(teacher, request, status, created_at)
        VALUES('$teacher_safe', '$request_safe', 'Pending', NOW())
    ");
}

/* clear session temp data */
unset($_SESSION['pending_rules']);
unset($_SESSION['pending_website_request']);
?>
<!DOCTYPE html>
<html>
<head>
<title>Submission Successful</title>
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
border:none;
border-radius:20px;
cursor:pointer;
background:#2b78e4;
color:white;
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
    <h2>Submission Successful</h2>
    <p>Your request has been submitted successfully to the admin ✅</p>

    <br>
    <button onclick="location.href='teacher_dashboard.php'">Return to Dashboard</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
