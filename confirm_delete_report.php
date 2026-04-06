<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$delete_selected = isset($_POST['delete_selected']);
$delete_all = isset($_POST['delete_all']);
$delete_ids = $_POST['delete_ids'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
<title>Confirm Delete</title>
<style>
body{
font-family:Arial;
text-align:center;
background:url("images/wallpaper.png") no-repeat center top fixed;
background-size:auto 100vh;
background-color:#dfeef3;
margin:0;
}
.box{
background:white;
width:min(92vw, 450px);
margin:auto;
margin-top:130px;
padding:30px;
border-radius:20px;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}
button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}
.no{background:#ddd;}
.yes{background:#dc3545;color:white;}
.footer{
margin-top:20px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Confirm Delete</h2>

    <?php if($delete_all){ ?>
        <p>Are you sure you want to delete all filtered report data?</p>
        <form method="POST" action="delete_report_success.php">
            <input type="hidden" name="delete_all" value="1">
            <button type="button" class="no" onclick="location.href='generate_reports.php'">No</button>
            <button type="submit" class="yes">Yes, Delete All</button>
        </form>
    <?php } else { ?>
        <p>Are you sure you want to delete selected data?</p>
        <form method="POST" action="delete_report_success.php">
            <?php foreach($delete_ids as $id){ ?>
                <input type="hidden" name="delete_ids[]" value="<?php echo (int)$id; ?>">
            <?php } ?>
            <button type="button" class="no" onclick="location.href='generate_reports.php'">No</button>
            <button type="submit" class="yes">Yes, Delete Selected</button>
        </form>
    <?php } ?>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
