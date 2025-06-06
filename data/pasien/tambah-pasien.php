<?php
    require "../../koneksi.php";
    $title ="user baru - rekam medis";
    require "../../template/header.php";
    require "../../template/navbar.php";
    require "../../template/sidebar.php";

    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
    <h1 class="h2">user baru</h1> 
    <a href ="<?php $main_url ?>index.php" class="text-decoration-none" ><i class="bi bi-arrow-left align-top" ></i>kembali</a>
    </div>
    <form action="proses-pasien.php" method ="POST" enctype="multipart/form-data">
    <div class="col-lg-8">
        <div class="form-group mb-3">
    <label for="username" class="form-label">Nama</label>
    <input type="text"id="username" name="username" class="form-control" placeholder="masukan username" autocomplete="off" autofocus require>
    </div>

          <div class="form-group mb-3">
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select name="jk"id="jk" class="form-select" require>
    <option value="">--Pilih jenis kelamin--</option>
    <option value="1">Laki - laki</option>
    <option value="2">Perempuan</option>
    </select>
    </div>

         <div class="form-group mb-3">
    <label for="agama" class="form-label">Agama</label>
    <select name="agama"id="agama" class="form-select" require>
    <option value="">--Pilih Agama--</option>
    <option value="1">Islam</option>
    <option value="2">Kristen</option>
    <option value="3">Hindu</option>
    <option value="4">Buddha</option>
    <option value="5">Konghuchu</option>
    <option value="6">Katolik</option>
    </select>
    </div>

    <div class="form-group mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" cols="" rows="3" class="form-control" placeholder="masukan alamat user"></textarea>
    </div>

        <div class="form-group mb-3">
    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date"id="tgl_lahir" name="tgl_lahir" class="form-control" autocomplete="off" autofocus require>
    </div>

      <div class="form-group mb-3">
    <label for="usia" class="form-label">Usia</label>
    <input type="number"id="usia" name="usia" class="form-control" placeholder="usia" autocomplete="off" autofocus require readonly>
    </div>

      <div class="form-group mb-3">
    <label for="telp" class="form-label">No Telpon</label>
    <input type="number"id="telp" name="telp" class="form-control" placeholder="masukan no telepon" autocomplete="off" autofocus require>
    </div>

      <div class="form-group mb-3">
    <label for="nama" class="form-label">Nama kk</label>
    <input type="text"id="nama" name="nama" class="form-control" placeholder="masukan nama kk" autocomplete="off" autofocus require>
    </div>

      <div class="form-group mb-3">
    <label for="hb" class="form-label">Hub Keluarga</label>
    <input type="text"id="hb" name="hb" class="form-control" placeholder="masukan hubungan keluarga" autocomplete="off" autofocus require>
    </div>

     <div class="row">
        <div class="col-lg-4 mb-4 text-center">
            <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg"></i>Reset</button>
            <button type="submit" name="simpan" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i>Simpan</button>
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
    <script>
document.getElementById('tgl_lahir').addEventListener('change', function() {
    const tglLahir = new Date(this.value);
    const today = new Date();
    let usia = today.getFullYear() - tglLahir.getFullYear();
    const m = today.getMonth() - tglLahir.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < tglLahir.getDate())) {
        usia--;
    }
    document.getElementById('usia').value = usia;
});
</script>
    <?php

    require "../../template/footer.php";
    ?>
