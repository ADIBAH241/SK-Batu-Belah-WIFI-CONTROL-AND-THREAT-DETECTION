<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<title>Session Ended</title>

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


.container{
width:100%;
height:100vh;
display:flex;
flex-direction:column;
justify-content:center;
align-items:center;
}

.logo{
width:100px;
margin-bottom:15px;
}

.message{
margin:30px auto;
padding:18px;
width:85%;
border:1px solid #999;
border-radius:25px;
font-size:16px;
background:#f9f9f9;
}

button{
padding:10px 30px;
border-radius:20px;
border:none;
cursor:pointer;
font-size:15px;
background:#2b78e4;
color:white;
}

.footer{
position:absolute;
bottom:10px;
width:100%;
text-align:center;
font-size:14px;
color:black;
}

</style>
</head>

<body>

<div class="container">

<div class="box">
    <img src="images/logo.png" class="logo">

    <h2>Session Ended</h2>

    <div class="message">
        Log saved. Session terminated safely
    </div>

    <button onclick="window.location.href='index.php'">Exit</button>
</div>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
