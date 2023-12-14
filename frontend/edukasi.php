<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edukasi - Lawan.id</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/terapan/logo-large.png" rel="icon">
  <link href="../template/SoftLand/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../template/SoftLand/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../template/SoftLand/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../template/SoftLand/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../template/SoftLand/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../template/SoftLand/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../template/SoftLand/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1><a href="../index.php"><img src="../assets/img/terapan/logo-large.png" alt="" srcset=""> &nbsp;Lawan.id</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="template/SoftLand/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.php">Beranda</a></li>
          <li><a href="tentang.php">Tentang</a></li>
          <li><a class="active" href="edukasi.php">Edukasi</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <li><a href="tatacara.php">Tata cara</a></li>
          <li><a href="../siswa/loginsiswa.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>


  <main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="hero-section inner-page">
      <div class="wave">

        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>

      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Edukasi</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">"Lawan.id juga berfungsi sebagai sarana edukasi, memberikan pemahaman kepada siswa SMK Al-Huda Bumiayu tentang pentingnya pelaporan dan tanggung jawab bersama dalam menjaga lingkungan sekolah."</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section class="section">
      <div class="container">
        <div class="row mb-5">
          <?php
          include '../admin/conn.php';

          // Mengambil data dari tabel Artikel
          $result = $conn->query("SELECT * FROM Artikel ORDER BY tanggal DESC LIMIT 6");

          // Menampilkan data ke dalam kartu-kartu Bootstrap
          while ($row = $result->fetch_assoc()) {
            echo "<div class='col-md-4'>
            <div class='post-entry'>
                <a href='detail_artikel.php?id={$row['id_artikel']}' class='d-block mb-4'>
                    <img src='../admin/artikel/uploads/{$row['foto']}' alt='Gambar Artikel' class='img-fluid'>
                </a>
                <div class='post-text'>
                    <span class='post-meta'>{$row['tanggal']} &bullet; By <a href='#'>Admin</a></span>
                    <h3><a href='detail_artikel.php?id={$row['id_artikel']}'>{$row['judul']}</a></h3>
                    <p>" . substr($row['isi'], 0, 100) . "...</p>
                    <p><a href='detail_artikel.php?id={$row['id_artikel']}' class='readmore'>Read more</a></p>
                </div>
            </div>
        </div>";
          }

          // Menutup koneksi
          $conn->close();
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <span class="p-3 active text-primary">1</span>
          <a href="#" class="p-3">2</a>
          <a href="#" class="p-3">3</a>
          <a href="#" class="p-3">4</a>
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

  </main><!-- End #main -->

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
                <!-- <li><a href="../index.php">Beranda</a></li> -->
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="edukasi.php">Edukasi</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="tatacara.php">Tata cara</a></li>
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
  <script src="../template/SoftLand/assets/vendor/aos/aos.js"></script>
  <script src="../template/SoftLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../template/SoftLand/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../template/SoftLand/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../template/SoftLand/assets/js/main.js"></script>

</body>

</html>