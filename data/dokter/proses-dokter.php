<?php
require "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $kd_poli   = trim(htmlspecialchars($_POST['kd_poli']));
    $tanggal   = trim(htmlspecialchars($_POST['tanggal']));
    $kd_user   = trim(htmlspecialchars($_POST['kd_user']));
    $nama      = trim(htmlspecialchars($_POST['nama']));
    $sip       = trim(htmlspecialchars($_POST['sip']));
    $lahir     = trim(htmlspecialchars($_POST['lahir']));
    $telp      = trim(htmlspecialchars($_POST['telp']));
    $alamat    = trim(htmlspecialchars($_POST['alamat']));

    $query = mysqli_query($koneksi, "INSERT INTO dokter 
        (kd_poli, tgl_kunjungan, user_id, nm_dokter, sip, tempat_lhr, no_tlp, alamat)
        VALUES 
        ('$kd_poli', '$tanggal', '$kd_user', '$nama', '$sip', '$lahir', '$telp', '$alamat')");

    if ($query) {
        echo "<script>alert('Data dokter berhasil disimpan!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data dokter! ".mysqli_error($koneksi)."');window.location='tambah-dokter.php';</script>";
    }
} 
// hapus data dokter

if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-dokter') {
    $no_dokter = htmlspecialchars($_GET['id']);
    $query = mysqli_query($koneksi, "DELETE FROM dokter WHERE kd_dokter='$no_dokter'");
    if ($query) {
        echo "<script>alert('Data rekam medis berhasil dihapus!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data rekam medis!');window.location='index.php';</script>";
    }
    exit;
}
// update data dokter
if (isset($_POST['update'])) {
    $no_dokter = trim(htmlspecialchars($_POST['kd_dokter']));
    $kd_poli   = trim(htmlspecialchars($_POST['kd_poli']));
    $tanggal   = trim(htmlspecialchars($_POST['tanggal']));
    $kd_user   = trim(htmlspecialchars($_POST['kd_user']));
    $nama      = trim(htmlspecialchars($_POST['nama']));
    $sip       = trim(htmlspecialchars($_POST['sip']));
    $lahir     = trim(htmlspecialchars($_POST['lahir']));
    $telp      = trim(htmlspecialchars($_POST['telp']));
    $alamat    = trim(htmlspecialchars($_POST['alamat']));

    $query = mysqli_query($koneksi, "UPDATE dokter SET 
        kd_poli='$kd_poli',
        tgl_kunjungan='$tanggal',
        user_id='$kd_user',
        nm_dokter='$nama',
        sip='$sip',
        tempat_lhr='$lahir',
        no_tlp='$telp',
        alamat='$alamat'
        WHERE kd_dokter='$no_dokter'
    ");

    if ($query) {
        echo "<script>alert('Data dokter berhasil diupdate!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal update data dokter! ".mysqli_error($koneksi)."');window.location='edit-dokter.php?id=$no_dokter';</script>";
    }
}
?>