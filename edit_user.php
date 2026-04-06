<?php
include("db.php");

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$name=$_POST['name'];

mysqli_query($conn,"UPDATE users SET name='$name' WHERE id=$id");

header("Location:success.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit User</title>

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


input{
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

<h2>Edit User</h2>

<form method="POST">

Name<br>
<input type="text" name="name" value="<?php echo $row['name']; ?>">

<br>

<button name="update">Update</button>

</form>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
