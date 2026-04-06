<?php
$username = isset($_GET['username']) ? $_GET['username'] : "";
$error = isset($_GET['error']) ? $_GET['error'] : "";
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Error</title>

<style>

body{
    font-family:Arial;
    text-align:center;
    margin:0;
    min-height:100vh;
    background-image:url("images/loginn.png");
    background-repeat:no-repeat;
    background-position:center top;
    background-size:100% 100%;
}

.container{
width:420px;
margin:auto;
margin-top:90px;
background:rgba(255,255,255,0.2)
padding:30px;
border-radius:20px;
}


.logo{
width:90px;
margin-bottom:10px;
}

h2{
margin-bottom:30px;
}

.form-row{
margin:20px 0;
}

label{
font-weight:bold;
margin-right:10px;
}

input{
width:220px;
padding:10px;
border-radius:20px;
border:1px solid #888;
background:#eee;
}

.error{
color:red;
margin:10px 0;
font-weight:bold;
}

.btn{
padding:10px 25px;
border-radius:20px;
border:none;
cursor:pointer;
margin:10px;
}

.faq-btn{
background:#e6f0ff;
color:#2b6cff;
}

.try-btn{
background:#2b6cff;
color:white;
}

.footer{
margin-top:40px;
font-size:14px;
color:black;
}
</style>
</head>

<body>

<?php if($error == "1"){ ?>
<script>
alert("Invalid username or password. Try again.");
</script>
<?php } ?>

<div class="container">

<img src="images/logo.png" class="logo">

<h2>Login</h2>

<form action="login_process.php" method="POST">

<div class="form-row">
<label>Username :</label>
<input type="text" name="username" placeholder="Type here..." value="<?php echo htmlspecialchars($username); ?>" required>
</div>

<div class="form-row">
<label>Password :</label>
<input type="password" name="password" placeholder="Type here..." required>
</div>

<div class="error">
⚠ Invalid username or password
</div>

<button type="button" class="btn faq-btn" onclick="window.location.href='faq.php'">
Go to FAQ
</button>

<button type="submit" class="btn try-btn">
Try Again
</button>

</form>

<div class="footer">
© 2026 Sekolah Kebangsaan Batu Belah
</div>

</div>

</body>
</html>
