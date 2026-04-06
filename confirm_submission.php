<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$rules = $_SESSION['pending_rules'] ?? [];
$website_request = $_SESSION['pending_website_request'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Submission</title>
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

.info{
background:#f8f8f8;
padding:15px;
border-radius:12px;
border:1px solid #ccc;
}
textarea{
width:100%;
height:100px;
padding:10px;
border-radius:10px;
border:1px solid #bbb;
resize:none;
box-sizing:border-box;
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
.submit{
background:#2b78e4;
color:white;
}
.footer{
margin-top:20px;
text-align:center;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <div style="text-align:center;">
        <img src="images/logo.png" width="100">
        <h2>Confirm Submission</h2>
    </div>

    <div class="info">
        <b>Selected Rules:</b><br><br>

        <?php if(!empty($rules)){ ?>
            <ul>
                <?php foreach($rules as $rule){ ?>
                    <li><?php echo htmlspecialchars($rule); ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No rules selected.</p>
        <?php } ?>

        <?php if($website_request != ''){ ?>
            <br>
            <b>Website Request to Admin:</b><br><br>
            <textarea readonly><?php echo htmlspecialchars($website_request); ?></textarea>
        <?php } ?>
    </div>

    <br>

    <div style="text-align:center;">
        <button class="back" onclick="location.href='manage_network.php'">Back</button>

        <form action="successful_submission.php" method="POST" style="display:inline;">
            <button type="submit" class="submit">Submit to Admin</button>
        </form>
    </div>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
