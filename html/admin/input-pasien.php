<?php
session_start();

$pagetitle = 'Input Pasien';
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
          <form action="../../curd/curd-pasien.php" method="POST">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <input class="form-control" type="text" name="tnama_pasien" placeholder="Masukkan Nama Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Umur</b>
              </label>
              <input class="form-control" type="text" name="tumur" placeholder="Masukkan Umur Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jenis Kelamin</b>
              </label>
              <select class="form-select" name="tjk" id="">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Hemodialisa</b>
              </label>
              <input class="form-control" type="date" name="ttgl">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Durasi</b>
              </label>
              <input class="form-control" type="text" name="tdurasi" placeholder="Masukkan Durasi">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tekanan Darah</b>
              </label>
              <input class="form-control" type="text" name="ttensi" placeholder="Masukkan Tekanan Darah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Berat Badan</b>
              </label>
              <input class="form-control" type="text" name="tberatbadan" placeholder="Masukkan Berat Badan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Diagnosa</b>
              </label>
              <input class="form-control" type="text" name="tdiagnosa" placeholder="Masukkan Diagnosa">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Obat atau Tindakan Lain</b>
              </label>
              <input class="form-control" type="text" name="tobat" placeholder="Masukkan Obat atau Tindakan Lain">
            </div>
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