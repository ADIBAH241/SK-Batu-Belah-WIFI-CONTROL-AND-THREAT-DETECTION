<!DOCTYPE html>
<html>
<head>
<title>Security Alert</title>

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
    margin:5px;
    cursor:pointer;
}

.back{
    background:#ddd;
}

.logs{
    background:orange;
    color:white;
}

.footer{
    margin-top:40px;
    color:white;
}

</style>

</head>

<body>

<div class="box">

<img src="images/logo.png" width="110">

<h2>⚠ Security Alert</h2>

<p><b>Suspicious Activity Detected</b></p>

<p>Action Taken:</p>

<ul style="text-align:left">
<li>Access blocked</li>
<li>Incident logged</li>
<li>Admin notified</li>
</ul>

<br>

<a href="monitor_traffic.php">
<button class="back">Back to Monitor</button>
</a>

<a href="logs.php">
<button class="logs">View Logs</button>
</a>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
