<?php
require "../../koneksi.php";

// SIMPAN DATA BARU
if (isset($_POST['simpan'])) {
    $nama     = trim(htmlspecialchars($_POST['nama']));
    $jumlah     = trim(htmlspecialchars($_POST['jumlah']));
    $ukuran   = trim(htmlspecialchars($_POST['ukuran']));
    $harga   = trim(htmlspecialchars($_POST['harga']));

    // Cek username duplikat
    $ceknama = mysqli_query($koneksi, "SELECT * FROM obat WHERE nm_obat = '$nama'");
    if (mysqli_num_rows($ceknama)) {
        echo "<script>
            alert('obat ini sudah ada!');
            window.location = 'index.php';
        </script>";
        return;
    }

    // Insert data baru
    mysqli_query($koneksi, "INSERT INTO obat VALUES (
        null, '$nama', '$jumlah', '$ukuran', '$harga'
    )");

    echo "<script>
        alert('obat baru berhasil ditambahkan!');
        window.location = 'index.php';
    </script>";
    return;
}

// HAPUS USER
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-obat') {
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM obat WHERE kd_obat = $id");

        echo "<script>
            alert('obat berhasil dihapus!');
            window.location = 'index.php';
        </script>";
        return;
    }
}
?>
