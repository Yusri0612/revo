<?php
require "../../koneksi.php";
$title = "Tambah Rekam Medis";
require "../../template/header.php";
require "../../template/navbar.php";
require "../../template/sidebar.php";

$poli = mysqli_query($koneksi, "SELECT kd_pooli, nm_poli FROM poliklinik");
$user = mysqli_query($koneksi, "SELECT user_id, username FROM tbl_user");

// Ambil data berdasarkan no_RM dari parameter GET
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!');window.location='index.php';</script>";
    exit;
}
$no_dokter = htmlspecialchars($_GET['id']);
$query = mysqli_query($koneksi, "SELECT * FROM dokter WHERE kd_dokter='$no_dokter'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!');window.location='index.php';</script>";
    exit;
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Dokter </h1> 
        <a href ="<?= $main_url ?>index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top"></i> Kembali</a>
    </div>
    <form action="proses-dokter.php" method="POST">
        <input type="hidden" name="kd_dokter" value="<?= htmlspecialchars($data['kd_dokter']) ?>">
        <div class="col-lg-8">
            <div class="form-group mb-3">
          <label for="kd_poli" class="form-label"> Kode Poliklinik </label>
         <select class="form-select" name="kd_poli" required>
           <option value="">--Pilih poliklinik--</option>
           <?php while ($row = mysqli_fetch_assoc($poli)) { ?>
           <option value="<?= $row['kd_pooli'] ?>"><?= $row['nm_poli'] ?></option>
           <?php } ?>
           </select>             
         </div>

            <div class="form-group mb-3" >
                <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukan Tanggal Kunjungan" require>
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
                <label for="nama" class="form-label">Nama Dokter</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Dokter">
            </div>
            <div class="form-group mb-3">
                <label for="sip" class="form-label">SIP</label>
                <input type="text" id="sip" name="sip" class="form-control" placeholder="Masukkan SIP">
            </div>
            <div class="form-group mb-3">
                <label for="lahir" class="form-label">Tempat Lahir</label>
                <input type="text" id="lahir" name="lahir" class="form-control" placeholder="Masukkan Tempat Lahri">
            </div>
            <div class="form-group mb-3">
                <label for="telp" class="form-label">No Telepon</label>
                <input type="number" id="telp" name="telp" class="form-control"  required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat">
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 text-center">
                    <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Update</button>
                </div>
            </div>
        </div>
    </form>
</main>
<?php
require "../../template/footer.php";
?>
