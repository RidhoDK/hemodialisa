<?php
    include "../koneksi.php";


    if(isset($_POST['bsimpan'])) {
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_alatobat (nama_barang, jumlah_stok, tgl_exp, tersedia)
        VALUES ('$_POST[tnama_barang]', '$_POST[tjumlah_stok]', '$_POST[ttgl_exp]', '$_POST[ttersedia]')");

        if($simpan){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE tbl_alatobat SET nama_barang = '$_POST[tnama_barang]', jumlah_stok = '$_POST[tjumlah_stok]', tgl_exp = '$_POST[ttgl_exp]', tersedia = '$_POST[ttersedia]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bhapus'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM tbl_alatobat WHERE id_alatobat = '$_POST[id_alatobat]'");

        if($delete){
            mysqli_query($koneksi, "ALTER TABLE tbl_stokdarah AUTO_INCREMENT = 1");
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/stok_alatobat.php';
                  </script>";
        }
    }
?>
