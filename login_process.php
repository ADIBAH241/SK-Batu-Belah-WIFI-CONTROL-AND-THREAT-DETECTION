<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit();
}

$username = isset($_POST['username']) ? trim($_POST['username']) : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";

if ($username === "" || $password === "") {
    header("Location: login_error.php?error=1&username=" . urlencode($username));
    exit();
}

/* DAPATKAN IP SEBENAR */
$ip = $_SERVER['REMOTE_ADDR'];

/* =========================
   ADMIN LOGIN
========================= */
if ($username === "adminskbb@skbb.com" && $password === "987admin123") {
    $_SESSION['role']  = "admin";
    $_SESSION['name']  = "Admin";
    $_SESSION['email'] = $username;
    $_SESSION['login_ip'] = $ip;

    header("Location: admin_dashboard.php");
    exit();
}

/* =========================
   TEACHER LOGIN
========================= */
if (strpos($username, "@skbb.com") !== false && $password === "teacher123") {
    $_SESSION['role']  = "teacher";
    $_SESSION['name']  = explode("@", $username)[0];
    $_SESSION['email'] = $username;
    $_SESSION['login_ip'] = $ip;

    $name  = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $ip_safe = mysqli_real_escape_string($conn, $ip);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if ($check && mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "
            INSERT INTO users(name,email,role,status,login_ip,last_login)
            VALUES('$name','$email','Teacher','Active','$ip_safe',NOW())
        ");
    } else {
        mysqli_query($conn, "
            UPDATE users
            SET name='$name',
                role='Teacher',
                status='Active',
                login_ip='$ip_safe',
                last_login=NOW()
            WHERE email='$email'
        ");
    }

    header("Location: teacher_dashboard.php");
    exit();
}

/* =========================
   STUDENT LOGIN
========================= */
if (strpos($username, "@skbb.com") !== false && $password === "123student") {
    $_SESSION['role']  = "student";
    $_SESSION['name']  = explode("@", $username)[0];
    $_SESSION['email'] = $username;
    $_SESSION['login_ip'] = $ip;

    $name  = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $ip_safe = mysqli_real_escape_string($conn, $ip);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if ($check && mysqli_num_rows($check) == 0) {
        mysqli_query($conn, "
            INSERT INTO users(name,email,role,status,login_ip,last_login)
            VALUES('$name','$email','Student','Active','$ip_safe',NOW())
        ");
    } else {
        mysqli_query($conn, "
            UPDATE users
            SET name='$name',
                role='Student',
                status='Active',
                login_ip='$ip_safe',
                last_login=NOW()
            WHERE email='$email'
        ");
    }

    header("Location: student_dashboard.php");
    exit();
}

/* =========================
   INVALID LOGIN
========================= */
header("Location: login_error.php?error=1&username=" . urlencode($username));
exit();
?>
