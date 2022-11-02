<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
require_once 'template/header.php';
$id = $_SESSION['id'];
// if (isset($_GET['id'])) {
//   echo $_GET['id'];
// }

?>

<?php
// Update data bobot

if (isset($_POST['update'])) {
  $ida = $_POST['id'];
  $idm = $_POST['id_mobil'];

  $harga = $_POST['harga'];
  $penghasilan = $_POST['penghasilan'];
  $bbm = $_POST['bbm'];
  $mesin = $_POST['mesin'];
  $jarak = $_POST['jarak'];
  $tahun = $_POST['tahun'];


  $siqil = "UPDATE alternatif SET id='$ida',harga='$harga',penghasilan='$penghasilan',bbm='$bbm',mesin='$mesin',jarak='$jarak',tahun='$tahun',id_user='$id',id_mobil='$idm' WHERE id='$ida'";
  $update = mysqli_query($db, $siqil);
  if ($update) {
    echo ' <div class="row">
  <div class="col-lg-12">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Bobot berhasil di Update.
    </div>
  </div>
</div>';
  } else {
    echo ' <div class="row">
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

// Delete data alternatif

if (isset($_POST['delete'])) {
  $ida = $_POST['id'];



  $sql = "DELETE FROM `alternatif` WHERE id='$ida'";
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

<?php

// insert data 


// $id_alternatif =  $_SESSION['id_alternatif'];
if (isset($_POST['alternatif'])) {
  $mobil = $_POST['mobil'];
  $harga = $_POST['harga'];
  $penghasilan = $_POST['penghasilan'];
  $bbm = $_POST['bbm'];
  $mesin = $_POST['mesin'];
  $jarak = $_POST['jarak'];
  $tahun = $_POST['tahun'];

  $sql = "INSERT INTO alternatif VALUES ('','$harga','$penghasilan','$bbm','$mesin','$jarak','$tahun','$id','$mobil')";
  mysqli_query($db, $sql);
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Penentuan Alternatif</h1>
  </div>


  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">

      <li class="breadcrumb-item active" aria-current="page">Alternatif</li>
    </ol>
  </nav>


  <!-- <a href="a.php?id=<?= $id; ?>">cobak</a> -->

  <div class="row">
    <div class="col-xl-12">
      <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#input">Input Alternatif</button>
      <br><br>
    </div>
  </div>
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
              <label>Nama Showroom</label>

              <select class="form-control" name="showroom" id="showroom" aria-label="Default select example">
                <option selected>pilih alternatif</option>
                <?php
                $sql = "SELECT * FROM showroom";
                $query = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                  echo '<option value="' . $row['id'] . '">' . $row['nama_showroom'] . '</option>';
                } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Nama Mobil</label>

              <select class="form-control" name="mobil" id="mobil" aria-label="Default select example">


              </select>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" class="form-control" name="harga" required>
            </div>
            <div class="form-group">
              <label>Penghasilan</label>
              <input type="text" class="form-control" name="penghasilan" required>
            </div>
            <div class="form-group">
              <label>Konsumsi BBM</label>
              <input type="text" class="form-control" name="bbm" required>
            </div>
            <div class="form-group">
              <label>Kapasitas Mesin</label>
              <input type="text" class="form-control" name="mesin" required>
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
            <button class="btn btn-secondary" name="alternatif" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Alternatif</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>

              <th>No</th>
              <th>Type Mobil</th>
              <th>Harga</th>
              <th>Penghasilan</th>
              <th>BBM</th>
              <th>Mesin</th>
              <th>Jarak Tempuh</th>
              <th>Tahun</th>
              <th>aksi</th>


            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php

            $sql = "SELECT * FROM `mobil`
            JOIN alternatif ON (alternatif.id_mobil = mobil.id)
            WHERE id_user = '$id'";
            $query = mysqli_query($db, $sql);
            $no = 1;
            while ($alternatif = mysqli_fetch_assoc($query)) {
              $ida = $alternatif['id'];
              $idm = $alternatif['type'];



            ?>
              <!-- tampilkan data -->
              <tr>
                <td><?php echo $no++; ?></td>
                <!-- <td><?= $alternatif['id_mobil'] ?></td> -->
                <td><?= $alternatif['type'] ?></td>
                <td><?= "Rp " . number_format($alternatif['harga'], 2, ",", "."); ?></td>
                <td><?= "Rp " . number_format($alternatif['penghasilan'], 2, ",", "."); ?></td>


                <td><?= $alternatif['bbm'] . " km" . "/liter" ?></td>
                <td><?= $alternatif['mesin'] . " cc" ?></td>
                <td><?= $alternatif['jarak'] . " km" ?></td>
                <td><?= $alternatif['tahun'] ?></td>

                <td>

                  <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $alternatif['id'] ?>">Edit</button>
                  <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $alternatif['id']; ?>">Hapus</button>

                </td>


                <!-- modal edit -->

                <div class="modal fade" id="modalEdit<?= $alternatif['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label>Nama Mobil</label>


                            <select class="form-control" id="mobilEdit" aria-label="Default select example">

                              <option value="<?= $alternatif['id']; ?>"><?= $alternatif['type']; ?></option>










                            </select>

                          </div>

                          <div class="form-group">
                            <label>Harga</label>
                            <input type="text" class="form-control" value="<?= $alternatif['harga']; ?>" name="harga" required>
                          </div>
                          <div class="form-group">
                            <label>Penghasilan</label>
                            <input type="text" class="form-control" value="<?= $alternatif['penghasilan']; ?>" name="penghasilan" required>
                          </div>
                          <div class="form-group">
                            <label>Konsumsi BBM</label>
                            <input type="text" class="form-control" value="<?= $alternatif['bbm']; ?>" name="bbm" required>
                          </div>
                          <div class="form-group">
                            <label>Kapasitas Mesin</label>
                            <input type="text" class="form-control" value="<?= $alternatif['mesin']; ?>" name="mesin" required>
                          </div>
                          <div class="form-group">
                            <label>Jarak Tempuh</label>
                            <input type="text" class="form-control" value="<?= $alternatif['jarak']; ?>" name="jarak" required>
                          </div>
                          <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" value="<?= $alternatif['tahun']; ?>" name="tahun" required>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <input type="hidden" class="form-control" value="<?= $alternatif['id']; ?>" name="id">
                          <input type="hidden" class="form-control" value="<?= $alternatif['id_mobil'] ?>" name="id_mobil">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-secondary" name="update" type="submit">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal Hapus -->

                <div class="modal fade" id="modalHapus<?= $alternatif['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <input type="hidden" class="form-control" value="<?= $alternatif['id']; ?>" name="id">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-secondary" name="delete" type="submit">Hapus</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </tr>
            <?php }


            ?>


          </tbody>
        </table>
        <form class="" action="" method="post">

          <button class="btn btn-warning" type="submit" name="lanjut">Hitung Membership</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['lanjut'])) {
    echo '<script>window.location="membership.php";</script>';
  }
  ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Sistem Pendukung Keputusan FMADM Model Weight Product</span>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#showroom").change(function() {
      var id = $(this).val();
      var post_id = 'id=' + id;

      $.ajax({
        type: "POST",
        url: "ajax.php",
        data: post_id,
        cache: false,
        success: function(mobil) {
          $("#mobil").html(mobil);
        }
      });

    });
  });

  // $(document).ready(function() {
  //   /* PREPARE THE SCRIPT */
  //   $("#mobilEdit").change(function() {
  //     /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  //     var mobil = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
  //     var dataString = "mobil=" + mobil; /* STORE THAT TO A DATA STRING */

  //     $.ajax({
  //       /* THEN THE AJAX CALL */
  //       type: "POST",
  //       /* TYPE OF METHOD TO USE TO PASS THE DATA */
  //       url: "ajax.php",
  //       /* PAGE WHERE WE WILL PASS THE DATA */
  //       data: dataString,
  //       /* THE DATA WE WILL BE PASSING */
  //       success: function(mobilEdit) {
  //         /* GET THE TO BE RETURNED DATA */
  //         $("#mobilEdit").html(mobilEdit); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
  //       }
  //     });

  //   });
  // });



  // $(document).ready(function() {
  //   $("#mobilEdit").click(function() {
  //     var name = $(this).val();
  //     $("#mobilEdit").load('edit.php', {
  //       "mobilEdit": name
  //     });
  //   });
  // });
</script>


</body>

</html>