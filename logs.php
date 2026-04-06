<!DOCTYPE html>
<html>
<head>
<title>System Logs</title>

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


.footer{
    margin-top:40px;
    color:white;
}
</style>

</head>

<body>

<div class="box">

<img src="images/logo.png" width="110">

<h2>System Logs</h2>

<p>⚠ Suspicious activity detected at:</p>
<p><?php echo date("Y-m-d H:i:s"); ?></p>

<br>

<a href="monitor_traffic.php">Back</a>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
