<?php
include('sess_check.php');

$titlepage = 'Input Tagihan';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <form action="../../curd/curd-tagihan.php" method="POST">
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
                <b>Total Biaya Tagihan</b>
              </label>
              <input class="form-control" type="number" name="ttotal_biaya" placeholder="Masukkan Total Biaya Tagihan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Pembayaran</b>
              </label>
              <input class="form-control" type="date" name="ttanggal_pembayaran">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Metode Pembayaran</b>
              </label>
              <select class="form-select" name="tmetode_pembayaran" id="">
                <option value="">Pilih Metode Pembayaran</option>
                <option value="Tunai">Tunai</option>
                <option value="Non-Tunai">Non-Tunai</option>
                <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                <option value="BPJS Mandiri">BPJS Mandiri</option>
                <option value="Jamkesda">Jamkesda</option>
                <option value="Pembayaran Lainnya">Pembayaran Lainnya</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status Pembayaran</b>
              </label>
              <input class="form-control" type="text" name="tstatus_pembayaran" placeholder="Masukkan Status Pembayaran">
            </div>
            <div class="col-6 mb-3">
              <a href="tagihan.php" class="btn btn-danger">Batal</a>
              <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag before closing body tag for github widget button. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>

  </html>