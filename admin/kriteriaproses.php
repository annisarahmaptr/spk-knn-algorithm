<?php
    include 'header.php';
    if(isset($_GET['proses'])) {
        if($_GET['proses']=='prosestambah') { 
        $kode_kriteria=$_POST['kode_kriteria'];
        $nama_kriteria=$_POST['nama_kriteria'];
        $keterangan=$_POST['keterangan'];

        $sql = "INSERT INTO tbl_kriteria (kode_kriteria, nama_kriteria, keterangan) VALUES ('$kode_kriteria', '$nama_kriteria', '$keterangan')";

        if ($connect->query($sql) === TRUE) {
            header("location:kriteria.php");
        }
        }elseif($_GET['proses']=='prosesubah'){
            $kode_kriteria=$_POST['kode_kriteria'];
            $nama_kriteria=$_POST['nama_kriteria'];
            $keterangan=$_POST['keterangan'];

            $sql = "UPDATE tbl_kriteria set nama_kriteria='$nama_kriteria', keterangan='$keterangan' WHERE kode_kriteria='$kode_kriteria'";

            if ($connect->query($sql) === TRUE) {
                header("location:kriteria.php");
            }
        }elseif($_GET['proses']=='proseshapus'){
            $kode_kriteria=$_GET['kode_kriteria'];

            $sql = "DELETE from tbl_kriteria WHERE kode_kriteria='$kode_kriteria'";
            $sql = "DELETE from tbl_subkriteria WHERE kode_kriteria='$kode_kriteria'";
            if ($connect->query($sql) === TRUE) {
                header("location:kriteria.php");
            }
        }
    }
?>
