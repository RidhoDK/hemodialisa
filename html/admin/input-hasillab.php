<?php
include('sess_check.php');

$pagetitle = 'Input Hasil Lab';
include('layout-top.php');
include('layout-bottom.php');
?>


<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <form action="../../curd/curd-hasillab.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <select class="form-control" name="tnama_pasien">
                <option value="">-- Pilih Pasien --</option>
                <?php
                $query = mysqli_query($koneksi, "SELECT nama_pasien FROM tbl_pasien");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value='" . $row['nama_pasien'] . "'>" . $row['nama_pasien'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Urea</b>
              </label>
              <input class="form-control" type="text" name="turea" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Kreatinin</b>
              </label>
              <input class="form-control" type="text" name="tkreatinin" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Hemoglobin</b>
              </label>
              <input class="form-control" type="text" name="themoglobin" placeholder="Masukkan Hasil Tes">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Sebelum HD</b>
              </label>
              <input class="form-control" type="text" name="tsebelum_hd" placeholder="Masukkan Kondisi Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Sesudah HD</b>
              </label>
              <input class="form-control" type="text" name="tsesudah_hd" placeholder="Masukkan Kondisi Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="hasil_lab.php" class="btn btn-danger">Batal</a>
                  <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>