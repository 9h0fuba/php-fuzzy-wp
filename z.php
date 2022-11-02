<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Z Predikat</h1>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="alternatif.php">Alternatif</a></li>
      <li class="breadcrumb-item"><a href="membership.php">Membership</a></li>
      <li class="breadcrumb-item"><a href="rule.php">AlphaPredikat</a></li>
      <li class="breadcrumb-item active" aria-current="page">zPredikat</li>
    </ol>
  </nav>
  <!-- modal input  -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List z Predikat</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>Nama Alternatif</th>
              <th>Variabeel</th>
              <th>zPredikat 1</th>
              <th>zPredikat 2</th>
              <th>zPredikat 3</th>
              <th>zPredikat 4</th>
              <th>zPredikat 5</th>
              <th>zPredikat 6</th>
              <th>zPredikat 7</th>
              <th>zPredikat 8</th>
              <th>zPredikat 9</th>



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

            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>

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
              ?>

              <td><?php echo $alternatif['type']; ?></td>

              <td><?php echo "Kelayakan Harga"; ?></td>
              <td><?= $zPredikatkh1 = zPredikat($kh1); ?></td>
              <td><?= $zPredikatkh2 = zPredikat($kh2); ?></td>
              <td><?= $zPredikatkh4 = zPredikat($kh3); ?></td>
              <td><?= $zPredikatkh4 = zPredikat($kh4); ?></td>
              <td><?= $zPredikatkh5 = zPredikat($kh5); ?></td>
              <td><?= $zPredikatkh6 = zPredikat($kh6); ?></td>
              <td><?= $zPredikatkh7 = zPredikat($kh7); ?></td>
              <td><?= $zPredikatkh8 = zPredikat($kh8); ?></td>
              <td><?= $zPredikatkh9 = zPredikat($kh9);  ?></td>


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
              ?>
              <tr>

                <td><?php echo $alternatif['type']; ?></td>
                <td><?php echo "Kelayakan BBM"; ?></td>
                <td><?php echo   $zPredikateb1 = zPredikat($eb1); ?></td>
                <td><?php echo $zPredikateb2 = zPredikat($eb2);  ?></td>
                <td><?php echo   $zPredikateb3 = zPredikat($eb3);  ?></td>
                <td><?php echo   $zPredikateb4 = zPredikat($eb4); ?></td>
                <td><?php echo   $zPredikateb5 = zPredikat($eb5); ?></td>
                <td><?php echo   $zPredikateb6 = zPredikat($eb6); ?></td>
                <td><?php echo  $zPredikateb7 = zPredikat($eb7); ?></td>
                <td><?php echo  $zPredikateb8 = zPredikat($eb8); ?></td>
                <td><?php echo  $zPredikateb9 = zPredikat($eb9); ?></td>
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

              ?>
              <tr>

                <td><?php echo $alternatif['type']; ?></td>
                <td><?php echo "Kelayakan Mesin"; ?></td>
                <td><?php echo     $zPredikatkm1 = zPredikat($km1);  ?></td>
                <td><?php echo   $zPredikatkm2 = zPredikat($km2);   ?></td>
                <td><?php echo  $zPredikatkm3 = zPredikat($km3); ?></td>
                <td><?php echo   $zPredikatkm4 = zPredikat($km4);  ?></td>
                <td><?php echo   $zPredikatkm5 = zPredikat($km5); ?></td>
                <td><?php echo  $zPredikatkm6 = zPredikat($km6); ?></td>
                <td><?php echo  $zPredikatkm7 = zPredikat($km7); ?></td>
                <td><?php echo   $zPredikatkm8 = zPredikat($km8);  ?></td>
                <td><?php echo
                    $zPredikatkm9 = zPredikat($km9);
                    ?></td>
              </tr>
              </tr>

            <?php } ?>


          </tbody>
        </table>
        <form class="" action="" method="post">
          <!-- <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button> -->
          <button class="btn btn-primary" type="submit" name="defuzzy">Lanjut >></button>
        </form>
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

