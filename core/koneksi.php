<?php
$hostName  = "localhost";
$username  = "root";
$password  = "";
$dbName    = "fuzzywp";

$db = mysqli_connect($hostName, $username, $password, $dbName);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
