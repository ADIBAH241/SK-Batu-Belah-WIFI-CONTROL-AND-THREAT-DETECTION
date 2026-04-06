<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$domain = trim($_POST['domain'] ?? '');
$filter_type = trim($_POST['filter_type'] ?? 'blacklist');
$approval_id = (int)($_POST['approval_id'] ?? 0);

if($domain == ''){
    header("Location: filter_success.php");
    exit();
}

/* normalize domain */
$domain = strtolower($domain);
$domain = preg_replace('#^https?://#', '', $domain);
$domain = preg_replace('#/.*$#', '', $domain);
$domain = preg_replace('#^www\.#', '', $domain);

/* normalize filter_type */
$filter_type = strtolower($filter_type);
if($filter_type != 'blacklist' && $filter_type != 'whitelist'){
    $filter_type = 'blacklist';
}

$domain_safe = mysqli_real_escape_string($conn, $domain);
$filter_type_safe = mysqli_real_escape_string($conn, $filter_type);

/* one domain = one status only */
mysqli_query($conn, "
    INSERT INTO filters(domain, filter_type)
    VALUES('$domain_safe', '$filter_type_safe')
    ON DUPLICATE KEY UPDATE
    filter_type='$filter_type_safe',
    created_at=NOW()
");

/* if came from approval page, mark as approved now */
if($approval_id > 0){
    mysqli_query($conn, "
        UPDATE approvals
        SET status='Approved'
        WHERE id=$approval_id
    ");
}

header("Location: filter_success.php");
exit();
?>
