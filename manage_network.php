<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Network Settings</title>

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


.rule-box{
    text-align:left;
    background:#f7f7f7;
    padding:18px;
    border-radius:12px;
    border:1px solid #ccc;
    margin-top:10px;
}

.request-box{
    display:none;
    margin-top:10px;
}

textarea{
    width:100%;
    height:90px;
    padding:10px;
    border-radius:10px;
    border:1px solid #bbb;
    resize:none;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    margin:5px;
}

.back{
    background:#ddd;
}

.save{
    background:#2b78e4;
    color:white;
}

.footer{
    margin-top:20px;
}
</style>

<script>
function toggleBox(){
    var cb = document.getElementById("submitRequest");
    var box = document.getElementById("requestBox");

    if(cb.checked){
        box.style.display = "block";
    } else {
        box.style.display = "none";
    }
}
</script>

</head>

<body>

<div class="box">

<img src="images/logo.png" width="100">
<h2>Manage Network Settings</h2>

<form action="submit_changes.php" method="POST">

<div class="rule-box">

    <label>
        <input type="checkbox" name="rules[]" value="Block Social Media">
        Block Social Media
    </label>

    <br><br>

    <label>
        <input type="checkbox" name="rules[]" value="Block Gaming Websites">
        Block Gaming Websites
    </label>

    <br><br>

    <label>
        <input type="checkbox" name="rules[]" value="Allow Educational Sites">
        Allow Educational Sites
    </label>

    <br><br>

    <label>
        <input type="checkbox" id="submitRequest" name="rules[]" value="Submit Website Request to Admin" onclick="toggleBox()">
        Submit Website Request to Admin
    </label>

    <!-- TEXTBOX -->
    <div id="requestBox" class="request-box">
        <br>
        <b>Website request to admin:</b><br><br>
        <textarea name="website_request" placeholder="Example: Please blacklist tiktok.com and whitelist youtube.com"></textarea>
    </div>

</div>

<br><br>

<button type="button" class="back" onclick="location.href='teacher_dashboard.php'">Back</button>
<button type="submit" class="save">Save Changes</button>

</form>

<div style="margin-top:20px; text-align:left; background:#f9f9f9; padding:15px; border-radius:12px; border:1px solid #ccc;">
<b>Website options that can be blocked or unblocked by admin:</b>
<ul>
<li>YouTube</li>
<li>Spotify</li>
<li>TikTok</li>
<li>Facebook</li>
<li>Instagram</li>
<li>Netflix</li>
<li>Games: Poki, CrazyGames, Y8</li>
<li>Shopee</li>
<li>Lazada</li>
</ul>
</div>

</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>

</body>
</html>
