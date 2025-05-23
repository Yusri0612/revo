    <?php
date_default_timezone_set ('asia/jakarta');

$host    ='localhost';
$user    ='root';
$pass    ='';
$db_name ='db_rekammedis';

$koneksi = mysqli_connect($host, $user, $pass, $db_name);

//if (!$koneksi) {
//die ("koneksi gagal");
//}else{
//echo "koneksi berhasil";
//}
$main_url = "http://localhost/rekammedis/";

function uploadGBR($url){
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $ekstensiValid =['jpg','jpeg','png','gif'];
    $ekstensiFile = explode('.',$namafile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if(!in_array($ekstensiFile, $ekstensiValid)) {
          echo "<script>
    alert('input user gagal, file yang anda upload bukan gambar');
    window.location = '$url';
    </script>";
    die();
    }
    if ($ukuran > 4000000){
          echo "<script>
    alert('input user gagal, maximal ukuran gambar 4mb');
    window.location = '$url';
    </script>";
    }
    $namafilebaru = time().'-'. $namafile;

    move_uploaded_file($tmp, '../assets/gambar/'. $namafilebaru);
    return $namafilebaru;
}
