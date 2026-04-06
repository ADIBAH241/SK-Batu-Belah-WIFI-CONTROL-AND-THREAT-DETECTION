<?php
session_start();
include("session_check.php");

if($_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$rules = $_POST['rules'] ?? [];
$website_request = trim($_POST['website_request'] ?? '');

/* simpan sementara dalam session */
$_SESSION['pending_rules'] = $rules;
$_SESSION['pending_website_request'] = $website_request;

header("Location: confirm_submission.php");
exit();
?>
