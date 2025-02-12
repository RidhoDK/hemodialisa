<?php
    include "../koneksi.php";
    if (isset($_POST['bsimpan'])) {
      $id_pasien = $_POST['tpasien'];
      $dokter = $_POST['tid_dokter'];
      $tanggal = $_POST['ttanggal_resep'];
      $obat = $_POST['tnama_obat'];
      $dosis = $_POST['tdosis'];
      $jumlah = $_POST['tjumlah'];
      $aturan_pakai = $_POST['taturan_pakai'];
      $status = $_POST['tstatus'];

      $simpan = mysqli_query($koneksi, "INSERT INTO tbl_resep (id_pasien, dokter, tanggal_resep, nama_obat, dosis, jumlah, aturan_pakai, status)
      VALUES ('$id_pasien', '$dokter', '$tanggal', '$obat', '$dosis', '$jumlah', '$aturan_pakai' ,'$status')");

      if ($simpan) {
          echo "<script>
                  alert('ADD DATA SUCCESSFULLY');
                  document.location= '../html/resep.php';
                </script>";
      } else {
          echo "<script>
                  alert('ADD DATA FAILED');
                  document.location= '../html/resep.php';
                </script>";
      }
  }

?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_resep SET tanggal_resep = '$_POST[ttanggal_resep]',
        nama_obat = '$_POST[tnama_obat]', dosis = '$_POST[tdosis]', jumlah = '$_POST[tjumlah]',
        jumlah = '$_POST[tjumlah]', aturan_pakai = '$_POST[taturan_pakai]', status = '$_POST[tstatus]' WHERE id_resep = '$_POST[id_resep]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/resep.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/resep.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_resep WHERE id_resep = '$_POST[id_resep]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_resep AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/resep.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/resep.php';
                  </script>";
        }
    }
?>
