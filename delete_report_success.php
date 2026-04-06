<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['report_preview'])){
    header("Location: generate_reports.php");
    exit();
}

$preview = $_SESSION['report_preview'];
$table = $preview['table'];

if(isset($_POST['delete_all'])){
    $sql = $preview['sql'];
    $result = mysqli_query($conn, $sql);

    $ids = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $ids[] = (int)$row['id'];
        }
    }

    if(!empty($ids)){
        $idList = implode(",", $ids);
        mysqli_query($conn, "DELETE FROM {$table} WHERE id IN ($idList)");
    }

} elseif(!empty($_POST['delete_ids'])){
    $ids = array_map('intval', $_POST['delete_ids']);
    $idList = implode(",", $ids);
    mysqli_query($conn, "DELETE FROM {$table} WHERE id IN ($idList)");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Successful</title>
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
width:min(92vw, 420px);
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
background:#2b78e4;
color:white;
}
.footer{
margin-top:20px;
color:black;
}
</style>
</head>
<body>

<div class="box">
    <img src="images/logo.png" width="100">
    <h2>Delete Successful</h2>
    <p>Selected report data has been deleted successfully ✅</p>
    <br>
    <button onclick="location.href='generate_reports.php'">Back to Generate Report</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
