<?php
    require "../../koneksi.php";
    $title = "Data Laboratorium - Rekam Medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    // Query data laboratorium
    $lab = mysqli_query($koneksi, "SELECT * FROM laboratorium");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
 <div class="container-fluid">
  <div class="row">
    <div class="main-content ms-auto p-4" style="margin-left: 100px; width: calc(100% - 50px);">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Laboratorium</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="proses.php" class="row g-3">
            <div class="col-md-3">
              <input type="text" name="no_rm" class="form-control" placeholder="No RM" required>
            </div>
            <div class="col-md-3">
              <input type="text" name="hasil_lab" class="form-control" placeholder="Hasil Lab" required>
            </div>
            <div class="col-md-3">
              <input type="text" name="ket" class="form-control" placeholder="Keterangan">
            </div>
            <div class="col-md-3">
              <button type="submit" name="tambah_lab" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Laboratorium -->
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Laboratorium</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>No RM</th>
                <th>Hasil Lab</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; while($row = mysqli_fetch_assoc($lab)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['no_rm']); ?></td>
                <td><?= htmlspecialchars($row['hasil_lab']); ?></td>
                <td><?= htmlspecialchars($row['ket']); ?></td>
                <td class="text-center">
                  <a href="proses.php?id=<?= $row['kd_lab'] ?>&aksi=hapus-lab"
                     onclick="return confirm('Yakin hapus data ini?')"
                     class="btn btn-sm btn-outline-danger"
                     title="hapus laboratorium">
                    <i class="bi bi-trash align-top"></i>
                </td>
              </tr>
              <?php endwhile; ?>
              <?php if($no==1): ?>
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data laboratorium.</td>
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
