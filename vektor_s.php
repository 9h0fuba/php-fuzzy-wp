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
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vektor S</h1>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="bobot.php">Bobot</a></li>
      <li class="breadcrumb-item"><a href="normalisasi_bobot.php">Normalisasi Bobot</a></li>
      <li class="breadcrumb-item active" aria-current="page">Vektor S</li>
    </ol>
  </nav>
  <!-- modal input pegawai -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Vektor S</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Alternatif</th>
              <th>Vektor S</th>




            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php
            $totVektor = 0;
            // $sql = "SELECT * FROM `defuzzy`
            //            JOIN bobot ON (bobot.id_user = defuzzy.id_user)
            //            JOIN alternatif ON (alternatif.id = defuzzy.id_alternatif)
            //            JOIN mobil ON (mobil.id = alternatif.id_mobil)
            //            WHERE defuzzy.id_user = '$id'
            // ORDER BY id_alternatif DESC";
             $sql = "SELECT alternatif.id,bobot.id_user,mobil.type,defuzzy.kelayakan_harga,defuzzy.kelayakan_bbm,defuzzy.kelayakan_mesin,bobot.bobot_kh,bobot.bobot_kb,bobot.bobot_km FROM `alternatif`
             JOIN defuzzy ON (defuzzy.id_alternatif = alternatif.id)
             JOIN mobil ON (mobil.id = alternatif.id_mobil)
             JOIN bobot ON (bobot.id_user = alternatif.id_user)
             
             WHERE bobot.id_user='$id'
             ";
            $query = mysqli_query($db, $sql);
            $no = 1;
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


              $id_alternatif = $bobot['id'];
              $kh = $bobot['kelayakan_harga'];
              $kb = $bobot['kelayakan_bbm'];
              $km = $bobot['kelayakan_mesin'];

              $cKh = pow($kh, $pangkatKh);
              $cKb = pow($kb, $pangkatKb);
              $cKm = pow($km, $pangkatKm);

              $vs = $cKh * $cKb * $cKm;

              $sql = "INSERT INTO vektor VALUES ('$id_alternatif','$vs','$vs',' $id_alternatif')";
              mysqli_query($db, $sql);
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo  $bobot['type']; ?> </td>
                <td><?php echo  $vs; ?> </td>


              </tr>
            <?php } ?>


          </tbody>
        </table>
        <form class="" action="" method="post">

          <button class="btn btn-warning" type="submit" name="vektor">Hitung Vektor V</button>
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


<?php require_once 'template/footer.php'; ?>
