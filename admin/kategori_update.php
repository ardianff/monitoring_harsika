<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$kategori  = $_POST['kategori'];
$kategori_oke  = $_POST['kategori'];

mysqli_query($koneksi, "update kategori set kategori='$kategori',kategori_oke='$kategori_oke' where kategori_id='$id'");
header("location:kategori.php");