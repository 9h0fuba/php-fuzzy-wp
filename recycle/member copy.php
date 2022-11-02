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

          $sql = "INSERT INTO membership VALUES ('','$id','harga',
  '$hk','$hs','$ht')";
          mysqli_query($db, $sql);
          ?>

          <td><?php echo $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?></td>
          <td><?php echo $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?></td>
          <td><?php echo $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?></td>

          <?php

          $sql = "INSERT INTO membership VALUES ('','$id','penghasilan',
'$pk','$ps','$pt')";
          mysqli_query($db, $sql);
          ?>

          <td><?php echo $bk = miuKecil($alternatif['bbm'], $batasBbm); ?></td>
          <td><?php echo $bs = miuSedang($alternatif['bbm'], $batasBbm); ?></td>
          <td><?php echo $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?></td>

          <?php

          $sql = "INSERT INTO membership VALUES ('','$id','bbm',
'$bk','$bs','$bt')";
          mysqli_query($db, $sql);
          ?>


          <td><?php echo $mk = miuKecil($alternatif['mesin'], $batasMesin); ?></td>
          <td><?php echo $ms = miuSedang($alternatif['mesin'], $batasMesin); ?></td>
          <td><?php echo $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?></td>

          <?php

          $sql = "INSERT INTO membership VALUES ('','$id','mesin',
'$mk','$ms','$mt')";
          mysqli_query($db, $sql);
          ?>



          <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
          <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
          <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>
          <?php

          $sql = "INSERT INTO membership VALUES ('','$id','jarak',
'$jk','$js','$jt')";
          mysqli_query($db, $sql);
          ?>


          <td><?php echo $tk = miuKecil($alternatif['tahun'], $batasTahun); ?></td>
          <td><?php echo $ts = miuSedang($alternatif['tahun'], $batasTahun); ?></td>
          <td><?php echo $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?></td>
          <?php

          $sql = "INSERT INTO membership VALUES ('','$id','tahun',
'$tk','$ts','$tt')";
          mysqli_query($db, $sql);
          ?>


    </tr>



<?php




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

<?php
$a = 2 ** 2;
echo $a;
?>