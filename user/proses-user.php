<?php

require "../koneksi.php";

if(isset($_POST['simpan'])){
$username =trim(htmlspecialchars($_POST['username']));
$nama     =trim(htmlspecialchars($_POST['fullname']));
$jabatan  =$_POST ['jabatan'];
$alamat   =trim(htmlspecialchars($_POST['alamat']));
$gambar   =trim(htmlspecialchars($_FILES['gambar']['name']));
$password   =trim(htmlspecialchars($_POST['password']));
$password2   =trim(htmlspecialchars($_POST['password2']));

$cekUsername =mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username ='$username'");
if(mysqli_num_rows($cekUsername)){
    echo "<script>
    alert('username sudah terpakai, user baru gagal di registrasi !');
    window.location = '../tambah-user.php';
    </script>";
    return;
}
if($password !== $password2){
    echo "<script>
    alert('Konfirmasi password tidak sesuai, user baru gagal di registrasi !');
    window.location = '../tambah-user.php';
    </script>";
    return;
}
$pass = password_hash($password, PASSWORD_DEFAULT);

if ($gambar != null){
    $url = '../tambah-user.php';
    $gambar = uploadGBR($url);
}else{  
    $gambar ='user.png';
}
mysqli_query($koneksi, "INSERT INTO tbl_user VALUES (null,'$username', '$nama', '$pass', '$jabatan', '$alamat', '$gambar' ) ");

 echo "<script>
    alert('user baru berhasil di registrsi !');
    window.location = 'index.php';
    </script>";
    return;
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus-user') {
    $id = $_GET['id'];
    $gbr = $_GET['gambar'];

    mysqli_query($koneksi,"DELETE FROM tbl_user WHERE user_id = $id");
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
$userlama =trim(htmlspecialchars($_POST['usernamelama']));
$username =trim(htmlspecialchars($_POST['username']));
$nama     =trim(htmlspecialchars($_POST['fullname']));
$jabatan  =$_POST ['jabatan'];
$alamat   =trim(htmlspecialchars($_POST['alamat']));
$gambar   =trim(htmlspecialchars($_FILES['gambar']['name']) );
$gbrlama  =htmlspecialchars($_POST['gbrlama']);

$cekUsername =mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username ='$username'");
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
mysqli_query($koneksi, "UPDATE tbl_user SET username ='$username', fullname='$nama',
 jabatan='$jabatan', alamat='$alamat', gambar='$gbrUser' WHERE user_id = $id");

 echo "<script>
    alert('Data user berhasil di perbarui !');
    window.location = 'index.php';
    </script>";
    return;
}

?>