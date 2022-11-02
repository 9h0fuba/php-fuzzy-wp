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
    Tambah Bobot
  </button>

</div>


<!-- insert data -->
<?php



if (isset($_POST['bobot'])) {
  $kelayakanHarga = $_POST['kelayakanHarga'];
  $kelayakanBbm = $_POST['kelayakanBbm'];
  $kelayakanMesin = $_POST['kelayakanMesin'];


  $sql = "INSERT INTO bobot VALUES ('','$kelayakanHarga','$kelayakanBbm','$kelayakanMesin')";
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


        <th scope="col">Bobot KH</th>
        <th scope="col">Bobot KB</th>
        <th scope="col">Bobot KM</th>


      </tr>
    <tbody>

      <!-- select data -->

      <?php



      ?>
      <!-- tampilkan data -->
      <tr>


        <?php


        $sql = "SELECT * FROM bobot";
        $query = mysqli_query($db, $sql);

        while ($bobot = mysqli_fetch_assoc($query)) {

        ?>

          <td><?= $bobot['bobot_kh'] ?></td>
          <td><?= $bobot['bobot_kb'] ?></td>
          <td><?= $bobot['bobot_km'] ?></td>





      </tr>
    <?php  }
    ?>
    </tbody>
    </thead>


  </table>
</div>




<!-- hitung bobot  -->
<div class="container mt-2">
  <form action="perhitunganWp.php" method="post">
    <button type="submit" class="btn btn-primary" name="hitung">
      Hitung WP
    </button>
  </form>

</div>
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
            <label for="nama" class="form-label">Bobot Kelayakan Harga</label>
            <input type="text" class="form-control" id="nama" name="kelayakanHarga">
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Bobot Kelayakan Bbm</label>
            <input type="text" class="form-control" id="harga" name="kelayakanBbm">
          </div>
          <div class="mb-3">
            <label for="penghasilan" class="form-label">Bobot Kelayakan Mesin</label>
            <input type="text" class="form-control" id="penghasilan" name="kelayakanMesin">
          </div>
          <div class=" modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="bobot" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>