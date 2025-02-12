<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$titlepage = 'Edit Alat dan Obat';
include('layout-top.php');
?>

<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->



  <!-- / Navbar -->

  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_alatobat'])) {
            $id_alatobat = $_GET['id_alatobat'];  // Ganti $id_pasien menjadi $id_alatobat
            $query = "SELECT * FROM tbl_alatobat WHERE id_alatobat = '$id_alatobat'";  // Gunakan $id_alatobat dalam query
            $result = mysqli_query($koneksi, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              $data = mysqli_fetch_assoc($result);
            } else {
              echo "Data alat atau obat tidak ditemukan.";
              exit;
            }
          } else {
            echo "ID alat atau obat tidak ditemukan.";
            exit;
          }
          ?>

          <form action="../curd/curd-alatobat.php" method="POST">
            <input type="hidden" name="id_alatobat" value="<?= $data['id_alatobat'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Barang</b>
              </label>
              <input class="form-control" type="text" name="tnama_barang" placeholder="Masukkan Nama Barang" value="<?= $data['nama_barang'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jumlah Stok</b>
              </label>
              <input class="form-control" type="text" name="tjumlah_stok" placeholder="Masukkan Jumlah" value="<?= $data['jumlah_stok'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Kedaluarsa</b>
              </label>
              <input class="form-control" type="date" name="ttgl_exp" placeholder="Masukkan Tanggal Kedaluarsa" value="<?= $data['tgl_exp'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tersedia</b>
              </label>
              <select class="form-select" name="ttersedia" id="">
                <option value="<?= $data['tersedia'] ?>"><?= $data['tersedia'] ?></option>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="pasien.php" class="btn btn-danger">Batal</a>
                  <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php'); ?>
