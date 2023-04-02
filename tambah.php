<?php
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require 'koneksi.php';
    if(!empty($_SESSION['ADMIN'])){ }else{
        echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
    }
    include 'navbar.php';
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Tambah Data Mahasiswa
        </div>
        <div class="card-body">
            <form method="post" action="proses.php?aksi=tambah">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" required name="nim" id="nim" placeholder="Masukkan NIM">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" required name="nama" id="nama" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" class="form-control" required name="kelas" id="kelas" placeholder="Masukkan Kelas">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Semester</label>
                            <input type="number" class="form-control" required name="semester" id="semester" placeholder="Masukkan Semester">
                        </div>
                        <div class="form-group">
                            <label for="">Aksi</label>
                            <button type="submit" class="btn btn-primary btn-md btn-block">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php';?>