<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$data = 'programmer';
$db = mysqli_connect($host, $user, $pass, $data);

if (!$db) {
  die("Gagal Terhubung".mysqli_connect_errno());
}
 
?>