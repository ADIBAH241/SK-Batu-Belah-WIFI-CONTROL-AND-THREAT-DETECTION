<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Configure Filter</title>

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
margin:10px;
cursor:pointer;
}

.back{background:#ddd;}
.continue{background:#2b78e4;color:white;}

.footer{
position:fixed;
bottom:0;
width:100%;
background:rgba(255,255,255,0.8);
padding:10px;
}

</style>
</head>

<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Filter Setting</h2>

    <form action="add_filter.php" method="POST">
        <p><b>Choose Filter Type :</b></p>

        <label><input type="radio" name="filter_type" value="blacklist" required> Blacklist</label><br><br>
        <label><input type="radio" name="filter_type" value="whitelist" required> Whitelist</label><br><br>

        <button type="button" class="back" onclick="location.href='admin_dashboard.php'">Back</button>
        <button type="submit" class="continue">Continue</button>
    </form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
