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


      $sql1 = "SELECT * FROM inferensi";
      $query1 = mysqli_query($db, $sql1);
      while ($inferensi = mysqli_fetch_assoc($query1)) {

      ?>
        <!-- tampilkan data -->
    <tr>
      <!-- alternatif -->
      <td><?= $inferensi['id_in'] ?></td>
      <td><?= $kh = $inferensi['kelayakan_harga'] ?></td>
      <td><?= $kb = $inferensi['kelayakan_bbm'] ?></td>
      <td><?= $km = $inferensi['kelayakan_mesin'] ?></td>

      <?php
        $vektorS = ($kh ** $pangkatKh) * ($kb ** $pangkatKb) * ($km ** $pangkatKm);
        $sql = "INSERT INTO vektor (vektors) VALUES ('$vektorS')";
        mysqli_query($db, $sql);


      ?>

    </tr>
  <?php
        $sql = "SELECT SUM(vektors) AS 'total'
 FROM vektor";
        $query = mysqli_query($db, $sql);
        $vektorS = mysqli_fetch_array($query);
        $tot =  $vektorS['total'];

        echo $vektorV = (float) $vektorS / (float)$tot;
      }



      // $sql = "SELECT vektors FROM vektor";
      // $query = mysqli_query($db, $query);
      // while ($vektorV = mysqli_fetch_assoc($query)) {

      // }


  ?>
  </tbody>
  </thead>


</table>
</div>