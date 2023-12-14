<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('status' => 'error', 'message' => 'Alamat email tidak valid.'));
        exit;
    }

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@gmail.com'; // Your Gmail email address
        $mail->Password   = 'your_password'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email recipients and content
        $mail->setFrom($email, $name);
        $mail->addAddress('your@gmail.com'); // Your email address
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = "New Contact Form Submission: $subject";
        $mail->Body    = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

        // Send the email
        $mail->send();

        echo json_encode(array('status' => 'success', 'message' => 'Your message has been sent. Thank you!'));
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to send the message. Please try again later.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
