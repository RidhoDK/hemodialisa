<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pasien (nama_pasien, no_rm, umur, jenis_kelamin, tanggal, durasi, tensi, berat_badan, diagnosa, obat)
        VALUES ('$_POST[tnama_pasien]', '$_POST[tno_rm]', '$_POST[tumur]', '$_POST[tjk]', '$_POST[ttgl]', '$_POST[tdurasi]',
        '$_POST[ttensi]', '$_POST[tberatbadan]', '$_POST[tdiagnosa]', '$_POST[tobat]')");

        if($simpan){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/pasien.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/pasien.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_pasien SET nama_pasien = '$_POST[tnama_pasien]', no_rm = '$_POST[tno_rm]', umur = '$_POST[tumur]', jenis_kelamin = '$_POST[tjk]', tanggal = '$_POST[ttgl]', durasi = '$_POST[tdurasi]', tensi = '$_POST[ttensi]', berat_badan = '$_POST[tberatbadan]', diagnosa = '$_POST[tdiagnosa]', obat = '$_POST[tobat]' WHERE id_pasien = '$_POST[id_pasien]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/pasien.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/pasien.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_pasien WHERE id_pasien = '$_POST[id_pasien]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_pasien AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/pasien.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/pasien.php';
                  </script>";
        }
    }
?>
