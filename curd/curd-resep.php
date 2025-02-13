<?php
session_start();
include('../libs/koneksi.php');
$sess_type = $_SESSION['type'];

if (isset($_POST['bsimpan'])) {
  $nama_pasien  = mysqli_real_escape_string($koneksi, $_POST['tpasien']);
  $dokter       = mysqli_real_escape_string($koneksi, $_POST['tid_dokter']);
  $tanggal      = mysqli_real_escape_string($koneksi, $_POST['ttanggal_resep']);
  $obat         = mysqli_real_escape_string($koneksi, $_POST['tnama_obat']);
  $dosis        = mysqli_real_escape_string($koneksi, $_POST['tdosis']);
  $jumlah       = mysqli_real_escape_string($koneksi, $_POST['tjumlah']);
  $aturan_pakai = mysqli_real_escape_string($koneksi, $_POST['taturan_pakai']);
  $status       = mysqli_real_escape_string($koneksi, $_POST['tstatus']);

  $simpan = mysqli_query($koneksi, "INSERT INTO tbl_resep (nama_pasien, dokter, tanggal_resep, nama_obat, dosis, jumlah, aturan_pakai, status) 
                  VALUES ('$nama_pasien', '$dokter', '$tanggal', '$obat', '$dosis', '$jumlah', '$aturan_pakai', '$status')");

  if ($simpan) {
    echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  } else {
    echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  }
}

if (isset($_POST['bedit'])) {
  $id_resep     = mysqli_real_escape_string($koneksi, $_POST['id_resep']);
  $tanggal      = mysqli_real_escape_string($koneksi, $_POST['ttanggal_resep']);
  $obat         = mysqli_real_escape_string($koneksi, $_POST['tnama_obat']);
  $dosis        = mysqli_real_escape_string($koneksi, $_POST['tdosis']);
  $jumlah       = mysqli_real_escape_string($koneksi, $_POST['tjumlah']);
  $aturan_pakai = mysqli_real_escape_string($koneksi, $_POST['taturan_pakai']);
  $status       = mysqli_real_escape_string($koneksi, $_POST['tstatus']);

  $edit = mysqli_query($koneksi, "UPDATE tbl_resep SET 
                    tanggal_resep = '$tanggal', 
                    nama_obat = '$obat', 
                    dosis = '$dosis', 
                    jumlah = '$jumlah', 
                    aturan_pakai = '$aturan_pakai', 
                    status = '$status'
                WHERE id_resep = '$id_resep'");

  if ($edit) {
    echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  } else {
    echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  }
}

if (isset($_POST['bhapus'])) {
  $id_resep = mysqli_real_escape_string($koneksi, $_POST['id_resep']);

  $delete = mysqli_query($koneksi, "DELETE FROM tbl_resep WHERE id_resep = '$id_resep'");

  if ($delete) {
    mysqli_query($koneksi, "ALTER TABLE tbl_resep AUTO_INCREMENT = 1");
    echo "<script>
                    alert('DELETE DATA SUCCESSFULLY');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  } else {
    echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../html/$sess_type/resep.php';
                  </script>";
  }
}
