<?php
session_start();
include("db.php");
include("session_check.php");

if($_SESSION['role'] != 'student' && $_SESSION['role'] != 'teacher'){
    header("Location: login.php");
    exit();
}

$user_name  = $_SESSION['name'] ?? '';
$user_email = $_SESSION['email'] ?? '';
$user_role  = $_SESSION['role'] ?? '';
$ip         = $_SERVER['REMOTE_ADDR'] ?? '';
$website    = trim($_POST['website'] ?? '');

if($website == ''){
    header("Location: browse_internet.php");
    exit();
}

/* normalize website */
$url = $website;
if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
    $url = "http://" . $url;
}

$host = parse_url($url, PHP_URL_HOST);
if(!$host){
    $host = $website;
}

$host = strtolower(trim($host));
$host = preg_replace('#^www\.#', '', $host);

/* default */
$result = "allowed";
$message = "Website allowed. You may continue browsing.";

/* check exact domain in filters */
$host_safe = mysqli_real_escape_string($conn, $host);

$q = mysqli_query($conn, "
    SELECT filter_type
    FROM filters
    WHERE domain='$host_safe'
    LIMIT 1
");

if($q && mysqli_num_rows($q) > 0){
    $row = mysqli_fetch_assoc($q);
    $type = strtolower(trim($row['filter_type']));

    if($type == 'blacklist'){
        $result = "blocked";
        $message = "This website is blocked by admin.";
    } elseif($type == 'whitelist'){
        $result = "whitelisted";
        $message = "This website is whitelisted by admin. You may continue browsing.";
    }
}

/* save log */
$user_name_safe  = mysqli_real_escape_string($conn, $user_name);
$user_email_safe = mysqli_real_escape_string($conn, $user_email);
$user_role_safe  = mysqli_real_escape_string($conn, $user_role);
$ip_safe         = mysqli_real_escape_string($conn, $ip);

mysqli_query($conn, "
    INSERT INTO usage_logs
    (user_name, user_email, user_role, access_ip, website, category, access_result, created_at)
    VALUES
    (
        '$user_name_safe',
        '$user_email_safe',
        '$user_role_safe',
        '$ip_safe',
        '$host_safe',
        'Internet Access',
        '$result',
        NOW()
    )
");

/* save session for next page */
$_SESSION['last_site'] = $host;
$_SESSION['last_url'] = $url;
$_SESSION['last_result'] = $result;
$_SESSION['last_message'] = $message;

header("Location: access_continue.php");
exit();
?>
