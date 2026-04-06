<?php
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['role'])){
    header("Location: login.php");
    exit();
}
?>
