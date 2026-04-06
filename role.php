<!DOCTYPE html>
<html>

<head>
<title>Role Selection</title>

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


.container{
margin-top:120px;
}

.logo{
width:120px;
}

.role-box{
display:inline-block;
background:white;
padding:25px;
margin:20px;
border-radius:20px;
width:200px;
}

button{
padding:10px 25px;
border-radius:20px;
border:none;
background:#2b78e4;
color:white;
cursor:pointer;
}

.footer{
margin-top:120px;
font-size:14px;
}

</style>
</head>

<body>

<div class="container">

<img src="images/logo.png" class="logo">

<h2>👋 Welcome to the School WiFi Portal</h2>
<p>Select your role to continue</p>

<div class="role-box">
<h3>Admin</h3>
<p>Manage users & network</p>
<a href="login.php">
<button>Continue</button>
</a>
</div>

<div class="role-box">
<h3>Teacher</h3>
<p>View reports & access</p>
<a href="account_check.php">
<button>Continue</button>
</a>
</div>

<div class="role-box">
<h3>Student</h3>
<p>Check access & rules</p>
<a href="account_check.php">
<button>Continue</button>
</a>
</div>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
