<?php
include '../conn.php';

// Validasi ID Artikel
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_artikel = $_GET['id'];

    // Mengambil nama file foto sebelum menghapus artikel
    $result = $conn->query("SELECT foto FROM Artikel WHERE id_artikel = '$id_artikel'");

    if ($result) {
        $row = $result->fetch_assoc();
        $nama_foto = $row['foto'];

        // Menghapus data artikel berdasarkan ID
        $sql = "DELETE FROM Artikel WHERE id_artikel = '$id_artikel'";

        if ($conn->query($sql) === TRUE) {
            // Hapus file foto jika ada
            if (!empty($nama_foto)) {
                unlink('uploads/' . $nama_foto);
            }
            echo "Artikel berhasil dihapus!";
            // Redirect ke halaman lihat artikel setelah berhasil dihapus
            header("Location: lihat_artikel.php");
            exit();
        } else {
            echo "Error menghapus artikel: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
} else {
    echo "ID Artikel tidak valid.";
}
