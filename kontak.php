<?php
// Menampilkan semua error (debug)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Import PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include file PHPMailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Proses kirim email kalau form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];

    $mail = new PHPMailer(true);

    try {
        // SMTP setup
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nicetryhime@gmail.com';       // GANTI
        $mail->Password   = 'golaivdkbyaftevh';    // GANTI
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email pengirim & penerima
        $mail->setFrom($email, $nama); // dari pengunjung
        $mail->addAddress('nicetryhime@gmail.com'); // ke kamu

        // Isi email
        $mail->Subject = 'Pesan dari Website MBC Lab';
        $mail->Body    = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";

        // Kirim
        $mail->send();
        echo "<script>alert('Pesan berhasil dikirim!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gagal kirim email. Error: {$mail->ErrorInfo}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontak MBC Lab</title>
    <!-- Tambahkan Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="post" action="" class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">Form Kontak</h1>
        <label class="block mb-2 font-semibold">Nama:</label>
        <input type="text" name="nama" required class="w-full mb-4 px-4 py-2 border rounded-md">

        <label class="block mb-2 font-semibold">Email:</label>
        <input type="email" name="email" required class="w-full mb-4 px-4 py-2 border rounded-md">

        <label class="block mb-2 font-semibold">Pesan:</label>
        <textarea name="pesan" required class="w-full mb-4 px-4 py-2 border rounded-md"></textarea>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
            Kirim
        </button>
    </form>
</body>
</html>
