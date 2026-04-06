<?php
include("db.php");

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$role=$_POST['role'];

mysqli_query($conn,"INSERT INTO users(name,email,role,status)
VALUES('$name','$email','$role','Active')");

header("Location:success.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add User</title>

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


input,select{
width:90%;
padding:8px;
margin-top:5px;
}

button{
padding:10px 25px;
border-radius:20px;
border:none;
background:#2b78e4;
color:white;
cursor:pointer;
margin-top:15px;
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

<img src="images/logo.png" width="110">

<h2>Add User</h2>

<form method="POST">

Name<br>
<input type="text" name="name" required><br><br>

Email<br>
<input type="text" name="email" required><br><br>

Role<br>
<select name="role">
<option>Student</option>
<option>Teacher</option>
</select>

<br>

<button name="submit">Add User</button>

</form>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
