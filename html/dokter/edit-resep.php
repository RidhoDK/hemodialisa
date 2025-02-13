<?php
include('sess_check.php');
$pagetitle = 'Edit Resep';

include('layout-top.php');
include('layout-bottom.php');
?>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <div class="layout-page">
      <div class="container">
        <div class="col-12">
          <div class="card mt-10 p-4">
            <div class="row">
              <?php
              if (isset($_GET['id_resep'])) {
                $id_resep = $_GET['id_resep'];
                $query = "SELECT * FROM tbl_resep WHERE id_resep = '$id_resep'";
                $result = mysqli_query($koneksi, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                  $data = mysqli_fetch_assoc($result);
                } else {
                  echo "<p>Data resep tidak ditemukan.</p>";
                  exit;
                }
              } else {
                echo "<p>ID resep tidak ditemukan.</p>";
                exit;
              }
              ?>

              <form action="../../curd/curd-resep.php" method="POST">
                <input type="hidden" name="id_resep" value="<?= $data['id_resep'] ?>">

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Tanggal Resep</b></label>
                  <input class="form-control" type="date" name="ttanggal_resep" value="<?= $data['tanggal_resep'] ?>" placeholder="Masukkan Tanggal">
                </div>

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Nama Obat</b></label>
                  <input class="form-control" type="text" name="tnama_obat" value="<?= $data['nama_obat'] ?>" placeholder="Masukkan Nama Obat">
                </div>

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Dosis</b></label>
                  <input class="form-control" type="text" name="tdosis" value="<?= $data['dosis'] ?>" placeholder="Masukkan Keterangan Dosis">
                </div>

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Jumlah</b></label>
                  <input class="form-control" type="text" name="tjumlah" value="<?= $data['jumlah'] ?>" placeholder="Masukkan Jumlah Obat">
                </div>

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Aturan Pakai</b></label>
                  <input class="form-control" type="text" name="taturan_pakai" value="<?= $data['aturan_pakai'] ?>" placeholder="Masukkan Aturan Pakai">
                </div>

                <div class="col-6 mb-3">
                  <label class="form-label"><b>Status</b></label>
                  <select class="form-select" name="tstatus">
                    <option value="<?= $data['status'] ?>" selected><?= $data['status'] ?></option>
                    <option value="Diproses">Diproses</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Selesai">Selesai</option>
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <a href="resep.php" class="btn btn-danger">Batal</a>
                  <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>