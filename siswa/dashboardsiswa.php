<?php
session_start();
include '../admin/conn.php';

if (!isset($_SESSION['nisn'])) {
  echo '<script>window.location="loginsiswa.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - Lawan.id</title>

  <link href="../assets/img/terapan/logo-large.png" rel="icon">
  <link href="../template/NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="../template/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../template/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="../template/NiceAdmin/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboardsiswa.php" class="logo d-flex align-items-center">
        <img src="../assets/img/terapan/logo-large.png" alt="">
        <span class="d-none d-lg-block"> Lawan.id</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown">
          <!-- Dropdown content goes here -->
        </li>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../template/NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['nisn']['nama']; ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['nisn']['nama']; ?></h6>
              <span>Siswa</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="editprofile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="loginsiswa.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="dashboardsiswa.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="pengaduan.php">
          <i class="bi bi-envelope"></i>
          <span>Lapor Sekarang</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    $akun = $_SESSION['nisn']['nisn'];
    $ambil = $conn->query("SELECT * FROM laporan AS lp LEFT JOIN siswa AS siswa ON lp.nisn = siswa.nisn LEFT JOIN status_laporan AS sl ON lp.id_status = sl.id_status WHERE lp.nisn='$akun' ORDER BY lp.id_laporan DESC");

    while ($perlaporan = $ambil->fetch_assoc()) {
    ?>
      <section class="section profile">
        <div class="card">
          <div class="card-body pt-4">
            <div class="row">
              <div class="col-xl-4">
                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <a data-bs-toggle="modal" data-bs-target="#profileImageModal">
                      <img src="../assets/fotobukti/<?= $perlaporan['bukti_kejadian']; ?>" alt="Profile" style="cursor: pointer;" onclick="openProfileImageModal('../assets/fotobukti/<?= $perlaporan['bukti_kejadian']; ?>')">
                    </a>
                    <h2><?= $perlaporan['judul']; ?></h2>
                  </div>
                </div>
              </div>

              <div class="col-xl-8">
                <div class="card">
                  <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview-<?= $perlaporan['id_laporan'] ?>">Kejadian</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#status-<?= $perlaporan['id_laporan'] ?>">Status</button>
                      </li>
                    </ul>

                    <div class="tab-content pt-2">
                      <!-- Tab content for Kejadian -->
                      <div class="tab-pane fade show active profile-overview-<?= $perlaporan['id_laporan'] ?>" id="profile-overview-<?= $perlaporan['id_laporan'] ?>">
                        <h5 class="card-title"><span class=""><?= $perlaporan['lokasi_kejadian'] ?>, <?= $perlaporan['tanggal_kejadian'] ?></span></h5>
                        <p class="small fst-italic"><?= $perlaporan['deskripsi']; ?></p>
                      </div>

                      <div class="tab-pane fade status-<?= $perlaporan['id_laporan'] ?> pt-3" id="status-<?= $perlaporan['id_laporan'] ?>">
                        <div class="card-body">
                          <div class="row">
                            <!-- Status Column -->
                            <div class="col-3">
                              <?php
                              $statusClass = '';
                              $iconClass = '';

                              if ($perlaporan['status'] == 'approve') {
                                $statusClass = 'bg-success text-white';
                                $iconClass = 'bi bi-check-circle-fill bi-4x';
                              } elseif ($perlaporan['status'] == 'unapprove') {
                                $statusClass = 'bg-danger text-white';
                                $iconClass = 'bi bi-x-circle-fill bi-3x';
                              } elseif ($perlaporan['status'] == 'terkirim') {
                                $statusClass = 'bg-primary text-white';
                                $iconClass = 'bi bi-send-check bi-5x';
                              }
                              ?>

                              <button type="button" class="status-label btn <?= $statusClass ?> text-center">
                                <div class="icon-container">
                                  <i class="<?= $iconClass ?>"></i>
                                </div>
                                <p><?= strtoupper($perlaporan['status']) ?></p>
                              </button>
                            </div>



                            <!-- Comment Column -->
                            <div class="col-9">
                              <form action="">
                                <textarea name="feedback" id="feedback" class="form-control" rows="3" readonly><?= $perlaporan['feedback']; ?></textarea>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
      </section>
    <?php } ?>

    <?php
    $cek = $conn->query("SELECT nisn FROM laporan WHERE nisn='$akun'");
    if (mysqli_num_rows($cek) == 0) { ?>
      <h1 style="text-align: center; font-weight: bold; font-size: 16px;">Belum ada laporan</h1>
    <?php  } ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <?php echo date('Y'); ?> <strong>Lawan.id</strong>. All Rights Reserved.
    </div>
    <div class="credits">
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../template/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../template/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../template/NiceAdmin/assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const enlargeImgLinks = document.querySelectorAll('.enlarge-img-link');
      const enlargedImg = document.getElementById('enlargedImg');

      enlargeImgLinks.forEach(link => {
        link.addEventListener('click', function(event) {
          const imgUrl = this.getAttribute('data-img-url');
          enlargedImg.src = imgUrl;
        });
      });
    });
  </script>

</body>

</html>