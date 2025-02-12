<?php
include "../koneksi.php";


if (isset($_POST['bsimpan'])) {
  $simpan = mysqli_query($koneksi, "INSERT INTO tbl_stokdarah (gol_darah, rhesus, jumlah, tempat, tgl_exp, last_update)
        VALUES ('$_POST[tgol_darah]', '$_POST[trhesus]', '$_POST[tjumlah]', '$_POST[ttempat]', '$_POST[ttgl_exp]', '$_POST[tlast_update]')");

  if ($simpan) {
    echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/stok_darah.php';
                  </script>";
  } else {
    echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/stok_darah.php';
                  </script>";
  }
}
?>

<?php
include "../koneksi.php";

if (isset($_POST['bedit'])) {
  $edit = mysqli_query($koneksi, "UPDATE tbl_stokdarah SET gol_darah = '$_POST[tgol_darah]', rhesus = '$_POST[trhesus]', jumlah = '$_POST[tjumlah]', tempat = '$_POST[ttempat]', tgl_exp = '$_POST[ttgl_exp]', last_update = '$_POST[tlast_update]'");

  if ($edit) {
    echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/admin/stok-darah.php';
                  </script>";
  } else {
    echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/admin/stok-darah.php';
                  </script>";
  }
}
?>

<?php
include "../koneksi.php";

if (isset($_POST['bhapus'])) {
  $delete = mysqli_query($koneksi, "DELETE FROM tbl_stokdarah WHERE id_stokdarah = '$_POST[id_stokdarah]'");

  if ($delete) {
    mysqli_query($koneksi, "ALTER TABLE tbl_stokdarah AUTO_INCREMENT = 1");
    echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/stok_darah.php';
                  </script>";
  } else {
    echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/stok_darah.php';
                  </script>";
  }
}
?>
