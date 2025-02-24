<?php
include('sess_check.php');

$titlepage = 'Edit Hasil lab';
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
          if (isset($_GET['id_hasillab'])) {
            $id_hasillab = $_GET['id_hasillab'];
            $query = "SELECT * FROM tbl_hasillab WHERE id_hasillab = '$id_hasillab'";
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

          <form action="../../curd/curd-hasillab.php" method="POST">
            <input type="hidden" name="id_hasillab" value="<?= $data['id_hasillab'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <select class="form-control" name="tnama_pasien">
                <?php
                $query = mysqli_query($koneksi, "SELECT nama_pasien FROM tbl_pasien");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option default='" . $data['nama_pasien'] . "' value='" . $row['nama_pasien'] . "'>" . $row['nama_pasien'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" value="<?= $data['no_rm'] ?>" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Urea</b>
              </label>
              <input class="form-control" type="text" name="turea" value="<?= $data['urea'] ?>" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Kreatinin</b>
              </label>
              <input class="form-control" type="text" name="tkreatinin" value="<?= $data['kreatinin'] ?>" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Hemoglobin</b>
              </label>
              <input class="form-control" type="text" name="themoglobin" value="<?= $data['hemoglobin'] ?>" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Sebelum HD</b>
              </label>
              <input class="form-control" type="text" name="tsebelum_hd" value="<?= $data['sebelum_hd'] ?>" placeholder="Masukkan Kondisi Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Sesudah HD</b>
              </label>
              <input class="form-control" type="text" name="tsesudah_hd" value="<?= $data['sesudah_hd'] ?>" placeholder="Masukkan Kondisi Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="hasil_lab.php" class="btn btn-danger">Batal</a>
                  <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php'); ?>