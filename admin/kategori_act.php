<?php 
include '../koneksi.php';
$kategori  = $_POST['kategori'];
$kategori_oke  = $_POST['kategori'];

mysqli_query($koneksi, "insert into kategori values (NULL,'$kategori','$kategori_oke')");
header("location:kategori.php");