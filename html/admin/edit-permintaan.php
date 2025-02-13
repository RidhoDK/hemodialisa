<?php
include('sess_check.php');

$pagetitle = 'Edit Permintaan';
include('layout-top.php');
?>

<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_permintaan'])) {
            $id_permintaan = $_GET['id_permintaan'];
            $query = "SELECT * FROM tbl_permintaan WHERE id_permintaan = '$id_permintaan'";
            $result = mysqli_query($koneksi, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              $data = mysqli_fetch_assoc($result);
            } else {
              echo "Data permintaan tidak ditemukan.";
              exit;
            }
          } else {
            echo "ID permintaan tidak ditemukan.";
            exit;
          }

          ?>

          <form action="../../curd/curd-permintaan.php" method="POST">
            <input type="hidden" name="id_permintaan" value="<?= $data['id_permintaan'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <input class="form-control" type="text" name="tpasien" value="<?= $data['nama_pasien'] ?>" placeholder="Masukkan Nama Pasien">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" value="<?= $data['no_rm'] ?>" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Golongan Darah</b>
              </label>
              <input class="form-control" type="text" name="tgol_dar" value="<?= $data['gol_dar'] ?>" placeholder="Masukkan Golongan Darah">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Rhesus</b>
              </label>
              <select class="form-select" name="trhesus">
                <option value="<?= $data['rhesus'] ?>"><?= $data['rhesus'] ?></option>
                <option value=" +">+</option>
                <option value="-">-</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Jumlah yang Diminta</b>
              </label>
              <input class="form-control" type="text" name="tjumlah_diminta" value="<?= $data['jumlah_diminta'] ?>" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Permintaan</b>
              </label>
              <input class="form-control" type="date" name="ttgl_permintaan" value="<?= $data['tgl_permintaan'] ?>">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Prioritas</b>
              </label>
              <select class="form-select" name="tprioritas" id="">
                <option value="<?= $data['prioritas'] ?>"><?= $data['prioritas'] ?></option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status</b>
              </label>
              <select class="form-select" name="tstatus" id="" value="<?= $data['status'] ?>">
                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
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
              <input class="form-control" type="text" name="tcatatan" value="<?= $data['catatan'] ?>" placeholder="Masukkan Catatan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <div class="col-6 mb-3">
                  <a href="tagihan.php" class="btn btn-danger">Batal</a>
                  <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php'); ?>