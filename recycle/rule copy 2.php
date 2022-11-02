<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">




  <!-- insert data -->
  <?php


  if (isset($_POST['alternatif'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $penghasilan = $_POST['penghasilan'];
    $bbm = $_POST['bbm'];
    $mesin = $_POST['mesin'];
    $jarak = $_POST['jarak'];
    $tahun = $_POST['tahun'];

    $sql = "INSERT INTO alternatif VALUES ('','$nama','$harga','$penghasilan','$bbm','$mesin','$jarak','$tahun')";
    mysqli_query($db, $sql);
  }
  ?>






  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data product berhasil didelete.
      </div>
    </div>
    <!-- /.col-lg-12 -->
  </div>



  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data product gagal didelete.
      </div>
    </div>
    <!-- /.col-lg-12 -->
  </div>


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Product</h1>
  </div>
  <div class="row">

  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Product</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th scope="col">id</th>
              <th scope="col">Variabel Harga</th>
              <th scope="col">Variabel Penghasilan</th>
              <th scope="col">Alpha PRedikat</th>


            </tr>
          </thead>
          <tbody>

            <!-- select dari tabel alternatif dan sekalian menghitung nilai membership -->
            <?php


            $sql = "SELECT * FROM alternatif";
            $query = mysqli_query($db, $sql);

            while ($alternatif = mysqli_fetch_assoc($query)) {


            ?>

              <td><?php echo $id = $alternatif['id']; ?>


                <?php $hk = miuKecil($alternatif['harga'], $batasHarga); ?>
                <?php $hs = miuSedang($alternatif['harga'], $batasHarga); ?>
                <?php $ht = miuTinggi($alternatif['harga'], $batasHarga); ?>

                <?php


                ?>

                <?php $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?>
                <?php $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?>
                <?php $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?>


              <td><?= $kh1 = min($ht, $pk); ?></td>
              <td><?= $kh2 = min($ht, $ps); ?></td>
              <td><?= $kh3 = min($ht, $pt); ?></td>
              <td><?= $kh4 = min($hs, $pk); ?></td>
              <td><?= $kh5 = min($hs, $ps); ?></td>
              <td><?= $kh6 = min($hs, $pt);  ?></td>
              <td><?= $kh7 = min($hk, $pk); ?></td>
              <td><?= $kh8 = min($hk, $ps); ?></td>
              <td><?= $kh9 = min($hk, $pt);  ?></td>


















              <!-- 

              <td><?php if ($kh1 >= 0) {
                    echo $kh1;
                  } ?></td>

              <td><?php if ($kh2 > 0) {
                    echo $kh2;
                  } ?></td>
              <td><?php if ($kh3 > 0) {
                    echo $kh3;
                  } ?></td>
              <td><?php if ($kh4 > 0) {
                    echo $kh4;
                  } ?></td>
              <td><?php if ($kh5 > 0) {
                    echo $kh5;
                  } ?></td>
              <td><?php if ($kh6 > 0) {
                    echo $kh6;
                  } ?></td>
              <td><?php if ($kh7 > 0) {
                    echo $kh7;
                  } ?></td>
              <td><?php if ($kh8 > 0) {
                    echo $kh8;
                  } ?></td>
              <td><?php if ($kh9 > 0) {
                    echo $kh9;
                  } ?></td>  -->
              <?php
              $zPredikatkh1 = zPredikat($kh1);
              $zPredikatkh2 = zPredikat($kh2);
              $zPredikatkh4 = zPredikat($kh3);
              $zPredikatkh4 = zPredikat($kh4);
              $zPredikatkh5 = zPredikat($kh5);
              $zPredikatkh6 = zPredikat($kh6);
              $zPredikatkh7 = zPredikat($kh7);
              $zPredikatkh8 = zPredikat($kh8);
              $zPredikatkh9 = zPredikat($kh9);

              $zkh = zAkhir($kh1, $kh2, $kh3, $kh4, $kh5, $kh6, $kh7, $kh8, $kh9, $zPredikatkh1, $zPredikatkh2, $zPredikatkh3, $zPredikatkh4, $zPredikatkh5, $zPredikatkh6, $zPredikatkh7, $zPredikatkh8, $zPredikatkh9);

              ?>

              <?php $bk = miuKecil($alternatif['bbm'], $batasBbm); ?>
              <?php $bs = miuSedang($alternatif['bbm'], $batasBbm); ?>
              <?php $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?>

              <?php


              ?>


              <?php $mk = miuKecil($alternatif['mesin'], $batasMesin); ?>
              <?php $ms = miuSedang($alternatif['mesin'], $batasMesin); ?>
              <?php $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?>



              <td><?php echo  $eb1 = min($bk, $mt); ?></td>
              <td><?php echo  $eb2 = min($bk, $ms); ?></td>
              <td><?php echo   $eb3 = min($bk, $mk); ?></td>
              <td><?php echo  $eb4 = min($bs, $mt); ?></td>
              <td><?php echo  $eb5 = min($bs, $ms); ?></td>
              <td><?php echo $eb6 = min($bs, $mk); ?></td>
              <td><?php echo $eb7 = min($bt, $mt); ?></td>
              <td><?php echo $eb8 = min($bt, $ms); ?></td>
              <td><?php echo  $eb9 = min($bt, $mk); ?></td>


              <?php

              $zPredikateb1 = zPredikat($eb1);
              $zPredikateb2 = zPredikat($eb2);
              $zPredikateb3 = zPredikat($eb3);
              $zPredikateb4 = zPredikat($eb4);
              $zPredikateb5 = zPredikat($eb5);
              $zPredikateb6 = zPredikat($eb6);
              $zPredikateb7 = zPredikat($eb7);
              $zPredikateb8 = zPredikat($eb8);
              $zPredikateb9 = zPredikat($eb9);

              $zeb = zAkhir($eb1, $eb2, $eb3, $eb4, $eb5, $eb6, $eb7, $eb8, $eb9, $zPredikateb1, $zPredikateb2, $zPredikateb3, $zPredikateb4, $zPredikateb5, $zPredikateb6, $zPredikateb7, $zPredikateb8, $zPredikateb9);

              ?>



              <?php $jk = miuKecil($alternatif['jarak'], $batasJarak); ?>
              <?php $js = miuSedang($alternatif['jarak'], $batasJarak); ?>
              <?php $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?>
              <?php


              ?>


              <?php $tk = miuKecil($alternatif['tahun'], $batasTahun); ?>
              <?php $ts = miuSedang($alternatif['tahun'], $batasTahun); ?>
              <?php $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?>

              <?php
              // echo " <p>Kelayakan Mesin </p>" . $id;
              $km1 = min($jt, $tk);
              // echo "<br>";
              $km2 = min($jt, $ts);
              // echo "<br>";
              $km3 = min($jt, $tt);
              // echo "<br>";
              $km4 = min($js, $tk);
              // echo "<br>";
              $km5 = min($js, $ts);
              // echo "<br>";
              $km6 = min($js, $tt);
              // echo "<br>";
              $km7 = min($jk, $tk);
              // echo "<br>";
              $km8 = min($jk, $ts);
              // echo "<br>";
              $km9 = min($jk, $tt);


              // echo "<pre>";
              // var_dump($result);
              // echo "</pre>";
              $zPredikatkm1 = zPredikat($km1);
              $zPredikatkm2 = zPredikat($km2);
              $zPredikatkm3 = zPredikat($km3);
              $zPredikatkm4 = zPredikat($km4);
              $zPredikatkm5 = zPredikat($km5);
              $zPredikatkm6 = zPredikat($km6);
              $zPredikatkm7 = zPredikat($km7);
              $zPredikatkm8 = zPredikat($km8);
              $zPredikatkm9 = zPredikat($km9);

              $zkm = zAkhir($km1, $km2, $km3, $km4, $km5, $km6, $km7, $km8, $km9, $zPredikatkm1, $zPredikatkm2, $zPredikatkm3, $zPredikatkm4, $zPredikatkm5, $zPredikatkm6, $zPredikatkm7, $zPredikatkm8, $zPredikatkm9);
              ?>

              </tr>

            <?php

            }



            ?>
          </tbody>
        </table>
        <form class="" action="" method="post">
          <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button>
          <button class="btn btn-primary" type="submit" name="lanjut">Lanjut >></button>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['lanjut'])) {
    echo '<script>window.location="membership.php";</script>';
  }
  ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; UD. Suma Jaya 2020</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<?php require_once 'template/logout.php'; ?>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


<?php
$ad = 1;
"<td><?= $ad; ?></td>";
?>
</body>

</html>