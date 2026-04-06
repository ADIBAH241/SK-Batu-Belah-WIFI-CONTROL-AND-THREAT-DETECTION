<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$id = (int)($_GET['id'] ?? 0);

$data = mysqli_query($conn, "SELECT * FROM approvals WHERE id=$id AND status='Pending' LIMIT 1");
$row = mysqli_fetch_assoc($data);

if(!$row){
    header("Location: admin_approval.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Approve Request</title>
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

input, select{
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
.back{background:#ddd;}
.apply{background:#2b78e4;color:white;}
.footer{
margin-top:20px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Approve Website Request</h2>

    <p><b>Teacher:</b> <?php echo htmlspecialchars($row['teacher']); ?></p>
    <p><b>Request:</b> <?php echo htmlspecialchars($row['request']); ?></p>

    <form action="apply_filter.php" method="POST">
        <input type="hidden" name="approval_id" value="<?php echo $row['id']; ?>">

        <p><b>Domain Name:</b></p>
        <input type="text" name="domain" placeholder="youtube.com" required>

        <br><br>

        <p><b>Choose Action:</b></p>
        <select name="filter_type" required>
            <option value="blacklist">Blacklist</option>
            <option value="whitelist">Whitelist</option>
        </select>

        <br><br>

        <button type="button" class="back" onclick="location.href='admin_approval.php'">Back</button>
        <button type="submit" class="apply">Apply Filter</button>
    </form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
