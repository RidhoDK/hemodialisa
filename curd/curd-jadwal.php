<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_jadwal (nama_pasien, tanggal, jam, ruangan, mesin, status) VALUES ('$_POST[tpasien]', '$_POST[ttanggal]', '$_POST[tjam]', '$_POST[truangan]', '$_POST[tmesin]', '$_POST[tstatus]')");

        if($simpan){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_jadwal SET nama_pasien = '$_POST[tpasien]', tanggal = '$_POST[ttanggal]', jam = '$_POST[tjam]', ruangan = '$_POST[truangan]', mesin = '$_POST[tmesin]', status = '$_POST[tstatus]' WHERE id_jadwal = '$_POST[id_jadwal]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_jadwal WHERE id_jadwal = '$_POST[id_jadwal]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_jadwal AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/jadwal_hd.php';
                  </script>";
        }
    }
?>
