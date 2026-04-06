<?php
$output = shell_exec("vnstat --json");
$data = json_decode($output, true);

$bandwidth = 0;

if(isset($data['interfaces'][0]['traffic']['total']['rx'])){
    $bandwidth = $data['interfaces'][0]['traffic']['total']['rx'];
}

$mb = $bandwidth / 1024 / 1024;

// Status logic (NO redirect)
$status = "Normal";
if($mb > 50){
    $status = "High";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Network Traffic Monitoring</title>

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


table{
	margin:auto;
	border-collapse:collapse;
	margin-top:20px;
}

td,th{
	padding:10px;
	border:1px solid gray;
}

.btn{
	padding:10px 20px;
	border-radius:20px;
	border:none;
	cursor:pointer;
	margin:5px;
}

.back{background:#ddd;}
.refresh{background:#2b78e4;color:white;}
.alertBtn{background:orange;color:white;}

.footer{
position:fixed;
bottom:0;
width:100%;
text-align:center;
color:black;
font-size:14px;
}

.alertBox{
	background:red;
	color:white;
	padding:10px;
	border-radius:10px;
	margin-bottom:15px;
}

</style>
</head>

<body>

<div class="box">

<img src="images/logo.png" width="110">

<h2>Network Traffic Monitoring</h2>

<p><b>Current Bandwidth:</b> <?php echo round($mb,2); ?> MB</p>
<p><b>Status:</b> <?php echo $status; ?></p>

<h3>Active Users</h3>

<table>
<tr>
<th>User IP</th>
<th>Bandwidth</th>
</tr>

<?php
$devices = shell_exec("arp -a");
$lines = explode("\n", $devices);

foreach($lines as $line){
    if(strpos($line, "(") !== false){
        preg_match('/\((.*?)\)/', $line, $ip);

        echo "<tr>";
        echo "<td>".$ip[1]."</td>";
        echo "<td>".$status."</td>";
        echo "</tr>";
    }
}
?>

</table>

<br>

<a href="admin_dashboard.php">
<button class="back">Back</button>
</a>

<a href="monitor_traffic.php">
<button class="refresh">Refresh</button>
</a>

<?php if($status == "High"){ ?>
<br><br>
<a href="security_alert.php">
<button class="alert">⚠ View Security Alert</button>
</a>
<?php } ?>

</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
