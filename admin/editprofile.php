<?php

session_start();
include '../admin/conn.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>My Profile - Lawan.id</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="../admin/dashboard.php" class="logo d-flex align-items-center">
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
        </li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../template/NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['nisn']['nama']; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['nisn']['nama']; ?></h6>
              <span>Administrator</span>
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
              <a class="dropdown-item d-flex align-items-center" href="loginadmin.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="laporanmasuk.php">
              <i class="bi bi-circle"></i><span>Laporan Masuk</span>
            </a>
          </li>
          <li>
            <a href="datalaporan.php">
              <i class="bi bi-circle"></i><span>Data Laporan</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#artikel-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>artikel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="artikel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="artikel/tambahartikel.php">
              <i class="bi bi-circle"></i><span>Tambah Artikel</span>
            </a>
          </li>
          <li>
            <a href="artikel/lihat_artikel.php">
              <i class="bi bi-circle"></i><span>Data Artikel</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="datasiswa.php">
              <i class="bi bi-circle"></i><span>Data Siswa</span>
            </a>
          </li>
          <li>
            <a href="tambahdata.php">
              <i class="bi bi-circle"></i><span>Tambah Data</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../template/NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['nisn']['nama']; ?></h2>
              <h3>Administrator</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Rincian profil</h5>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">NISN</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nisn']['nisn']; ?></div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nisn']['nama']; ?></div>
                  </div>

                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="post">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">NISN</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="fullName" disabled required value="<?php echo $_SESSION['nisn']['nisn']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="fullName" required value="<?php echo $_SESSION['nisn']['nama']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" required value="<?php echo $_SESSION['nisn']['password']; ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->


                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">


                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <?php

    if (isset($_POST['submit'])) {
      $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';

      // Validasi nama dan password
      if (empty($nama) || empty($password)) {
        echo "<script>alert('Nama dan Password harus diisi');</script>";
      } else {
        $nisn = $_SESSION['nisn']['nisn'];
        $nama = mysqli_real_escape_string($conn, $nama);

        // Update data di database
        $query = "UPDATE admin SET nama=?, password=? WHERE nisn=?";

        // Menggunakan prepared statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $nama, $password, $nisn);

        if ($stmt->execute()) {
          echo "<script>
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diubah',
                  }).then(function() {
                    window.location = 'loginadmin.php';
                  });
                </script>";
        } else {
          echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan. Silakan coba lagi.',
                  });
                </script>";
        }
        // Tutup statement
        $stmt->close();
      }
    }
    ?>


    <script>
      const username = document.getElementById("username")
      username.addEventListener("click", () => alert("Username Tidak Dapat Diubah!"))
    </script>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <?php echo date('Y'); ?> <strong>Lawan.id</strong>. All Rights Reserved.
    </div>
    <div class="credits">
      <!-- Designed by <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a> -->
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

</body>

</html>