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
<h1 class="h2">data Rekam Medis</h1>
 <a href="<?php $main_url ?>tambah_rekam.php" class="btn btn-outline-primary btn-sm"
   title="tambah rekam medis"><i class="bi bi-plus-lg align-top"></i>Tambah Rekam Medis</a>
</div>
  

  <table class="table table-responsive table-hover">
<thead>
<tr>
  <th>No</th>
  <th>Kode Tindakan</th>
  <th>Kode Obat</th>
  <th>User Id</th>
  <th>No Pasien</th>
  <th>Diagnosa</th>
  <th>Resep</th>
  <th>Keluhan</th>
  <th>Tanggal Pemeriksaan
  <th>Keterangan</th>
  <th>Aksi </th>
</tr>
</thead>
<tbody>
<?php  
$no=1;
$queryRekam = mysqli_query($koneksi," SELECT r.*, p.nm_pasien 
    FROM rekam_medis r
    LEFT JOIN tbl_pasien p ON r.no_pasien = p.no_pasien
");
while ($rekam = mysqli_fetch_assoc($queryRekam)) {
?>
<tr>
  <td><?= $no++; ?></td>
  <td><?= htmlspecialchars($rekam['kd_tindakan']); ?></td>
  <td><?= htmlspecialchars($rekam['kd_obat']); ?></td>
  <td><?= htmlspecialchars($rekam['user_id']); ?></td>
  <td><?= htmlspecialchars($rekam['nm_pasien']); ?></td>
  <td><?= htmlspecialchars($rekam['diagnosa']); ?></td>
  <td><?= htmlspecialchars($rekam['resep']); ?></td>
  <td><?= htmlspecialchars($rekam['keluhan']); ?></td>
  <td><?= htmlspecialchars($rekam['tgl_pemeriksaan']); ?></td>
  <td><?= htmlspecialchars($rekam['ket']); ?></td>
  <td>
    <a href="edit.php?id=<?= $rekam['no_rm'] ?>" class="btn btn-sm btn-outline-warning" title="edit rekam medis"><i class="bi bi-pen align-top"></i></a>
    <a href="proses-rekam.php?id=<?= $rekam['no_rm'] ?>&aksi=hapus-rekam" 
       onclick="return confirm('Anda yakin mau menghapus data ini?')" 
       class="btn btn-sm btn-outline-danger" title="hapus rekam medis"><i class="bi bi-trash align-top"></i></a>
  </td>
</tr>
<?php } ?>
</tbody>
  </table>

</main>
<?php

 require "../../template/footer.php";
?>
