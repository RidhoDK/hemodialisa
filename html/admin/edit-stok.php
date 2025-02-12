<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$pagetitle = 'Edit Stok';
include('layout-top.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_stokdarah'])) {
            $id_stokdarah = $_GET['id_stokdarah'];
            $query = "SELECT * FROM tbl_stokdarah WHERE id_stokdarah = '$id_stokdarah'";
            $result = mysqli_query($koneksi, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              $data = mysqli_fetch_assoc($result);
            } else {
              echo "Data pasien tidak ditemukan.";
              exit;
            }
          } else {
            echo "ID pasien tidak ditemukan.";
            exit;
          }
          ?>

          <form action="../../curd/curd-stok.php" method="POST">
            <input type="hidden" name="id_stokdarah" value="<?= $data['id_stokdarah'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Golongan Darah</b>
              </label>
              <input class="form-control" type="text" name="tgol_darah" value="<?= $data['gol_darah'] ?>" placeholder="Masukkan Golongan Darah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Rhesus</b>
              </label>
              <select class="form-select" name="trhesus" id="">
                <option value="<?= $data['rhesus'] ?>"><?= $data['rhesus'] ?></option>
                <option value="+">+</option>
                <option value="-">-</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jumlah Stok Darah</b>
              </label>
              <input class="form-control" type="text" name="tjumlah" value="<?= $data['jumlah'] ?>" placeholder="Masukkan Jumlah yang Tersedia">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tempat Penyimpanan</b>
              </label>
              <input class="form-control" type="text" name="ttgl_exp" value="<?= $data['tgl_exp'] ?>" placeholder="Masukkan Tempat Penyimpanan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Terakhir Di Update</b>
              </label>
              <input class="form-control" type="text" name="tlast_update" value="<?= $data['last_update'] ?>" placeholder="Masukkan Di Perbarui">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="stok-darah.php" class="btn btn-danger">Batal</a>
                  <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php'); ?>
