<?php

use Symfony\Component\VarDumper\Cloner\Data;

require_once 'core/koneksi.php';
session_start();



if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
}
// select data username dan pass

$cekUser = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$login = mysqli_query($db, $cekUser);

$cek = mysqli_num_rows($login);
// pengecekan level user
if ($cek > 0) {

  $data = mysqli_fetch_assoc($login);

  if ($data['level'] == 'admin') {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'admin';
    $admin = $_SESSION['level'];
    echo "<script>alert('admin');</script>";
    echo " <script>window.location.href = 'dashboard.php';</script>";
  } elseif ($data['level'] == 'user') {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $username;
    $_SESSION['level'] = 'user';
    $user = $_SESSION['level'];
    echo "<script>alert('user');</script>";
    echo " <script>window.location.href = 'dashboard.php';</script>";
  } else {
    header("Location:index.php");
    echo "masukan username dan password";
  }
} else {
  header("Location:index.php");
  echo "masukan username dan password";
}

// $id = $_SESSION['id'];
// $cekShowroom = "SELECT * FROM showroom WHERE id_user='$id'";
// $show = mysqli_query($db, $cekShowroom);
// $cekShow = mysqli_num_rows($login);

// if ($cekShow > 0){
//   $data = mysqli_fetch_assoc($show);
//   if($data['level'] == 'admin'){
//     $_SESSION['havingShowroom'] = $data['id'];
//   }
// }