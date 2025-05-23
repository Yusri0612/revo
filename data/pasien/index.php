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
<h1 class="h2">data pasien</h1> 
</div>
  <a href="<?php $main_url ?>tambah-pasien.php" class="btn btn-outline-primary btn-sm"
   title="tambah user baru"><i class="bi bi-plus-lg align-top"></i>User Baru</a>

  <table class="table table-responsive table-hover table-bordered">
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
  <td><?= $no++; ?></td>
   <td><?= $user['nm_pasien'] ?></td>
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
     $user['tgl_lahir']
     ?>
   </td>
   <td>
    <?=
     $user['usia']
     ?>
   </td>
   <td>
    <?=
     $user['no_telp']
     ?>
   </td>
   <td>
    <?=
     $user['nm_kk']
     ?>
   </td>
   <td>
    <?=
     $user['hub_kel']
     ?>
   </td>
   <td>
    <a href="edit-pasien.php?id= <?= $user['no_pasien'] ?>" class="btn btn-sm btn-outline-warning" title="edit user"><i class="bi bi-pen align-top"></i></a>
    <a href="proses-pasien.php?id= <?= $user['no_pasien'] ?>&aksi=hapus-user" 
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
