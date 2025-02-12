<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
    $nama_pasien = htmlspecialchars($_POST['tpasien']);
    $tanggal = htmlspecialchars($_POST['ttanggal']);
    $jam = htmlspecialchars($_POST['tjam']);
    $ruangan = htmlspecialchars($_POST['truangan']);
    $mesin = htmlspecialchars($_POST['tmesin']);
    $status = htmlspecialchars($_POST['tstatus']);

    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_jadwal (nama_pasien, tanggal, jam, ruangan, mesin, status) 
        VALUES ('$nama_pasien', '$tanggal', '$jam', '$ruangan', '$mesin', '$status')");

    if ($simpan) {
        echo "<script>
                alert('Add data successfully');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    } else {
        echo "<script>
                alert('Add data failed');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    }
}

if (isset($_POST['bedit'])) {
    $id_jadwal = htmlspecialchars($_POST['id_jadwal']);
    $nama_pasien = htmlspecialchars($_POST['tpasien']);
    $tanggal = htmlspecialchars($_POST['ttanggal']);
    $jam = htmlspecialchars($_POST['tjam']);
    $ruangan = htmlspecialchars($_POST['truangan']);
    $mesin = htmlspecialchars($_POST['tmesin']);
    $status = htmlspecialchars($_POST['tstatus']);

    $edit = mysqli_query($koneksi, "UPDATE tbl_jadwal SET 
        nama_pasien = '$nama_pasien', 
        tanggal = '$tanggal', 
        jam = '$jam', 
        ruangan = '$ruangan', 
        mesin = '$mesin', 
        status = '$status' 
        WHERE id_jadwal = '$id_jadwal'");

    if ($edit) {
        echo "<script>
                alert('Edit data successfully');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    } else {
        echo "<script>
                alert('Edit data failed');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    $id_jadwal = htmlspecialchars($_POST['id_jadwal']);

    $delete = mysqli_query($koneksi, "DELETE FROM tbl_jadwal WHERE id_jadwal = '$id_jadwal'");

    if ($delete) {
        mysqli_query($koneksi, "ALTER TABLE tbl_jadwal AUTO_INCREMENT = 1");
        echo "<script>
                alert('Delete data successfully');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    } else {
        echo "<script>
                alert('Delete data failed');
                document.location= '../html/$sess_type/jadwal_hd.php';
              </script>";
    }
}
