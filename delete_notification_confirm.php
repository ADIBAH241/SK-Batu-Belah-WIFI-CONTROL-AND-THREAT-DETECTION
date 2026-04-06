<?php $id=$_GET['id']; ?>

<!DOCTYPE html>
<html>
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

</style>

<h3>Are you sure to delete?</h3>

<a href="delete_notification_process.php?id=<?php echo $id; ?>">
<button>Yes</button>
</a>

<a href="teacher_notifications.php">
<button>No</button>
</a>

</body>
</html>
