<!DOCTYPE html>
 <html>
 <head>
	 <title>Laporan Aplikasi Keuangan</title>
 </head>
 <body>
 <style type="text/css">
	body{
		font-family: sans-serif;
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
 $tgl_dari = $_GET['tanggal_dari'];
 $tgl_sampai = $_GET['tanggal_sampai'];
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Keuangan Harsika $tgl_dari sampai $tgl_sampai.xls");
	?>
 	<?php 
 	include '../koneksi.php';
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		$kategori = $_GET['kategori'];
         ?>
          	<center>
         <h2><b>LAPORAN KEUANGAN HARSIKA</b></h2>
         <div>DARI TANGGAL <?php echo date('d-m-Y',strtotime($tgl_dari)); ?> SAMPAI TANGGAL <?php echo date('d-m-Y',strtotime($tgl_sampai)); ?></div>
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
                      <th width="10px" rowspan="2">NO</th>
                      <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                      <th rowspan="2" class="text-center">KATEGORI</th>
                      <th rowspan="2" class="text-center">KETERANGAN</th>
                      <th colspan="2" class="text-center">JENIS</th>
                      <th width="12%" rowspan="2" class="text-center">SALDO</th>
                    </tr>
                    <tr>
                      <th width="12%" class="text-center">PEMASUKAN</th>
                      <th width="12%" class="text-center">PENGELUARAN</th>
                    </tr>
					 
 				</thead>
 				<tbody>
 					<?php 
 					
 					$no=1;
 					$total_pemasukan=0;
 					$total_pengeluaran=0;
 if ($kategori == "semua") {
                    $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai' ORDER BY transaksi.transaksi_tanggal ASC ");
                } else {
                    $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori where kategori_id=transaksi_kategori and kategori_id='$kategori' and date(transaksi_tanggal)>='$tgl_dari' and date(transaksi_tanggal)<='$tgl_sampai' ORDER BY transaksi.transaksi_tanggal ASC ");
                }
 					while($d = mysqli_fetch_array($data)){

						if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
							$total_pemasukan += $d['transaksi_nominal'];
						}
						else if ($d['transaksi_jenis'] == "Pemasukan") {
							$total_pemasukan += $d['transaksi_nominal'];
						} else if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
							$total_pengeluaran += $d['transaksi_nominal'];
						} else if ($d['transaksi_jenis'] == "Pengeluaran") {
							$total_pengeluaran += $d['transaksi_nominal'];
						}
						 $saldo = $total_pemasukan-$total_pengeluaran;
 						?>
 						<tr>
 							<td class="text-center" style="text-align:center"><?php echo $no++; ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
 							<td><?php echo $d['kategori']; ?></td>
 							<td><?php echo $d['transaksi_keterangan']; ?></td>
							 <td class="text-center">
                          <?php
                          if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
                            echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                        }
                          else if ($d['transaksi_jenis'] == "Pemasukan") {
                              echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
                        <td class="text-center">
                          <?php
                          if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
                              echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          }
                          else if ($d['transaksi_jenis'] == "Pengeluaran") {
                              echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
							 <td><?php echo "Rp. ".number_format($saldo)." ,-";?></td>
 						</tr>
 						<?php 
 					}
 					?>
 					<tr>
 						<th colspan="4" class="text-right">TOTAL</th>
 						<td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_pemasukan)." ,-"; ?></td>
 						<td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
 					</tr>
 					<!-- <tr>
 						<th colspan="4" class="text-right">SALDO</th>
 						<td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pemasukan - $total_pengeluaran)." ,-"; ?></td>
 					</tr> -->
 				</tbody>
			 </table>
			 <div id="lead">
                <p id="title"><b>HARSIKA CAFE</b></p>
                <div style="height: 60px;"></div>
                <div class="lead"><b>Rachmadina Jayani S</b></div>
                <div id="title"><b>General Manager</b></div>
            </div>
     </div>
			 <br>
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
