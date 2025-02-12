<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}
$pagetitle = 'Edit Perminataan';
include('layout-top.php');
?>

<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
        <i class="bx bx-menu bx-md"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
          <i class="bx bx-search bx-md"></i>
          <input
            type="text"
            class="form-control border-0 shadow-none ps-1 ps-sm-2"
            placeholder="Search..."
            aria-label="Search..." />
        </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-4">
          <a
            class="github-button"
            href="https://github.com/themeselection/sneat-html-admin-template-free"
            data-icon="octicon-star"
            data-size="large"
            data-show-count="true"
            aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a
            class="nav-link dropdown-toggle hide-arrow p-0"
            href="javascript:void(0);"
            data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <h6 class="mb-0">John Doe</h6>
                    <small class="text-muted">Admin</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider my-1"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card bx-md me-3"></i><span class="flex-grow-1 align-middle">Billing Plan</span>
                  <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider my-1"></div>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);">
                <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>
  </nav>

  <!-- / Navbar -->

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

          <form action="../curd/curd-permintaan.php" method="POST">
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
              <select class="form-select" name="trhesus" value="<?= $data['rhesus'] ?>
                        <option value="">Pilih Jenis Rhesus</option>
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
