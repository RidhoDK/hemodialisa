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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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
              <div class="text-truncate" data-i18n="Layouts">Bahan dan Alat</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="../farmasi/resep.php" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Resep Obat</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="../stok_darah.php" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Ketersediaan Stok Darah</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="../permintaan.php" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">Permintaan Darah</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="../farmasi/stok_alatobat.php" class="menu-link">
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
                      <path d="M7.5 1v7h1V1z"/>
                      <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
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
                      <select class= "form-select" name="trhesus" id="">
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
