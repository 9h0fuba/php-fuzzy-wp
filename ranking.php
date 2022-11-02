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
    <h1 class="h3 mb-0 text-gray-800">Preferensi</h1>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="bobot.php">Bobot</a></li>
      <li class="breadcrumb-item"><a href="normalisasi_bobot.php">Normalisasi Bobot</a></li>
      <li class="breadcrumb-item"><a href="vektor_s.php">Vektor S</a></li>
      <li class="breadcrumb-item"><a href="vektor_v.php">Vektor V</a></li>
      <li class="breadcrumb-item active" aria-current="page">Preferensi</li>
    </ol>
  </nav>

  <!-- modal input pegawai -->

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Preferensi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>



    <th>No.</th>
              <th>Alternatif</th>
              <th>Inferensi</th>
              <th>Ranking</th>
              <th>aksi</th>





            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php

                        $sql = "SELECT * FROM vektor
            JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
                       JOIN mobil ON (mobil.id = alternatif.id_mobil)
                       WHERE alternatif.id_user = '$id'
                       ORDER BY vektor_v DESC";
//             $sql = "SELECT vektor.vektor_v,vektor.id_alternatif, mobil.type, alternatif.id_mobil,
// ( SELECT find_in_set( vektor_v,
// ( SELECT
// group_concat(DISTINCT vektor_v
// ORDER BY vektor_v DESC)
// FROM vektor))
// ) as rangking
// FROM vektor
// JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
// JOIN mobil ON (mobil.id = alternatif.id_mobil)
// WHERE alternatif.id_user = '$id'";

            $query = mysqli_query($db, $sql);
            $i = 1;
            $no = 1;
            while ($vektor = mysqli_fetch_assoc($query)) {



            ?>
              <tr>


                <!-- <td><?php echo $vektor['vektor_s']; ?> </td> -->
                <td><?php echo $no++ ?> </td> 
                <td><?php echo $vektor['type']; ?> </td>
                <td><?php echo $vektor['vektor_v']; ?> </td>
                <td><?php echo $i++ ?> </td> 
                <!-- <td><?php echo $vektor['rangking']; ?> </td> -->
             

                <td>
                  <a href="detail_mobil.php?id=<?= $vektor['id_mobil'] ?>"> <button class="btn btn-secondary">Detail Mobil</button></a>


                </td>
              </tr>
            <?php

            } ?>


          </tbody>
        </table>
        <!-- <form class="" action="" method="post">
          <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button>
         
        </form> -->
      </div>


    </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Grafik Perhitungan Weight Product</h6>
      <div class="row">
        <div style="width: 800px;margin: 0px auto;">
          <canvas id="myChart"></canvas>
        </div>
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
      <span>Copyright &copy; Sistem Pendukung Keputusan FMADM Model Weight Product</span>
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
<script src="vendor/chart.js/Chart.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<?php




$sql = "SELECT * FROM vektor
JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
           JOIN mobil ON (mobil.id = alternatif.id_mobil)
           WHERE alternatif.id_user = '$id'
           ORDER BY vektor_v DESC";
$label = mysqli_query($db, $sql);
$sql1 = "SELECT * FROM vektor
JOIN alternatif ON (alternatif.id = vektor.id_alternatif)
           WHERE alternatif.id_user = '$id'
           ORDER BY vektor_v DESC";
$data = mysqli_query($db, $sql1);


?>
<script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php while ($l = mysqli_fetch_array($label)) {
                  echo '"' . $l['type'] . '",';
                } ?>],
      datasets: [{
        label: 'Grafik',
        data: [<?php while ($d = mysqli_fetch_array($data)) {
                  echo '"' . $d['vektor_v'] . '",';
                } ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>



</body>

</html>