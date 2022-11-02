<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inferensi</h1>
    <form class="" action="" method="post">
      <!-- <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button> -->
      <button class="btn btn-warning" type="submit" name="defuzzy">Hitung Defuzzy</button>
    </form>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="alternatif.php">Alternatif</a></li>
      <li class="breadcrumb-item"><a href="membership.php">Membership</a></li>

      <li class="breadcrumb-item active" aria-current="page">Inferensi</li>
    </ol>
  </nav>

  <!-- modal input  -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Variabel Kelayakan Harga</h6>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Alternatif</th>
              <th>Variabel Harga</th>
              <th>Variabel Penghasilan</th>
              <th>Evaluasi Penilaian</th>
              <th>AlphaPredikat</th>
              <th>Z Predikat</th>





            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php

            // echo "|$ht";
            // echo "|$pk"; 


            $sql = "SELECT mobil.id, alternatif.id_user, alternatif.id_mobil, mobil.type, alternatif.harga,alternatif.penghasilan FROM mobil
              JOIN alternatif ON (alternatif.id_mobil = mobil.id)
              WHERE id_user = '$id'
              ORDER BY alternatif.id ASC";

            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>

              <?php $hk = miuKecil($alternatif['harga'], $batasHarga); ?>
              <?php $hs = miuSedang($alternatif['harga'], $batasHarga); ?>
              <?php $ht = miuTinggi($alternatif['harga'], $batasHarga); ?>


              <?php $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?>
              <?php $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?>
              <?php $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?>

              <?php $kh1 = min($ht, $pk); ?>
              <?php $kh2 = min($ht, $ps); ?>
              <?php $kh3 = min($ht, $pt); ?>
              <?php $kh4 = min($hs, $pk); ?>
              <?php $kh5 = min($hs, $ps); ?>
              <?php $kh6 = min($hs, $pt);  ?>
              <?php $kh7 = min($hk, $pk); ?>
              <?php $kh8 = min($hk, $ps); ?>
              <?php $kh9 = min($hk, $pt); ?>

              <!-- tampilkan data -->
              <tr>
                <td rowspan="9"><?= $no++; ?></td>
                <td rowspan="9"><?= $alternatif['type']; ?></td>
                <td><?= "Mahal"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Kurang Mampu"; ?></td>
                <td><?= $kh1 ?></td>
                <td><?= $zPredikatkh1 = zPredikat($kh1); ?></td>
              </tr>
              <tr>

                <td><?= "Mahal"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Kurang Mampu"; ?></td>
                <td><?= $kh2 ?></td>
                <td><?= $zPredikatkh2 = zPredikat($kh2); ?></td>
              </tr>
              <tr>

                <td><?= "Mahal"; ?></td>
                <td><?= "Tinggi"; ?></td>
                <td><?= "Kurang Mampu"; ?></td>
                <td><?= $kh3 ?></td>
                <td><?= $zPredikatkh4 = zPredikat($kh3); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Mampu"; ?></td>
                <td><?= $kh4 ?></td>
                <td><?= $zPredikatkh4 = zPredikat($kh4); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Mampu"; ?></td>
                <td><?= $kh5 ?></td>
                <td><?= $zPredikatkh5 = zPredikat($kh5); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Sangat Mampu"; ?></td>
                <td><?= $kh6 ?></td>
                <td><?= $zPredikatkh6 = zPredikat($kh6); ?></td>
              </tr>
              <tr>

                <td><?= "Murah"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Sangat Mampu"; ?></td>
                <td><?= $kh7 ?></td>
                <td><?= $zPredikatkh7 = zPredikat($kh7); ?></td>
              </tr>
              <tr>

                <td><?= "Murah"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Sangat Mampu"; ?></td>
                <td><?= $kh8 ?></td>
                <td><?= $zPredikatkh8 = zPredikat($kh8); ?></td>
              </tr>
              <tr>

                <td><?= "Mahal"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Sangat Mampu"; ?></td>
                <td><?= $kh9 ?></td>
                <td><?= $zPredikatkh9 = zPredikat($kh9);  ?></td>
              </tr>
            <?php } ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Variabel Kelayakan Bbm</h6>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Alternatif</th>
              <th>Variabel Bbm</th>
              <th>Variabel Mesin</th>
              <th>Evaluasi Penilaian</th>
              <th>AlphaPredikat</th>
              <th>Z Predikat</th>





            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php



            $sql = "SELECT mobil.id, alternatif.id_user, alternatif.id_mobil, mobil.type, alternatif.bbm,alternatif.mesin FROM mobil
              JOIN alternatif ON (alternatif.id_mobil = mobil.id)
              WHERE id_user = '$id'
              ORDER BY alternatif.id ASC";

            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>
              <?php $bk = miuKecil($alternatif['bbm'], $batasBbm); ?>
              <?php $bs = miuSedang($alternatif['bbm'], $batasBbm); ?>
              <?php $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?>

              <?php $mk = miuKecil($alternatif['mesin'], $batasMesin); ?>
              <?php $ms = miuSedang($alternatif['mesin'], $batasMesin); ?>
              <?php $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?>

              <!-- tampilkan data -->
              <tr>
                <td rowspan="9"><?= $no++; ?></td>
                <td rowspan="9"><?= $alternatif['type']; ?></td>
                <td><?= "Boros"; ?></td>
                <td><?= "Tinggi"; ?></td>
                <td><?= "Kurang Efisien"; ?></td>
                <td><?= $eb1 = min($bk, $mt); ?></td>
                <td><?= $zPredikateb1 = zPredikat($eb1); ?></td>
              </tr>
              <tr>

                <td><?= "Boros"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Kurang Efisien"; ?></td>
                <td><?= $eb2 = min($bk, $ms); ?></td>
                <td><?= $zPredikateb2 = zPredikat($eb2); ?></td>
              </tr>
              <tr>

                <td><?= "Boros"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Kurang Efisien"; ?></td>
                <td><?= $eb3 = min($bk, $mk); ?></td>
                <td><?= $zPredikateb4 = zPredikat($eb3); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Tinggi"; ?></td>
                <td><?= "Efisien"; ?></td>
                <td><?= $eb4 = min($bs, $mt); ?></td>
                <td><?= $zPredikateb4 = zPredikat($eb4); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Efisien"; ?></td>
                <td><?= $eb5 = min($bs, $ms); ?></td>
                <td><?= $zPredikateb5 = zPredikat($eb5); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Kurang Efisien"; ?></td>
                <td><?= $eb6 = min($bs, $mk); ?></td>
                <td><?= $zPredikateb6 = zPredikat($eb6); ?></td>
              </tr>
              <tr>

                <td><?= "Irit"; ?></td>
                <td><?= "Tinggi"; ?></td>
                <td><?= "Sangat Efisien"; ?></td>

                <td><?= $eb7 = min($bt, $mt); ?></td>
                <td><?= $zPredikateb7 = zPredikat($eb7); ?></td>
              </tr>
              <tr>

                <td><?= "Irit"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Sangat Efisien"; ?></td>
                <td><?= $eb8 = min($bt, $ms); ?></td>
                <td><?= $zPredikateb8 = zPredikat($eb8); ?></td>
              </tr>
              <tr>

                <td><?= "Irit"; ?></td>
                <td><?= "Kecil"; ?></td>
                <td><?= "Sangat Efisien"; ?></td>
                <td><?= $eb9 = min($bt, $mk); ?></td>
                <td><?= $zPredikateb9 = zPredikat($eb9);  ?></td>
              </tr>

            <?php } ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Variabel Kelayakan Mesin</h6>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Alternatif</th>
              <th>Variabel Jarak Tempuh</th>
              <th>Variabel Tahun</th>
              <th>Evaluasi Penilaian</th>
              <th>AlphaPredikat</th>
              <th>Z Predikat</th>





            </tr>
          </thead>
          <tbody>

            <?php


            $sql = "SELECT mobil.id, alternatif.id_user, alternatif.id_mobil, mobil.type, alternatif.jarak,alternatif.tahun FROM mobil
              JOIN alternatif ON (alternatif.id_mobil = mobil.id)
              WHERE id_user = '$id'
              ORDER BY alternatif.id ASC";

            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>

              <?php $jk = miuKecil($alternatif['jarak'], $batasJarak); ?>
              <?php $js = miuSedang($alternatif['jarak'], $batasJarak); ?>
              <?php $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?>

              <?php $tk = miuKecil($alternatif['tahun'], $batasTahun); ?>
              <?php $ts = miuSedang($alternatif['tahun'], $batasTahun); ?>
              <?php $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?>

              <!-- Tampilkan data -->
              <tr>
                <td rowspan="9"><?= $no++; ?></td>
                <td rowspan="9"><?= $alternatif['type']; ?></td>
                <td><?= "Tinggi"; ?></td>
                <td><?= "Tua"; ?></td>
                <td><?= "Kurang Layak"; ?></td>
                <td><?= $km1 = min($jt, $tk); ?></td>
                <td><?= $zPredikatkm1 = zPredikat($km1); ?></td>
              </tr>
              <tr>

                <td><?= "Tinggi"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Kurang Layak"; ?></td>
                <td><?= $km2 = min($jt, $ts); ?></td>
                <td><?= $zPredikatkm2 = zPredikat($km2); ?></td>
              </tr>
              <tr>

                <td><?= "Tinggi"; ?></td>
                <td><?= "Muda"; ?></td>
                <td><?= "Kurang Layak"; ?></td>
                <td><?= $km3 = min($jt, $tt); ?></td>
                <td><?= $zPredikatkm4 = zPredikat($km3); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Tua"; ?></td>
                <td><?= "Layak"; ?></td>
                <td><?= $km4 = min($js, $tk); ?></td>
                <td><?= $zPredikatkm4 = zPredikat($km4); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Layak"; ?></td>
                <td><?= $km5 = min($js, $ts); ?></td>
                <td><?= $zPredikatkm5 = zPredikat($km5); ?></td>
              </tr>
              <tr>

                <td><?= "Sedang"; ?></td>
                <td><?= "Muda"; ?></td>
                <td><?= "Sangat Layak"; ?></td>
                <td><?= $km6 = min($js, $tt); ?></td>
                <td><?= $zPredikatkm6 = zPredikat($km6); ?></td>
              </tr>
              <tr>

                <td><?= "Kecil"; ?></td>
                <td><?= "Tua"; ?></td>
                <td><?= "Sangat Layak"; ?></td>
                <td><?= $km7 = min($jk, $tk); ?></td>
                <td><?= $zPredikatkm7 = zPredikat($km7); ?></td>
              </tr>
              <tr>

                <td><?= "Kecil"; ?></td>
                <td><?= "Sedang"; ?></td>
                <td><?= "Sangat Layak"; ?></td>
                <td><?= $km8 = min($jk, $ts); ?></td>
                <td><?= $zPredikatkm8 = zPredikat($km8); ?></td>
              </tr>
              <tr>

                <td><?= "Kecil"; ?></td>
                <td><?= "Muda"; ?></td>
                <td><?= "Sangat Layak"; ?></td>
                <td><?= $km9 = min($jk, $tt); ?></td>
                <td><?= $zPredikatkm9 = zPredikat($km9);  ?></td>
              </tr>
            <?php } ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['defuzzy'])) {
  echo '<script>window.location="defuzzy.php";</script>';
}
?>
<!-- End of Main Content -->

<!-- Footer -->


<?php require_once 'template/footer.php'; ?>
