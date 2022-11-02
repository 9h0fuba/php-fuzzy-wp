<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
$id = $_SESSION['id'];
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Defuzzy</h1>
    <form class="" action="" method="post">
      <!-- <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button> -->
      <button class="btn btn-warning" type="submit" name="defuzzy">Penentuan Bobot</button>
    </form>
  </div>

  <!-- modal input  -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="alternatif.php">Alternatif</a></li>
      <li class="breadcrumb-item"><a href="membership.php">Membership</a></li>
      <li class="breadcrumb-item"><a href="rule.php">Inferensi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Defuzzy</li>
    </ol>
  </nav>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Defuzzy</h6>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>

              <th>Nama Alternatif</th>
              <th>Variabel Output</th>
              <th>Defuzzy</th>
              <th>Evaluasi Penilaian</th>




            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php



            $sql = "SELECT * FROM mobil
JOIN alternatif ON (alternatif.id_mobil = mobil.id)
WHERE id_user = '$id'
ORDER BY alternatif.id ASC";
            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>
              <?php $id_alternatif = $alternatif['id']; ?>
              <?php $hk = miuKecil($alternatif['harga'], $batasHarga); ?>
              <?php $hs = miuSedang($alternatif['harga'], $batasHarga); ?>
              <?php $ht = miuTinggi($alternatif['harga'], $batasHarga); ?>


              <?php $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?>
              <?php $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?>
              <?php $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?>

              <?php
              $kh1 = min($ht, $pk);
              $kh2 = min($ht, $ps);
              $kh3 = min($ht, $pt);
              $kh4 = min($hs, $pk);
              $kh5 = min($hs, $ps);
              $kh6 = min($hs, $pt);
              $kh7 = min($hk, $pk);
              $kh8 = min($hk, $ps);
              $kh9 = min($hk, $pt);

              $zPredikatkh1 = zPredikat($kh1);
              $zPredikatkh2 = zPredikat($kh2);
              $zPredikatkh3 = zPredikat($kh3);
              $zPredikatkh4 = zPredikat($kh4);
              $zPredikatkh5 = zPredikat($kh5);
              $zPredikatkh6 = zPredikat($kh6);
              $zPredikatkh7 = zPredikat($kh7);
              $zPredikatkh8 = zPredikat($kh8);
              $zPredikatkh9 = zPredikat($kh9);
              ?>
              <td rowspan="3"><?= $no++ ?></td>

              <td rowspan="3"><?php echo $alternatif['type']; ?></td>

              <td><?php echo "Kelayakan Harga"; ?></td>
              <td><?= $zkh = zAkhir($kh1, $kh2, $kh3, $kh4, $kh5, $kh6, $kh7, $kh8, $kh9, $zPredikatkh1, $zPredikatkh2, $zPredikatkh3, $zPredikatkh4, $zPredikatkh5, $zPredikatkh6, $zPredikatkh7, $zPredikatkh8, $zPredikatkh9); ?></td>
              <td><?php echo penilaianKh($zkh) ?></td>

              <?php $bk = miuKecil($alternatif['bbm'], $batasBbm); ?>
              <?php $bs = miuSedang($alternatif['bbm'], $batasBbm); ?>
              <?php $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?>

              <?php $mk = miuKecil($alternatif['mesin'], $batasMesin); ?>
              <?php $ms = miuSedang($alternatif['mesin'], $batasMesin); ?>
              <?php $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?>

              <?php
              $eb1 = min($bk, $mt);
              $eb2 = min($bk, $ms);
              $eb3 = min($bk, $mk);
              $eb4 = min($bs, $mt);
              $eb5 = min($bs, $ms);
              $eb6 = min($bs, $mk);
              $eb7 = min($bt, $mt);
              $eb8 = min($bt, $ms);
              $eb9 = min($bt, $mk);

              $zPredikateb1 = zPredikat($eb1);
              $zPredikateb2 = zPredikat($eb2);
              $zPredikateb3 = zPredikat($eb3);
              $zPredikateb4 = zPredikat($eb4);
              $zPredikateb5 = zPredikat($eb5);
              $zPredikateb6 = zPredikat($eb6);
              $zPredikateb7 = zPredikat($eb7);
              $zPredikateb8 = zPredikat($eb8);
              $zPredikateb9 = zPredikat($eb9);
              ?>
              <tr>


                <td><?php echo "Kelayakan BBM"; ?></td>
                <td><?php echo     $zkb = zAkhir($eb1, $eb2, $eb3, $eb4, $eb5, $eb6, $eb7, $eb8, $eb9, $zPredikateb1, $zPredikateb2, $zPredikateb3, $zPredikateb4, $zPredikateb5, $zPredikateb6, $zPredikateb7, $zPredikateb8, $zPredikateb9); ?></td>
                <td><?php echo penilaianKb($zkb) ?></td>
              </tr>




              <?php $jk = miuKecil($alternatif['jarak'], $batasJarak); ?>
              <?php $js = miuSedang($alternatif['jarak'], $batasJarak); ?>
              <?php $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?>

              <?php $tk = miuKecil($alternatif['tahun'], $batasTahun); ?>
              <?php $ts = miuSedang($alternatif['tahun'], $batasTahun); ?>
              <?php $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?>


              <?php
              $km1 = min($jt, $tk);
              $km2 = min($jt, $ts);
              $km3 = min($jt, $tt);
              $km4 = min($js, $tk);
              $km5 = min($js, $ts);
              $km6 = min($js, $tt);
              $km7 = min($jk, $tk);
              $km8 = min($jk, $ts);
              $km9 = min($jk, $tt);

              $zPredikatkm1 = zPredikat($km1);
              $zPredikatkm2 = zPredikat($km2);
              $zPredikatkm3 = zPredikat($km3);
              $zPredikatkm4 = zPredikat($km4);
              $zPredikatkm5 = zPredikat($km5);
              $zPredikatkm6 = zPredikat($km6);
              $zPredikatkm7 = zPredikat($km7);
              $zPredikatkm8 = zPredikat($km8);
              $zPredikatkm9 = zPredikat($km9);

              ?>
              <tr>


                <td><?php echo "Kelayakan Mesin"; ?></td>
                <td><?php echo  $zkm = zAkhir($km1, $km2, $km3, $km4, $km5, $km6, $km7, $km8, $km9, $zPredikatkm1, $zPredikatkm2, $zPredikatkm3, $zPredikatkm4, $zPredikatkm5, $zPredikatkm6, $zPredikatkm7, $zPredikatkm8, $zPredikatkm9); ?></td>
                <td><?php echo penilaianKm($zkm) ?></td>
              </tr>
              <?php

              $sql = "INSERT INTO defuzzy VALUES ($id_alternatif,$zkh,$zkb,$zkm,$id_alternatif)";
              mysqli_query($db, $sql);

              ?>

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
  echo '<script>window.location="bobot.php";</script>';
}
?>
<!-- End of Main Content -->

<!-- Footer -->

<?php require_once 'template/footer.php'; ?>

