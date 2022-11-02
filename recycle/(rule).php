<?php
// include header footer
require_once 'template/header.php';
require_once 'template/footer.php';
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
?>



<?php

?>


<!-- tabel -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID_Alternatif</th>
      <th scope="col">Ketegori</th>
      <th scope="col">kecil</th>
      <th scope="col">sedang</th>
      <th scope="col">tinggi</th>

    </tr>
    <tr>
      <?php
      // harga, penghasilan, bbm, mesin, jarak, tahun
      if (isset($_POST['rule'])) {
        $sql = "SELECT id_alternatif,kategori,kecil,sedang,tinggi FROM membership";
        $query = mysqli_query($db, $sql);








      ?>
        <!-- select dari tabel alternatif dan sekalian menghitung nilai membership -->



        <?php

        if (mysqli_num_rows($query) > 0) {

          while ($member = mysqli_fetch_assoc($query)) {


        ?>
    <tr>

      <td><?php echo $member['id_alternatif']; ?></td>
      <td><?php echo $member['kategori']; ?></td>
      <td><?php echo $member['kecil']; ?></td>
      <td><?php echo $member['sedang']; ?></td>
      <td><?php echo $member['tinggi']; ?></td>

    </tr>



<?php
          }
        }
      }
?>




  </thead>
  <tbody>