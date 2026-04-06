<?php
include("db.php");
$id = $_GET['id'] ?? 0;

// Mark only this approval as approved
mysqli_query($conn,"UPDATE approvals SET status='Approved' WHERE id=$id");

// Redirect to filter setting page after approving
header("Location:configure_filter.php");
exit();
