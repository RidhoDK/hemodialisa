<?php
session_start();
include('../libs/koneksi.php');
$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
    $nama_barang  = mysqli_real_escape_string($koneksi, $_POST['tnama_barang']);
    $jumlah_stok  = mysqli_real_escape_string($koneksi, $_POST['tjumlah_stok']);
    $tgl_exp      = mysqli_real_escape_string($koneksi, $_POST['ttgl_exp']);
    $tersedia     = mysqli_real_escape_string($koneksi, $_POST['ttersedia']);

    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_alatobat (nama_barang, jumlah_stok, tgl_exp, tersedia) 
                  VALUES ('$nama_barang', '$jumlah_stok', '$tgl_exp', '$tersedia')");

    if ($simpan) {
        echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    } else {
        echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    }
}

if (isset($_POST['bedit'])) {
    $id_alatobat  = mysqli_real_escape_string($koneksi, $_POST['id_alatobat']);
    $nama_barang  = mysqli_real_escape_string($koneksi, $_POST['tnama_barang']);
    $jumlah_stok  = mysqli_real_escape_string($koneksi, $_POST['tjumlah_stok']);
    $tgl_exp      = mysqli_real_escape_string($koneksi, $_POST['ttgl_exp']);
    $tersedia     = mysqli_real_escape_string($koneksi, $_POST['ttersedia']);

    $edit = mysqli_query($koneksi, "UPDATE tbl_alatobat SET 
                    nama_barang = '$nama_barang', 
                    jumlah_stok = '$jumlah_stok', 
                    tgl_exp = '$tgl_exp', 
                    tersedia = '$tersedia'
                WHERE id_alatobat = '$id_alatobat'");

    if ($edit) {
        echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    } else {
        echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    }
}

if (isset($_POST['bhapus'])) {
    $id_alatobat = mysqli_real_escape_string($koneksi, $_POST['id_alatobat']);

    $delete = mysqli_query($koneksi, "DELETE FROM tbl_alatobat WHERE id_alatobat = '$id_alatobat'");

    if ($delete) {
        mysqli_query($koneksi, "ALTER TABLE tbl_alatobat AUTO_INCREMENT = 1");
        echo "<script>
                    alert('DELETE DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    } else {
        echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/$sess_type/stok-alatobat.php';
                  </script>";
    }
}
