<?php

$batasHarga = ["awal" => 90000000, "tengah" => 285000000, "akhir" => 480000000];
$batasPenghasilan = ["awal" => 8000000, "tengah" => 29000000, "akhir" => 50000000];
$batasMesin = ["awal" => 1000, "tengah" => 2000, "akhir" => 3000];
$batasBbm = ["awal" => 8, "tengah" => 11.5, "akhir" => 15];
$batasJarak = ["awal" => 20000, "tengah" => 85000, "akhir" => 150000];
$batasTahun = ["awal" => 2013, "tengah" => 2017, "akhir" => 2021];


// miuK(2442, $batasMesin);
// miuS(2442, $batasMesin);
// miuT(2442, $batasMesin);

function miuK($nilaiX, array $batas)
{

  if ($nilaiX <= $batas['awal']) {
    $miuKecil = 1;
  } elseif ($nilaiX >= $batas['tengah']) {
    $miuKecil = 0;
  } else {
    $miuKecil = ($batas['tengah'] - $nilaiX) / ($batas['tengah'] - $batas['awal']);
  }
  echo $nilaiX;
  echo "<br>";
  echo $batas['awal'];
  echo "<br>";
  echo $batas['tengah'];
  echo "<br>";
  echo  $miuKecil;
}

function miuS($nilaiX, array $batas)
{

  if ($nilaiX >= $batas['awal'] && $nilaiX <= $batas['tengah']) {
    $miuSedang = ($nilaiX - $batas['awal']) / ($batas['tengah'] - $batas['awal']);
  } elseif ($nilaiX >= $batas['tengah'] && $nilaiX <= $batas['akhir']) {
    $miuSedang = ($batas['akhir'] - $nilaiX) / ($batas['akhir'] - $batas['tengah']);
  } elseif ($nilaiX <= $batas['awal'] || $nilaiX >= $batas['tengah']) {
    $miuSedang = 0;
  }

  echo $nilaiX;
  echo "<br>";
  echo $batas['awal'];
  echo "<br>";
  echo $batas['tengah'];
  echo "<br>";
  echo  $miuSedang;
}
function miuT($nilaiX, array $batas)
{

  if ($nilaiX <= $batas['tengah']) {
    $miuTinggi = 0;
  } elseif ($nilaiX >= $batas['akhir']) {
    $miuTinggi = 1;
  } else {
    $miuTinggi = ($nilaiX - $batas['tengah']) / ($batas['akhir'] - $batas['tengah']);
  }
  echo $nilaiX;
  echo "<br>";
  echo $batas['tengah'];
  echo "<br>";
  echo $batas['akhir'];
  echo "<br>";
  echo  $miuTinggi;
}
function miuKecil($nilaiX, array $batas)
{

  if ($nilaiX <= $batas['awal']) {
    $miuKecil = 1;
  } elseif ($nilaiX >= $batas['tengah']) {
    $miuKecil = 0;
  } else {
    $miuKecil = ($batas['tengah'] - $nilaiX) / ($batas['tengah'] - $batas['awal']);
  }

  return $miuKecil;
}

function miuSedang($nilaiX, array $batas)
{

  if ($nilaiX >= $batas['awal'] && $nilaiX <= $batas['tengah']) {
    $miuSedang = ($nilaiX - $batas['awal']) / ($batas['tengah'] - $batas['awal']);
  } elseif ($nilaiX >= $batas['tengah'] && $nilaiX <= $batas['akhir']) {
    $miuSedang = ($batas['akhir'] - $nilaiX) / ($batas['akhir'] - $batas['tengah']);
  } elseif ($nilaiX <= $batas['awal'] || $nilaiX >= $batas['tengah']) {
    $miuSedang = 0;
  }

  return $miuSedang;
}


function miuTinggi($nilaiX, array $batas)
{

  if ($nilaiX <= $batas['tengah']) {
    $miuTinggi = 0;
  } elseif ($nilaiX >= $batas['akhir']) {
    $miuTinggi = 1;
  } else {
    $miuTinggi = ($nilaiX - $batas['tengah']) / ($batas['akhir'] - $batas['tengah']);
  }
  return $miuTinggi;
}

function zPredikat($nilaiAlpha)
{
  if ($nilaiAlpha == 0) {
    $zPredikat = 3;
  } else if ($nilaiAlpha == 1) {
    $zPredikat = 1;
  } else {
    $zPredikat = 3 - ($nilaiAlpha * (3 - 1));
  }
  return $zPredikat;
}


function penilaianKh($defuzzy)
{
  if ($defuzzy <= 1) {
    $hasil = 'Kurang Mampu';
  } else if ($defuzzy >= 2) {
    $hasil = 'Sangat Mampu';
  } else {
    $hasil = 'Mampu';
  }
  return $hasil;
}
function penilaianKb($defuzzy)
{
  if ($defuzzy <= 1) {
    $hasil = 'Kurang Efisien';
  } else if ($defuzzy >= 2) {
    $hasil = 'Sangat Efisien';
  } else {
    $hasil = 'Efisien';
  }
  return $hasil;
}
function penilaianKm($defuzzy)
{
  if ($defuzzy <= 1) {
    $hasil = 'Kurang Layak';
  } else if ($defuzzy >= 2) {
    $hasil = 'Sangat Layak';
  } else {
    $hasil = 'Layak';
  }
  return $hasil;
}

function zAkhir($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $z1, $z2, $z3, $z4, $z5, $z6, $z7, $z8, $z9)
{
  $zAkhir = (($a1 * $z1) + ($a2 * $z2) + ($a3 * $z3) + ($a4 * $z4) + ($a5 * $z5) + ($a6 * $z6) + ($a7 * $z7) + ($a8 * $z8) + ($a9 * $z9)) / ($a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9);
  return $zAkhir;
}







function tampung($id, $kategori, $f1, $f2, $f3)
{
  $result = [
    $id,
    "$kategori" => $kategori,
    "kecil" => $f1,
    "sedang" => $f2,
    "tinggi" => $f3
  ];
  return $result;
}


function rule(array $hFuzzy, array $pFuzzy)
{
  $alpha1 = min($hFuzzy['tinggi'], $pFuzzy['kecil']);
  $alpha2 = min($hFuzzy['tinggi'], $pFuzzy['sedang']);
  $alpha3 = min($hFuzzy['tinggi'], $pFuzzy['tinggi']);
  $alpha4 = min($hFuzzy['sedang'], $pFuzzy['kecil']);
  $alpha5 = min($hFuzzy['sedang'], $pFuzzy['sedang']);
  $alpha6 = min($hFuzzy['sedang'], $pFuzzy['tinggi']);
  $alpha7 = min($hFuzzy['kecil'], $pFuzzy['kecil']);
  $alpha8 = min($hFuzzy['kecil'], $pFuzzy['sedang']);
  $alpha9 = min($hFuzzy['kecil'], $pFuzzy['tinggi']);
  $hasil = [
    "rule1" => $alpha1,
    "rule2" =>  $alpha2,
    "rule3" => $alpha3,
    "rule4" => $alpha4,
    "rule5" => $alpha5,
    "rule6" => $alpha6,
    "rule7" => $alpha7,
    "rule8" => $alpha8,
    "rule9" => $alpha9
  ];
  return $hasil;
}

function inferensi($alphapredikat)
{
  if ($alphapredikat > 0) {
    return $alphapredikat;
  }
}



function print_debug($data, $die_immediately = true)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
  if ($die_immediately) {
    die();
  }
}

// echo "<br>" . inferensi($eb1);
// echo "<br>" . inferensi($eb2);
// echo "<br>" . inferensi($eb3);
// echo "<br>" . inferensi($eb4);
// echo "<br>" . inferensi($eb5);
// echo "<br>" . inferensi($eb6);
// echo "<br>" . inferensi($eb7);
// echo "<br>" . inferensi($eb8);
// echo "<br>" . inferensi($eb9);
