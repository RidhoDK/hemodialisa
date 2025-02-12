<?php
session_start();
include('../libs/koneksi.php');

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "<script>alert('Username atau password kosong!'); window.location='../login/index.php';</script>";
        exit();
    }

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']);

    $query = "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        switch ($data['type']) {
            case 'admin':
                $_SESSION['admin'] = $data['id_akun'];
                header("Location: ../html/admin/index.php");
                break;
            case 'operator':
                $_SESSION['operator'] = $data['id_akun'];
                header("Location: ../html/operator/index.php");
                break;
            case 'dokter':
                $_SESSION['dokter'] = $data['id_akun'];
                header("Location: ../html/dokter/index_dok.php");
                break;
            case 'farmasi':
                $_SESSION['farmasi'] = $data['id_akun'];
                header("Location: ../html/farmasi/index_far.php");
                break;
            default:
                echo "<script>alert('Level user tidak valid!'); window.location='../login/index.php';</script>";
                exit();
        }
        exit();
    } else {
        echo "<script>alert('Username atau password salah!'); window.location='../login/index.php';</script>";
        exit();
    }
}
