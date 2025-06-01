<?php
    require "../../koneksi.php";
    $title = "Data Tindakan - Rekam Medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    // Query data tindakan
    $tindakan = mysqli_query($koneksi, "SELECT * FROM tindakan");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
 <div class="container-fluid">
  <div class="row">
    <div class="main-content ms-auto p-4" style="margin-left: 100px; width: calc(100% - 50px);">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Tindakan</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="proses.php" class="row g-3">
            <div class="col-md-4">
              <label for="nama" class="form-label">Nama Tindakan</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Tindakan" required>
            </div>
            <div class="col-md-4">
              <label for="ket" class="form-label">Keterangan</label>
              <input type="text" name="ket" class="form-control" placeholder="Masukan Keterangan" required>
            </div>
            <div class="col-md-4 d-flex align-items-end">
              <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Tindakan -->
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Tindakan</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama Tindakan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; while($row = mysqli_fetch_assoc($tindakan)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nm_tindakan']); ?></td>
                <td><?= htmlspecialchars($row['ket']); ?></td>
                <td class="text-center">
                  <a href="proses.php?id=<?= $row['kd_tindakan'] ?>&aksi=hapus-tindakan"
                     onclick="return confirm('Yakin hapus data ini?')"
                     class="btn btn-sm btn-outline-danger"
                     title="hapus tindakan">
                    <i class="bi bi-trash align-top"></i>
                  </a>
                </td>
              </tr>
              <?php endwhile; ?>
              <?php if($no==1): ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data tindakan.</td>
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
