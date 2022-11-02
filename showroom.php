<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';


?>



<!-- Page Wrapper -->
<div id="wrapper">


  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">


      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Mobil</h1>

        </div>


        <div class="card shadow ">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><?= $s = $_SESSION['nama_showroom']['0']; ?> </h6>
          </div>
          <div class="row row-cols-1 row-cols-md-4 g-4 px-5">
            <?php
            $sql = "SELECT * FROM `showroom` 
              JOIN mobil ON (mobil.id_showroom = showroom.id)
              WHERE showroom.nama='$s'";
            $query = mysqli_query($db, $sql);
            while ($mobil = mysqli_fetch_assoc($query)) {
            ?>
              <div class="col pl-2 py-4">
                <div class="card h-100">
                  <img src="<?= "img/" . $mobil['gambar']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $mobil['merk']; ?> </h5>

                    <p class="card-text"><?= $mobil['jarak'] . ' km' . '  |  ' . $mobil['tahun']; ?> </p>
                    <p class="card-text"><?= $mobil['type']; ?> </p>
                    <p class="card-text"><?= $mobil['nama']; ?> </p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><?= $mobil['harga'] ?></small>
                  </div>
                </div>
              </div>

            <?php } ?>
          </div>










        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->


  <?php include 'template/footer.php' ?>

