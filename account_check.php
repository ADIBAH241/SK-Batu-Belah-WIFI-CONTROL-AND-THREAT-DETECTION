<!DOCTYPE html>
<html>

<head>
<title>Account Check</title>

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
margin-top:140px;
}

.logo{
width:120px;
margin-bottom:20px;
}

button{
padding:12px 30px;
border-radius:25px;
border:none;
margin:15px;
cursor:pointer;
font-size:16px;
}

.yes{
background:#2b78e4;
color:white;
}

.no{
background:#e6e6e6;
color:black;
}

.footer{
position:fixed;
bottom:10px;
width:100%;
text-align:center;
font-size:14px;
}

</style>

</head>

<body>

<div class="container">

<img src="images/logo.png" class="logo">

<h2>Do you already have a valid account ?</h2>

<br>

<a href="login.php">
<button class="yes">Yes, I have an account</button>
</a>

<br>

<a href="admin_notice.php">
<button class="no">No, I need an account</button>
</a>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
