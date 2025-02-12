<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
      $simpan = mysqli_query($koneksi, "INSERT INTO tbl_tagihan (nama_pasien, no_rm, total_biaya, tanggal_pembayaran, metode_pembayaran, status_pembayaran) VALUES ('$_POST[tnama_pasien]', '$_POST[tno_rm]', '$_POST[ttotal_biaya]', '$_POST[ttanggal_pembayaran]', '$_POST[tmetode_pembayaran]', '$_POST[tstatus_pembayaran]')");

      if($simpan){
          echo "<script>
                  alert('ADD DATA SUCCESSFULLY');
                  document.location= '../html/tagihan.php';
                </script>";
      } else {
          echo "<script>
                  alert('ADD DATA FAILED');
                  document.location= '../html/tagihan.php';
                </script>";
      }
  }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_tagihan SET nama_pasien = '$_POST[tnama_pasien]',
         no_rm = '$_POST[tno_rm]', total_biaya = '$_POST[ttotal_biaya]', tanggal_pembayaran = '$_POST[ttanggal_pembayaran]', metode_pembayaran = '$_POST[tmetode_pembayaran]', status_pembayaran = '$_POST[tstatus_pembayaran]'
         WHERE id_tagihan = '$_POST[id_tagihan]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/tagihan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/tagihan.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_tagihan WHERE id_tagihan = '$_POST[id_tagihan]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_pasien AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/tagihan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/tagihan.php';
                  </script>";
        }
    }
?>
