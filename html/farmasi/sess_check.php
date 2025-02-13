<?php
session_start();
include("../../libs/koneksi.php");

if (!isset($_SESSION['farmasi']) || empty($_SESSION['farmasi'])) {
    header("location: ../../login/index.php");
    exit();
}

$chk_sess = $_SESSION['farmasi'];

$sql_sess = "SELECT * FROM tbl_akun WHERE id_akun='" . mysqli_real_escape_string($koneksi, $chk_sess) . "'";
$ress_sess = mysqli_query($koneksi, $sql_sess);
$row_sess = mysqli_fetch_array($ress_sess, MYSQLI_ASSOC);

if ($row_sess) {
    $sess_admid = $row_sess['id_akun'];
    $sess_admname = $row_sess['username'];
    $sess_type = $row_sess['type'];
} else {
    header("location: ../../login/index.php");
    exit();
}
