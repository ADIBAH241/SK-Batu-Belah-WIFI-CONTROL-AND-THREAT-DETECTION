<?php
include("db.php");

$result = mysqli_query($conn,"SELECT * FROM requests WHERE status='pending'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Approval Requests</title>

<style>

body{
font-family:Arial;
text-align:center;
background:url("images/wallpaper.png") no-repeat center top;
background-size:auto 100vh;
background-color:#dfeef3;
margin:0;
min-height:100vh;
}

table{
margin:auto;
background:white;
border-collapse:collapse;
}

td,th{
padding:10px;
border:1px solid black;
}

.footer{margin-top:40px;color:white;}

</style>

</head>

<body>

<img src="images/logo.png" width="100">

<h2>Approval Requests</h2>

<table>
<tr><th>Request</th><th>Action</th></tr>

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['request_text']; ?></td>
<td>
<a href="approve.php?id=<?php echo $row['id']; ?>">Approve</a>
</td>
</tr>

<?php } ?>

</table>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>

</body>
</html>
