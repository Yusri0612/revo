<?php
<?php
require "koneksi.php";

if (isset($_POST['reset'])) {
    $username   = trim(htmlspecialchars($_POST['username']));
    $password   = trim($_POST['password']);
    $password2  = trim($_POST['password2']);

    // Validasi konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak cocok!');window.location='lupa-password.php';</script>";
        exit;
    }

    // Cek username
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username'");
    if (mysqli_num_rows($cek) == 0) {
        echo "<script>alert('Username tidak ditemukan!');window.location='lupa-password.php';</script>";
        exit;
    }

    // Update password (gunakan password_hash untuk keamanan)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $update = mysqli_query($koneksi, "UPDATE tbl_user SET password='$password_hash' WHERE username='$username'");

    if ($update) {
        echo "<script>alert('Password berhasil direset! Silakan login kembali.');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal reset password!');window.location='lupa-password.php';</script>";
    }
}
?>