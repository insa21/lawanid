<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel</title>
    <!-- Menggunakan Bootstrap untuk tata letak dan gaya -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <div class="container mt-5">
        <?php
        include '../conn.php';

        // Mendapatkan ID Artikel dari parameter URL
        $id_artikel = $_GET['id'];

        // Mengambil data artikel berdasarkan ID
        $result = $conn->query("SELECT * FROM Artikel WHERE id_artikel = '$id_artikel'");
        $row = $result->fetch_assoc();
        ?>
        <h2><?php echo $row['judul']; ?></h2>
        <p class="text-muted"><?php echo date('d F Y', strtotime($row['tanggal'])); ?></p>
        <img src="uploads/<?php echo $row['foto']; ?>" class="img-fluid mb-3" alt="Gambar Artikel">
        <div><?php echo $row['isi']; ?></div>
    </div>

    <!-- Menggunakan Bootstrap JS dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>