<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->


<!-- Nav Item --->

<?php
if ($_SESSION['level'] === 'admin') {
?>

  <div class="sidebar-heading">
    Data
  </div>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="data_showroom.php">
      <i class="fa-solid fa-warehouse"></i>
      <span>Showroom</span></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="data_mobil.php">
      <i class="fa-solid fa-car"></i>
      <span>Data Mobil</span></a>
  </li>

  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="laporan.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Laporan</span></a>
  </li>

  <hr class="sidebar-divider">

<?php } elseif ($_SESSION['level'] === 'user') { ?>
  <div class="sidebar-heading">
    Data
  </div>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="data_showroom.php">
      <i class="fa-solid fa-warehouse"></i>
      <span>Showroom</span></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="mobil.php">
      <i class="fa-solid fa-car"></i>
      <span>Data Mobil</span></a>
  </li>
  <div class="sidebar-heading">
    Proses Penentuan
  </div>
  <li class="nav-item">
    <a class="nav-link" href="alternatif_old.php">
      <i class="fas fa-fw fa-list"></i>
      <span>Alternatif</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="membership.php">
      <i class="fas fa-fw fa-edit"></i>

      <span>Membership</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="rule.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Inferensi</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="defuzzy.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Defuzzy</span></a>
  </li>


  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Perhitungan
  </div>
  <li class="nav-item">
    <a class="nav-link" href="bobot.php">
      <i class="fa-solid fa-scale-balanced"></i>
      <span>bobot</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="normalisasi_bobot.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Normalisasi Bobot</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vektor_s.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Penentuan Vektor S</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="vektor_v.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Penentuan Vektor V</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ranking.php">
      <i class="fas fa-fw fa-edit"></i>
      <span>Ranking</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">s
<?php } ?>