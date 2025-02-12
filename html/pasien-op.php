<?php
    include '../koneksi.php';
    session_start();
?>

<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Demo : Dashboard - Analytics | sneat - Bootstrap Dashboard PRO</title>

    <meta name="description" content="" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar" >
      <div class="layout-container" >
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="background: #98FB98;">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../assets/img/logo.png" alt="" style="width: 60px; border-radius: 50%">
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
                  <a href="stok_darah.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Ketersediaan Stok Darah</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="permintaan.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Without navbar">Permintaan Darah</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stok_alatobat.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Stok Alat dan Obat</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- / Navbar -->

          <div class="container">
            <div class="col-12">
              <div class="card mt-10">
                <div class="table-responsive">
                  <div style="justify-content: right; text-align: right; padding: 10px;">
                     <a href="input-pasien.php" class="btn btn-primary">Tambah Data</a>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <td>NO</td>
                        <td>Nama Pasien</td>
                        <td>NO. RM</td>
                        <td>Umur</td>
                        <td>Jenis Kelamin</td>
                        <td>Tanggal</td>
                        <td>Durasi</td>
                        <td>Tekanan Darah</td>
                        <td>Berat Badan</td>
                        <td>Diagnosa</td>
                        <td>Obat</td>
                      </tr>
                    </thead>
                    <?php
                      // Inisialisasi variabel
                      $no = 1;
                      $query = "SELECT * FROM tbl_pasien WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi



                      $tampil = mysqli_query($koneksi, $query);
                      while ($data = mysqli_fetch_array($tampil)):
                    ?>
                    <tbody>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_pasien'] ?></td>
                        <td><?= $data['no_rm'] ?></td>
                        <td><?= $data['umur'] ?></td>
                        <td><?= $data['jenis_kelamin'] ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['durasi'] ?></td>
                        <td><?= $data['tensi'] ?></td>
                        <td><?= $data['berat_badan'] ?></td>
                        <td><?= $data['diagnosa'] ?></td>
                        <td><?= $data['obat'] ?></td>
                        <td></td>
                        </td>
                      </tr>
                    </tbody>
                    <?php endwhile; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
