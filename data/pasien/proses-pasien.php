<?php

require "../../koneksi.php";

if(isset($_POST['simpan'])){
$username =trim(htmlspecialchars($_POST['username']));
$kelamin  =$_POST['jk'];
$agama    =$_POST ['agama'];
$alamat   =trim(htmlspecialchars($_POST['alamat']));
$gambar   =trim(htmlspecialchars($_FILES['gambar']['name']));
$tgl_lhr  =trim(htmlspecialchars($_POST['lahir']));
$usia     =trim(htmlspecialchars($_POST['usia']));
$telp     =trim(htmlspecialchars($_POST['telp']));
$namakk     =trim(htmlspecialchars($_POST['nama']));
$hubkel     =trim(htmlspecialchars($_POST['hb']));

$cekUsername =mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE nm_pasien ='$username'");
if(mysqli_num_rows($cekUsername)){
    echo "<script>
    alert('username sudah terpakai, user baru gagal di registrasi !');
    window.location = '../tambah-user.php';
    </script>";
    return;
}
if ($gambar != null){
    $url = '../tambah-user.php';
    $gambar = uploadGBR($url);
}else{  
    $gambar ='user.png';
}
mysqli_query($koneksi, "INSERT INTO tbl_pasien VALUES (null,'$username', '$kelamin', '$agama', '$alamat', '$gambar', '$tgl_lhr', '$usia', '$telp', '$namakk', '$hubkel' ) ");

 echo "<script>
    alert('user baru berhasil di registrsi !');
    window.location = 'index.php';
    </script>";
    return;
}

if ($_GET['aksi'] == 'hapus-user'){
    $id = $_GET['id'];
    $gbr = $_GET['gambar'];

    mysqli_query($koneksi,"DELETE FROM tbl_pasien WHERE no_pasien = $id");
    if($gbr != 'user.png'){
        unlink("../assets/gambar/" . $gbr);
    }

 echo "<script>
    alert('user berhasil di hapus !');
    window.location = 'index.php';
    </script>";
    return;

}

if(isset($_POST['update'])){
$id       = $_POST['id'];
$username =trim(htmlspecialchars($_POST['username']));
$kelamin  =$_POST['jk'];
$agama    =$_POST ['agama'];
$alamat   =trim(htmlspecialchars($_POST['alamat']));
$gambar   =trim(htmlspecialchars($_FILES['gambar']['name']));
$tgl_lhr  =trim(htmlspecialchars($_POST['lahir']));
$usia     =trim(htmlspecialchars($_POST['usia']));
$telp     =trim(htmlspecialchars($_POST['telp']));
$namakk     =trim(htmlspecialchars($_POST['nama']));
$hubkel     =trim(htmlspecialchars($_POST['hb']));

$cekUsername =mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE nm_pasien ='$username'");
if($username !== $userlama){
if(mysqli_num_rows($cekUsername)){
    echo "<script>
    alert('username sudah terpakai, Data user baru gagal di perbarui !');
    window.location = 'index.php';
    </script>";
    return;
}
}

if ($gambar != null){
    $url = 'index.php';
    $gbrUser = uploadGBR($url);
    if($gbrlama !== 'user.png'){
        @unlink('../assets/gambar/' . $gbrlama);
    }
}else{
    $gbrUser = $gbrlama;
}
mysqli_query($koneksi, "UPDATE tbl_pasien SET username ='$username', jk='$kelamin',
 agama='$agama', alamat='$alamat', gambar='$gbrUser', lahir='$tgl_lhr', usia='$usia', telp='$telp', nama='$namakk', hb='$hubkel' WHERE user_id = $id");

 echo "<script>
    alert('Data user berhasil di perbarui !');
    window.location = 'index.php';
    </script>";
    return;
}

?>