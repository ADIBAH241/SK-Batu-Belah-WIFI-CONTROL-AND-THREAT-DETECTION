<?php
session_start();
include("db.php");

$result = mysqli_query($conn,"
    SELECT domain FROM filters
    WHERE filter_type='Blacklist'
    ORDER BY id DESC
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Blocked Sites</title>
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
width:450px;
margin:auto;
margin-top:120px;
padding:30px;
border-radius:20px;
text-align:left;
}

.back-btn{
margin-top:20px;
padding:10px 25px;
border-radius:20px;
border:none;
background:#2b78e4;
color:white;
cursor:pointer;
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
    <div style="text-align:center;">
        <img src="images/logo.png" width="100">
        <h3>Blocked Websites</h3>
    </div>

    <ul>
        <?php while($row=mysqli_fetch_assoc($result)){ ?>
            <li><?php echo htmlspecialchars($row['domain']); ?></li>
        <?php } ?>
    </ul>

    <div style="text-align:center;">
        <button class="back-btn" onclick="window.location.href='monitor_student.php'">Back</button>
    </div>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
