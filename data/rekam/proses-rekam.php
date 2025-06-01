<?php
require "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $kd_tindakan      = trim(htmlspecialchars($_POST['kd_tindakan']));
    $kd_obat          = trim(htmlspecialchars($_POST['kd_obat']));
    $kd_user          = trim(htmlspecialchars($_POST['kd_user']));
    $no_pasien        = trim(htmlspecialchars($_POST['no_pasien']));
    $diagnosa         = trim(htmlspecialchars($_POST['diagnosa']));
    $resep            = trim(htmlspecialchars($_POST['resep']));
    $keluhan          = trim(htmlspecialchars($_POST['keluhan']));
    $tgl_pemeriksaan  = trim(htmlspecialchars($_POST['tgl_pemeriksaan']));
    $ket              = trim(htmlspecialchars($_POST['ket']));

    // Buat no_RM unik, misal auto increment atau generate sendiri
    // Contoh: generate otomatis (jika no_RM auto increment di DB, hapus bagian ini)
    // $no_rm = uniqid('RM');
    // Jika input no_rm dari form, tambahkan:
    // $no_rm = trim(htmlspecialchars($_POST['no_rm']));

    // Jika no_RM auto increment di database:
    $query = mysqli_query($koneksi, "INSERT INTO rekam_medis 
        (kd_tindakan, kd_obat, user_id, no_pasien, diagnosa, resep, keluhan, tgl_pemeriksaan, ket)
        VALUES 
        ('$kd_tindakan', '$kd_obat', '$kd_user', '$no_pasien', '$diagnosa', '$resep', '$keluhan', '$tgl_pemeriksaan', '$ket')");

    // Jika no_RM dari input form:
    // $query = mysqli_query($koneksi, "INSERT INTO rekam_medis 
    //     (no_RM, kd_tindakan, kd_obat, kd_user, no_pasien, diagnosa, resep, keluhan, tgl_pemeriksaan, ket)
    //     VALUES 
    //     ('$no_rm', '$kd_tindakan', '$kd_obat', '$kd_user', '$no_pasien', '$diagnosa', '$resep', '$keluhan', '$tgl_pemeriksaan', '$ket')");

    if ($query) {
        echo "<script>alert('Data rekam medis berhasil disimpan!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data rekam medis!');window.location='tambah_rekam.php';</script>";
    }
}

// hapus data rekam medis

if (isset($_GET['id']) && isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-rekam') {
    $no_rm = htmlspecialchars($_GET['id']);
    $query = mysqli_query($koneksi, "DELETE FROM rekam_medis WHERE no_rm='$no_rm'");
    if ($query) {
        echo "<script>alert('Data rekam medis berhasil dihapus!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data rekam medis!');window.location='index.php';</script>";
    }
    exit;
}

// update rekam medis

if (isset($_POST['update'])) {
    $no_rm            = trim(htmlspecialchars($_POST['no_rm'])); // TAMBAHKAN INI
    $kd_tindakan      = trim(htmlspecialchars($_POST['kd_tindakan']));
    $kd_obat          = trim(htmlspecialchars($_POST['kd_obat']));
    $kd_user          = trim(htmlspecialchars($_POST['kd_user']));
    $no_pasien        = trim(htmlspecialchars($_POST['no_pasien']));
    $diagnosa         = trim(htmlspecialchars($_POST['diagnosa']));
    $resep            = trim(htmlspecialchars($_POST['resep']));
    $keluhan          = trim(htmlspecialchars($_POST['keluhan']));
    $tgl_pemeriksaan  = trim(htmlspecialchars($_POST['tgl_pemeriksaan']));
    $ket              = trim(htmlspecialchars($_POST['ket']));

    $query = mysqli_query($koneksi, "UPDATE rekam_medis SET 
        kd_tindakan='$kd_tindakan',
        kd_obat='$kd_obat',
        user_id='$kd_user',
        no_pasien='$no_pasien',
        diagnosa='$diagnosa',
        resep='$resep',
        keluhan='$keluhan',
        tgl_pemeriksaan='$tgl_pemeriksaan',
        ket='$ket'
        WHERE no_rm='$no_rm'
    ");

    if ($query) {
        echo "<script>alert('Data rekam medis berhasil diupdate!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal update data rekam medis!');window.location='edit.php?id=$no_rm';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>