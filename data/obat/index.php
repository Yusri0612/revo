<?php
    require "../../koneksi.php";
    $title = "Data obat - Rekam Medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    // Query data laboratorium
    $obat = mysqli_query($koneksi, "SELECT * FROM obat");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
 <div class="container-fluid">
  <div class="row">
    <div class="main-content ms-auto p-4" style="margin-left: 100px; width: calc(100% - 50px);">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Obat</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="proses-obat.php" class="row g-3">
            <div class="col-md-3">
              <label for="nama" class="from-label">Nama Obat</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Obat" required>
            </div>
            <div class="col-md-3">
             <label for="jumlah" class="from-label">Jumlah Obat</label>
              <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Obat" required>
            </div>
            <div class="col-md-3">
               <label for="ukuran" class="from-label">Ukuran Obat</label>
              <input type="text" name="ukuran" class="form-control" placeholder="Masukan Ukuran Obat" required>
            </div>

            <div class="col-md-3">
               <label for="harga" class="from-label">Harga Obat</label>
              <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Obat" required>
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
          <h4 class="mb-0">Laboratorium</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Jumlah Obat</th>
                <th>Ukuran Obat</th>
                <th>Harga Obat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; while($row = mysqli_fetch_assoc($obat)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nm_obat']); ?></td>
                <td><?= htmlspecialchars($row['jml_obat']); ?></td>
                <td><?= htmlspecialchars($row['ukuran']); ?></td>
                <td><?= htmlspecialchars($row['harga']); ?></td>
                <td class="text-center">
                  <a href="proses-obat.php?id=<?= $row['kd_obat'] ?>&aksi=hapus-obat"
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
