<?php
require "../../koneksi.php";

// Tambah poliklinik
if (isset($_POST['tambah_poli'])) {
    $nama = trim(htmlspecialchars($_POST['nama']));
    $lantai = (int)$_POST['lantai'];

    $query = mysqli_query($koneksi, "INSERT INTO poliklinik (nm_poli, lantai) VALUES ('$nama', '$lantai')");
    if ($query) {
        echo "<script>alert('Poliklinik berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah poliklinik!'); window.location='index.php';</script>";
    }
    exit;
}

// Hapus poliklinik
if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-poli') {
    $id = (int)$_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM poliklinik WHERE kd_pooli = $id");
    if ($query) {
        echo "<script>alert('Poliklinik berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus poliklinik!'); window.location='index.php';</script>";
    }
    exit;
}

// Jika tidak ada aksi
header("Location: index.php");
exit;
?>