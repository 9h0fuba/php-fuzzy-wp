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
$batasHarga = ["awal" => 90000000, "tengah" => 285000000, "akhir" => 480000000];
$batasPenghasilan = ["awal" => 8000000, "tengah" => 29000000, "akhir" => 50000000];
$batasMesin = ["awal" => 1000, "tengah" => 2000, "akhir" => 3000];
$batasBbm = ["awal" => 8, "tengah" => 11.5, "akhir" => 15];
$batasJarak = ["awal" => 20000, "tengah" => 85000, "akhir" => 150000];
$batasTahun = ["awal" => 2013, "tengah" => 2017, "akhir" => 2021];
?>

<?php
// harga, penghasilan, bbm, mesin, jarak, tahun
$sql = "SELECT * FROM alternatif";
$query = mysqli_query($db, $sql);






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
      while ($alternatif = mysqli_fetch_assoc($query)) {


      ?>

        <td><?php echo $id = $alternatif['id_alternatif']; ?></td>


        <td><?php echo $hk = miuKecil($alternatif['harga'], $batasHarga); ?></td>
        <td><?php echo $hs = miuSedang($alternatif['harga'], $batasHarga); ?></td>
        <td><?php echo $ht = miuTinggi($alternatif['harga'], $batasHarga); ?></td>

        <?php
        $harga[$id] = tampung($id, "harga", $hk, $hs, $ht);



        ?>

        <td><?php echo $pk = miuKecil($alternatif['penghasilan'], $batasPenghasilan); ?></td>
        <td><?php echo $ps = miuSedang($alternatif['penghasilan'], $batasPenghasilan); ?></td>
        <td><?php echo $pt = miuTinggi($alternatif['penghasilan'], $batasPenghasilan); ?></td>

        <?php
        $penghasilan[$id] = tampung($id, "penghasilan", $hk, $hs, $ht);

        // $hp[] = rule($harga[$id], $penghasilan[$id]);

        ?>

        <td><?php echo $bk = miuKecil($alternatif['bbm'], $batasBbm); ?></td>
        <td><?php echo $bs = miuSedang($alternatif['bbm'], $batasBbm); ?></td>
        <td><?php echo $bt = miuTinggi($alternatif['bbm'], $batasBbm); ?></td>

        <?php
        $bbm[$id] =  tampung($id, "bbm", $hk, $hs, $ht);


        ?>


        <td><?php echo $mk = miuKecil($alternatif['mesin'], $batasMesin); ?></td>
        <td><?php echo $ms = miuSedang($alternatif['mesin'], $batasMesin); ?></td>
        <td><?php echo $mt = miuTinggi($alternatif['mesin'], $batasMesin); ?></td>


        <?php
        $mesin[$id] = tampung($id, "mesin", $hk, $hs, $ht);

        // $bm[] = rule($bbm[$id], $mesin[$id]);

        ?>


        <td><?php echo $jk = miuKecil($alternatif['jarak'], $batasJarak); ?></td>
        <td><?php echo $js = miuSedang($alternatif['jarak'], $batasJarak); ?></td>
        <td><?php echo $jt = miuTinggi($alternatif['jarak'], $batasJarak); ?></td>


        <?php
        $jarak[$id] = tampung($id, "jarak", $hk, $hs, $ht);

        ?>

        <td><?php echo $tk = miuKecil($alternatif['tahun'], $batasTahun); ?></td>
        <td><?php echo $ts = miuSedang($alternatif['tahun'], $batasTahun); ?></td>
        <td><?php echo $tt = miuTinggi($alternatif['tahun'], $batasTahun); ?></td>

        <?php
        $tahun[$id] = tampung($id, "tahun", $hk, $hs, $ht);


        ?>


    </tr>



  <?php

      }

      var_dump($harga);
      $result = array_merge($harga, $penghasilan, $bbm, $mesin, $jarak, $tahun);



  ?>

  </thead>
  <tbody>

</table>
<div class="container mt-2">
  <button type="submit" class="btn btn-primary">
    Membership
  </button>
</div>

<hr>";
<?php

if (isset($_POST['hitung'])) {
  foreach ($result as $key => $value) {






    $sql = "INSERT INTO membership

    VALUES
    ('',
    '$value[id_alternatif]',
    '$value[kategori]',
    '$value[kecil]',
    '$value[sedang]',
    '$value[tinggi]','','','')";
    mysqli_query($db, $sql);
  }
}

?>

<!-- nampilno hasil rule -->
<!-- // echo $value['id_alternatif'];

    // echo $value['kategori'];

    // echo $value['kecil'];

    // echo $value['sedang'];

    // echo $value['tinggi'];
    // echo "<br>"; -->

<div class="container">
  <p>HASIL MEMBERSHIP</p>

  <?php
  foreach ($result as $key => $r) {
    echo $r['id_alternatif'];
    echo $r['kategori'];
    echo $r['kecil'];
    echo $r['sedang'];
    echo $r['tinggi'];
    echo "<br>";
  }


  ?>




</div>


<div class="container">
  <p>HASIL Alpha PRedikat </p>
  <?php

  $sqlA = "SELECT id_alternatif,kategori, kecil, sedang, tinggi FROM membership ORDER BY id_alternatif ASC";
  $queryA = mysqli_query($db, $sqlA);

  while ($alpha = mysqli_fetch_assoc($queryA)) { ?>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id_alter</th>
          <th scope="col">Kategori</th>
          <th scope="col">Kecil</th>
          <th scope="col">Sedang</th>
          <th scope="col">Tingi</th>


        </tr>
      <tbody>
        <tr>
          <td><?php echo $alpha['id_alternatif']; ?></td>
          <td><?php echo $alpha['kategori']; ?></td>
          <td><?php echo $alpha['kecil']; ?></td>
          <td><?php echo $alpha['sedang']; ?></td>
          <td><?php echo $alpha['tinggi']; ?></td>

        </tr>
      </tbody>
      </thead>
    </table>




    <?php


    ?>



  <?php } ?>

  <?php

  ?>


</div>