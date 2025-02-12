<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_permintaan (nama_pasien, no_rm, gol_dar, rhesus,
        jumlah_diminta, tgl_permintaan, prioritas, status, catatan)
        VALUES ('$_POST[tpasien]', '$_POST[tno_rm]', '$_POST[tgol_dar]',
         '$_POST[trhesus]', '$_POST[tjumlah_diminta]', '$_POST[ttgl_permintaan]',
         '$_POST[tprioritas]', '$_POST[tstatus]', '$_POST[tcatatan]')");

        if($simpan){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/permintaan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/permintaan.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_permintaan SET nama_pasien = '$_POST[tpasien]', no_rm = '$_POST[tno_rm]', gol_dar = '$_POST[tgol_dar]', rhesus = '$_POST[trhesus]', jumlah_diminta = '$_POST[tjumlah_diminta]', tgl_permintaan = '$_POST[ttgl_permintaan]', prioritas = '$_POST[tprioritas]', status = '$_POST[tstatus]', catatan = '$_POST[tcatatan]' WHERE id_permintaan = '$_POST[id_permintaan]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/permintaan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/permintaan.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_permintaan WHERE id_permintaan = '$_POST[id_permintaan]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_permintaan AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/permintaan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/permintaan.php';
                  </script>";
        }
    }
?>
