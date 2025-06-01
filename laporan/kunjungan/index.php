<?php
    require "../../koneksi.php";
    $title = "Data obat - Rekam Medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

$poli = mysqli_query($koneksi, "SELECT kd_pooli, nm_poli FROM poliklinik");
$pasien = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM tbl_pasien");

    // Query data laboratorium
    $kunjungan = mysqli_query($koneksi, "SELECT * FROM kunjungan");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
 <div class="container-fluid">
  <div class="row">
    <div class="main-content ms-auto p-4" style="margin-left: 100px; width: calc(100% - 50px);">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Kunjungan</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="proses.php" class="row g-3">
            <div class="col-md-3">
              <label for="tanggal" class="from-label">Tanggal Kunjungan</label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="col-md-3">
            <label for="no_pasien">No Pasien</label>
                <select class="form-select" name="no_pasien" required>
                <option value="">--No Pasien--</option>
                <?php while ($row = mysqli_fetch_assoc($pasien)) { ?>
               <option value="<?= $row['no_pasien'] ?>">
               <?= $row['no_pasien'] . ' - ' . $row['nm_pasien']; ?>
                 </option>
                <?php } ?>
             </select>
         </div>
            <div class="col-md-3">
            <label for="kd_poli">Kode Poliklinik</label>
            <select class="form-select" name="kd_poli" required>
           <option value="">--Kode Poli--</option>
          <?php while ($row = mysqli_fetch_assoc($poli)) { ?>
         <option value="<?= $row['kd_pooli'] ?>"><?= $row['kd_pooli']. ' - ' .$row['nm_poli'] ?></option>
         <?php } ?>
         </select>
           </div>
<div class="col-md-3">
  <label for="jam" class="form-label">Jam Kunjungan</label>
<input type="time" name="jam" id="jam" class="form-control" required>
</div>
            <div class="col-md-3">
              <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Laboratorium -->
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Kunjungan</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Tanggal Kunjungan</th>
                <th>No Pasien</th>
                <th>Kode Poliklinik</th>
                <th>Jam Kunjungan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; while($row = mysqli_fetch_assoc($kunjungan)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['tgl_kunjungan']); ?></td>
                <td><?= htmlspecialchars($row['no_pasien']); ?></td>
                <td><?= htmlspecialchars($row['kd_poli']); ?></td>
                <td><?= htmlspecialchars($row['jam_kunjungan']); ?></td>
                <td class="text-center">
                  <a href="proses.php?id=<?= $row['kd_kunjungan'] ?>&aksi=hapus-kunjungan"
                     onclick="return confirm('Anda yakin hapus data ini?')"
                     class="btn btn-sm btn-outline-danger"
                     title="hapus kunjungan">
                    <i class="bi bi-trash align-top"></i>
                </td>
              </tr>
              <?php endwhile; ?>
              <?php if($no==1): ?>
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data Kunjungan.</td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<?php require "../../template/footer.php"; ?>
