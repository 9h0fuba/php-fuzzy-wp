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
    <h1 class="h3 mb-0 text-gray-800">Vektor V</h1>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="bobot.php">Bobot</a></li>
      <li class="breadcrumb-item"><a href="normalisasi_bobot.php">Normalisasi Bobot</a></li>
      <li class="breadcrumb-item"><a href="vektor_s.php">Vektor S</a></li>
      <li class="breadcrumb-item active" aria-current="page">Vektor V</li>
    </ol>
  </nav>
  <!-- modal input  -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Vektor V</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>id_a</th>
              <th>Jumlah</th>
              <th>Nama Mobil</th>

              <th>Vektor S</th>

              <th>Vektor V</th>




            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php
            $totVektor = 0;
            $sql = "SELECT SUM(vektor_s), id FROM vektor";
            $query = mysqli_query($db, $sql);
            $vektor = mysqli_fetch_assoc($query);
            $id_v = $vektor['id'];
            $jumlah = $vektor['SUM(vektor_s)'];
            // $sql = "SELECT * FROM vektor
            // JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
            //            JOIN mobil ON (mobil.id = alternatif.id_mobil)
            //            WHERE alternatif.id_user = '$id';
            //            ORDER BY alternatif.id DESC";

            $sql = "SELECT * FROM vektor
JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
           JOIN mobil ON (mobil.id = alternatif.id_mobil)
           WHERE alternatif.id_user = '$id'";


            $query = mysqli_query($db, $sql);
            // var_dump($jumlah);
            $i = $id_v;
            $no = 1;
            while ($vektor = mysqli_fetch_assoc($query)) {
              $id_a =$vektor['id_alternatif'];
              $vs =  $vektor['vektor_s'];
              $vv =  $vektor['vektor_v'];
              $vektorV =   $vs / $jumlah;



            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $id_a; ?></td>
                <td><?php echo  $jumlah; ?> </td>
                <td><?php echo $vektor['type']; ?> </td>
                <td><?php echo $vektor['vektor_s']; ?> </td>

                <td><?php echo $vektorV ?> </td>


              </tr>
             
            <?php
              mysqli_query($db, " UPDATE `vektor` SET `vektor_v`='$vektorV' WHERE id_alternatif='$id_a'");
             
            } ?>


          </tbody>
        </table>
        <form class="" action="" method="post">

          <button class="btn btn-warning" type="submit" name="vektor">Grafik</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['vektor'])) {
  echo '<script>window.location="ranking.php";</script>';
}
?>
<!-- End of Main Content -->

<!-- Footer -->
<?php require_once 'template/footer.php'; ?>



