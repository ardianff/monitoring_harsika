<?php 
include '../koneksi.php';
$id  = $_POST['id'];
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

$transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id='$id'");
$t = mysqli_fetch_assoc($transaksi);
$bank_lama = $t['transaksi_bank'];

$rekening = mysqli_query($koneksi,"select * from bank where bank_id='$bank_lama'");
$r = mysqli_fetch_assoc($rekening);

// Kembalikan nominal ke saldo bank lama

if($t['transaksi_jenis'] == "Pemasukan"){
	$kembalikan = $r['bank_saldo'] - $t['transaksi_nominal'];
	mysqli_query($koneksi,"update bank set bank_saldo='$kembalikan' where bank_id='$bank_lama'");

}else if($t['transaksi_jenis'] == "Pengeluaran"){
	$kembalikan = $r['bank_saldo'] + $t['transaksi_nominal'];
	mysqli_query($koneksi,"update bank set bank_saldo='$kembalikan' where bank_id='$bank_lama'");

}


if($jenis == "Pemasukan"){

	$rekening2 = mysqli_query($koneksi,"select * from bank where bank_id='$bank'");
	$rr = mysqli_fetch_assoc($rekening2);
	$saldo_sekarang = $rr['bank_saldo'];
	$total = $saldo_sekarang+$nominal;
	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

}elseif($jenis == "Pengeluaran"){

	$rekening2 = mysqli_query($koneksi,"select * from bank where bank_id='$bank'");
	$rr = mysqli_fetch_assoc($rekening2);
	$saldo_sekarang = $rr['bank_saldo'];
	$total = $saldo_sekarang-$nominal;
	mysqli_query($koneksi,"update bank set bank_saldo='$total' where bank_id='$bank'");

}	

mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', transaksi_jenis='$jenis', transaksi_kategori='$kategori', transaksi_nominal='$nominal', transaksi_keterangan='$keterangan', transaksi_bank='$bank', file_transaksi='$file' where transaksi_id='$id'") or die(mysqli_error($koneksi));
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