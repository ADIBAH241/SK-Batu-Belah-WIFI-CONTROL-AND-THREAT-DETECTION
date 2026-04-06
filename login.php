<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    $user = mysqli_fetch_assoc($result);

    if($user){

        // ✅ INI TEMPAT BETUL SET SESSION
        $_SESSION['email'] = $user['email'];
        $_SESSION['name']  = $user['name'];
        $_SESSION['role']  = $user['role'];

        // 🔁 REDIRECT IKUT ROLE
        if($user['role'] == 'admin'){
            header("Location: admin_dashboard.php");
        }
        else if($user['role'] == 'teacher'){
            header("Location: teacher_dashboard.php");
        }
        else{
            header("Location: student_dashboard.php");
        }

        exit();

    } else {
        echo "Login Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<style>

body{
    font-family:Arial;
    text-align:center;
    margin:0;
    min-height:100vh;
    background-image:url("images/loginn.png");
    background-repeat:no-repeat;
    background-position:center top;
    background-size:100% 100%;
}

.container{
width:420px;
margin:auto;
margin-top:90px;
background:rgba(255,255,255,0.2)
padding:30px;
border-radius:20px;
}

.logo{
width:90px;
margin-bottom:10px;
}

h2{
margin-bottom:30px;
}

.form-row{
margin:20px 0;
}

label{
font-weight:bold;
margin-right:10px;
}

input{
width:220px;
padding:10px;
border-radius:20px;
border:1px solid #888;
background:#eee;
}

.login-btn{
margin-top:20px;
padding:10px 35px;
border-radius:20px;
border:none;
background:#2b6cff;
color:white;
font-size:16px;
cursor:pointer;
}

.footer{
margin-top:50px;
font-size:14px;
}

</style>

</head>

<body>

<div class="container">

<img src="images/logo.png" class="logo">

<h2>Login</h2>

<form action="login_process.php" method="POST">

<div class="form-row">
<label>Username : </label>
<input type="text" name="username" placeholder="Type here..." required>
</div>

<div class="form-row">
<label>Password :</label>
<input type="password" name="password" placeholder="Type here..." required>
</div>

<div class="form-row">
<input type="checkbox"> Remember Me
</div>

<button class="login-btn">Login</button>

</form>

<div style="margin-top:10px;">
<a href="faq.php" style="color:#2b6cff;">Forgot password?</a>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</div>

</body>
</html>

