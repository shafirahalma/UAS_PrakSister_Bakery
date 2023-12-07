<?php
$username = $_POST['username'];
$pass = md5($_POST['password']);

include 'config/config.php';

$adminUser = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$adminCount = mysqli_num_rows($adminUser);

$memberUser = mysqli_query($conn, "SELECT * FROM member WHERE username='$username' AND password='$pass'");
$memberCount = mysqli_num_rows($memberUser);

if ($adminCount > 0) {
    session_start();
    $row = mysqli_fetch_array($adminUser);
    $_SESSION['username'] = $row['username'];
    header("location:home.php");
} elseif ($memberCount > 0) {
    session_start();
    $row = mysqli_fetch_array($memberUser);
    $_SESSION['username'] = $row['username'];
    header("location:../halaman_member/home.php");
} else {
    echo "Password atau username anda salah";
}
