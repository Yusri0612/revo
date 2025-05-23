<?php
require "../../koneksi.php";

// SIMPAN DATA BARU
if (isset($_POST['simpan'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $kelamin  = $_POST['jk'];
    $agama    = $_POST['agama'];
    $alamat   = trim(htmlspecialchars($_POST['alamat']));
    $tgl_lhr  = trim(htmlspecialchars($_POST['lahir']));
    $usia     = trim(htmlspecialchars($_POST['usia']));
    $telp     = trim(htmlspecialchars($_POST['telp']));
    $namakk   = trim(htmlspecialchars($_POST['nama']));
    $hubkel   = trim(htmlspecialchars($_POST['hb']));

    // Cek username duplikat
    $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE nm_pasien = '$username'");
    if (mysqli_num_rows($cekUsername)) {
        echo "<script>
            alert('Username sudah terpakai, user baru gagal diregistrasi!');
            window.location = '../tambah-user.php';
        </script>";
        return;
    }

    // Insert data baru
    mysqli_query($koneksi, "INSERT INTO tbl_pasien VALUES (
        null, '$username', '$kelamin', '$agama', '$alamat', '$tgl_lhr', '$usia', '$telp', '$namakk', '$hubkel'
    )");

    echo "<script>
        alert('User baru berhasil diregistrasi!');
        window.location = 'index.php';
    </script>";
    return;
}

// HAPUS USER
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-user') {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM tbl_pasien WHERE no_pasien = $id");

        echo "<script>
            alert('User berhasil dihapus!');
            window.location = 'index.php';
        </script>";
        return;
    }
}

// UPDATE USER
if (isset($_POST['update'])) {
    // Cek keberadaan semua input
    if (!isset($_POST['id'], $_POST['usernamelama'], $_POST['username'], $_POST['jk'], $_POST['agama'], $_POST['alamat'], $_POST['lahir'], $_POST['usia'], $_POST['telp'], $_POST['nama'], $_POST['hb'])) {
        echo "<script>alert('Data tidak lengkap!'); window.location = 'index.php';</script>";
        exit;
    }

    // Ambil dan sanitasi data
    $id         = (int) $_POST['id'];
    $userlama   = trim(htmlspecialchars($_POST['usernamelama']));
    $username   = trim(htmlspecialchars($_POST['username']));
    $kelamin    = trim($_POST['jk']);
    $agama      = trim($_POST['agama']);
    $alamat     = trim(htmlspecialchars($_POST['alamat']));
    $tgl_lhr    = trim(htmlspecialchars($_POST['lahir']));
    $usia       = (int) $_POST['usia'];
    $telp       = trim(htmlspecialchars($_POST['telp']));
    $namakk     = trim(htmlspecialchars($_POST['nama']));
    $hubkel     = trim(htmlspecialchars($_POST['hb']));

    // Validasi kosong
    if (
        empty($username) || empty($kelamin) || empty($agama) || empty($alamat) || 
        empty($tgl_lhr) || empty($usia) || empty($telp) || empty($namakk) || empty($hubkel)
    ) {
        echo "<script>alert('Mohon isi semua data!'); window.location = 'index.php';</script>";
        exit;
    }

    // Cek jika username diubah dan sudah dipakai
    if ($username !== $userlama) {
        $cekUsername = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE nm_pasien = '$username'");
        if (mysqli_num_rows($cekUsername)) {
            echo "<script>
                alert('Username sudah terpakai, data gagal diperbarui!');
                window.location = 'index.php';
            </script>";
            exit;
        }
    }

    // Update data
    $queryUpdate = "UPDATE tbl_pasien SET 
        nm_pasien = '$username', 
        jk = '$kelamin', 
        agama = '$agama', 
        alamat = '$alamat', 
        tgl_lahir = '$tgl_lhr', 
        usia = '$usia', 
        no_telp = '$telp', 
        nm_kk = '$namakk', 
        hub_kel = '$hubkel' 
        WHERE no_pasien = $id";

    if (mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>
            alert('Data user berhasil diperbarui!');
            window.location = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat memperbarui data!');
            window.location = 'index.php';
        </script>";
    }
    exit;
}
?>
