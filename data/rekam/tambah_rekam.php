<?php
require "../../koneksi.php";
$title = "Tambah Rekam Medis";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";


$tindakan = mysqli_query($koneksi, "SELECT kd_tindakan, nm_tindakan FROM tindakan");
$obat = mysqli_query($koneksi, "SELECT kd_obat, nm_obat FROM obat");
$user = mysqli_query($koneksi, "SELECT user_id, username FROM tbl_user");
$pasien = mysqli_query($koneksi, "SELECT no_pasien, nm_pasien FROM tbl_pasien");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Rekam Medis</h1> 
        <a href ="<?= $main_url ?>data/rekam/index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top"></i> Kembali</a>
    </div>
    <form action="proses-rekam.php" method="POST">
        <div class="col-lg-8">
            <div class="form-group mb-3">
          <label for="kd_tindakan" class="form-label"> Tindakan </label>
         <select class="form-select" name="kd_tindakan" required>
           <option value="">--Pilih Tindakan--</option>
           <?php while ($row = mysqli_fetch_assoc($tindakan)) { ?>
           <option value="<?= $row['kd_tindakan'] ?>"><?= $row['nm_tindakan'] ?></option>
           <?php } ?>
           </select>          
            
         </div>
            <div class="form-group mb-3">
            <label for="kd_obat" class="form-label"> Obat </label>
         <select class="form-select" name="kd_obat" required>
           <option value="">--Pilih obat--</option>
           <?php while ($row = mysqli_fetch_assoc($obat)) { ?>
           <option value="<?= $row['kd_obat'] ?>"><?= $row['nm_obat'] ?></option>
        <?php } ?> 
           </select>          
        
         </div>
            <div class="form-group mb-3">
            <label for="kd_user" class="form-label"> User </label>
         <select class="form-select" name="kd_user" required>
           <option value="">--Pilih user--</option>
           <?php while ($row = mysqli_fetch_assoc($user)) { ?>
           <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
           <?php } ?>
           </select>          
            
         </div>
            <div class="form-group mb-3">
            <label for="no_pasien" class="form-label"> Pasien </label>
         <select class="form-select" name="no_pasien" required>
           <option value="">--Pilih pasien--</option>
           <?php while ($row = mysqli_fetch_assoc($pasien )) { ?>
           <option value="<?= $row['no_pasien'] ?>"><?= $row['nm_pasien'] ?></option>
           <?php } ?>
           </select>          
            
         </div>
            <div class="form-group mb-3">
                <label for="diagnosa" class="form-label">Diagnosa</label>
                <input type="text" id="diagnosa" name="diagnosa" class="form-control" placeholder="Masukkan Diagnosa">
            </div>
            <div class="form-group mb-3">
                <label for="resep" class="form-label">Resep</label>
                <input type="text" id="resep" name="resep" class="form-control" placeholder="Masukkan Resep">
            </div>
            <div class="form-group mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <input type="text" id="keluhan" name="keluhan" class="form-control" placeholder="Masukkan Keluhan">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                <input type="date" id="tgl_pemeriksaan" name="tgl_pemeriksaan" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" id="ket" name="ket" class="form-control" placeholder="Masukkan Keterangan">
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 text-center">
                    <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg"></i> Reset</button>
                    <button type="submit" name="simpan" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Simpan</button>
                </div>
            </div>
        </div>
    </form>
</main>
<?php
require "../../template/footer.php";
?>
