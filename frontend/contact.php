<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Ambil data formulir dari POST (gunakan filter_input untuk keamanan)
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Buat instance PHPMailer
$mail = new PHPMailer(true);

try {
    // Pengaturan server
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Sesuaikan dengan alamat server SMTP Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = '20sa1158@mhs.amikompurwokerto.ac.id'; // Sesuaikan dengan alamat email SMTP Anda
    $mail->Password   = 'bumiayu456'; // Sesuaikan dengan kata sandi SMTP Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Sesuaikan jika diperlukan
    $mail->Port       = 587; // Port SMTP

    // Penerima
    $mail->setFrom($email, $name);
    $mail->addAddress('20sa1158@mhs.amikompurwokerto.ac.id'); // Alamat email penerima
    $mail->addReplyTo($email, $name);

    // Konten
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = "Nama: $name\nEmail: $email\nSubject: $subject\nPesan:\n$message";

    $mail->send();
    echo json_encode(array('status' => 'success', 'message' => 'Pesan Anda telah terkirim. Terima kasih!'));
} catch (Exception $e) {
    echo json_encode(array('status' => 'error', 'message' => 'Pesan tidak dapat dikirim. Kesalahan Mailer: ' . $mail->ErrorInfo));
}
