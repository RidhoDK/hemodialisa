<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
  $nama_pasien = htmlspecialchars($_POST['tnama_pasien']);
  $no_rm = htmlspecialchars($_POST['tno_rm']);
  $total_biaya = htmlspecialchars($_POST['ttotal_biaya']);
  $tanggal_pembayaran = htmlspecialchars($_POST['ttanggal_pembayaran']);
  $metode_pembayaran = htmlspecialchars($_POST['tmetode_pembayaran']);
  $status_pembayaran = htmlspecialchars($_POST['tstatus_pembayaran']);

  $simpan = mysqli_query($koneksi, "INSERT INTO tbl_tagihan (nama_pasien, no_rm, total_biaya, tanggal_pembayaran, metode_pembayaran, status_pembayaran) 
        VALUES ('$nama_pasien', '$no_rm', '$total_biaya', '$tanggal_pembayaran', '$metode_pembayaran', '$status_pembayaran')");

  if ($simpan) {
    echo "<script>
                alert('Add data successfully');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  } else {
    echo "<script>
                alert('Add data failed');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  }
}

if (isset($_POST['bedit'])) {
  $id_tagihan = htmlspecialchars($_POST['id_tagihan']);
  $nama_pasien = htmlspecialchars($_POST['tnama_pasien']);
  $no_rm = htmlspecialchars($_POST['tno_rm']);
  $total_biaya = htmlspecialchars($_POST['ttotal_biaya']);
  $tanggal_pembayaran = htmlspecialchars($_POST['ttanggal_pembayaran']);
  $metode_pembayaran = htmlspecialchars($_POST['tmetode_pembayaran']);
  $status_pembayaran = htmlspecialchars($_POST['tstatus_pembayaran']);

  $edit = mysqli_query($koneksi, "UPDATE tbl_tagihan SET 
        nama_pasien = '$nama_pasien', 
        no_rm = '$no_rm', 
        total_biaya = '$total_biaya', 
        tanggal_pembayaran = '$tanggal_pembayaran', 
        metode_pembayaran = '$metode_pembayaran', 
        status_pembayaran = '$status_pembayaran' 
        WHERE id_tagihan = '$id_tagihan'");

  if ($edit) {
    echo "<script>
                alert('Edit data successfully');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  } else {
    echo "<script>
                alert('Edit data failed');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  }
}

if (isset($_POST['bhapus'])) {
  $id_tagihan = htmlspecialchars($_POST['id_tagihan']);

  $delete = mysqli_query($koneksi, "DELETE FROM tbl_tagihan WHERE id_tagihan = '$id_tagihan'");

  if ($delete) {
    mysqli_query($koneksi, "ALTER TABLE tbl_tagihan AUTO_INCREMENT = 1");
    echo "<script>
                alert('Delete data successfully');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  } else {
    echo "<script>
                alert('Delete data failed');
                document.location= '../html/$sess_type/tagihan.php';
              </script>";
  }
}
