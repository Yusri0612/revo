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
    <h1 class="h2">Pasien</h1> 
    <a href ="<?php $main_url ?>index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top" ></i>kembali</a>
    </div>
    <form action="proses-pasien.php" method ="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col-lg-4 mb-4 text-center">
            <div class="px-4 mb-4">
                <input type="hidden" name="gbrlama" value="<?= $user['gambar']?>">
                <img src="<?= $main_url?>assets/gambar/<?= $user['gambar']?>" alt="user" class="mb-3 rounded-circle tampil" id="preview-img"  style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" width="120px">
        <input type="file" class="form-control form-control-sm" name="gambar" onchange="imgview()" id="gambar">
            </div>

            <button type="submit" name="update" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-save align-top"></i>Update</button>
        </div>

    <div class="col-lg-8">
        <div class="form-group mb-3">
         <input type="hidden" name="id" value="<?= $user['no_pasien']?>">
         <input type="hidden" name="usernamelama" value="<?= $user['username']?>">

    <label for="usename" class="form-label">Username</label>
    <input type="text"id="username" name="username" class="form-control" placeholder="masukan username" value="<?= $user['username']?>" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="fullname" class="form-label">Fullname</label>
    <input type="text"id="fullname" name="fullname" class="form-control" value="<?= $user['fullname']?>" placeholder="masukan nama lengkap" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <select name="jabatan"id="jabatan" class="form-select" require>
    <option value="">--Pilih Jabatan--</option>
    <option value="1" <?= $user['jabatan'] == 1 ? 'selected' :'' ?>>Administrator</option>
    <option value="2" <?= $user['jabatan'] == 2 ? 'selected' :'' ?>>Petugas</option>
    <option value="3" <?= $user['jabatan'] == 3 ? 'selected' :'' ?>>Dokter</option>
    </select>
    </div>

    <div class="form-group mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control"
     placeholder="masukan alamat user"><?= $user['alamat']?></textarea>
    </div>
    </div>
    </form>
    </main>

    <script>

        function imgview(){
            let gambar = document.getElementById('gambar');
            let tampil = document.querySelector('.tampil');

            let filereader = new FileReader();
            filereader.readAsDataURL(gambar.files[0]);

            filereader.addEventListener('load', (e)=>{
                            tampil.src =e.target.result;

            })
            }
        
    </script>
    <?php

    require "../../template/footer.php";
    ?>
