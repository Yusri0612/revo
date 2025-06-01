<?php
require "koneksi.php";
session_start();

if (isset($_POST['masuk'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Login admin (hardcode)
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = 'admin';
        $_SESSION['role'] = 'admin';
        $_SESSION['jabatan'] = 'admin';
        header("Location: dashboard/dashboard.php");
        exit();
    }

    // Login dokter
    $cekDokter = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND jabatan='3'");
    if (mysqli_num_rows($cekDokter) == 1) {
        $row = mysqli_fetch_assoc($cekDokter);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'dokter';
            $_SESSION['jabatan'] = 'dokter';
            header("Location: dashboard/dashboard.php");
            exit();
        } else {
            echo "<script>
                alert('Password salah!');
                document.location.href = 'index.php';
            </script>";
            exit();
        }
    }

    // Login petugas
    $cekPetugas = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND jabatan='2'");
    if (mysqli_num_rows($cekPetugas) == 1) {
        $row = mysqli_fetch_assoc($cekPetugas);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'petugas';
            $_SESSION['jabatan'] = 'petugas';
            header("Location: dashboard/dashboard.php");
            exit();
        } else {
            echo "<script>
                alert('Password salah!');
                document.location.href = 'index.php';
            </script>";
            exit();
        }
    }

    // Login tamu
    $cekTamu = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND jabatan='1'");
    if (mysqli_num_rows($cekTamu) == 1) {
        $row = mysqli_fetch_assoc($cekTamu);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = 'tamu';
            $_SESSION['jabatan'] = 'tamu';
            header("Location: dashboard/dashboard.php");
            exit();
        } else {
            echo "<script>
                alert('Password salah!');
                document.location.href = 'index.php';
            </script>";
            exit();
        }
    }

    // Jika tidak ditemukan
    echo "<script>
        alert('Username atau jabatan tidak ditemukan!');
        document.location.href = 'index.php';
    </script>";
}
?>