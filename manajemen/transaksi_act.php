<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$jenis  = $_POST['jenis'];
$kategori  = $_POST['kategori'];
$nominal  = $_POST['nominal'];
$keterangan  = $_POST['keterangan'];
$bank  = $_POST['bank'];
$file = upload();
if( !$file){
	return false;
}

$rekening = mysqli_query($koneksi,"select * from bank where bank_id='$bank'");
$r = mysqli_fetch_assoc($rekening);

if($jenis == "Pemasukan"){

	$saldo_sekarang = $r['bank_saldo'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

}elseif($jenis == "Pengeluaran"){

	$saldo_sekarang = $r['bank_saldo'];
	$total = $saldo_sekarang-$nominal;
	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

}


mysqli_query($koneksi, "insert into transaksi values (NULL,'$tanggal','$jenis','$kategori','$nominal','$keterangan','$bank','$file')")or die(mysqli_error($koneksi));
function upload (){
	$namaFile = $_FILES['file']['name'];
	$ukuranFile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpName = $_FILES['file']['tmp_name'];

	if( $error === 4){
		echo "<script> alert('pilih gambar terlebih dahulu!')	</script>";
		return false;
	}
	$ekstensiGambarValid = ['jpg','jpeg','png','webp','jfif','gif','pdf'];
	$ektensiGambar = explode('.', $namaFile);
	$ektensiGambar = strtolower(end($ektensiGambar));
	if( !in_array($ektensiGambar, $ekstensiGambarValid)){
		echo "<script> alert('Yang Anda Upload Bukan Gambar!')	</script>";
		return false;
	}
	if($ukuranFile > 1000000){
		echo "<script> alert('Ukuran Gambar Terlalu Besar!')	</script>";
		return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;
	move_uploaded_file($tmpName, '../gambar/upload/' . $namaFileBaru);

	return $namaFileBaru;
}
header("location:transaksi.php");