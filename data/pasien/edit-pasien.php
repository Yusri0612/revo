    <?php
    require "../../koneksi.php";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";
     $title ="edit user - rekam medis";

     $id = $_GET['id'];
$queryUser = mysqli_query($koneksi,"SELECT * FROM tbl_pasien WHERE no_pasien = $id");
$user = mysqli_fetch_assoc($queryUser);

    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
    <h1 class="h2">Edit Pasien</h1> 
    <a href ="<?= $main_url ?>data/pasien/index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top" ></i>kembali</a>
    </div>
    <form action="proses-pasien.php" method ="POST" enctype="multipart/form-data">
    <div class="col-lg-8">
       <input type="hidden" name="id" value="<?= $user['no_pasien'] ?>">
<input type="hidden" name="usernamelama" value="<?= $user['nm_pasien'] ?>">


    <div class="form-group mb-3">
    <label for="username" class="form-label">Nama</label>
    <input type="text" id="username" name="username" class="form-control" value="<?= $user['nm_pasien'] ?>" placeholder="masukan username" autocomplete="off" autofocus required>
    </div>

          <div class="form-group mb-3">
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select name="jk" id="jk" class="form-select" required>
    <option value="">--Pilih jenis kelamin--</option>
    <option value="1" <?= $user['jk'] == '1' ? 'selected' : '' ?>>Laki - laki</option>
    <option value="2" <?= $user['jk'] == '2' ? 'selected' : '' ?>>Perempuan</option>
</select>

    </div>

         <div class="form-group mb-3">
    <label for="agama" class="form-label">Agama</label>
    <select name="agama" id="agama" class="form-select" required>
    <option value="">--Pilih Agama--</option>
    <option value="1" <?= $user['agama'] == '1' ? 'selected' : '' ?>>Islam</option>
    <option value="2" <?= $user['agama'] == '2' ? 'selected' : '' ?>>Kristen</option>
    <option value="3" <?= $user['agama'] == '3' ? 'selected' : '' ?>>Hindu</option>
    <option value="4" <?= $user['agama'] == '4' ? 'selected' : '' ?>>Buddha</option>
    <option value="5" <?= $user['agama'] == '5' ? 'selected' : '' ?>>Konghuchu</option>
    <option value="6" <?= $user['agama'] == '6' ? 'selected' : '' ?>>Katolik</option>
</select>

    </div>

    <div class="form-group mb-3">
    <label for="alamat" class="form-label">Alamat</label>
<textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="masukan alamat user"><?= $user['alamat'] ?></textarea>
    </div>

        <div class="form-group mb-3">
    <label for="lahir" class="form-label">Tanggal Lahir</label>
<input type="date" id="lahir" name="lahir" class="form-control" value="<?= $user['tgl_lahir'] ?>" autocomplete="off" required>
    </div>

      <div class="form-group mb-3">
    <label for="usia" class="form-label">Usia</label>
<input type="number" id="usia" name="usia" class="form-control" value="<?= $user['usia'] ?>" autocomplete="off" required>
    </div>

      <div class="form-group mb-3">
    <label for="telp" class="form-label">No Telpon</label>
<input type="number" id="telp" name="telp" class="form-control" value="<?= $user['no_telp'] ?>" autocomplete="off" required>
    </div>

      <div class="form-group mb-3">
    <label for="nama" class="form-label">Nama kk</label>
<input type="text" id="nama" name="nama" class="form-control" value="<?= $user['nm_kk'] ?>" autocomplete="off" required>
    </div>

      <div class="form-group mb-3">
    <label for="hb" class="form-label">Hub Keluarga</label>
<input type="text" id="hb" name="hb" class="form-control" value="<?= $user['hub_kel'] ?>" autocomplete="off" required>
    </div>

     <div class="row">
        <div class="col-lg-4 mb-4 text-center">
            <button type="submit" name="update" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-save align-top"></i>Update</button>
        </div>

    </div>
    </form>
    </main>

    <?php

    require "../../template/footer.php";
    ?>
