<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
    $nama_pasien = htmlspecialchars($_POST['tpasien']);
    $no_rm = htmlspecialchars($_POST['tno_rm']);
    $gol_dar = htmlspecialchars($_POST['tgol_dar']);
    $rhesus = htmlspecialchars($_POST['trhesus']);
    $jumlah_diminta = htmlspecialchars($_POST['tjumlah_diminta']);
    $tgl_permintaan = htmlspecialchars($_POST['ttgl_permintaan']);
    $prioritas = htmlspecialchars($_POST['tprioritas']);
    $status = htmlspecialchars($_POST['tstatus']);
    $catatan = htmlspecialchars($_POST['tcatatan']);

    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_permintaan (nama_pasien, no_rm, gol_dar, rhesus, jumlah_diminta, tgl_permintaan, prioritas, status, catatan) 
        VALUES ('$nama_pasien', '$no_rm', '$gol_dar', '$rhesus', '$jumlah_diminta', '$tgl_permintaan', '$prioritas', '$status', '$catatan')");

    if ($simpan) {
        echo "<script>
                alert('Add data successfully');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    } else {
        echo "<script>
                alert('Add data failed');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    }
}

if (isset($_POST['bedit'])) {
    $id_permintaan = htmlspecialchars($_POST['id_permintaan']);
    $nama_pasien = htmlspecialchars($_POST['tpasien']);
    $no_rm = htmlspecialchars($_POST['tno_rm']);
    $gol_dar = htmlspecialchars($_POST['tgol_dar']);
    $rhesus = htmlspecialchars($_POST['trhesus']);
    $jumlah_diminta = htmlspecialchars($_POST['tjumlah_diminta']);
    $tgl_permintaan = htmlspecialchars($_POST['ttgl_permintaan']);
    $prioritas = htmlspecialchars($_POST['tprioritas']);
    $status = htmlspecialchars($_POST['tstatus']);
    $catatan = htmlspecialchars($_POST['tcatatan']);

    $edit = mysqli_query($koneksi, "UPDATE tbl_permintaan SET 
        nama_pasien = '$nama_pasien',
        no_rm = '$no_rm',
        gol_dar = '$gol_dar',
        rhesus = '$rhesus',
        jumlah_diminta = '$jumlah_diminta',
        tgl_permintaan = '$tgl_permintaan',
        prioritas = '$prioritas',
        status = '$status',
        catatan = '$catatan' 
        WHERE id_permintaan = '$id_permintaan'");

    if ($edit) {
        echo "<script>
                alert('Edit data successfully');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    } else {
        echo "<script>
                alert('Edit data failed');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    $id_permintaan = htmlspecialchars($_POST['id_permintaan']);

    $delete = mysqli_query($koneksi, "DELETE FROM tbl_permintaan WHERE id_permintaan = '$id_permintaan'");

    if ($delete) {
        mysqli_query($koneksi, "ALTER TABLE tbl_permintaan AUTO_INCREMENT = 1");
        echo "<script>
                alert('Delete data successfully');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    } else {
        echo "<script>
                alert('Delete data failed');
                document.location= '../html/$sess_type/permintaan.php';
              </script>";
    }
}
