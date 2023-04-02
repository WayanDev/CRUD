<?php 
    session_start();
    require 'koneksi.php';

    // proses login
    if(!empty($_GET['aksi'] == 'login'))
    {
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM user WHERE username = ? AND password = md5(?)";
        $row = $koneksi->prepare($sql);
        $row->execute(array($user,$pass));
        $count = $row->rowCount();

        if($count > 0)
        {
            $result = $row->fetch();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='index.php';</script>";
        }else{
            echo "<script>window.location='login.php?get=failed';</script>";
        }

    }

    if(!empty($_GET['aksi'] == "tambah")) {
        $data[] =  $_POST["nim"];
        $data[] =  $_POST["nama"];
        $data[] =  $_POST["kelas"];
        $data[] =  $_POST["semester"];

        $sql = "INSERT INTO mahasiswa (nim,nama,kelas,semester ) VALUES ( ?,?,?,?)";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        echo "<script>window.location='index.php';</script>";

    }

    if(!empty($_GET['aksi'] == "edit")) {
        $id =  (int)$_GET["id"];
        $data[] =  $_POST["nim"];
        $data[] =  $_POST["nama"];
        $data[] =  $_POST["kelas"];
        $data[] =  $_POST["semester"];

        $data[] = $id;
        $sql = "UPDATE mahasiswa SET nim = ?, nama = ?, kelas = ?, semester = ?  WHERE id = ? ";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        echo "<script>window.location='index.php';</script>";

    }

    if(!empty($_GET['aksi'] == "hapus")) {

        $id =  (int)$_GET["id"]; // should be integer (id)
        $sql = "SELECT * FROM mahasiswa WHERE id = ?";
        $row = $koneksi->prepare($sql);
        $row->execute(array($id));
        $cek = $row->rowCount();
        if($cek > 0)
        {
            $sql_delete = "DELETE FROM mahasiswa WHERE id = ?";
            $row_delete = $koneksi->prepare($sql_delete);
            $row_delete->execute(array($id));
            echo "<script>window.location='index.php';</script>";
        }else{
            echo "<script>window.location='index.php';</script>";
        }
    }

    if(!empty($_GET['aksi'] == 'logout'))
    {
        session_destroy();
        echo "<script>window.location='login.php?signout=success';</script>";
    }