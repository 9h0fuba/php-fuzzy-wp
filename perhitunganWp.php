<?php
// include header footer

use LDAP\Result;

require_once 'template/header.php';
require_once 'template/footer.php';
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
?>
<table class="table">
  <thead>
    <tr>

      <th scope="col">id</th>
      <th scope="col">Fuzzy KH</th>
      <th scope="col">Fuzzy KB</th>
      <th scope="col">Fuzzy KM</th>


    </tr>
    <tr>

      <!-- select dari tabel alternatif dan sekalian menghitung nilai membership -->
      <?php


      if (isset($_POST['hitung'])) {
        $sql = "SELECT * FROM bobot";
        $query = mysqli_query($db, $sql);

        $bobot = mysqli_fetch_assoc($query);

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
      }


      $sql1 = "SELECT * FROM defuzzy";
      $query1 = mysqli_query($db, $sql1);
      $totVektor = 0;
      while ($defuzzy = mysqli_fetch_assoc($query1)) {

      ?>
        <!-- tampilkan data -->
    <tr>
      <!-- alternatif -->
      <td><?= $defuzzy['id_in'] ?></td>
      <td><?= $kh = $defuzzy['kelayakan_harga'] ?></td>
      <td><?= $kb = $defuzzy['kelayakan_bbm'] ?></td>
      <td><?= $km = $defuzzy['kelayakan_mesin'] ?></td>

      <?php
        $cKh = pow($kh, $pangkatKh);
        $cKb = pow($kb, $pangkatKb);
        $cKm = pow($km, $pangkatKm);
        $vs = $cKh * $cKb * $cKm;

        $totVektor += $vs;

        var_dump($totVektor);
        $vektorV = $vs / $totVektor;
        echo "<br>";
        var_dump($vektorV);

      ?>

    </tr>
  <?php

      }

      $vektorV;


      // $sql = "SELECT vektors FROM vektor";
      // $query = mysqli_query($db, $query);
      // while ($vektorV = mysqli_fetch_assoc($query)) {

      // }


  ?>
  </tbody>
  </thead>


</table>
</div>