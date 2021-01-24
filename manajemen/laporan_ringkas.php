<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN RINGKAS 
      <small>Data Laporan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="laporan_ringkas.php"><i class="active"></i>Laporan</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Bulan</label>
                    <br>
                    <select value="<?php if(isset($_GET['bulan'])){echo $_GET['bulan'];}else{echo "";} ?>" name="bulan">
                    <option value=1>Januari</option>
                    <option value=2>Februari</option>
                    <option value=3>Maret</option>
                    <option value=4>April</option>
                    <option value=5>Mei</option>
                    <option value=6>Juni</option>
                    <option value=7>Juli</option>
                    <option value=8>Agustus</option>
                    <option value=9>September</option>
                    <option value=10>Oktober</option>
                    <option value=11>November</option>
                    <option value=12>Desember</option>
                    </select>
                    <select value="<?php if(isset($_GET['tahun'])){echo $_GET['tahun'];}else{echo "";} ?>" name="tahun">
                    <?php
                    $mulai= date('Y') - 1;
                    for($i = $mulai;$i<$mulai + 5;$i++){
                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                    }
                    ?>
                    </select>
                  </div>

                </div>
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required="required">
                      <option value="semua">Semua Kategori</option>
                      <?php 
                      $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                      while($k = mysqli_fetch_array($kategori)){
                        ?>
                        <option <?php if(isset($_GET['kategori'])){ if($_GET['kategori'] == $k['kategori_id']){echo "selected='selected'";}} ?>  value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori']; ?></option>
                        <?php 
                      }
                      ?> 
                    </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pemasukan & Pengeluaran</h3>
          </div>
          <div class="box-body">

            <?php 
            if (isset($_GET['bulan']) && isset($_GET['tahun']) && isset($_GET['kategori'])) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $kategori = $_GET['kategori']; ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">Bulan</th>
                      <th width="1%">:</th>
                      <td><?php  if ($bulan==1) {
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
                      } ?></td>
                    </tr>
                    <tr>
                      <th width="30%">Tahun</th>
                      <th width="1%">:</th>
                      <td><?php echo $tahun; ?></td>
                    </tr>
                    <tr>
                      <th>KATEGORI</th>
                      <th>:</th>
                      <td>
                        <?php
                        if ($kategori == "semua") {
                            echo "SEMUA KATEGORI";
                        } 
                        else {
                            $k = mysqli_query($koneksi, "select * from kategori where kategori_id='$kategori'");
                            $kk = mysqli_fetch_assoc($k);
                            echo $kk['kategori'];
                        } 
                        ?>

                      </td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <a href="laporan_pdf_ringkas.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>&kategori=<?php echo $kategori ?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf-o"></i> &nbsp PDF</a>
              <!-- <a href="laporan_excel_ringkas.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>&kategori=<?php echo $kategori ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-excel-o"></i> &nbsp EXCEL</a> -->
              <a href="laporan_print_ringkas.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun ?>&kategori=<?php echo $kategori ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
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
                $saldo=0;
                $saldo_awal=0;

 if ($kategori == "semua") {
                    $data = mysqli_query($koneksi, "SELECT MONTH(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun,kategori_oke,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND MONTH(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' AND transaksi_jenis LIKE '%n' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY `transaksi`.`transaksi_jenis` DESC");
                }
                else {                 
                  $data = mysqli_query($koneksi, "SELECT MONTH(transaksi_tanggal) AS Bulan, YEAR(transaksi_tanggal) AS Tahun,kategori_oke,transaksi_jenis, SUM(transaksi_nominal) AS total_nominal FROM transaksi,kategori WHERE kategori_id=transaksi_kategori AND kategori_id='$kategori' AND MONTH(transaksi_tanggal)='$bulan' AND YEAR(transaksi_tanggal)='$tahun' AND transaksi_jenis LIKE '%n' GROUP BY MONTHNAME(transaksi_tanggal), YEAR(transaksi_tanggal), transaksi_kategori ORDER BY `transaksi`.`transaksi_jenis` DESC"); 
                }
                while ($d = mysqli_fetch_array($data)) {
                //   if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
                //     $total_pemasukan += $d['total_nominal'];
                // }
                //else 
                if ($d['transaksi_jenis'] == "Pemasukan") {
                    $total_pemasukan += $d['total_nominal'];
                } 
                // else if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
                //     $total_pengeluaran += $d['total_nominal'];
                // } 
                else if ($d['transaksi_jenis'] == "Pengeluaran") {
                    $total_pengeluaran += $d['total_nominal'];
                }
                $saldo_awal = $total_pemasukan-$total_pengeluaran;
                    
                   
                 ?>
                 <!-- <p >Saldo Bulan Lalu -><?php echo "Rp. ".number_format($saldo_awal)." ,-"; ?></p> -->
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td ><?php echo $d['kategori_oke']; ?></td>
                        <td class="text-center">
                          <?php
                        //   if ($d['transaksi_jenis'] == "Pemindahan Masuk") {
                        //     echo "Rp. ".number_format($d['total_nominal'])." ,-";
                        // }
                           if ($d['transaksi_jenis'] == "Pemasukan") {
                              echo "Rp. ".number_format($d['total_nominal'])." ,-";
                          } else {
                              echo "-";
                          } ?>
                        </td>
                        <td class="text-center">
                          <?php
                          // if ($d['transaksi_jenis'] == "Pemindahan Keluar") {
                          //     echo "Rp. ".number_format($d['total_nominal'])." ,-";
                          // }
                           if ($d['transaksi_jenis'] == "Pengeluaran") {
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
                      <th colspan="2" class="text-right">SALDO Bulan Lalu</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($saldo_awal)." ,-"; ?></td>
                    </tr> -->
                  </tbody>
                </table>



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

          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>