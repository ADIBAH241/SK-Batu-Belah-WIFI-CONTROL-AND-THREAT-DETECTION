<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

if(isset($_POST['send'])){
    $recipient_role = trim($_POST['recipient_role'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if($recipient_role != '' && $message != ''){

        $recipient_role_safe = mysqli_real_escape_string($conn, $recipient_role);
        $message_safe = mysqli_real_escape_string($conn, $message);

        /* send to all users with selected role */
        $users = mysqli_query($conn, "SELECT email, role FROM users WHERE LOWER(role)=LOWER('$recipient_role_safe')");

        while($u = mysqli_fetch_assoc($users)){
            $email_safe = mysqli_real_escape_string($conn, $u['email']);
            $role_safe = mysqli_real_escape_string($conn, $u['role']);

            mysqli_query($conn, "
                INSERT INTO notifications(recipient_email, recipient_role, message, created_at)
                VALUES('$email_safe', '$role_safe', '$message_safe', NOW())
            ");
        }

        header("Location: notification_sent.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Send Notification</title>
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


select, textarea{
width:100%;
padding:10px;
border-radius:10px;
border:1px solid #bbb;
box-sizing:border-box;
}
textarea{
height:120px;
resize:none;
}
button{
padding:10px 20px;
border:none;
border-radius:20px;
cursor:pointer;
margin:5px;
}
.back{background:#ddd;}
.send{background:#2b78e4;color:white;}
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
        <h2>Send Notification</h2>
    </div>

    <form method="POST">
        <p><b>Send To:</b></p>
        <select name="recipient_role" required>
            <option value="">-- Select Role --</option>
	    <option value="teacher">Teacher</option>
            <option value="student">Student</option>
        </select>

        <br><br>

        <p><b>Notification Message:</b></p>
        <textarea name="message" placeholder="Type notification message here..." required></textarea>

        <br><br>

        <div style="text-align:center;">
            <button type="button" class="back" onclick="location.href='admin_dashboard.php'">Back</button>
            <button type="submit" name="send" class="send">Send</button>
        </div>
    </form>
</div>

<div class="footer">© 2026 Sekolah Kebangsaan Batu Belah</div>
</body>
</html>
