<?php
session_start();
if ($_SESSION['nisn'] != true  or !isset($_SESSION['nisn'])) {
  echo "<script>alert('Login terlebih dahulu, agar dapat melapor');</script>";
  echo "<script>location='loginsiswa.php';</script>";
}

include '../admin/conn.php';
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>

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
        <a class="nav-link collapsed" href="dashboardsiswa.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengaduan.php">
          <i class="bi bi-envelope"></i>
          <span>Lapor Sekarang</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengaduan Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Pengaduan siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <section class="section">
              <div class="row">
                <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"></h5>

                      <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="row mb-3">
                          <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" id="judul" required />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="lokasi_kejadian" class="col-sm-2 col-form-label">Lokasi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="lokasi_kejadian" id="lokasi_kejadian" required />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="tanggal_kejadian" class="col-sm-2 col-form-label">Tanggal</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_kejadian" id="tanggal_kejadian" onchange="tampilkanHari()" required />
                            <p name="tanggal_kejadian" id="hari_kejadian"></p>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="kartu_pelajar" class="col-sm-2 col-form-label">Kartu Pelajar</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="kartu_pelajar" id="kartu_pelajar" accept="image/*" required />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="bukti_kejadian" class="col-sm-2 col-form-label">Bukti Kejadian</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="bukti_kejadian" id="bukti_kejadian" accept="image/*" required />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" style="height: 100px;" name="deskripsi" id="deskripsi" required></textarea>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Kirim Laporan</button>
                            <!-- Add a link or button for navigation -->
                            <!-- <a href="#" class="btn btn-secondary">Kembali</a> -->
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>


    <div class="col-lg-4">
    </div><!-- End Right side columns -->

    </div>
    </section>

  </main><!-- End #main -->

  <?php
  include '../admin/conn.php';

  if (isset($_POST['submit'])) {
    $nisn = mysqli_real_escape_string($conn, $_SESSION['nisn']['nisn']);
    $judul = htmlspecialchars($_POST['judul']);
    $lokasi_kejadian = htmlspecialchars($_POST['lokasi_kejadian']);
    $tanggal_kejadian = $_POST['tanggal_kejadian'];
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $allowed_extensions = array('image/png', 'image/jpg', 'image/jpeg');

    function uploadFile($file, $destination)
    {
      $name = $file['name'];
      $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
      $size = $file['size'];
      $tmp_name = $file['tmp_name'];

      if (in_array($file['type'], $GLOBALS['allowed_extensions']) && $size < 3544070) {
        move_uploaded_file($tmp_name, $destination . $name);
        return true;
      } else {
        return false;
      }
    }

    if (uploadFile($_FILES['kartu_pelajar'], "../assets/kartupelajar/")) {
      if (uploadFile($_FILES['bukti_kejadian'], "../assets/fotobukti/")) {
        $conn->query("INSERT INTO status_laporan (status, feedback) VALUES ('terkirim', ' ')");
        $status_id = $conn->insert_id;
        $conn->query("INSERT INTO laporan (judul, foto, lokasi_kejadian, tanggal_kejadian, deskripsi, bukti_kejadian, nisn, id_status) 
                          VALUES ('$judul', '{$_FILES['kartu_pelajar']['name']}', '$lokasi_kejadian', '$tanggal_kejadian', '$deskripsi', '{$_FILES['bukti_kejadian']['name']}', '$nisn', '$status_id')");

        echo "<script>
                    Swal.fire({
                        title: 'Laporan Terkirim!',
                        html: '<p>Terima kasih atas laporannya. Kami akan segera menindaklanjuti.</p>',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        window.location.href = 'dashboardsiswa.php';
                    });
                </script>";
      } else {
        echo "<script>
                    Swal.fire({
                        title: 'Ukuran File Bukti Kejadian Terlalu Besar atau Format Tidak Diperbolehkan',
                        icon: 'error',
                        showConfirmButton: true
                    });
                </script>";
      }
    } else {
      echo "<script>
                Swal.fire({
                    title: 'Ukuran File Kartu Pelajar Terlalu Besar atau Format Tidak Diperbolehkan',
                    icon: 'error',
                    showConfirmButton: true
                });
            </script>";
    }
  }
  ?>



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
  <!--JS CODE  -->


</body>

</html>