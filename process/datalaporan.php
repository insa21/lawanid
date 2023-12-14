<!-- Modal pelapor-->
<div class="modal fade" id="profileImageModal" tabindex="-1" aria-labelledby="profileImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <img id="profileImageModalContent" src="" alt="Profile Image" style="width: 100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal for enlarging images -->
<div class="modal fade" id="enlargeImageModal" tabindex="-1" aria-labelledby="enlargeImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img id="enlargedImg" src="" class="img-fluid" alt="Enlarged Image">
      </div>
    </div>
  </div>
</div>

<?php

$terkirim = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='terkirim' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$approve  = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='approve' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$unapprove = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='unapprove' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");


// kondisi terkirim
while ($perlaporan = $terkirim->fetch_assoc()) { ?>
  <!-- Recent Laporan -->
  <div class="col-lg-12">
    <div class="card recent-sales overflow-auto">
      <div class="card-body">
        <h5 class="card-title">Data Laporan Siswa<span> | Hari ini</span></h5>
        <div class="table-responsive">
          <table class="table table-borderless datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">KTP</th>
                <!-- <th scope="col">Nama</th> -->
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Bukti</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Counter for numbering rows
              $rowNumber = 1;

              // Kondisi terkirim
              while ($perlaporan = $terkirim->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan['foto']}'><img src='../assets/kartupelajar/{$perlaporan['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
                // echo "<td>{$perlaporan['nama']}</td>";
                echo "<td><a href='#' class='text-primary'>{$perlaporan['judul']}</a></td>";
                echo "<td>{$perlaporan['deskripsi']}</td>";
                echo "<td>{$perlaporan['lokasi_kejadian']}</td>";
                echo "<td>{$perlaporan['tanggal_kejadian']}</td>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
                echo "<td><span class='badge bg-warning'>Terkirim</span></td>";
                echo "</tr>";
                $rowNumber++;
              }


              // Kondisi approve
              while ($perlaporan1 = $approve->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan1['foto']}'><img src='../assets/kartupelajar/{$perlaporan1['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
                // echo "<td>{$perlaporan1['nama']}</td>";
                echo "<td><a href='#' class='text-primary'>{$perlaporan1['judul']}</a></td>";
                echo "<td>{$perlaporan1['deskripsi']}</td>";
                echo "<td>{$perlaporan1['lokasi_kejadian']}</td>";
                echo "<td>{$perlaporan1['tanggal_kejadian']}</td>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan1['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan1['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
                echo "<td><span class='badge bg-success'>Approved</span></td>";
                echo "</tr>";
                $rowNumber++;
              }

              // Kondisi unapprove
              while ($perlaporan2 = $unapprove->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan2['foto']}'><img src='../assets/kartupelajar/{$perlaporan2['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
                // echo "<td>{$perlaporan2['nama']}</td>";
                echo "<td><a href='#' class='text-primary'>{$perlaporan2['judul']}</a></td>";
                echo "<td>{$perlaporan2['deskripsi']}</td>";
                echo "<td>{$perlaporan2['lokasi_kejadian']}</td>";
                echo "<td>{$perlaporan2['tanggal_kejadian']}</td>";
                echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan2['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan2['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
                echo "<td><span class='badge bg-danger'>Unapproved</span></td>";
                echo "</tr>";
                $rowNumber++;
              }
              ?>
          </table>
        </div>
      </div>
    </div>
  </div><!-- End Recent Laporan -->

<?php } ?>