<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <?php

  $id = $_SESSION['id'];

  // $id_showroom =  $_SESSION['id_showroom'];
  ?>






  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Membership</h1>
    <form class="" action="" method="post">
      <!-- <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button> -->
      <button class="btn btn-warning" type="submit" name="rule">Inferensi</button>
    </form>
  </div>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="alternatif.php">Alternatif</a></li>
      <li class="breadcrumb-item active" aria-current="page">Membership</li>
    </ol>
  </nav>
  <!-- modal input pegawai -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Membership</h6>
    </div>
    <div class="card-body">
      <div class="table">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Alternatif</th>
              <th>Variabel Input</th>

              <th>Membership Kecil</th>
              <th>Membership Sedang</th>
              <th>Membership Tinggi</th>


            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php




            // $sql = "SELECT * FROM alternatif ORDER BY id DESC";
            $sql = "SELECT * FROM mobil
            JOIN alternatif ON (alternatif.id_mobil = mobil.id)
            WHERE id_user = '$id'
            ORDER BY alternatif.id ASC";

            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
            ?>

              <tr>
                <td rowspan="6"><?php echo $no++; ?></td>
                <td rowspan="6"><?php echo $alternatif['type']; ?></td>
                <td><?php echo "Harga"; ?></td>
                <td><?php echo $hk = miuKecil($alternatif['harga'], $batasHarga); ?></td>
                <td><?php echo $hs = miuSedang($alternatif['harga'], $batasHarga); ?></td>
                <td><?php echo $ht = miuTinggi($alternatif['harga'], $batasHarga); ?></td>
              </tr>

              <tr>
                <td><?php echo "Penghasilan";  ?></td>
                <td><?php echo $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?></td>
                <td><?php echo $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?></td>
                <td><?php echo $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?></td>
              </tr>
              <tr>
                <td><?php echo "BBM";  ?></td>
                <td><?php echo $bk = miuKecil($alternatif['bbm'], $batasBbm); ?></td>
                <td><?php echo $bs = miuSedang($alternatif['bbm'], $batasBbm); ?></td>
                <td><?php echo $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?></td>
              </tr>
              <tr>
                <td><?php echo "Mesin"; ?></td>
                <td><?php echo $mk = miuKecil($alternatif['mesin'], $batasMesin); ?></td>
                <td><?php echo $ms = miuSedang($alternatif['mesin'], $batasMesin); ?></td>
                <td><?php echo $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?></td>
              </tr>
              <tr>
                <td><?php echo "Jarak"; ?></td>
                <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
                <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
                <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>
              </tr>
              <tr>
                <td><?php echo "Tahun";  ?></td>
                <td><?php echo $tk = miuKecil($alternatif['tahun'], $batasTahun); ?></td>
                <td><?php echo $ts = miuSedang($alternatif['tahun'], $batasTahun); ?></td>
                <td><?php echo $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?></td>
              </tr>

            <?php } ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['rule'])) {
  echo '<script>window.location="rule.php";</script>';
}
?>
<!-- End of Main Content -->

<!-- Footer -->


<?php require_once 'template/footer.php'; ?>

