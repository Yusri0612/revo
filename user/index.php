  <?php
    require "../koneksi.php";
    $title ="user baru - rekam medis";
    require "../template/header.php";
    require "../template/navbar.php";
    require "../template/sidebar.php";

    ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap
     align-items-center pt-3 pb-2 mb-3 border-bottom">   
<h1 class="h2">data user</h1> 
</div>
  <a href="<?php $main_url ?>tambah-user.php" class="btn btn-outline-primary btn-sm"
   title="tambah user baru"><i class="bi bi-plus-lg align-top"></i>User Baru</a>

  <table class="table table-responsive table-hover">
<thead>
<tr>
  <th>No</th>
  <th>Gambar</th>
  <th>Username</th>
  <th>Nama lengkap</th>
  <th>Jabatan</th>
  <th>Alamat</th>
  <th>Aksi</th>
</tr>
</thead>
<tbody>
  <?php  
  
$no=1;
$queryUser = mysqli_query($koneksi,"SELECT * FROM tbl_user");
while ($user = mysqli_fetch_assoc($queryUser)) {
  $jabatan = $user['jabatan'];
?>
<tr>
  <td><?= $no++; ?></td>
  <td class="col-1">
    <img src="../assets/gambar/<?= $user['gambar']?>" alt="user" class="img-thumbnail rounded-circle img-fluid"></td>
   <td><?= $user['username'] ?></td>
   <td><?= $user['fullname'] ?></td>
   <td>
    <?php  
    if ($jabatan == 1){
      echo 'administrator';
    }else if ($jabatan == 2){
      echo 'petugas';
    }else {
      echo 'dokter';
    }
    ?>
   </td>
   <td>
    <?= $user['alamat']?>
   </td>
   <td>
    <a href="edit-user.php?id= <?= $user['user_id'] ?>&gambar=<?= $user['gambar'] ?>" class="btn btn-sm btn-outline-warning" title="edit user"><i class="bi bi-pen align-top"></i></a>
    <a href="proses-user.php?id= <?= $user['user_id'] ?>&gambar=<?= $user['gambar'] ?>&aksi=hapus-user" 
    onclick="return confirm ('Anda yakin mau menghapus user ini ?')" 
    class="btn btn-sm btn-outline-danger" title="hapus user"><i class="bi bi-trash align-top"></i></a>
   </td>
</tr>

  <?php }?>
</tbody>
  </table>

</main>
<?php

 require "../template/footer.php";
?>
