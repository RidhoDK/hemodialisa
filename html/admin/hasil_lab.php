<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$titlepage = 'Hasil Lab';
include('layout-top.php');
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo" style="background: #98FB98;">
        <a href="index.html" class="app-brand-link">
          <span class="app-brand-logo demo">
            <img src="../../assets/img/logo.png" alt="" style="width: 60px; border-radius: 50%">
          </span>
          <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size: 13px;">RS DR.R.SOEHARSONO</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
      </div>


      <ul class="menu-inner py-1" style="background: #98FB98; color: white;">
        <!-- Dashboards -->
        <li class="menu-item">
          <a href="../html/index.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-smile"></i>
            <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
          </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div class="text-truncate" data-i18n="Layouts">Pelayanan</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="pasien.php" class="menu-link">
                <div class="text-truncate" data-i18n="Without menu">Data Pasien</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="jadwal_hd.php" class="menu-link">
                <div class="text-truncate" data-i18n="Without navbar">Jadwal Hemodialisa</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="hasil_lab.php" class="menu-link">
                <div class="text-truncate" data-i18n="Fluid">Hasil Pemeriksaan Laboratrium</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="tagihan.php" class="menu-link">
                <div class="text-truncate" data-i18n="Container">Tagihan Pasien</div>
              </a>
            </li>
          </ul>
        </li>

        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div class="text-truncate" data-i18n="Layouts">Bahan dan Alat</div>
          </a>

          <ul class="menu-sub">
            <li class="menu-item">
              <a href="stok-darah.php" class="menu-link">
                <div class="text-truncate" data-i18n="Without menu">Ketersediaan Stok Darah</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="permintaan.php" class="menu-link">
                <div class="text-truncate" data-i18n="Without navbar">Permintaan Darah</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="stok-alatobat.php" class="menu-link">
                <div class="text-truncate" data-i18n="Without menu">Stok Alat dan Obat</div>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="menu-item">
              <a href="?logout=true" style="color: red;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16" style="margin-right: 10px;">
                  <path d="M7.5 1v7h1V1z" />
                  <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812" />
                </svg>
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </aside>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->


      <!-- / Navbar -->

      <div class="container">
        <div class="col-12">
          <div class="card mt-10">
            <div class="table-responsive">
              <div style="justify-content: right; text-align: right; padding: 10px;">
                <a href="input-hasillab.php" class="btn btn-primary">Tambah Data</a>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <td>NO</td>
                    <td>Nama Pasien</td>
                    <td>NO. RM</td>
                    <td>Urea</td>
                    <td>Kreatinin</td>
                    <td>Hemoglobin</td>
                    <td>Sebelum Hemodialisa</td>
                    <td>Sesudah Hemodialisa</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <?php
                // Inisialisasi variabel
                $no = 1;
                $query = "SELECT * FROM tbl_hasillab WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi



                $tampil = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($tampil)):
                ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data['nama_pasien'] ?></td>
                      <td><?= $data['no_rm'] ?></td>
                      <td><?= $data['urea'] ?></td>
                      <td><?= $data['Kreatinin'] ?></td>
                      <td><?= $data['hemoglobin'] ?></td>
                      <td><?= $data['sebelum_hd'] ?></td>
                      <td><?= $data['sesudah_hd'] ?></td>
                      <td>
                        <a href="edit-hasillab.php?id_hasillab=<?= $data['id_hasillab'] ?>" class="btn btn-outline-warning">Edit</a>
                        <form action="../../curd/curd-hasillab.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id_hasillab" value="<?= $data['id_hasillab'] ?>">
                          <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="../../cetak/pdf-hasillab.php?id_hasillab=<?= $data['id_hasillab'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
                      </td>
                    </tr>
                  </tbody>
                <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php') ?>
