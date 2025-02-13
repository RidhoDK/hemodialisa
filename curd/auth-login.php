<?php
session_start();
include('../libs/koneksi.php');

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "<script>alert('Username atau password kosong!'); window.location='../login/index.php';</script>";
        exit();
    }

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password']; // Pastikan password terenkripsi dengan benar

    $query = "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi)); // Cek error query
    }

    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $_SESSION['type'] = $data['type'];

        switch ($data['type']) {
            case 'admin':
                $_SESSION['admin'] = $data['id_akun'];
                header("Location: ../html/admin/index.php");
                exit();
            case 'operator':
                $_SESSION['opterator'] = $data['id_akun'];
                header("Location: ../html/operator/index.php");
                exit();
            case 'dokter':
                $_SESSION['dokter'] = $data['id_akun'];
                header("Location: ../html/dokter/index.php");
                exit();
            case 'farmasi':
                $_SESSION['farmasi'] = $data['id_akun'];
                header("Location: ../html/farmasi/index.php");
                exit();
            default:
                echo "<script>alert('Level user tidak valid!'); window.location='../login/index.php';</script>";
                exit();
        }
    } else {
        echo "<script>alert('Username atau password salah!'); window.location='../login/index.php';</script>";
        exit();
    }
}
