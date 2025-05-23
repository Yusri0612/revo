<?php

 require "koneksi.php";
if (isset($_POST['login'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

$cekUsername =mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username ='$username'");

if(mysqli_num_rows($cekUsername) ==1 ){
    $row = mysqli_fetch_assoc($cekUsername);
    if(password_verify($password, $row['password'])){
        header("location: dashboard/dashboard.php");
        exit();
    } else {
        echo "<script>
        alert('login berhasil...');
        document.location.href= 'dashboard/dashboard.php';
        </script>";
     }
} else {
    echo "<script>
        alert('login gagal...');
        document.location.href= 'index.php';
        </script>";
}
}

?>