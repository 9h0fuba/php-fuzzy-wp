<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <?php

  $id = $_SESSION['id'];

  ?>




  <!-- insert data -->




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

  <!-- modal input pegawai -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Product</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>Nama Alternatif</th>
              <th>Vektor S</th>
              <th>id</th>



            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php
            $totVektor = 0;
            $sql = "SELECT * FROM `defuzzy`
                       JOIN bobot ON (bobot.id_user = defuzzy.id_user)
                       JOIN alternatif ON (alternatif.id = defuzzy.id_alternatif)
            ORDER BY id_alternatif DESC";
            $query = mysqli_query($db, $sql);

            while ($bobot = mysqli_fetch_assoc($query)) {

              // select bobot
              $bobotKh = $bobot['bobot_kh'];
              $bobotKb = $bobot['bobot_kb'];
              $bobotKm = $bobot['bobot_km'];
              // bobot kepentingan dipangkatkan
              $sumPangkat = $bobotKh + $bobotKb + $bobotKm;
              $pangkatKh = $bobotKh / $sumPangkat * -1;
              $pangkatKb = $bobotKb / $sumPangkat * 1;
              $pangkatKm = $bobotKm / $sumPangkat * -1;

              // echo $kh = $bobot['bobot_kh']; bobot
              // echo $kh = $bobot['bobot_kb'];
              // echo $kh = $bobot['bobot_km'];


              $id_alternaitf = $bobot['id_alternatif'];
              $kh = $bobot['kelayakan_harga'];
              $kb = $bobot['kelayakan_bbm'];
              $km = $bobot['kelayakan_mesin'];

              $cKh = pow($kh, $pangkatKh);
              $cKb = pow($kb, $pangkatKb);
              $cKm = pow($km, $pangkatKm);

              $vs = $cKh * $cKb * $cKm;
              $totVektor += $vs;
              $vektorV = $vs / $totVektor;
              $sql = "INSERT INTO vektor VALUES ('','$vs','',' $id_alternaitf')";
              mysqli_query($db, $sql);
            ?>
              <tr>
                <td><?php echo  $bobot['nama']; ?> </td>
                <td><?php echo  $vs ?> </td>
                <td><?php echo  $bobot['id_alternatif'] ?> </td>

              </tr>
            <?php } ?>


          </tbody>
        </table>
        <form class="" action="" method="post">
          <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button>
          <button class="btn btn-primary" type="submit" name="vektor">Lanjut >></button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['vektor'])) {
  echo '<script>window.location="vektor_v.php";</script>';
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