<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <?php

   $id = $_SESSION['id'];

  // echo $_SESSION['id_showroom'];
  ?>






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

              <th>Type Mobil</th>
              <th>DiCari</th>



            </tr>
          </thead>
          <tbody>

            <!-- select data -->
            <?php
            $sql = "SELECT alternatif.id_mobil,mobil.type, COUNT(alternatif.id_mobil) as jumlah FROM alternatif
            JOIN mobil ON (mobil.id = alternatif.id_mobil)
            JOIN showroom ON (showroom.id = mobil.id_showroom)

            WHERE showroom.id_user = '$id'
            GROUP BY alternatif.id_mobil, mobil.type";

            $query = mysqli_query($db, $sql);

            while ($alternatif = mysqli_fetch_assoc($query)) {

            ?>
              <tr>
           
                <th><?php echo $alternatif['type']; ?> </th>
                <th><?php echo $alternatif['jumlah']; ?> </th>

              </tr>
            <?php  } ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Footer -->

<?php require_once 'template/footer.php'; ?>
