<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';

$id = $_SESSION['id'];
?>


<!-- Begin Page Content -->
<div class="container-fluid">



  <!-- insert data -->
  <?php

  // insert data bobot

  if (isset($_POST['bobot'])) {
    $bobot_kh = $_POST['bobot_kh'];
    $bobot_kb = $_POST['bobot_kb'];
    $bobot_km = $_POST['bobot_km'];


    $sql = "INSERT INTO bobot VALUES ('','$bobot_kh','$bobot_kb','$bobot_km','$id')";
    mysqli_query($db, $sql);
  }
  ?>

  <?php

  // Update data bobot

  if (isset($_POST['update'])) {
    $idb = $_POST['id'];
    $bobot_kh = $_POST['bobot_kh'];
    $bobot_kb = $_POST['bobot_kb'];
    $bobot_km = $_POST['bobot_km'];


    $sqll = "UPDATE bobot SET id='$idb',bobot_kh='$bobot_kh',bobot_kb='$bobot_kb',bobot_km='$bobot_km',id_user='$id' WHERE id='$idb'";
    $cek = mysqli_query($db, $sqll);
    if ($cek) {
      echo '  <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Data Bobot berhasil di Update.
        </div>
      </div>
    </div>';
    } else {
      echo '  <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Data Bobot gagal di Update.
        </div>
      </div>
    </div>';
    }
  }

  ?>

  <?php

  // Delete data bobot

  if (isset($_POST['delete'])) {
    $idb = $_POST['id'];



    $sql = "DELETE FROM `bobot` WHERE id='$idb'";
    $cek = mysqli_query($db, $sql);
    if ($cek) {
      echo '  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data Bobot berhasil di Delete.
      </div>
    </div>
  </div>';
    } else {
      echo '  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Data Bobot gagal di Delete.
      </div>
    </div>
  </div>';
    }
  }

  ?>












  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Penentuan Bobot</h1>
  </div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">

      <li class="breadcrumb-item active" aria-current="page">Bobot</li>
    </ol>
  </nav>
  <div class="row">

    <div class="col-xl-12">
      <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#input">Input Bobot</button>
      <br><br>
    </div>

  </div>
  <!-- modal input  -->
  <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Bobot </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" action="" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Kelayakan Harga</label>
              <input type="text" class="form-control" name="bobot_kh" required>
            </div>

            <div class="form-group">
              <label>Kelayakan Bbm</label>
              <input type="text" class="form-control" name="bobot_kb" required>
            </div>
            <div class="form-group">
              <label>Kelayakan Mesin</label>
              <input type="text" class="form-control" name="bobot_km" required>
            </div>


          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-secondary" name="bobot" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Bobot</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Kriteria</th>
              <th>Bobot</th>
              <th>Tipe</th>
              <th>aksi</th>



            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php

            $sql = "SELECT * FROM bobot 
            WHERE id_user = '$id'
            ";
            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($bobot = mysqli_fetch_assoc($query)) {




            ?>
              <!-- tampilkan data -->
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Harga"; ?></td>
                <td><?= $bobot['bobot_kh'] ?></td>
                <td><?php echo "Cost" ?></td>
                <td><button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $bobot['id']; ?>">Edit</button>
                  <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $bobot['id']; ?>">Hapus</button>
                </td>
              </tr>



              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Bbm"; ?></td>
                <td><?= $bobot['bobot_kb'] ?></td>
                <td><?php echo "Benefit" ?></td>
                <td><button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $bobot['id']; ?>">Edit</button>
                  <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $bobot['id']; ?>">Hapus</button>
                </td>
              </tr>



              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo " Kelayakan Mesin"; ?></td>
                <td><?= $bobot['bobot_km'] ?></td>
                <td><?php echo "Cost" ?></td>
                <td><button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $bobot['id']; ?>">Edit</button>
                  <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $bobot['id']; ?>">Hapus</button>
                </td>

              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="modalEdit<?= $bobot['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Bobot</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form class="" action="" method="post">
                      <div class="modal-body">

                        <div class="form-group">
                          <label>Kelayakan Harga</label>
                          <input type="text" class="form-control" value="<?= $bobot['bobot_kh']; ?>" name="bobot_kh" required>
                        </div>

                        <div class="form-group">
                          <label>Kelayakan Bbm</label>
                          <input type="text" class="form-control" value="<?= $bobot['bobot_kb']; ?>" name="bobot_kb" required>
                        </div>
                        <div class="form-group">
                          <label>Kelayakan Mesin</label>
                          <input type="text" class="form-control" value="<?= $bobot['bobot_km']; ?>" name="bobot_km" required>
                        </div>


                      </div>
                      <div class="modal-footer">
                        <input type="hidden" class="form-control" value="<?= $bobot['id']; ?>" name="id">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary" name="update" type="submit">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <!-- Modal Hapus -->

              <div class="modal fade" id="modalHapus<?= $bobot['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Bobot</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <form class="" action="" method="post">
                      <div class="modal-body">

                        <p>Apakah Yakin Menghapus Bobot?</p>


                      </div>
                      <div class="modal-footer">
                        <input type="hidden" class="form-control" value="<?= $bobot['id']; ?>" name="id">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary" name="delete" type="submit">Hapus</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



            <?php } ?>

          </tbody>
        </table>
        <form class="" action="" method="post">

          <button class="btn btn-warning" type="submit" name="vektor">Hitung Normalisasi Bobot</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['vektor'])) {
    echo '<script>window.location="normalisasi_bobot.php";</script>';
  }
  ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php require_once 'template/footer.php'; ?>
