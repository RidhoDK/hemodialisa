<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
    $nama_pasien = htmlspecialchars($_POST['tnama_pasien']);
    $no_rm = htmlspecialchars($_POST['tno_rm']);
    $urea = htmlspecialchars($_POST['turea']);
    $kreatinin = htmlspecialchars($_POST['tkreatinin']);
    $hemoglobin = htmlspecialchars($_POST['themoglobin']);
    $sebelum_hd = htmlspecialchars($_POST['tsebelum_hd']);
    $sesudah_hd = htmlspecialchars($_POST['tsesudah_hd']);

    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_hasillab (nama_pasien, no_rm, urea, kreatinin, hemoglobin, sebelum_hd, sesudah_hd) 
        VALUES ('$nama_pasien', '$no_rm', '$urea', '$kreatinin', '$hemoglobin', '$sebelum_hd', '$sesudah_hd')");

    if ($simpan) {
        echo "<script>
                alert('Add data successfully');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    } else {
        echo "<script>
                alert('Add data failed');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    }
}

if (isset($_POST['bedit'])) {
    $id_hasillab = htmlspecialchars($_POST['id_hasillab']);
    $nama_pasien = htmlspecialchars($_POST['tnama_pasien']);
    $no_rm = htmlspecialchars($_POST['tno_rm']);
    $urea = htmlspecialchars($_POST['turea']);
    $kreatinin = htmlspecialchars($_POST['tkreatinin']);
    $hemoglobin = htmlspecialchars($_POST['themoglobin']);
    $sebelum_hd = htmlspecialchars($_POST['tsebelum_hd']);
    $sesudah_hd = htmlspecialchars($_POST['tsesudah_hd']);

    $edit = mysqli_query($koneksi, "UPDATE tbl_hasillab SET 
        nama_pasien = '$nama_pasien', 
        no_rm = '$no_rm', 
        urea = '$urea', 
        kreatinin = '$kreatinin', 
        hemoglobin = '$hemoglobin', 
        sebelum_hd = '$sebelum_hd', 
        sesudah_hd = '$sesudah_hd' 
        WHERE id_hasillab = '$id_hasillab'");

    if ($edit) {
        echo "<script>
                alert('Edit data successfully');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    } else {
        echo "<script>
                alert('Edit data failed');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    }
}

if (isset($_POST['bhapus'])) {
    $id_hasillab = htmlspecialchars($_POST['id_hasillab']);

    $delete = mysqli_query($koneksi, "DELETE FROM tbl_hasillab WHERE id_hasillab = '$id_hasillab'");

    if ($delete) {
        mysqli_query($koneksi, "ALTER TABLE tbl_hasillab AUTO_INCREMENT = 1");
        echo "<script>
                alert('Delete data successfully');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    } else {
        echo "<script>
                alert('Delete data failed');
                document.location= '../html/$sess_type/hasil_lab.php';
              </script>";
    }
}
