<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "
    SELECT * FROM approvals
    WHERE status='Pending'
    ORDER BY id ASC
");
?>
<!DOCTYPE html>
<html>
<head>
<title>Approval Requests</title>
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
width:100%;
border-collapse:collapse;
margin-top:20px;
}
th, td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}
th{
background:#f2f2f2;
}
button{
padding:8px 16px;
border:none;
border-radius:10px;
cursor:pointer;
margin:3px;
}
.approve{
background:#198754;
color:white;
}
.back{
background:#ddd;
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
    <h2>Approval Requests</h2>

    <?php if(mysqli_num_rows($result) > 0){ ?>
    <table>
        <tr>
            <th>No.</th>
            <th>Teacher</th>
            <th>Request</th>
            <th>Action</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['teacher']); ?></td>
            <td><?php echo htmlspecialchars($row['request']); ?></td>
            <td>
                <a href="configure_filter_from_approval.php?id=<?php echo $row['id']; ?>">
                    <button class="approve">Approve</button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { ?>
        <p>No pending approval requests.</p>
    <?php } ?>

    <br>
    <button class="back" onclick="location.href='admin_dashboard.php'">Back</button>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
