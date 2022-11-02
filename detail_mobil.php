<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
if (isset($_GET['id'])) {
  $id_mobil = $_GET['id'];
}
?>

<div class="container-fluid">
  <?php
  $sql = "SELECT * FROM `showroom` 
  JOIN mobil ON (mobil.id_showroom = showroom.id)
  WHERE mobil.id='$id_mobil'
  ";
  $query = mysqli_query($db, $sql);
  while ($mobil = mysqli_fetch_assoc($query)) {
  ?>
    <div class="row">
      <div class="col-sm-7 p-3  mx-auto d-block ">
        <img src="<?= "img/" . $mobil['gambar']; ?>" class="img-fluid rounded" alt="" width="100%" height="100%">
      </div>

      <div class="col-sm-5 mb-5 p-3 rounded">
        <div class="container mb-2 bg-white p-1 rounded">
          <h1 class="p-3"><?= $mobil['nama_showroom']; ?></h1>
          <hr class="sidebar-divider">

          <h1 class="p-3"><?= $mobil['type']; ?></h1>
          <hr class="sidebar-divider">
          <h4 class="text-center">Spesifikasi Mobil</h6>

            <div class="row p-2">
              <div class="col-sm-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h5>
                      <i class="fa-solid fa-car-on"></i> Merek
                    </h5>
                  </li>
                  <li class="list-group-item">
                    <h5>
                      <i class="fa-solid fa-calendar-days"></i> Tahun Kendaraan
                    </h5>
                  </li>
                  <li class="list-group-item">
                    <h5><i class="fa-solid fa-fill-drip"></i> Warna</h5>
                  </li>
                  <li class="list-group-item">
                    <h5><i class="fas fa-fw fa-tachometer-alt"></i> Jarak Tempuh</h5>
                  </li>
                  <li class="list-group-item">
                    <h5><i class="fas fa-fw fa-tachometer-alt"></i> Harga</h5>
                  </li>

                </ul>


              </div>
              <div class="col-sm-6">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h5 class="fw-bold"><?= $mobil['merk'] ?></h5 class="fw-bold">
                  </li>

                  <li class="list-group-item">
                    <h5>
                      <?= $mobil['tahun'] . " Km" ?>
                    </h5>

                  </li>
                  <li class="list-group-item">
                    <h5>
                      <?= $mobil['merk'] ?>
                    </h5>

                  </li>
                  <li class="list-group-item">
                    <h5>
                      <?= $mobil['jarak'] . " Km" ?>
                    </h5>

                  </li>
                  <li class="list-group-item">
                    <h5>
                    <?= "Rp " . number_format($mobil['harga'], 2, ",", "."); ?>
                     
                    </h5>

                  </li>

                </ul>
              </div>
            </div>
        </div>

      </div>

    </div>

  <?php } ?>
</div>



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<?php include 'template/footer.php' ?>
