<?php
include("db.php");
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM support WHERE status='Pending' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Support Issues</title>

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
width:100%;
background:white;
}

td,th{
padding:10px;
border:1px solid gray;
text-align:center;
}

button{
padding:8px 15px;
border:none;
border-radius:10px;
cursor:pointer;
margin:3px;
}

.delete{
background:red;
color:white;
}

.back{
background:#888;
color:white;
margin-top:15px;
}

.footer{
margin-top:20px;
font-size:14px;
color:black;
}
</style>
</head>

<body>

<div class="box">
    <img src="images/logo.png" width="100">

    <h2>Support Issues</h2>

    <?php if(mysqli_num_rows($result) > 0){ ?>
    <table>
        <tr>
            <th>Reporter</th>
            <th>Issue</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo htmlspecialchars($row['reporter_name']); ?></td>
            <td><?php echo htmlspecialchars($row['issue']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td>
                <a href="confirm_delete_issue.php?id=<?php echo $row['id']; ?>">
                    <button class="delete">Delete</button>
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>
    <?php } else { ?>
        <p>No support issues available.</p>
    <?php } ?>

    <br>

    <a href="admin_dashboard.php">
        <button class="back">Back</button>
    </a>
</div>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</body>
</html>
