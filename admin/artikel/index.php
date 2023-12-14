<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Artikel</title>
    <!-- Menggunakan Bootstrap untuk tata letak dan gaya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <div class="container mt-5">
        <h2>Artikel Terbaru</h2>
        <div class="row">
            <?php
            include '../conn.php';

            // Mengambil data dari tabel Artikel
            $result = $conn->query("SELECT * FROM Artikel ORDER BY tanggal DESC LIMIT 6");

            // Menampilkan data ke dalam kartu-kartu Bootstrap
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='uploads/{$row['foto']}' class='card-img-top' alt='Gambar Artikel'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['judul']}</h5>
                            <p class='card-text'>" . substr($row['isi'], 0, 100) . "...</p>
                            <a href='detail_artikel.php?id={$row['id_artikel']}' class='btn btn-primary'>Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>";
            }

            // Menutup koneksi
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Menggunakan Bootstrap JS dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>