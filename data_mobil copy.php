<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
?>

<?php

// Update data bobot

if (isset($_POST['update'])) {
  $idm = $_POST['id'];
  $ids = $_POST['id_showroom'];


  $type = $_POST['type'];
  $merk = $_POST['merk'];
  $harga = $_POST['harga'];
  $jarak = $_POST['jarak'];
  $tahun = $_POST['tahun'];


  $siqil = "UPDATE mobil SET id='$idm',type='$type',merk='$merk',harga='$harga',jarak='$jarak',tahun='$tahun',id_showroom='$ids' WHERE id='$idm'";
  $update = mysqli_query($db, $siqil);
  if ($update) {
    echo ' <div class="row">
  <div class="col-lg-12">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Mobil berhasil di Ubah.
    </div>
  </div>
</div>';
  } else {
    echo ' <div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Mobil gagal di Ubah.
    </div>
  </div>
</div>';
  }
}

?>
<?php

// Delete data Mobil

if (isset($_POST['delete'])) {
  $idm = $_POST['id'];



  $sql = "DELETE FROM `mobil` WHERE mobil.id ='$idm'";
  $cek = mysqli_query($db, $sql);
  if ($cek) {
    echo '  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data Mobil berhasil di Hapus.
      </div>
    </div>
  </div>';
  } else {
    echo '  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data Mobil gagal di Hapus.
      </div>
    </div>
  </div>';
  }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- insert data -->
  <?php



  ?>


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Product</h1>
  </div>
  <?php if ($_SESSION['level'] === 'admin') {





    //     $sql = "SELECT * FROM `mobil` 
    // JOIN showroom ON (showroom.id = mobil.id_showroom)
    // WHERE showroom.id_user='$id';";
    $sql = "SELECT * FROM `showroom` 
    JOIN mobil ON (mobil.id_showroom = showroom.id)
    WHERE showroom.id_user = '$id'";
    $query = mysqli_query($db, $sql);


  ?>
    <div class="row">
      <div class="col-xl-12">
        <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#input">Input Mobil</button>
        <br><br>
      </div>
    </div>
  <?php } elseif ($_SESSION['level'] === 'user') {
    $sql = "SELECT * FROM `showroom` 
    JOIN mobil ON (mobil.id_showroom = showroom.id)";
    $query = mysqli_query($db, $sql);
  } ?>

  <!-- modal input  -->
  <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Alternatif Mobil</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" action="" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Type</label>
              <input type="text" class="form-control" name="type" required>
            </div>

            <div class="form-group">
              <label>Merk</label>
              <input type="text" class="form-control" name="merk" required>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" name="harga" required>
            </div>
            <div class="form-group">
              <label>Jarak Tempuh</label>
              <input type="text" class="form-control" name="jarak" required>
            </div>
            <div class="form-group">
              <label>Tahun</label>
              <input type="text" class="form-control" name="tahun" required>
            </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-secondary" name="mobil" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Product</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id_mobil</th>
              <th>id_showroom</th>
              <th>Showroom</th>
              <th>Type Mobil</th>
              <th>Merk</th>
              <th>Harga</th>
              <th>Jarak Tempuh</th>
              <th>Tahun</th>
              <th>Aksi</th>


            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php




            while ($mobil = mysqli_fetch_assoc($query)) {
              $_SESSION['id_showroom'] = $mobil['id_showroom'];


            ?>
              <!-- tampilkan data -->
              <tr>

                <td><?= $mobil['id'] ?></td>
                <td><?= $mobil['id_showroom'] ?></td>
                <td><?= $mobil['nama'] ?></td>
                <td><?= $mobil['type'] ?></td>
                <td><?= $mobil['merk'] ?></td>
                <td><?= $mobil['harga'] ?></td>

                <td><?= $mobil['jarak'] ?></td>
                <td><?= $mobil['tahun'] ?></td>


                <td>

                  <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $mobil['id'] ?>">Edit</button>
                  <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $mobil['id']; ?>">Hapus</button>

                </td>

                <!-- modal edit -->

                <div class="modal fade" id="modalEdit<?= $mobil['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Alternatif Mobil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form class="" action="" method="post">
                        <div class="modal-body">

                          <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" value="<?= $mobil['type']; ?>" name="type" required>
                          </div>
                          <div class="form-group">
                            <label>Merk</label>
                            <input type="text" class="form-control" value="<?= $mobil['merk']; ?>" name="merk" required>
                          </div>
                          <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" value="<?= $mobil['harga']; ?>" name="harga" required>
                          </div>
                          <div class="form-group">
                            <label>Jarak Tempuh</label>
                            <input type="text" class="form-control" value="<?= $mobil['jarak']; ?>" name="jarak" required>
                          </div>
                          <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" value="<?= $mobil['tahun']; ?>" name="tahun" required>
                          </div>


                        </div>
                        <div class="modal-footer">
                          <input type="hidden" class="form-control" value="<?= $mobil['id']; ?>" name="id">
                          <input type="hidden" class="form-control" value="<?= $mobil['id_showroom']; ?>" name="id_showroom">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-secondary" name="update" type="submit">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


                <!-- Modal Hapus -->

                <div class="modal fade" id="modalHapus<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Mobil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form class="" action="" method="post">
                        <div class="modal-body">

                          <p>Apakah Yakin Menghapus Data Mobil?</p>


                        </div>
                        <div class="modal-footer">
                          <input type="hidden" class="form-control" value="<?= $mobil['id']; ?>" name="id">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-secondary" name="delete" type="submit">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </tr>
            <?php }
            mysqli_close($db);

            // insert data

            $id = $_SESSION['id'];

            $id_showroom =  $_SESSION['id_showroom'];
            if (isset($_POST['mobil'])) {
              // echo $id_showroom = $_POST['id_showroom'];
              $type = $_POST['type'];
              $merk = $_POST['merk'];
              $harga = $_POST['harga'];
              $jarak = $_POST['jarak'];
              $tahun = $_POST['tahun'];

              $sqli = "INSERT INTO mobil VALUES ('','$type','$merk','$harga','$jarak','$tahun','$id_showroom')";
              mysqli_query($db, $sqli);
            }
            ?>



          </tbody>
        </table>
        <form class="" action="perhitungan.php" method="post">
          <button class="btn btn-warning" type="submit" name="reset">Tentukan kembali</button>
          <button class="btn btn-primary" type="submit" name="lanjut">Lanjut >></button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; UD. Suma Jaya 2020</span>
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

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>