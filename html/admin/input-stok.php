<?php
include '../koneksi.php';
session_start();

$titlepage = 'Input Stok';
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
          <form action="../curd/curd-stok.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Golongan Darah</b>
              </label>
              <input class="form-control" type="text" name="tgol_darah" placeholder="Masukkan Golongan Darah">
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
                <b>Jumlah Stok Darah</b>
              </label>
              <input class="form-control" type="text" name="tjumlah" placeholder="Masukkan Jumlah yang Tersedia">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tempat Penyimpanan</b>
              </label>
              <input class="form-control" type="text" name="ttempat" placeholder="Masukkan Tempat Penyimpanan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Kedaluarsa</b>
              </label>
              <input class="form-control" type="text" name="ttgl_exp" placeholder="Masukkan Tanggal Kedaluarsa">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Terakhir Diupdate</b>
              </label>
              <input class="form-control" type="text" name="tlast_update" placeholder="Masukkan Terakhir Diperbarui">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="pasien.php" class="btn btn-danger">Batal</a>
                  <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
