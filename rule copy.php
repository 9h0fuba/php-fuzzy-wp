<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Alpha Predikat</h1>
  </div>

  <!-- modal input  -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Alpha Predikat</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>Nama Alternatif</th>
              <th>Variabeel</th>
              <th>AlphaPredikat 1</th>
              <th>AlphaPredikat 2</th>
              <th>AlphaPredikat 3</th>
              <th>AlphaPredikat 4</th>
              <th>AlphaPredikat 5</th>
              <th>AlphaPredikat 6</th>
              <th>AlphaPredikat 7</th>
              <th>AlphaPredikat 8</th>
              <th>AlphaPredikat 9</th>



            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php

            // echo "|$ht";
            // echo "|$pk"; 


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

              <td rowspan="3"><?php echo $alternatif['type']; ?></td>

              <td><?php echo "Kelayakan Harga"; ?></td>
              <td><?= $kh1 = min($ht, $pk);
                  ?></td>
              <td><?= $kh2 = min($ht, $ps); ?></td>
              <td><?= $kh3 = min($ht, $pt); ?></td>
              <td><?= $kh4 = min($hs, $pk); ?></td>
              <td><?= $kh5 = min($hs, $ps); ?></td>
              <td><?= $kh6 = min($hs, $pt);  ?></td>
              <td><?= $kh7 = min($hk, $pk); ?></td>
              <td><?= $kh8 = min($hk, $ps); ?></td>
              <td><?= $kh9 = min($hk, $pt);  ?></td>




              <?php $bk = miuKecil($alternatif['bbm'], $batasBbm); ?>
              <?php $bs = miuSedang($alternatif['bbm'], $batasBbm); ?>
              <?php $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?>

              <?php $mk = miuKecil($alternatif['mesin'], $batasMesin); ?>
              <?php $ms = miuSedang($alternatif['mesin'], $batasMesin); ?>
              <?php $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?>


              <tr>

                <!-- <td><?php echo $alternatif['type']; ?></td> -->
                <td><?php echo "Kelayakan BBM"; ?></td>
                <td><?php echo  $eb1 = min($bk, $mt); ?></td>
                <td><?php echo  $eb2 = min($bk, $ms); ?></td>
                <td><?php echo   $eb3 = min($bk, $mk); ?></td>
                <td><?php echo  $eb4 = min($bs, $mt); ?></td>
                <td><?php echo  $eb5 = min($bs, $ms); ?></td>
                <td><?php echo $eb6 = min($bs, $mk); ?></td>
                <td><?php echo $eb7 = min($bt, $mt); ?></td>
                <td><?php echo $eb8 = min($bt, $ms); ?></td>
                <td><?php echo  $eb9 = min($bt, $mk); ?></td>
              </tr>



              <?php $jk = miuKecil($alternatif['jarak'], $batasJarak); ?>
              <?php $js = miuSedang($alternatif['jarak'], $batasJarak); ?>
              <?php $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?>

              <?php $tk = miuKecil($alternatif['tahun'], $batasTahun); ?>
              <?php $ts = miuSedang($alternatif['tahun'], $batasTahun); ?>
              <?php $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?>

              <tr>

                <!-- <td><?php echo $alternatif['type']; ?></td> -->
                <td><?php echo "Kelayakan Mesin"; ?></td>
                <td><?php echo    $km1 = min($jt, $tk);  ?></td>
                <td><?php echo      $km2 = min($jt, $ts); ?></td>
                <td><?php echo   $km3 = min($jt, $tt); ?></td>
                <td><?php echo    $km4 = min($js, $tk); ?></td>
                <td><?php echo   $km5 = min($js, $ts); ?></td>
                <td><?php echo   $km6 = min($js, $tt); ?></td>
                <td><?php echo   $km7 = min($jk, $tk); ?></td>
                <td><?php echo     $km8 = min($jk, $ts); ?></td>
                <td><?php echo  $km9 = min($jk, $tt); ?></td>
              </tr>


              </tr>

            <?php } ?>


          </tbody>
        </table>
        <form class="" action="" method="post">
          <!-- <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button> -->
          <button class="btn btn-primary" type="submit" name="z">Lanjut >></button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['z'])) {
  echo '<script>window.location="z.php";</script>';
}
?>
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

</body>

</html>