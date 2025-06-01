<?php
    require "../../koneksi.php";
    $title ="Data Poliklinik - Rekam Medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    // Query data poliklinik
    $poli = mysqli_query($koneksi, "SELECT * FROM poliklinik");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
 <div class="container-fluid">
  <div class="row">
    <div class="main-content ms-auto p-4" style="margin-left: 100px; width: calc(100% - 50px);">

      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Poliklinik</h6>
        </div>
        <div class="card-body">
          <form method="POST" action="proses.php" class="row g-3">
            <div class="col-md-4">
              <input type="text" name="nama" class="form-control" placeholder="Nama poliklinik" required>
            </div>
            <div class="col-md-3">
              <input type="number" name="lantai" class="form-control" placeholder="Lantai" required>
            </div>
            <div class="col-md-3">
              <button type="submit" name="tambah_poli" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Poliklinik -->
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Poliklinik</h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Nama poliklinik</th>
                <th>Lantai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; while($row = mysqli_fetch_assoc($poli)): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nm_poli']); ?></td>
                <td><?= htmlspecialchars($row['lantai']); ?></td>
                <td>
                  <a href="proses.php?id=<?= $row['kd_pooli'] ?>&aksi=hapus-poli" 
                     onclick="return confirm('Anda yakin mau menghapus poliklinik ini?')" 
                     class="btn btn-sm btn-outline-danger" 
                     title="hapus poliklinik">
                    <i class="bi bi-trash align-top"></i>
                </td>
              </tr>
              <?php endwhile; ?>
              <?php if($no==1): ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Belum ada poliklinik.</td>
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
<?php
 require "../../template/footer.php";
?>
