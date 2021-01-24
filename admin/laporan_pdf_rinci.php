<?php
include '../koneksi.php'; 
require_once __DIR__ ."/mpdf/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
$nama_dokumen='laporan keuangan harsika';
ob_start();
?>
<!DOCTYPE html>
<html lang="id">
  <head>
  <style type="text/css">
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
                font-size: 14px;
                font-family: 'Inter';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
                
            }#title{
                font-weight: bold;
                font-size: 14px;
                font-family: 'Inter';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            .lead {
                font-weight: bold;
                font-size: 14px;
                font-family: 'Inter';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
                unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
            }
            #gambar {
              text-align: center;
          }
          .h1.h4{
            font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
      }
      
table {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
  font-size: 20px;
}
 
table th {
  padding: 30px 50px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
  font-size: 30px;
  color: #000;
}
 
table th:first-child{  
  border-left:none;  
  font-size: 30px;
  color: #000;
}
 
table tr {
  text-align: center;
  padding-left: auto;
  font-size: 30px;
  color: #000;
}
 
table td:first-child {
  text-align: left;
  padding-left: auto;
  border-left: 0;
  font-size: 30px;
  color: #000;
}
 
table td {
  padding: 30px 50px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
  font-size: 30px;
  color: #000;
}
 
table tr:last-child td {
  border-bottom: 0;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  font-size: 30px;
  color: #000;
}
 
table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  font-size: 30px;
  color: #000;
}
 
table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  font-size: 30px;
  color: #000;
}
 
table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/inter/v2/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuOKfAZJhiI2B.woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
  font-size: 30px;
  color: #000;
}
    </style>
  </head>
  <body>
	<?php 
 	include '../koneksi.php';
 	if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['kategori'])){
 		$tgl_dari = $_GET['tanggal_dari'];
 		$tgl_sampai = $_GET['tanggal_sampai'];
 		$kategori = $_GET['kategori'];
 		?>
 	<center>
	 <div id="gambar">
     <img src="../gambar/sistem/asset.png" width= "100px" height= "100px">
     </div>
		 <h5 style="text-align:center"><b>HARSIKA CAFE</b><br>harsikacafe@gmail.com<br>Jl. Tegalsari Sendang I No. 73, Semarang, Jawa Tengah</h5>
     <h5 style="text-align:center"><b>LAPORAN LABA/RUGI<br>TANGGAL <?php echo $tgl_dari?> - <?php echo $tgl_sampai?></b></h5>
 	</center>
	 <div class="row">
                <div class="col-lg-6">
                <h5 align="left">KATEGORI : <?php 
            		if($kategori == "semua"){
 								echo "SEMUA KATEGORI";
 							}else{
 								$k = mysqli_query($koneksi,"select * from kategori where kategori_id='$kategori'");
 								$kk = mysqli_fetch_assoc($k);
 								echo $kk['kategori'];
 							}
 							?></h5>      
                </div>
              </div>
    <table cellspasing="0">
          <thead>
          <tr>
                        <th width="10px" rowspan="2" style="color: #000;font-size:30px"><b>NO</b></th>
                        <th width="10%" rowspan="2" class="text-center" style="color: #000;font-size:30px"><b>TANGGAL</b></th>
                        <th rowspan="2" class="text-center" width="10%" style="color: #000;font-size:30px"><b>KATEGORI</b></th>
                        <th rowspan="2" class="text-center" width="20%" style="color: #000;font-size:30px"><b>KETERANGAN</b></th>
                        <th colspan="2" class="text-center" style="color: #000;font-size:30px"><b>JENIS</b></th>
                      </tr>
                      <tr>
                        <th width="15%" class="text-center" style="color: #000;font-size:30px"><b>PEMASUKAN</b></th>
                        <th width="15%" class="text-center" style="color: #000;font-size:30px"><b>PENGELUARAN</b></th>
                      </tr>
          </thead>
          <tbody>
          <?php 
            $no=1;
            $total_pemasukan=0;
            $total_pengeluaran=0;
            if ($kategori == "semua") {
              $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori WHERE (date(transaksi_tanggal) BETWEEN '$tgl_dari' AND '$tgl_sampai') AND kategori_id=transaksi_kategori AND transaksi_jenis LIKE '%n' ORDER BY transaksi.transaksi_tanggal ASC");
          }
          else {
              $data = mysqli_query($koneksi, "SELECT * FROM transaksi,kategori WHERE (date(transaksi_tanggal) BETWEEN '$tgl_dari' AND '$tgl_sampai') AND kategori_id=transaksi_kategori AND kategori_id='$kategori' AND transaksi_jenis LIKE '%n' ORDER BY transaksi.transaksi_tanggal ASC ");
          }
            while($d = mysqli_fetch_array($data)){

            //   if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
            //     $total_pemasukan += $d['transaksi_nominal'];
            // }
             if ($d['transaksi_jenis'] == "Pemasukan") {
                $total_pemasukan += $d['transaksi_nominal'];
            }
            //  else if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
            //     $total_pengeluaran += $d['transaksi_nominal'];
            // } 
            else if ($d['transaksi_jenis'] == "Pengeluaran") {
                $total_pengeluaran += $d['transaksi_nominal'];
            }
              $saldo = $total_pemasukan-$total_pengeluaran;
              ?>
              <tr>
                <td class="text-center" style="text-align:center;color: #000;font-size: 30px;"><?php echo $no++; ?></td>
                <td class="text-center" style="color: #000;font-size: 30px;"><?php echo date('d-m-Y', strtotime($d['transaksi_tanggal'])); ?></td>
                <td style="color: #000;font-size: 30px;"><?php echo $d['kategori_oke']; ?></td>
                <td style="color: #000;font-size: 30px;"><?php echo $d['transaksi_keterangan']; ?></td>
                <td class="text-center" style="color: #000;font-size: 30px;">
                          <?php
                        //   if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
                        //     echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                        // }
                           if ($d['transaksi_jenis'] == "Pemasukan") {
                              echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
                        <td class="text-center"style="color: #000;font-size: 30px;" >
                          <?php
                          // if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
                          //     echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          // }
                           if ($d['transaksi_jenis'] == "Pengeluaran") {
                              echo "Rp. ".number_format($d['transaksi_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
                <!-- <td><?php echo "Rp. ".number_format($saldo)." ,-";?></td> -->
              </tr>
              <?php 
            }
            ?>
            <tr>
              <th colspan="4" class="text-right" style="color: #000; font-size:30px;">TOTAL</th>
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
                <div class="lead"><img src="../gambar/sistem/ttd-harsika.png" width= "100px" height= "100px"><br><b>Rachmadina Jayani S.</b><br><i>General Manager</i>
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
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen." $tgl_dari sampai $tgl_sampai.pdf" ,'D');
exit();
?>

