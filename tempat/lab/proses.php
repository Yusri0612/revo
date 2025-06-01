<?php
require "../../koneksi.php";

// Tambah laboratorium
if (isset($_POST['tambah_lab'])) {
    $no_rm = trim(htmlspecialchars($_POST['no_rm']));
    $hasil_lab = trim(htmlspecialchars($_POST['hasil_lab']));
    $ket = trim(htmlspecialchars($_POST['ket']));

    $query = mysqli_query($koneksi, "INSERT INTO laboratorium (no_RM, hasil_lab, ket) VALUES ('$no_rm', '$hasil_lab', '$ket')");
    if ($query) {
        echo "<script>alert('Data laboratorium berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah data laboratorium!'); window.location='index.php';</script>";
    }
    exit;
}

// Hapus laboratorium
if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-lab') {
    $id = (int)$_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM laboratorium WHERE kd_lab = $id");
    if ($query) {
        echo "<script>alert('Data laboratorium berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data laboratorium!'); window.location='index.php';</script>";
    }
    exit;
}

// Jika tidak ada aksi
header("Location: index.php");
exit;
?>