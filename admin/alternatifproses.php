<?php
    include 'header.php';
    if(isset($_GET['proses'])) {
        if($_GET['proses']=='prosestambah') { 
        $kode_alternatif=$_POST['kode_alternatif'];
        $nik_alternatif=$_POST['nik_alternatif'];
        $nama_alternatif=$_POST['nama_alternatif'];

        $sql = "INSERT INTO tbl_alternatif (kode_alternatif, nama_alternatif, nik_alternatif) VALUES ('$kode_alternatif', '$nama_alternatif', '$nik_alternatif')";

        if ($connect->query($sql) === TRUE) {
            header("location:alternatif.php");
        }
        }elseif($_GET['proses']=='prosesubah'){
            $kode_alternatif=$_POST['kode_alternatif'];
            $nik_alternatif=$_POST['nik_alternatif'];
            $nama_alternatif=$_POST['nama_alternatif'];

            $sql = "UPDATE tbl_alternatif set nama_alternatif='$nama_alternatif', nik_alternatif='$nik_alternatif' WHERE kode_alternatif='$kode_alternatif'";

            if ($connect->query($sql) === TRUE) {
                header("location:alternatif.php");
            }
        }elseif($_GET['proses']=='proseshapus'){
            $kode_alternatif=$_GET['kode_alternatif'];

            $sql = "DELETE from tbl_alternatif WHERE kode_alternatif='$kode_alternatif'";
            if ($connect->query($sql) === TRUE) {
                header("location:alternatif.php");
            }
        }
    }
?>
