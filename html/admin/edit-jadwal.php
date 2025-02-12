<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$pagetitle = 'Edit Jadwal';
include('layout-top.php');

?>

<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <!-- / Navbar -->

  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_jadwal'])) {
            $id_jadwal = $_GET['id_jadwal'];
            $query = "SELECT * FROM tbl_jadwal WHERE id_jadwal = '$id_jadwal'";
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

          <form action="../curd/curd-jadwal.php" method="POST">
            <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <input class="form-control" type="text" name="tpasien" value="<?= $data['nama_pasien'] ?>" placeholder="Masukkan Nama Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Hemodialisa</b>
              </label>
              <input class="form-control" type="date" name="ttanggal" value="<?= $data['tanggal'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jam</b>
              </label>
              <input class="form-control" type="time" name="tjam" value="<?= $data['jam'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Ruangan</b>
              </label>
              <input class="form-control" type="text" name="truangan" value="<?= $data['ruangan'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Mesin</b>
              </label>
              <input class="form-control" type="text" name="tmesin" value="<?= $data['mesin'] ?>" placeholder="Masukkan Mesin">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status</b>
              </label>
              <input class="form-control" type="text" name="tstatus" value="<?= $data['status'] ?>" placeholder="Masukkan Tekanan Darah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
            </div>
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

<?php include('layout-bottom.php') ?>
