<?php
require_once 'core/koneksi.php';
if ($_POST['id']) {
  $id = $_POST['id'];
  if ($id == 0) {
    echo "<option>Select mobil</option>";
  } else {
    $sql = mysqli_query($db, "SELECT * FROM mobil WHERE id_showroom='$id'");
    while ($row = mysqli_fetch_array($sql)) {
      echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
    }
  }
}
