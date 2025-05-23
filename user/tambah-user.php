    <?php
    require "../koneksi.php";
    require "../template/header.php";
    require "../template/navbar.php";
    require "../template/sidebar.php";
     $title ="user baru - rekam medis";


    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
    <h1 class="h2">user baru</h1> 
    <a href ="<?php $main_url ?>index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top" ></i>kembali</a>
    </div>
    <form action="proses-user.php" method ="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col-lg-4 mb-4 text-center">
            <div class="px-4 mb-4">
                <img src="<?= $main_url?>assets/gambar/user.png" alt="user" class="mb-3 rounded-circle tampil" id="preview-img"  style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" width="120px">
        <input type="file" class="form-control form-control-sm" name="gambar" onchange="imgview()" id="gambar">
        <span class="text-sm">Type gambar JPG | PNG | GIF</span><br>
        <span class="text-sm">widht = height</span><br>
            </div>
            <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg"></i>Reset</button>
            <button type="submit" name="simpan" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i>Simpan</button>
        </div>

    <div class="col-lg-8">
        <div class="form-group mb-3">
    <label for="usename" class="form-label">Username</label>
    <input type="text"id="username" name="username" class="form-control" placeholder="masukan username" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="fullname" class="form-label">Fullname</label>
    <input type="text"id="fullname" name="fullname" class="form-control" placeholder="masukan nama lengkap" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password"id="password" name="password" class="form-control" placeholder="masukan password user" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="password2" class="form-label">Konfirmasi Password</label>
    <input type="password"id="password2" name="password2" class="form-control" placeholder="masukan kembali password user" autocomplete="off" autofocus require>
    </div>

        <div class="form-group mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <select name="jabatan"id="jabatan" class="form-select" require>
    <option value="">--Pilih Jabatan--</option>
    <option value="1">Administrator</option>
    <option value="2">Petugas</option>
    <option value="3">Dokter</option>
    </select>
    </div>

    <div class="form-group mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control" placeholder="masukan alamat user"></textarea>
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

    require "../template/footer.php";
    ?>
