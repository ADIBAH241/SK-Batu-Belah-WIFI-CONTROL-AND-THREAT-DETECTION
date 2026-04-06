<?php
include("db.php");

$id=$_GET['id'];

if(isset($_POST['delete'])){
mysqli_query($conn,"DELETE FROM users WHERE id=$id");
header("Location:success.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Delete User</title>

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
padding:10px 25px;
border-radius:20px;
border:none;
cursor:pointer;
margin:10px;
}

.delete{
background:red;
color:white;
}

.cancel{
background:gray;
color:white;
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

<h3>Delete this user?</h3>

<form method="POST">

<button class="delete" name="delete">Yes, Delete</button>

<a href="manage_users.php">
<button type="button" class="cancel">Cancel</button>
</a>

</form>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
