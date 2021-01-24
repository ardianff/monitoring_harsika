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
  font-size: 14px;
}
 
table th {
  padding: 10px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
  font-size: 14px;
  color: #000;
}
 
table th:first-child{  
  border-left:none;  
  font-size: 14px;
  color: #000;
}
 
table tr {
  text-align: center;
  padding-left: auto;
  font-size: 14px;
  color: #000;
}
 
table td:first-child {
  text-align: left;
  padding-left: auto;
  border-left: 0;
  font-size: 14px;
  color: #000;
}
 
table td {
  padding: 10px 40px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
  font-size: 14px;
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
  font-size: 14px;
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
  font-size: 14px;
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
  font-size: 14px;
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
  font-size: 14px;
  color: #000;
}
    </style>
    
  </head>
  <body>
  <?php 
            if (isset($_GET['bulan']) && isset($_GET['tahun']) && isset($_GET['kategori'])) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $kategori = $_GET['kategori']; ?>
    <div id="gambar">
     <img src="../gambar/sistem/asset.png" width= "100px" height= "100px">
     </div>
		 <h5 style="text-align:center"><b>HARSIKA CAFE</b><br>harsikacafe@gmail.com<br>Jl. Tegalsari Sendang I No. 73, Semarang, Jawa Tengah</h5>
     <h5 style="text-align:center"><b>LAPORAN LABA/RUGI<br><?php  if ($bulan==1) {
                        echo 'JANUARI';
                      }else if ($bulan==2) {
                        echo 'FEBRUARI';
                      }else if ($bulan==3) {
                        echo 'MARET';
                      }else if ($bulan==4) {
                        echo 'APRIL';
                      }else if ($bulan==5) {
                        echo 'MEI';
                      }else if ($bulan==6) {
                        echo 'JUNI';
                      }else if ($bulan==7) {
                        echo 'JULI';
                      }else if ($bulan==8) {
                        echo 'AGUSTUS';
                      }else if ($bulan==9) {
                        echo 'SEPTEMBER';
                      }else if ($bulan==10) {
                        echo 'OKTOBER';
                      }else if ($bulan==11) {
                        echo 'NOVEMBER';
                      }else if ($bulan==12) {
                        echo 'DESEMBER';
                      } ?> <?php echo $tahun; ?></b></h5>
 		<div class="row">
 			<div class="col-lg-6">
            <!-- <p align="left">BULAN : <?php echo $bulan; ?> <?php echo $tahun; ?></p> -->
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
     <div >
    <table cellspasing="0">
    <thead>
          <tr>
                        <th width="1px" rowspan="2"><b>NO</b></th>
                        <th rowspan="2" width="30%" class="text-center"><b>KATEGORI</b></th>
                        <th colspan="2" class="text-center"><b>JENIS</b></th>
                      </tr>
                      <tr>
                        <th width="30%" class="text-center"><b>PEMASUKAN</b></th>
                        <th width="30%" class="text-center"><b>PENGELUARAN</b></th>
                      </tr>
          </thead>
          <tbody>
          <?php 
            $no=1;
            $total_pemasukan=0;
            $total_pengeluaran=0;
            $total_pem=0;
            $total_peng=0;

            if ($kategori == "semua") {
              $data = mysqli_query($koneksi, "SELECT MONTH(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun,kategori_oke,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND MONTH(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' AND transaksi_jenis LIKE '%n' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY `transaksi`.`transaksi_jenis` DESC");
          }
          else {                 
            $data = mysqli_query($koneksi, "SELECT MONTH(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun,kategori_oke,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND kategori_id='$kategori' AND MONTH(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' AND transaksi_jenis LIKE '%n' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY `transaksi`.`transaksi_jenis` DESC"); 
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
                        <td ><?php echo $d['kategori_oke']; ?></td>
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
                  <th colspan="2" class="text-center">TOTAL</th>
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
                <p id="title"><b>HARSIKA CAFE</b></p>
                <div class="lead"><img src="../gambar/sistem/ttd-harsika.png" width= "100px" height= "100px"><br><b>Rachmadina Jayani S.</b>
                </div>
                <div id="title"><i>General Manager</i></div>
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
$mpdf->Output("".$nama_dokumen." bulan $bulan $tahun.pdf" ,'D');
exit();
?>

