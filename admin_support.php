<?php
include("db.php");
session_start();

if(isset($_POST['submit'])){
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $issue = mysqli_real_escape_string($conn, $_POST['issue']);

    if($name != "" && $issue != ""){
        mysqli_query($conn, "INSERT INTO support(reporter_name, issue, status)
        VALUES('$name', '$issue', 'Pending')");

        header("Location: support_success.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Contact Admin Support</title>

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
margin-top:120px;
padding:30px;
border-radius:20px;
}


.logo{
width:100px;
margin-bottom:10px;
}

input, textarea{
width:90%;
padding:12px;
border-radius:15px;
border:1px solid #999;
margin-top:8px;
font-size:14px;
}

textarea{
height:100px;
resize:none;
}

.button-row{
margin-top:20px;
display:flex;
justify-content:center;
gap:15px;
}

button{
padding:10px 20px;
border-radius:20px;
border:none;
cursor:pointer;
font-size:14px;
}

.back{
background:white;
border:1px solid #2b78e4;
color:#2b78e4;
}

.submit{
background:#2b78e4;
color:white;
}

.footer{
margin-top:30px;
font-size:14px;
color:black;
}
</style>
</head>

<body>

<div class="box">

<img src="images/logo.png" class="logo">

<h2>Contact Admin Support</h2>

<p>Admin Email : adminskbb@skbb.com</p>
<p>Admin Phone : 019-4674356</p>

<form method="POST">

<p><b>Name :</b></p>
<input type="text" name="name" placeholder="Type here..." required>

<p><b>Issue :</b></p>
<textarea name="issue" placeholder="Type here..." required></textarea>

<div class="button-row">
    <button type="button" class="back" onclick="window.location.href='faq.php'">Back to FAQ</button>
    <button type="submit" name="submit" class="submit">Submit</button>
</div>

</form>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
