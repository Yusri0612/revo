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
<h1 class="h2">data Dokter</h1>
</div>
  

  <table class="table table-responsive table-hover">
<thead>
<tr>
  <th>No</th>
  <th>Kode Poliklinik</th>
  <th>Tanggal Kunjungan</th>
  <th>User Id</th>
  <th>Nama Dokter</th>
  <th>SIP</th>
  <th>Tempat Lahir</th>
  <th>No Telepon</th>
  <th>Alamat</th>
  <th>Aksi </th>
</tr>
</thead>
<tbody>
<?php  
$no=1;
$queryDokter = mysqli_query($koneksi,"
    SELECT d.*, p.nm_poli, u.username 
    FROM dokter d
    LEFT JOIN poliklinik p ON d.kd_poli = p.kd_pooli
    LEFT JOIN tbl_user u ON d.user_id = u.user_id
");
while ($dokter = mysqli_fetch_assoc($queryDokter)) {
?>
<tr>
  <td><?= $no++; ?></td>
  <td><?= htmlspecialchars($dokter['nm_poli']); ?></td>
  <td><?= htmlspecialchars($dokter['tgl_kunjungan']); ?></td>
  <td><?= htmlspecialchars($dokter['username']); ?></td>
  <td><?= htmlspecialchars($dokter['nm_dokter']); ?></td>
  <td><?= htmlspecialchars($dokter['sip']); ?></td>
  <td><?= htmlspecialchars($dokter['tempat_lhr']); ?></td>
  <td><?= htmlspecialchars($dokter['no_tlp']); ?></td>
  <td><?= htmlspecialchars($dokter['alamat']); ?></td>
</tr>
<?php } ?>
</tbody>
  </table>

</main>
<?php

 require "../../template/footer.php";
?>
