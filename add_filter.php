<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$filter_type = $_POST['filter_type'] ?? 'blacklist';
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Website Filter</title>
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


input,select{
width:85%;
padding:10px;
border-radius:15px;
border:1px solid gray;
}

button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}

.cancel{background:#ddd;}
.apply{background:#2b78e4;color:white;}

.footer{
margin-top:25px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Add Website Filter</h2>

    <form action="apply_filter.php" method="POST">
        <input type="hidden" name="filter_type" value="<?php echo htmlspecialchars($filter_type); ?>">

        <p><b>Domain Name :</b></p>
        <input type="text" name="domain" placeholder="youtube.com" required>

        <br><br>

        <p><b>Selected Type :</b></p>
        <input type="text" value="<?php echo ucfirst(htmlspecialchars($filter_type)); ?>" readonly>

        <br><br>

        <button type="button" class="cancel" onclick="location.href='configure_filter.php'">Cancel</button>
        <button type="submit" class="apply">Apply Filter</button>
    </form>

	<div class="info-box">
        <b>Suggested websites that can be blocked or unblocked:</b>
        <ul>
            <li>Movie: YouTube, Netflix, Viu, iQiyi, Disneyplus</li>
            <li>Music: Spotify, Joox, YouTube Music</li>
            <li>Social Media: TikTok, Facebook, Instagram</li>
            <li>Games: Poki, CrazyGames, Y8</li>
            <li>Shopping: Shopee, Lazada, Temu</li>
        </ul>
    </div>

</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
