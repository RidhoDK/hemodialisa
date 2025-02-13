<?php
include('sess_check.php');

$titlepage = 'Input Permintaan';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <form action="../../curd/curd-permintaan.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <select class="form-control" name="tpasien">
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
                <b>Golongan Darah</b>
              </label>
              <select class="form-control" name="tgol_dar">
                <option value="">-- Pilih Golongan Darah --</option>
                <?php
                $query = mysqli_query($koneksi, "SELECT gol_darah FROM tbl_stokdarah");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value='" . $row['gol_darah'] . "'>" . $row['gol_darah'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Rhesus</b>
              </label>
              <select class="form-select" name="trhesus" id="">
                <option value="">Pilih Jenis Rhesus</option>
                <option value="+">+</option>
                <option value="-">-</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jumlah yang Diminta</b>
              </label>
              <input class="form-control" type="text" name="tjumlah_diminta" placeholder="Masukkan Jumlah yang Diminta">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Permintaan</b>
              </label>
              <input class="form-control" type="date" name="ttgl_permintaan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Prioritas</b>
              </label>
              <select class="form-select" name="tprioritas" id="">
                <option value="">Pilih Tingkat</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status</b>
              </label>
              <select class="form-select" name="tstatus" id="">
                <option value="">Pilih Metode Pembayaran</option>
                <option value="Menunggu">Menunggu</option>
                <option value="Disetujui">Disetujui</option>
                <option value="Ditolak">Ditolak</option>
                <option value="Terpenuhi">Terpenuhi</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Catatan</b>
              </label>
              <input class="form-control" type="text" name="tcatatan" placeholder="Masukkan Catatan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="permintaan.php" class="btn btn-danger">Batal</a>
                  <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>