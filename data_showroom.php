<?php
require_once 'core/koneksi.php';
require_once 'core/hitung.php';
include 'template/header.php';

$id = $_SESSION['id'];
?>
<?php

// Update data bobot

if (isset($_POST['update'])) {
  $ids = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $profil = $_POST['profil'];
  $id = $_POST['id_user'];



  $siqil = "UPDATE showroom SET id='$id',nama_showroom='$nama',alamat='$alamat',telepon='$telepon',profil='$profil',id_user='$id'WHERE id='$ids'";
  $update = mysqli_query($db, $siqil);
  if ($update) {
    echo ' <div class="row">
  <div class="col-lg-12">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Showroom berhasil di Ubah.
    </div>
  </div>
</div>';
  } else {
    echo ' <div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Showroom gagal di Ubah.
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


  if (isset($_POST['showroom'])) {

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $profil = $_POST['profil'];



    $sql = "INSERT INTO showroom VALUES ('$id','$nama','$alamat','$telepon','$profil','$id')";
    mysqli_query($db, $sql);
  }

  if (isset($_POST['deletep'])) {
    $id_s=$_POST['id_hapus'];
    $sql = "DELETE FROM showroom WHERE id='$id_s'";
    $query=mysqli_query($db, $sql);
    if ($query) {
      echo '
      <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data showroom berhasil didelete.
            </div>
          </div>
          <!-- /.col-lg-12 -->
      </div>
      ';
    } else {
      echo '
      <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data showroom gagal didelete.
            </div>
          </div>
          <!-- /.col-lg-12 -->
      </div>
      ';
    }
  }

  ?>

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Shworoom</h1>
  </div>
  <!-- && $_SESSION['nama_showroom'] == null -->
  
  <?php if ($_SESSION['level'] === 'admin' ) {
    $sql = "SELECT * FROM showroom WHERE id_user = '$id'"; ?>

    <div class="row">
      <div class="col-xl-12">
        <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#input">Input Shworoom</button>
        <br><br>
      </div>
    </div>
  <?php } ?>

  <!-- modal input  -->
  <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Shworoom Mobil</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" action="" method="post">
          <div class="modal-body">
            <div class="col-xl-12">
              <div class="form-group">
                <label>Nama Showroom</label>
                <input type="text" class="form-control" name="nama" required>
              </div>
              <div class="form-group">
                <label>Alamat </label>
                <input type="text" class="form-control" name="alamat" required>
              </div>
              <div class="form-group">
                          <label>Telepon</label>
                          <input type="number" class="form-control" name="telepon"  required>
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlTextarea5">Profil Showroom</label>
                      <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" name="profil"></textarea>
                      </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-secondary" name="showroom" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- end modal input -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Showroom</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <!-- <th>Profil</th> -->
              <?php if ($_SESSION['level'] === 'admin') {
                $sql = "SELECT * FROM showroom WHERE id_user=$id";
              ?>
              
                <th>Aksi</th>
              <?php }
              if ($_SESSION['level'] === 'user') {
                $sql = "SELECT * FROM showroom";
              ?>
                <th>Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>

            <!-- select data -->

            <?php
            $_SESSION['nama_showroom'] = [];
            $_SESSION['id_s'] = [];
            // var_dump($_SESSION['id_s']);

            $query = mysqli_query($db, $sql);

            while ($showroom = mysqli_fetch_assoc($query)) {

              $_SESSION['nama_showroom'][] = $showroom['nama_showroom'];
              $_SESSION['id_s'][] =  $showroom['id'];


            ?>
              <!-- tampilkan data -->
              <tr>

            
                <td><?= $showroom['nama_showroom'] ?></td>
                <td><?= 'Jl. '. $showroom['alamat'] ?></td>
                <td><?= $showroom['telepon'] ?></td>
                  <!-- <td><?= $showroom['profil'] ?></td> -->

                <?php if ($_SESSION['level'] === 'admin') { ?>
                 
                  <td>
                    <button class="btn btn-secondary" type="button" name="button" data-toggle="modal" data-target="#modalEdit<?= $showroom['id'] ?>">Edit</button>
                    <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $showroom['id']; ?>">Hapus</button>

                  </td>
                <?php } ?>
                <?php if ($_SESSION['level'] === 'user') { ?>
                  <td>
                    <a href="data_stock_showroom.php?id=<?= $showroom['id'] ?>&showroom=<?= $showroom['nama_showroom'] ?>"> <button class="btn btn-secondary">Detail Mobil</button></a>


                  </td>
                <?php } ?>



                  <!-- modal editt  -->
  <div class="modal fade" id="modalEdit<?= $showroom['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Shworoom Mobil</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="" action="" method="post">
          <div class="modal-body">
            <div class="col-xl-12">
              <div class="form-group">
                <label>Nama Showroom</label>
                <input type="text" class="form-control" value="<?= $showroom['nama_showroom']; ?>"name="nama" required>
              </div>
              <div class="form-group">
                <label>Alamat </label>
                <input type="text" class="form-control" value="<?= $showroom['alamat']; ?>" name="alamat" required>
              </div>
              <div class="form-group">
                          <label>Telepon</label>
                          <input type="number" class="form-control" value="<?= $showroom['telepon']; ?>" name="telepon"  required>
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlTextarea5">Profil Showroom</label>
                      <textarea class="form-control" id="exampleFormControlTextarea5" rows="3" value="<?= $showroom['profil']; ?>"name="profil"><?= $showroom['profil']; ?></textarea>
                      </div>
            </div>
          </div>
          <div class="modal-footer">
                          <input type="hidden" class="form-control" value="<?= $showroom['id']; ?>" name="id">
                          <input type="hidden" class="form-control" value="<?= $showroom['id_user']; ?>" name="id_user">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                          <button class="btn btn-secondary" name="update" type="submit">Simpan</button>
                        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- end modal editt -->

               

 <!-- modal hapus  -->                                                     
 <div class="modal fade" id="modalHapus<?php echo $showroom['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Showroom</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <form class="" action="" method="post">
                                      <div class="modal-body">
                                        <div class="col-xl-12">
                                        <input type="hidden" name="id_hapus" value="<?php echo $showroom['id']; ?>">
                                        <input type="hidden" name="id_hapus_user" value="<?php echo $showroom['id_user']; ?>">
                                            <div class="form-group">
                                                <label>Yakin Hapus</label>
                                          
                                            </div>
                                          
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-secondary" name="deletep" type="submit">Simpan</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
 <!-- end modal hapus -->

              </tr>
            <?php } ?>

          </tbody>
        </table>
        <form class="" action="perhitungan.php" method="post">

        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<?php require_once 'template/footer.php'; ?>

