<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$pagetitle = 'Input Jadwal';
include('layout-top.php');
include('layout-bottom.php');
?>
<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <!-- / Navbar -->

  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <form action="../curd/curd-jadwal.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <select class="form-control" name="tpasien">
                <option value="">-- Pilih Pasien --</option>
                <?php
                include "../koneksi.php"; // Pastikan koneksi ke database sudah benar
                $query = mysqli_query($koneksi, "SELECT nama_pasien FROM tbl_pasien");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value='" . $row['nama_pasien'] . "'>" . $row['nama_pasien'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal</b>
              </label>
              <input class="form-control" type="date" name="ttanggal">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jam</b>
              </label>
              <input class="form-control" type="time" name="tjam">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Ruangan</b>
              </label>
              <input class="form-control" type="text" name="truangan" placeholder="Masukkan Ruangan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Mesin</b>
              </label>
              <input class="form-control" type="text" name="tmesin" placeholder="Masukkan Mesin">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status</b>
              </label>
              <input class="form-control" type="text" name="tstatus" placeholder="Masukkan Status">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <a href="pasien.php" class="btn btn-danger">Batal</a>
                <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
