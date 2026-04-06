<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
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


button{
padding:10px 20px;
border-radius:10px;
border:none;
margin:5px;
}

.footer{
position:fixed;
bottom:0;
width:100%;
text-align:center;
color:black;
font-size:14px;
}

</style>
</head>

<body>

<div class="box">

<img src="images/logo.png" width="100">

<h3>Delete this issue?</h3>

<a href="delete_issue.php?id=<?php echo $id; ?>">
<button style="background:red;color:white;">Yes</button>
</a>

<a href="admin_support_view.php">
<button>Cancel</button>
</a>

</div>

</body>
</html>
