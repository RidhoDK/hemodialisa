<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_hasillab (nama_pasien, no_rm, urea, Kreatinin, hemoglobin, sebelum_hd, sesudah_hd)
        VALUES ('$_POST[tnama_pasien]', '$_POST[tno_rm]', '$_POST[turea]', '$_POST[tKreatinin]', '$_POST[themoglobin]',
        '$_POST[tsebelum_hd]', '$_POST[tsesudah_hd]')");

        if($simpan){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_hasillab SET nama_pasien = '$_POST[tnama_pasien]', urea = '$_POST[turea]', Kreatinin = '$_POST[tKreatinin]', hemoglobin = '$_POST[themoglobin]', sesudah_hd = '$_POST[tsesudah_hd]', sebelum_hd = '$_POST[tsebelum_hd]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_hasillab WHERE id_hasillab = '$_POST[id_hasillab]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_hasillab AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/hasil_lab.php';
                  </script>";
        }
    }
?>
