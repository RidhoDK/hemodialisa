<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}
$titlepage = 'Input Obat';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <form action="../curd/curd-alatobat.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Barang</b>
              </label>
              <input class="form-control" type="text" name="tnama_barang" placeholder="Masukkan Nama Barang">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jumlah Stok</b>
              </label>
              <input class="form-control" type="text" name="tjumlah_stok" placeholder="Masukkan Jumlah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Kedaluarsa</b>
              </label>
              <input class="form-control" type="date" name="ttgl_exp" placeholder="Masukkan Tanggal Kedaluarsa">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tersedia</b>
              </label>
              <select class="form-select" name="ttersedia" id="">
                <option value="">Pilih</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="stok_alatobat.php" class="btn btn-danger">Batal</a>
                  <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
