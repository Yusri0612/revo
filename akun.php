<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_username = "admin";
    $valid_password = "12345";

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard/dashboard.php");
        exit();
    } else {
        echo "<script>alert('Login Gagal!'); window.location.href='login.php';</script>";
    }
}
?>
