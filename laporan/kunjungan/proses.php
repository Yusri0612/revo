<?php
require "../../koneksi.php";

// SIMPAN DATA BARU
if (isset($_POST['simpan'])) {
    $tanggal     = trim(htmlspecialchars($_POST['tanggal']));
    $pasien     = trim(htmlspecialchars($_POST['no_pasien']));
    $poli   = trim(htmlspecialchars($_POST['kd_poli']));
    $jam   = trim(htmlspecialchars($_POST['jam']));

    // Cek username duplikat
    $cektanggal = mysqli_query($koneksi, "SELECT * FROM kunjungan WHERE tgl_kunjungan = '$tanggal'");
    if (mysqli_num_rows($cektanggal)) {
        echo "<script>
            alert('kunjungan ini sudah ada!');
            window.location = 'index.php';
        </script>";
        return;
    }

    // Insert data baru
    mysqli_query($koneksi, "INSERT INTO kunjungan VALUES (
        null, '$tanggal', '$pasien', '$poli', '$jam'
    )");

    echo "<script>
        alert('kunjungan baru berhasil ditambahkan!');
        window.location = 'index.php';
    </script>";
    return;
}

// HAPUS USER
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-kunjungan') {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM kunjungan WHERE kd_kunjungan = $id");

        echo "<script>
            alert('kunjungan berhasil dihapus!');
            window.location = 'index.php';
        </script>";
        return;
    }
}
?>
