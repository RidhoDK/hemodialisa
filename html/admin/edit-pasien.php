<?php
include '../../koneksi.php';
session_start();

$pagetitle = 'Edit Pasien';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_pasien'])) {
            $id_pasien = $_GET['id_pasien'];
            $query = "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'";
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

          <form action="../../curd/curd-pasien.php" method="POST">
            <input type="hidden" name="id_pasien" value="<?= $data['id_pasien'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <input class="form-control" type="text" name="tnama_pasien" value="<?= $data['nama_pasien'] ?>" placeholder="Masukkan Nama Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" value="<?= $data['no_rm'] ?>" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Umur</b>
              </label>
              <input class="form-control" type="text" name="tumur" value="<?= $data['umur'] ?>" placeholder="Masukkan Umur Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jenis Kelamin</b>
              </label>
              <select class="form-select" name="tjk" id="">
                <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Hemodialisa</b>
              </label>
              <input class="form-control" type="date" name="ttgl" value="<?= $data['tanggal'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Durasi</b>
              </label>
              <input class="form-control" type="text" name="tdurasi" value="<?= $data['durasi'] ?>" placeholder="Masukkan Durasi">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tekanan Darah</b>
              </label>
              <input class="form-control" type="text" name="ttensi" value="<?= $data['tensi'] ?>" placeholder="Masukkan Tekanan Darah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Berat Badan</b>
              </label>
              <input class="form-control" type="text" name="tberatbadan" value="<?= $data['berat_badan'] ?>" placeholder="Masukkan Berat Badan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Diagnosa</b>
              </label>
              <input class="form-control" type="text" name="tdiagnosa" value="<?= $data['diagnosa'] ?>" placeholder="Masukkan Diagnosa">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Obat atau Tindakan Lain</b>
              </label>
              <input class="form-control" type="text" name="tobat" value="<?= $data['obat'] ?>" placeholder="Masukkan Obat atau Tindakan Lain">
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
