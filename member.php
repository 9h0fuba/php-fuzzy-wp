<?php
// include header footer

use LDAP\Result;

require_once 'template/header.php';
require_once 'template/footer.php';
require_once 'core/koneksi.php';
require_once 'core/hitung.php';

?>
<?php


?>
<?php

?>

<?php
// harga, penghasilan, bbm, mesin, jarak, tahun






?>
<!-- tabel -->

<table class="table">
  <thead>
    <tr>

      <th scope="col">id</th>
      <th scope="col">Harga Kecil</th>
      <th scope="col">Harga Sedang</th>
      <th scope="col">Harga Tinggi</th>
      <th scope="col">Penghasilan Kecil</th>
      <th scope="col">Penghasilan Sedang</th>
      <th scope="col">Penghasilan Tinggi</th>
      <th scope="col">BBM Kecil</th>
      <th scope="col">BBM Sedang</th>
      <th scope="col">BBM Tinggi</th>
      <th scope="col">Mesin Kecil</th>
      <th scope="col">Mesin Sedang</th>
      <th scope="col">Mesin Tinggi</th>
      <th scope="col">Jarak Kecil</th>
      <th scope="col">Jarak Sedang</th>
      <th scope="col">Jarak Tinggi</th>
      <th scope="col">tahun Kecil</th>
      <th scope="col">tahun Sedang</th>
      <th scope="col">tahun Tinggi</th>
    </tr>
    <tr>

      <!-- select dari tabel alternatif dan sekalian menghitung nilai membership -->
      <?php

      if (isset($_POST['hitung'])) {
        $sql = "SELECT * FROM alternatif";
        $query = mysqli_query($db, $sql);

        while ($alternatif = mysqli_fetch_assoc($query)) {


      ?>

          <td><?php echo $id = $alternatif['id_alternatif']; ?></td>


          <td><?php echo $hk = miuKecil($alternatif['harga'], $batasHarga); ?></td>
          <td><?php echo $hs = miuSedang($alternatif['harga'], $batasHarga); ?></td>
          <td><?php echo $ht = miuTinggi($alternatif['harga'], $batasHarga); ?></td>

          <?php


          ?>

          <td><?php echo $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?></td>
          <td><?php echo $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?></td>
          <td><?php echo $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?></td>


          <?php
          echo " <p>Kelayakan harga </p>" . $id;
          $kh1 = min($ht, $pk);

          $kh2 = min($ht, $ps);

          $kh3 = min($ht, $pt);

          $kh4 = min($hs, $pk);

          $kh5 = min($hs, $ps);

          $kh6 = min($hs, $pt);

          $kh7 = min($hk, $pk);

          $kh8 = min($hk, $ps);

          $kh9 = min($hk, $pt);

          if ($kh1 > 0) {
            echo "<br>" . $kh1;
          }
          if ($kh2 > 0) {
            echo "<br>" . $kh2;
          }
          if ($kh3 > 0) {
            echo "<br>" . $kh3;
          }
          if ($kh4 > 0) {
            echo "<br>" . $kh4;
          }
          if ($kh5 > 0) {
            echo "<br>" . $kh5;
          }
          if ($kh6 > 0) {
            echo "<br>" . $kh6;
          }
          if ($kh7 > 0) {
            echo "<br>" . $kh7;
          }
          if ($kh8 > 0) {
            echo "<br>" . $kh8;
          }
          if ($kh9 > 0) {
            echo "<br>" . $kh9;
          }
          echo "<br><hr>";
          // $result = [
          //   $kh1, $kh2, $kh3, $kh4, $kh5, $kh6, $kh7, $kh8, $kh9
          // ];

          $zPredikatkh1 = zPredikat($kh1);
          $zPredikatkh2 = zPredikat($kh2);
          $zPredikatkh3 = zPredikat($kh3);
          $zPredikatkh4 = zPredikat($kh4);
          $zPredikatkh5 = zPredikat($kh5);
          $zPredikatkh6 = zPredikat($kh6);
          $zPredikatkh7 = zPredikat($kh7);
          $zPredikatkh8 = zPredikat($kh8);
          $zPredikatkh9 = zPredikat($kh9);

          $zkh = zAkhir($kh1, $kh2, $kh3, $kh4, $kh5, $kh6, $kh7, $kh8, $kh9, $zPredikatkh1, $zPredikatkh2, $zPredikatkh3, $zPredikatkh4, $zPredikatkh5, $zPredikatkh6, $zPredikatkh7, $zPredikatkh8, $zPredikatkh9);

          ?>

          <td><?php echo $bk = miuKecil($alternatif['bbm'], $batasBbm); ?></td>
          <td><?php echo $bs = miuSedang($alternatif['bbm'], $batasBbm); ?></td>
          <td><?php echo $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?></td>

          <?php


          ?>


          <td><?php echo $mk = miuKecil($alternatif['mesin'], $batasMesin); ?></td>
          <td><?php echo $ms = miuSedang($alternatif['mesin'], $batasMesin); ?></td>
          <td><?php echo $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?></td>

          <?php
          echo " <p>Eisiensi BBM </p>" . $id;
          $eb1 = min($bk, $mt);

          $eb2 = min($bk, $ms);

          $eb3 = min($bk, $mk);

          $eb4 = min($bs, $mt);

          $eb5 = min($bs, $ms);

          $eb6 = min($bs, $mk);

          $eb7 = min($bt, $mt);

          $eb8 = min($bt, $ms);

          $eb9 = min($bt, $mk);

          if ($eb1 > 0) {
            echo "<br>" . $eb1;
          }
          if ($eb2 > 0) {
            echo "<br>" . $eb2;
          }
          if ($eb3 > 0) {
            echo "<br>" . $eb3;
          }
          if ($eb4 > 0) {
            echo "<br>" . $eb4;
          }
          if ($eb5 > 0) {
            echo "<br>" . $eb5;
          }
          if ($eb6 > 0) {
            echo "<br>" . $eb6;
          }
          if ($eb7 > 0) {
            echo "<br>" . $eb7;
          }
          if ($eb8 > 0) {
            echo "<br>" . $eb8;
          }
          if ($eb9 > 0) {
            echo "<br>" . $eb9;
          }
          echo "<br><hr>";


          $zPredikateb1 = zPredikat($eb1);
          $zPredikateb2 = zPredikat($eb2);
          $zPredikateb3 = zPredikat($eb3);
          $zPredikateb4 = zPredikat($eb4);
          $zPredikateb5 = zPredikat($eb5);
          $zPredikateb6 = zPredikat($eb6);
          $zPredikateb7 = zPredikat($eb7);
          $zPredikateb8 = zPredikat($eb8);
          $zPredikateb9 = zPredikat($eb9);

          $zeb = zAkhir($eb1, $eb2, $eb3, $eb4, $eb5, $eb6, $eb7, $eb8, $eb9, $zPredikateb1, $zPredikateb2, $zPredikateb3, $zPredikateb4, $zPredikateb5, $zPredikateb6, $zPredikateb7, $zPredikateb8, $zPredikateb9);

          ?>



          <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
          <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
          <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>
          <?php


          ?>


          <td><?php echo $tk = miuKecil($alternatif['tahun'], $batasTahun); ?></td>
          <td><?php echo $ts = miuSedang($alternatif['tahun'], $batasTahun); ?></td>
          <td><?php echo $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?></td>

          <?php
          echo " <p>Kelayakan Mesin </p>" . $id;
          $km1 = min($jt, $tk);

          $km2 = min($jt, $ts);

          $km3 = min($jt, $tt);

          $km4 = min($js, $tk);

          $km5 = min($js, $ts);

          $km6 = min($js, $tt);

          $km7 = min($jk, $tk);

          $km8 = min($jk, $ts);

          $km9 = min($jk, $tt);

          if ($km1 > 0) {
            echo "<br>" . $km1;
          }
          if ($km2 > 0) {
            echo "<br>" . $km2;
          }
          if ($km3 > 0) {
            echo "<br>" . $km3;
          }
          if ($km4 > 0) {
            echo "<br>" . $km4;
          }
          if ($km5 > 0) {
            echo "<br>" . $km5;
          }
          if ($km6 > 0) {
            echo "<br>" . $km6;
          }
          if ($km7 > 0) {
            echo "<br>" . $km7;
          }
          if ($km8 > 0) {
            echo "<br>" . $km8;
          }
          if ($km9 > 0) {
            echo "<br>" . $km9;
          }
          echo "<br><hr>";
          // echo "<pre>";
          // var_dump($result);
          // echo "</pre>";
          $zPredikatkm1 = zPredikat($km1);
          $zPredikatkm2 = zPredikat($km2);
          $zPredikatkm3 = zPredikat($km3);
          $zPredikatkm4 = zPredikat($km4);
          $zPredikatkm5 = zPredikat($km5);
          $zPredikatkm6 = zPredikat($km6);
          $zPredikatkm7 = zPredikat($km7);
          $zPredikatkm8 = zPredikat($km8);
          $zPredikatkm9 = zPredikat($km9);

          $zkm = zAkhir($km1, $km2, $km3, $km4, $km5, $km6, $km7, $km8, $km9, $zPredikatkm1, $zPredikatkm2, $zPredikatkm3, $zPredikatkm4, $zPredikatkm5, $zPredikatkm6, $zPredikatkm7, $zPredikatkm8, $zPredikatkm9);
          ?>

    </tr>



<?php
          echo " <p>DEFUZZY </p>" . $id;
          echo $zkh;
          echo "<br><hr>";
          echo $zeb;
          echo "<br><hr>";
          echo $zkm;
        }
      }


?>



  </thead>
  <tbody>

</table>
<div class="container mt-2">
  <form action="rule.php" method="POST">
    <button type="submit" class="btn btn-primary" name="rule">
      RULE
    </button>
  </form>

</div>

<hr>";





<!-- select data -->

<?php

$sql = "SELECT * FROM alternatif";
$query = mysqli_query($db, $sql);

while ($alternatif = mysqli_fetch_assoc($query)) {
?>
  <!-- variabel mesin -->
  <td><?php echo $mk = miuKecil($alternatif['mesin'], $batasMesin); ?></td>
  <td><?php echo $ms = miuSedang($alternatif['mesin'], $batasMesin); ?></td>
  <td><?php echo $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?></td>
<?php } ?>

<!-- select data -->

<?php

$sql = "SELECT * FROM alternatif";
$query = mysqli_query($db, $sql);

while ($alternatif = mysqli_fetch_assoc($query)) {
?>

  <!-- variabel jarak -->
  <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
  <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
  <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>
<?php } ?>


<!-- select data -->

<?php

$sql = "SELECT * FROM alternatif";
$query = mysqli_query($db, $sql);

while ($alternatif = mysqli_fetch_assoc($query)) {
?>

  <!-- variabel jarak -->
  <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
  <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
  <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>
<?php } ?>