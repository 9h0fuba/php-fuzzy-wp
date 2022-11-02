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


              <th>Jumlah</th>

              <th>Vektor s</th>
              <th>Inferensi</th>
              <th>Vektor z</th>




            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php
            $totVektor = 0;
            $sql = "SELECT SUM(vektor_s), id FROM vektor";
            $query = mysqli_query($db, $sql);
            $vektor = mysqli_fetch_assoc($query);
            $id = $vektor['id'];
            $jumlah = $vektor['SUM(vektor_s)'];
            $sql = "SELECT * FROM vektor";
            $query = mysqli_query($db, $sql);

            $i = mysqli_num_rows($query);
            while ($vektor = mysqli_fetch_assoc($query)) {
              $vektorV =   $vektor['vektor_s'] / $jumlah;
              mysqli_query($db, "UPDATE `vektor` SET `preferensi`='$vektorV' WHERE id='$i'");
              echo $i = $id++;
            ?>
              <tr>

                <td><?php echo  $jumlah; ?> </td>
                <td><?php echo $vektor['vektor_s']; ?> </td>
                <td><?php echo $vektor['preferensi']; ?> </td>
                <td><?php echo $vektorV ?> </td>

              </tr>
            <?php



            } ?>


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