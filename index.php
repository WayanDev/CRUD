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
            Data Mahasiswa
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-md" href="tambah.php" role="button">
                Tambah
            </a>
            <div class="table-responsive mt-3">
                <table class="table table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $sql = "SELECT * FROM mahasiswa ORDER BY id DESC";
                            $row = $koneksi->prepare($sql);
                            $row->execute();
                            $hasil = $row->fetchAll(PDO::FETCH_OBJ);
                            foreach($hasil as $r) {
                        ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?=$r->nim;?></td>      
                            <td><?=$r->nama;?></td>      
                            <td><?=$r->semester;?></td>      
                            <td><?=$r->kelas;?></td>
                            <td>
                                <a href="<?= "edit.php?id=".$r->id;?>" 
                                    class="btn btn-success btn-sm" 
                                    title="Edit">
                                    <i class="fa fa-edit"></i> 
                                </a> 
                                <a href="proses.php?aksi=hapus&id=<?=$r->id;?>" 
                                    class="btn btn-danger btn-sm" 
                                    onclick="javascript:return confirm(`Data ingin dihapus ?`);" 
                                    title="Delete">
                                    <i class="fa fa-times"></i> 
                                </a>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>