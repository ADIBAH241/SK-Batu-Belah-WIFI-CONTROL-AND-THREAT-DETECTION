<?php
include("db.php");

$id = $_GET['id'];

if(isset($_POST['apply'])){

// DELETE only selected approval
mysqli_query($conn,"DELETE FROM approvals WHERE id=$id");

header("Location: approval_success.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Apply Filter</title>

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

.box{
background:white;
width:400px;
margin:auto;
margin-top:120px;
padding:30px;
border-radius:20px;
}

button{
padding:10px 20px;
border-radius:20px;
background:#2b78e4;
color:white;
border:none;
margin:5px;
}

.footer{
position:fixed;
bottom:0;
width:100%;
text-align:center;
color:black;
font-size:14px;
}

.back{background:#ccc;color:black;}

</style>
</head>

<body>

<div class="box">

<img src="images/logo.png" width="100">

<h3>Apply Filter Setting</h3>

<form method="POST">

<input type="text" placeholder="Enter domain (example: youtube.com)" name="domain"><br><br>

<select name="type">
<option>Blacklist</option>
<option>Whitelist</option>
</select>

<br><br>

<button name="apply">Apply Filter</button>

</form>

<br>

<a href="admin_approval.php">
<button class="back">Back</button>
</a>

</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>

</body>
</html>
