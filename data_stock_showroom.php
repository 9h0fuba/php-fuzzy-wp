<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
if (isset($_GET['id'])) {
  $id_showroom = $_GET['id'];
  $nama_showroom = $_GET['showroom'];
}


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
          <h1 class="h3 mb-0 text-gray-800">Stock Showroom</h1>

        </div>
        <!-- data -->

        <div class="row rounded-2">

          <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary">Stock Showroom <?= $nama_showroom ?></h6>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 px-5">
              <?php
              $sql = "SELECT * FROM mobil WHERE id_showroom ='$id_showroom'";
              $query = mysqli_query($db, $sql);
              while ($mobil = mysqli_fetch_assoc($query)) {

              ?>

                <a href="detail_mobil.php?id= <?= $mobil['id'] ?>" class="text-decoration-none text-dark">
                  <div class="col pl-2 py-4">
                    <div class="card">
                      <img src="<?= "img/" . $mobil['gambar']; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?= $mobil['merk']; ?> </h5>

                        <p class="card-text"><?= $mobil['jarak'] . ' km' . '  |  ' . $mobil['tahun']; ?> </p>
                        <p class="card-text"><?= $mobil['type']; ?> </p>
                      </div>

                    </div>
                  </div>
                </a>

              <?php } ?>
            </div>










          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
  
    <?php include 'template/footer.php' ?>

   