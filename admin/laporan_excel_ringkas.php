<!DOCTYPE html>
 <html>
 <head>
	 <title>Laporan Aplikasi Keuangan</title>
 </head>
 <body>
 <style type="text/css">
	body{
		font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 <?php
 $bulan = $_GET['bulan'];
 $tahun = $_GET['tahun'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Keuangan Harsika Bulan $bulan $tahun.xls");
	?>
 	<?php 
 	include '../koneksi.php';
 	if (isset($_GET['bulan']) && isset($_GET['tahun']) && isset($_GET['kategori'])) {
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];
		$kategori = $_GET['kategori']; ?>
        <center>
         <h2><b>LAPORAN KEUANGAN HARSIKA</b></h2>
         <div>BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?></div>
         <div>KATEGORI : <?php 
 							if($kategori == "semua"){
 								echo "SEMUA KATEGORI";
 							}else{
 								$k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['kategori'];
 							}
 							?></div>
         
     </center>
     <br>
 		

 		<div class="table-responsive">
 			<table border="1">
			 <thead>
                    <tr>
                      <th width="1%" rowspan="2">NO</th>
                      <th width="15%"rowspan="2" class="text-center">KATEGORI</th>
                      <th colspan="2" class="text-center">JENIS</th>
                    </tr>
                    <tr>
                      <th width="12%" class="text-center">PEMASUKAN</th>
                      <th width="12%" class="text-center">PENGELUARAN</th>
                    </tr>
                  </thead>
 				<tbody>
 					<?php 
 					
					 include '../koneksi.php';
					 $no=1;
					 $total_pemasukan=0;
					 $total_pengeluaran=0;
					 $total_pem=0;
					 $total_peng=0;
	 
					 if ($kategori == "semua") {
						$data = mysqli_query($koneksi, "SELECT MONTHNAME(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun, transaksi_kategori,kategori_id,kategori,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND MONTHNAME(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY Bulan,Tahun, transaksi_kategori,transaksi_jenis");
					}
					else {
						$data = mysqli_query($koneksi, "SELECT MONTHNAME(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun, transaksi_kategori,kategori_id,kategori,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND kategori_id='$kategori'  AND MONTHNAME(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY Bulan,Tahun, transaksi_kategori,transaksi_jenis");
					}
					while ($d = mysqli_fetch_array($data)) {
						if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
							$total_pemasukan += $d['total_nominal'];
						}
						else if ($d['transaksi_jenis'] == "Pemasukan") {
							$total_pemasukan += $d['total_nominal'];
						} else if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
							$total_pengeluaran += $d['total_nominal'];
						} else if ($d['transaksi_jenis'] == "Pengeluaran") {
							$total_pengeluaran += $d['total_nominal'];
						}
					$saldo_awal = $total_pemasukan-$total_pengeluaran;
						
					   
					 ?>
						   <tr>
							 <td class="text-center"><?php echo $no++; ?></td>
							 <td ><?php echo $d['kategori']; ?></td>
							 <td class="text-center">
                          <?php
                          if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
                            echo "Rp. ".number_format($d['total_nominal'])." ,-";
                        }
                          else if ($d['transaksi_jenis'] == "Pemasukan") {
                              echo "Rp. ".number_format($d['total_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
                        <td class="text-center">
                          <?php
                          if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
                              echo "Rp. ".number_format($d['total_nominal'])." ,-";
                          }
                          else if ($d['transaksi_jenis'] == "Pengeluaran") {
                              echo "Rp. ".number_format($d['total_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
						   </tr>
						   <?php
						 } ?>
						 <tr>
						   <th colspan="2" class="text-right">TOTAL</th>
						   <td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_pemasukan)." ,-"; ?></td>
						   <td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
						 </tr>
						 <!-- <tr>
						   <th colspan="4" class="text-right">SALDO SEKARANG</th>
						   <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-"; ?></td>
						 </tr> -->
					   </tbody>
						</table>
						<div id="lead">
                <p id="title">HARSIKA CAFE</p>
                <div style="height: 60px;"></div>
                <div class="lead">Rachmadina Jayani S</div>
                <div id="title">General Manager</div>
            </div>
				   </div>
	 
				   <?php
					 
				 }else{
				   ?>
	 
				   <div class="alert alert-info text-center">
					 Silahkan Filter Laporan Terlebih Dulu.
				   </div>
	 
				   <?php
				 }
				 ?>
 </body>
 </html>
