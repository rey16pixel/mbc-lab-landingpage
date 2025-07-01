<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nicetryhime@gmail.com';
        $mail->Password = 'golaivdkbyaftevh';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $nama);
        $mail->addAddress('nicetryhime@gmail.com');
        $mail->Subject = 'Pesan dari Website MBC Lab';
        $mail->Body = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";

        $mail->send();
        echo "<script>alert('Pesan berhasil dikirim!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gagal kirim email. Error: {$mail->ErrorInfo}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak MBC Lab</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-blue-200 min-h-screen">
  <div class="flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <form method="post" action="" class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
      <h1 class="text-3xl font-bold mb-6 text-center text-indigo-700">Hubungi Kami</h1>
      <label class="block mb-2 font-semibold">Nama:</label>
      <input type="text" name="nama" required class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">

      <label class="block mb-2 font-semibold">Email:</label>
      <input type="email" name="email" required class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">

      <label class="block mb-2 font-semibold">Pesan:</label>
      <textarea name="pesan" required class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>

      <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md transition duration-200">
        Kirim Pesan
      </button>
    </form>

    <div class="mt-10 bg-white p-6 rounded-2xl shadow-md w-full max-w-md">
      <h2 class="text-xl font-bold text-indigo-800 mb-2">Informasi Kontak</h2>
      <p class="text-gray-800 mb-1">Alamat: Jalan Telekomunikasi No. 1, Terusan Buah Batu, Bandung</p>
      <p class="text-gray-800 mb-1">Ruangan: TULT 13.04 & TULT 11.12</p>
      <p class="text-gray-800 mb-1">Line: <span class="text-green-700 font-semibold">@sok8073r</span></p>
      <p class="text-indigo-600 font-semibold"><a href="https://maps.app.goo.gl/jqiSuAbK6QLnBmqs8" target="_blank">📍 Lihat Lokasi di Google Maps</a></p>
      <p class="mt-2 text-sm text-indigo-400 font-semibold">#WeAttackWeProtect</p>
    </div>
  </div>
</body>
</html>
