<?php
// include header footer
require_once 'template/header.php';
require_once 'template/footer.php';
require_once 'core/koneksi.php';
require_once 'core/hitung.php';


?>
<div class="container mt-5">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data
  </button>

</div>


<!-- insert data -->
<?php


if (isset($_POST['cuak'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $penghasilan = $_POST['penghasilan'];
  $bbm = $_POST['bbm'];
  $mesin = $_POST['mesin'];
  $jarak = $_POST['jarak'];
  $tahun = $_POST['tahun'];

  $sql = "INSERT INTO alternatif VALUES ('','$nama','$harga','$penghasilan','$bbm','$mesin','$jarak','$tahun')";
  mysqli_query($db, $sql);
}

?>




</tbody>
</table>
</div>

<!-- tabel -->
<div class="container mt-7">
  <table class="table">
    <thead>
      <tr>

        <th>Type Mobil</th>
        <th>Harga</th>
        <th>Penghasilan</th>
        <th>Konsumsi BBm</th>
        <th>Kapasitas Mesin</th>
        <th>Jarak Tempuh</th>
        <th>Tahun</th>

      </tr>
    <tbody>

      <!-- select data -->

      <?php

      $sql = "SELECT * FROM alternatif WHERE id_alternatif";
      $query = mysqli_query($db, $sql);

      while ($alternatif = mysqli_fetch_assoc($query)) {



      ?>
        <!-- tampilkan data -->
        <tr>

          <td><?= $alternatif['nama'] ?></td>
          <td><?= $alternatif['harga'] ?></td>
          <td><?= $alternatif['penghasilan'] ?></td>
          <td><?= $alternatif['bbm'] ?></td>
          <td><?= $alternatif['mesin'] ?></td>
          <td><?= $alternatif['jarak'] ?></td>
          <td><?= $alternatif['tahun'] ?></td>
          <td><?= $alternatif['id_alternatif'] ?></td>




        </tr>
      <?php } ?>
    </tbody>
    </thead>


  </table>
</div>



<!-- // button hitung membership -->

<div class="container mt-2">
  <form action="member.php" method="post">
    <button type="submit" class="btn btn-primary" name="hitung">
      Hitung Membership
    </button>
  </form>

</div>

<!-- data batas -->

<?php
$batasHarga = ["awal" => 90000000, "tengah" => 285000000, "akhir" => 480000000];
$batasPenghasilan = ["awal" => 8000000, "tengah" => 29000000, "akhir" => 50000000];
$batasMesin = ["awal" => 1000, "tengah" => 2000, "akhir" => 3000];
$batasBbm = ["awal" => 8, "tengah" => 11.5, "akhir" => 15];
$batasJarak = ["awal" => 20000, "tengah" => 85000, "akhir" => 150000];
$batasTahun = ["awal" => 2013, "tengah" => 2017, "akhir" => 2021];
?>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="text" class="form-control" id="harga" name="harga">
          </div>
          <div class="mb-3">
            <label for="penghasilan" class="form-label">Penghasilan</label>
            <input type="text" class="form-control" id="penghasilan" name="penghasilan">
          </div>
          <div class="mb-3">
            <label for="bbm" class="form-label">BBM</label>
            <input type="text" class="form-control" id="bbm" name="bbm">
          </div>
          <div class="mb-3">
            <label for="mesin" class="form-label">Mesin</label>
            <input type="text" class="form-control" id="mesin" name="mesin">
          </div>
          <div class="mb-3">
            <label for="jarak" class="form-label">Jarak</label>
            <input type="text" class="form-control" id="jarak" name="jarak">
          </div>
          <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun">
          </div>
          <div class=" modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="hitung" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php


// if (isset($_POST['submit'])) {
//   var_dump($_POST['nama']);
//   var_dump($_POST['harga']);
//   var_dump($_POST['penghasilan']);
//   var_dump($_POST['bbm']);
//   var_dump($_POST['jarak']);
//   var_dump($_POST['tahun']);
// }

?>

<?php
$a = 2 ** 2;
echo $a;
?>