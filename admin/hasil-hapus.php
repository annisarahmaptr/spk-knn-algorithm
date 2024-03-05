<?php
include 'header.php';
$kode_hasil=$_GET['kode_hasil'];
$sql =mysqli_query($connect, "DELETE from tbl_hasil WHERE kode_hasil='$kode_hasil'");
header("location:hasil.php");
?>         