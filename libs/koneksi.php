<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "hd_db";

$koneksi = mysqli_connect($server, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
