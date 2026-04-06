<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Logout</title>

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

.button-row{
display:flex;
justify-content:center;
gap:20px;
margin-top:20px;
}

button{
padding:10px 25px;
border-radius:20px;
border:none;
cursor:pointer;
font-size:15px;
min-width:110px;
}

.cancel{
background:#e6e6e6;
color:#444;
}

.confirm{
background:#d9534f;
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

    <h2>Logout</h2>

    <div class="message">
        Are you sure you want to logout?
    </div>

    <div class="button-row">
        <button class="cancel" onclick="history.back()">Cancel</button>

        <form action="logout_success.php" method="POST" style="display:inline;">
            <button type="submit" class="confirm">Yes, Logout</button>
        </form>
    </div>
</div>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
