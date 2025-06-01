<?php
require "../../koneksi.php";

// Proses simpan tindakan baru
if (isset($_POST['simpan'])) {
    $nama = trim(htmlspecialchars($_POST['nama']));
    $ket  = trim(htmlspecialchars($_POST['ket']));

    $query = mysqli_query($koneksi, "INSERT INTO tindakan (nm_tindakan, ket) VALUES ('$nama', '$ket')");

    if ($query) {
        echo "<script>alert('Tindakan berhasil ditambahkan!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah tindakan!');window.location='index.php';</script>";
    }
    exit;
}

// Proses hapus tindakan
if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-tindakan') {
    $id = intval($_GET['id']);
    $query = mysqli_query($koneksi, "DELETE FROM tindakan WHERE kd_tindakan = $id");

    if ($query) {
        echo "<script>alert('Tindakan berhasil dihapus!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus tindakan!');window.location='index.php';</script>";
    }
    exit;
}
?>