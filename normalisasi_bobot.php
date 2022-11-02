<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">




  <!-- insert data -->
  <?php


  if (isset($_POST['bobot'])) {
    $bobot_kh = $_POST['bobot_kh'];
    $bobot_kb = $_POST['bobot_kb'];
    $bobot_km = $_POST['bobot_km'];


    $sql = "INSERT INTO bobot VALUES ('','$bobot_kh','$bobot_kb','$bobot_km')";
    mysqli_query($db, $sql);
  }
  ?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Normalisasi Bobot</h1>
  </div>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">

      <li class="breadcrumb-item"><a href="bobot.php">Bobot</a></li>

      <li class="breadcrumb-item active" aria-current="page">Normalisasi Bobot</li>
    </ol>
  </nav>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Normalisasi Bobot</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>


              <th>No</th>
              <th>Kriteria</th>
              <th>Bobot Awal</th>
              <th>Normalisasi Bobot</th>
              <th>Tipe</th>



            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php




            $sql = "SELECT bobot_kh,bobot_kb,bobot_km FROM bobot
            WHERE id_user = '$id'";
            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($bobot = mysqli_fetch_assoc($query)) {
              $bobotKh = $bobot['bobot_kh'];
              $bobotKb = $bobot['bobot_kb'];
              $bobotKm = $bobot['bobot_km'];
              $sumPangkat = $bobotKh + $bobotKb + $bobotKm;

            ?>
              <!-- tampilkan data -->
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Harga"; ?></td>
                <td><?php echo  $bobotKh = $bobot['bobot_kh']; ?></td>
                <td><?php echo $pangkatKh = $bobotKh / $sumPangkat; ?> </td>
                <td><?php echo "Cost" ?></td>
              </tr>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Bbm"; ?></td>
                <td><?php echo  $bobotKb = $bobot['bobot_kb']; ?></td>
                <td><?php echo $pangkatKb = $bobotKb / $sumPangkat; ?> </td>
                <td><?php echo "Benefit" ?></td>
              </tr>


              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Mesin"; ?></td>
                <td><?php echo   $bobotKm = $bobot['bobot_km']; ?></td>
                <td><?php echo $pangkatKm = $bobotKm / $sumPangkat;  ?> </td>
                <td><?php echo "Cost" ?></td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
        <form class="" action="" method="post">

          <button class="btn btn-warning" type="submit" name="vektor">Hitung Vektor S</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['vektor'])) {
    echo '<script>window.location="vektor_s.php";</script>';
  }
  ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->

<?php require_once 'template/footer.php'; ?>

