<?php
session_start();
include("session_check.php");

$site = $_SESSION['last_site'] ?? 'website';
$url = $_SESSION['last_url'] ?? '';
$result = $_SESSION['last_result'] ?? 'allowed';
$message = $_SESSION['last_message'] ?? 'Website allowed.';
?>
<!DOCTYPE html>
<html>
<head>
<title>Access Status</title>
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
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}
.continue{
background:#2b78e4;
color:white;
}
.back{
background:#ddd;
}
.footer{
margin-top:25px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Access Status</h2>

    <p><b>Website:</b> <?php echo htmlspecialchars($site); ?></p>

    <?php if($result == "blocked"){ ?>
        <p style="color:red;"><b>Status:</b> Access Blocked</p>
    <?php } elseif($result == "whitelisted"){ ?>
        <p style="color:green;"><b>Status:</b> Website Whitelisted</p>
    <?php } else { ?>
        <p style="color:green;"><b>Status:</b> Allowed</p>
    <?php } ?>

    <p><?php echo htmlspecialchars($message); ?></p>

    <br>
    <button class="back" onclick="window.location.href='browse_internet.php'">Back</button>

    <?php if($result != "blocked" && $url != ""){ ?>
        <a href="<?php echo htmlspecialchars($url); ?>" target="_blank">
            <button class="continue">Continue Browsing</button>
        </a>
    <?php } ?>

</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
