  <?php
    require "../../koneksi.php";
    $title ="user baru - rekam medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap
     align-items-center pt-3 pb-2 mb-3 border-bottom">   
<h1 class="h2">data user</h1> 
</div>
  <a href="<?php $main_url ?>tambah-pasien.php" class="btn btn-outline-primary btn-sm"
   title="tambah user baru"><i class="bi bi-plus-lg align-top"></i>User Baru</a>

  <table class="table table-responsive table-hover">
<thead>
<tr>
  <th>No</th>
  <th>Nama</th>
  <th>Jenis Kelamin</th>
  <th>Agama</th>
  <th>Alamat</th>
  <th>Tanggal Lahir</th>
  <th>Usia</th>
  <th>No Telpon</th>
  <th>Nama kk</th>
  <th>hub Keluarga </th>
  <th>Aksi </th>
</tr>
</thead>
<tbody>
  <?php  
  
$no=1;
$queryUser = mysqli_query($koneksi,"SELECT * FROM tbl_pasien");
while ($user = mysqli_fetch_assoc($queryUser)) {
  $kelamin = $user['jk'];
  $agama = $user['agama'];
?>
<tr>
  <td><?= $no++; ?></td>
  <td class="col-1">
    <img src="../assets/gambar/<?= $user['gambar']?>" alt="user" class="img-thumbnail rounded-circle img-fluid"></td>
   <td><?= $user['username'] ?></td>
   <td>
    <?php   
    if ($kelamin == 1){
      echo 'laki-laki';
    }else{
      echo 'perempuan';
    }
    ?>
   </td>
   <td>
   <td>
    <?php  
    if ($agama == 1){
      echo 'Islam';
    }else if($agama == 2){
      echo 'Kristen';
    }else if($agama == 3){
      echo 'Katolik';
    }else if($agama == 4){
      echo 'budha';
    }else if($agama == 5){
      echo 'Hindu';
    }else{
      echo 'konghuchu';
    }
    
    ?>
   </td>
   <td>
    <?= $user['alamat']?>
   </td>
   <td>
    <?=
     $user['tgl_lhr']
     ?>
   </td>
   <td>
    <?=
     $user['usia']
     ?>
   </td>
   <td>
    <?=
     $user['telp']
     ?>
   </td>
   <td>
    <?=
     $user['nama']
     ?>
   </td>
   <td>
    <?=
     $user['hb']
     ?>
   </td>
   <td>
    <a href="edit-user.php?id= <?= $user['no_pasien'] ?>&gambar=<?= $user['gambar'] ?>" class="btn btn-sm btn-outline-warning" title="edit user"><i class="bi bi-pen align-top"></i></a>
    <a href="proses-pasien.php?id= <?= $user['user_id'] ?>&gambar=<?= $user['gambar'] ?>&aksi=hapus-user" 
    onclick="return confirm ('Anda yakin mau menghapus user ini ?')" 
    class="btn btn-sm btn-outline-danger" title="hapus user"><i class="bi bi-trash align-top"></i></a>
   </td>
</tr>

  <?php }?>
</tbody>
  </table>

</main>
<?php

 require "../../template/footer.php";
?>
