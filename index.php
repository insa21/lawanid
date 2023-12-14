<?php

session_start();
include 'admin/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Index - Lawan.id</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- New -->
  <link href="/assets/img/terapan/logo-large.png" rel="icon">
  <link rel="stylesheet" href="style/new/style.css">

  <!-- Favicons -->
  <link href="assets/img/terapan/logo-large.png" rel="icon">
  <link href="template/SoftLand/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="template/SoftLand/assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="template/SoftLand/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="template/SoftLand/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="template/SoftLand/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="template/SoftLand/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="template/SoftLand/assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1><a href="index.php"><img src="assets/img/terapan/logo-large.png" alt="" srcset=""> &nbsp;Lawan.id</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="template/SoftLand/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Beranda</a></li>
          <li><a href="frontend/tentang.php">Tentang</a></li>
          <li><a href="frontend/edukasi.php">Edukasi</a></li>
          <li><a href="frontend/kontak.php">Kontak</a></li>
          <li><a href="frontend/tatacara.php">Tata cara</a></li>
          <li><a href="siswa/loginsiswa.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">
    <div class="wave">
      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>
    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-8 text-center text-lg-start">
              <h1 style="font-size: 45px" data-aos="fade-right">Lawan.id, Aplikasi Untuk Keadilan dan Kesetaraan di Sekolah.</h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                Suarakan keluhan anda disini, kami siap memprosesnya dengan cepat
              </p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500">
                <a href="siswa/loginsiswa.php" class="btn btn-outline-white">Laporkan!</a>
              </p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <img src="assets/img/terapan/mockup-beranda.png" class="banner" alt="banner" data-aos="fade-right" />
              <!-- <img src="assets/img/terapan/mockup-beranda.png" alt="Image" class="banner" data-aos="fade-right" data-aos-delay="200" /> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Home Section ======= -->
    <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8" data-aos="fade-up">
            <h2 class="section-heading">Laporan Masuk dan Sedang Diproses</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <h2 class="text-white"><?php
                                        $query = "SELECT * FROM siswa";
                                        $result = mysqli_query($conn, $query);
                                        $totalCount1 = mysqli_num_rows($result);
                                        echo $totalCount1;
                                        ?></h2>
              </div>
              <h3 class="mb-3">Total Siswa</h3>
              <p>
                Jumlah total siswa saat ini.
              </p>
            </div>
          </div>
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-1 text-center">
              <div class="wrap-icon icon-1">
                <h2 class="text-white"><?php
                                        $query = "SELECT * FROM laporan";
                                        $result = mysqli_query($conn, $query);
                                        $totalCount2 = mysqli_num_rows($result);
                                        echo $totalCount2;
                                        ?></h2>
              </div>
              <h3 class="mb-3">Laporan</h3>
              <p>
                Lihat laporan dan analisis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5" data-aos="fade">
          <div class="col-md-6 mb-5">
            <img src="assets/img/terapan/bekar3.png" alt="Image" class="img-fluid" />
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="step">
              <span class="number text-center"> <img src="assets/img/terapan/kesejahteraan.png"></span>
              <h3 class="text-center">Kesejahtraan</h3>
              <p>
                Membantu melindungi kesejahteraan korban tindakan kekerasan dengan turut serta dalam proses pelaporan di lingkungan sekolah.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="step">
              <span class="number text-center"><img src="assets/img/terapan/perlindungan.png"></span>
              <h3 class="text-center">Perlindungan</h3>
              <p>
                Memberikan dukungan dan perlindungan dengan melibatkan pihak kepolisian, lembaga sosial, dan instansi terkait lainnya.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="step">
              <span class="number text-center"><img src="assets/img/terapan/kesehatan.png"></span>
              <h3 class="text-center">kesehatan</h3>
              <p>
                Mendukung penyediaan layanan kesehatan dengan mencakup pemeriksaan, tindakan, dan perawatan medis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 me-auto">
            <h2 class="mb-4">Lapor insiden</h2>
            <p class="mb-4">
              Apakah Anda menjadi saksi atau korban suatu insiden di sekolah? Laporkan segera melalui fitur ini untuk membantu menciptakan lingkungan sekolah yang aman dan mendukung.
            </p>
            <p><a href="#" class="btn btn-primary">Laporkan Sekarang!</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <img src="assets/img/terapan/image-33.jpg" alt="Image" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 ms-auto order-2">
            <h2 class="mb-4">Diproses admin</h2>
            <p class="mb-4">
              Terima kasih atas laporan yang Anda berikan. Informasi yang Anda sampaikan sedang dalam tahap pengolahan oleh tim administrasi kami untuk segera dilakukan investigasi lebih lanjut.
            </p>
            <!-- <p><a href="#" class="btn btn-primary">Download Now</a></p> -->
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="assets/img/terapan/artikel-3.png" alt="Image" class="img-fluid" />
          </div>
        </div>
      </div>
    </section>


    <!-- ======= CTA Section ======= -->
    <section class="section cta-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
            <h2>Ayo lawan kekerasan di sekolah</h2>
          </div>
          <div class="col-md-5 text-center text-md-end">
            <p>
              <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a>
              <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End CTA Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer" role="contentinfo">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3>Tentang Lawan.id</h3>
          <p>
            Lawan.id adalah platform pelaporan yang memudahkan siswa SMK Al-Huda Bumiayu untuk melaporkan berbagai hal dengan cepat dan efisien.
          </p>
          <p class="social">
            <a href="#"><span class="bi bi-twitter"></span></a>
            <a href="#"><span class="bi bi-facebook"></span></a>
            <a href="#"><span class="bi bi-instagram"></span></a>
            <a href="#"><span class="bi bi-linkedin"></span></a>
          </p>
        </div>
        <div class="col-md-7 ms-auto">
          <div class="row site-section pt-0">
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Fitur</h3>
              <ul class="list-unstyled">
                <!-- <li><a href="index.php">Beranda</a></li> -->
                <li><a href="frontend/tentang.php">Tentang</a></li>
                <li><a href="frontend/edukasi.php">Edukasi</a></li>
                <li><a href="frontend/kontak.php">Kontak</a></li>
                <li><a href="frontend/tatacara.php">Tata cara</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Melindungi</h3>
              <ul class="list-unstyled">
                <li><a href="#">Kesejahtraan</a></li>
                <li><a href="#">Perlindungan</a></li>
                <li><a href="#">kesehatan</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <h3>Downloads</h3>
              <ul class="list-unstyled">
                <li><a href="#">Get from the App Store</a></li>
                <li><a href="#">Get from the Play Store</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <p class="copyright">
            &copy; <?php echo date('Y'); ?> <strong>Lawan.id</strong>. All Rights Reserved.
          </p>
          <div class="credits">
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="template/SoftLand/assets/vendor/aos/aos.js"></script>
  <script src="template/SoftLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="template/SoftLand/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="template/SoftLand/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="template/SoftLand/assets/js/main.js"></script>
</body>

</html>