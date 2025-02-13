<?php
session_start();
include('../libs/koneksi.php');

$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
  $gol_darah = htmlspecialchars($_POST['tgol_darah']);
  $rhesus = htmlspecialchars($_POST['trhesus']);
  $jumlah = htmlspecialchars($_POST['tjumlah']);
  $tempat = htmlspecialchars($_POST['ttempat']);
  $tgl_exp = htmlspecialchars($_POST['ttgl_exp']);
  $last_update = htmlspecialchars($_POST['tlast_update']);

  $simpan = mysqli_query($koneksi, "INSERT INTO tbl_stokdarah (gol_darah, rhesus, jumlah, tempat, tgl_exp, last_update) 
        VALUES ('$gol_darah', '$rhesus', '$jumlah', '$tempat', '$tgl_exp', '$last_update')");

  if ($simpan) {
    echo "<script>
                alert('Add data successfully');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  } else {
    echo "<script>
                alert('Add data failed');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  }
}

if (isset($_POST['bedit'])) {
  $id_stokdarah = htmlspecialchars($_POST['id_stokdarah']);
  $gol_darah = htmlspecialchars($_POST['tgol_darah']);
  $rhesus = htmlspecialchars($_POST['trhesus']);
  $jumlah = htmlspecialchars($_POST['tjumlah']);
  $tempat = htmlspecialchars($_POST['ttempat']);
  $tgl_exp = htmlspecialchars($_POST['ttgl_exp']);
  $last_update = htmlspecialchars($_POST['tlast_update']);

  $edit = mysqli_query($koneksi, "UPDATE tbl_stokdarah SET 
        gol_darah = '$gol_darah', 
        rhesus = '$rhesus', 
        jumlah = '$jumlah', 
        tempat = '$tempat', 
        tgl_exp = '$tgl_exp', 
        last_update = '$last_update' 
        WHERE id_stokdarah = '$id_stokdarah'");

  if ($edit) {
    echo "<script>
                alert('Edit data successfully');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  } else {
    echo "<script>
                alert('Edit data failed');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  }
}

if (isset($_POST['bhapus'])) {
  $id_stokdarah = htmlspecialchars($_POST['id_stokdarah']);

  $delete = mysqli_query($koneksi, "DELETE FROM tbl_stokdarah WHERE id_stokdarah = '$id_stokdarah'");

  if ($delete) {
    mysqli_query($koneksi, "ALTER TABLE tbl_stokdarah AUTO_INCREMENT = 1");
    echo "<script>
                alert('Delete data successfully');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  } else {
    echo "<script>
                alert('Delete data failed');
                document.location= '../html/$sess_type/stok-darah.php';
              </script>";
  }
}
